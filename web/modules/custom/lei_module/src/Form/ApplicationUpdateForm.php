<?php

namespace Drupal\lei_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\NodeInterface;

class ApplicationUpdateForm extends FormBase {

  protected $node;

  public function getFormId() {
    return 'application_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state, NodeInterface $node = NULL) {
    $this->node = $node;

    // API Response 

    $api_endpoint = 'https://api.gleif.org/api/v1/lei-records';
    $filters = [
        'entity.legalAddress.country' => $node->get('field_country_code')->value,
        'entity.registeredAs' => $node->get('field_registration_number')->value,
    ];

    $query_params = http_build_query(['filter' => $filters]);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_endpoint . '?' . $query_params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if(curl_errno($ch)) {
        $error_message = curl_error($ch);
        echo "Error: $error_message";
    }

    curl_close($ch);

    if (!empty($response)) {
        $data = json_decode($response, true);

        if (isset($data['data'])) {
            foreach ($data['data'] as $record) {
                $leiId = $record['id'];
                $renewalDate = $record['attributes']['registration']['nextRenewalDate'];
                $d=strtotime($renewalDate);
                $formattedRenewalDate = date("Y-m-d", $d);
                $leiStatus = $record['attributes']['registration']['status'];
            }
        } else {
            echo "No data found.";
        }
    }

    // Update Form Start 

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Company Name'),
      '#default_value' => $node->getTitle(),
      '#required' => TRUE,
    ];

    $form['field_registration_number'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Registration Number'),
      '#default_value' => $node->get('field_registration_number')->value,
      '#disabled' => TRUE,
    ];

    $form['field_country_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Country Code'),
      '#default_value' => $node->get('field_country_code')->value,
      '#disabled' => TRUE,
    ];

    $form['field_lei_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('LEI ID'),
      '#default_value' => $leiId,
      '#required' => TRUE,
    ];

    $form['field_lei_status'] = [
      '#type' => 'textfield',
      '#title' => $this->t('LEI Status'),
      '#default_value' => $leiStatus,
      '#required' => TRUE,
    ];

    $form['field_next_renewal_date'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Next Renewal Date'),
      '#default_value' => $formattedRenewalDate,
      '#required' => TRUE,
    ];

    // $form['field_gleif_last_update'] = [
    //   '#type' => 'textfield',
    //   '#title' => $this->t('Last Updated On'),
    //   '#default_value' => $currentDate,
    //   '#required' => TRUE,
    // ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Update'),
    ];

    $form['actions']['cancel'] = [
      '#type' => 'submit',
      '#value' => $this->t('Cancel'),
      '#submit' => ['::cancelForm'],
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Current Date and Time

    $date = strtotime('now');
    $currentDate = date("Y-m-d h:i:s", $date);

    $this->node->setTitle($form_state->getValue('title'));
    $this->node->set('field_lei_code', $form_state->getValue('field_lei_code'));
    $this->node->set('field_lei_status', $form_state->getValue('field_lei_status'));
    $this->node->set('field_next_renewal_date', $form_state->getValue('field_next_renewal_date'));
    $this->node->set('field_gleif_last_update', $currentDate);
    $this->node->save();

    $form_state->setRedirect('<front>');
  }

  public function cancelForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRedirect('<front>');
  }
}

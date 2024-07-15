<?php

namespace Drupal\lei_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class LeiModuleController extends ControllerBase {

  protected $entityTypeManager;
  protected $formBuilder;

  public function __construct(EntityTypeManagerInterface $entityTypeManager, FormBuilderInterface $formBuilder) {
    $this->entityTypeManager = $entityTypeManager;
    $this->formBuilder = $formBuilder;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('form_builder')
    );
  }

  public function updateForm($node) {
    $node = $this->entityTypeManager->getStorage('node')->load($node);
    
    if (!$node || $node->getType() !== 'application_form') {
      throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException();
    }

    $form = $this->formBuilder->getForm('\Drupal\lei_module\Form\ApplicationUpdateForm', $node);

    return $form;
  }

   /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */

  public function detailsPage($node) {
    $node = $this->entityTypeManager->getStorage('node')->load($node);
    
    if (!$node || $node->getType() !== 'application_form') {
      throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException();
    }
    $output = '';
    // Company Title
    $lastUpdateDate = $node->get('field_gleif_last_update')->value; // Current Date and Time
    $output .= '<div><h2>'.$node->getTitle().'</div></h2>';

    // Details of company fetch through API using LEI ID

    $api_endpoint = 'https://api.gleif.org/api/v1/lei-records';
    
    $filters = [
        'lei' => $node->get('field_lei_code')->value,
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
              // LEI Details
                $leiId = $record['id'];
                $legalName = $record['attributes']['entity']['legalName']['name'];
                $regiAs = $record['attributes']['entity']['registeredAs'];
                $regiAt = $record['attributes']['entity']['registeredAt']['id'];
                $jurisdiction = $record['attributes']['entity']['jurisdiction'];
                $category = $record['attributes']['entity']['category'];
                $legalForm = $record['attributes']['entity']['legalForm']['id'];
                $status = $record['attributes']['entity']['status'];
                $ocid = $record['attributes']['ocid'];
                $spglobal = $record['attributes']['spglobal'][0];
              
              // Address Details Legal
                $legalAdd1 = $record['attributes']['entity']['legalAddress']['addressLines'][0];
                $legalAdd2 = $record['attributes']['entity']['legalAddress']['addressLines'][1];
                $postalCode = $record['attributes']['entity']['legalAddress']['postalCode'];
                $city = $record['attributes']['entity']['legalAddress']['city'];
                $region = $record['attributes']['entity']['legalAddress']['region'];
                $country = $record['attributes']['entity']['legalAddress']['country'];
                
              // Address Details Headquarters
                $headAdd1 = $record['attributes']['entity']['headquartersAddress']['addressLines'][0];
                $headPostalCode = $record['attributes']['entity']['headquartersAddress']['postalCode'];
                $headCity = $record['attributes']['entity']['headquartersAddress']['city'];
                $headRegion = $record['attributes']['entity']['headquartersAddress']['region'];
                $headCountry = $record['attributes']['entity']['headquartersAddress']['country'];

              // Registration details
                $iniRegiDate = strtotime($record['attributes']['registration']['initialRegistrationDate']);
                $initialRegistrationDate = date("Y-m-d h:i:s", $iniRegiDate);
                $regiStatus = $record['attributes']['registration']['status'];
                $renewalDate = $record['attributes']['registration']['nextRenewalDate']; 
                $d=strtotime($renewalDate);
                $nextRenewalDate = date("Y-m-d", $d);
                $managingLou = $record['attributes']['registration']['managingLou'];
                $corroborationLevel = $record['attributes']['registration']['corroborationLevel'];
                $validatedAt = $record['attributes']['registration']['validatedAt']['id'];
                $validatedAs = $record['attributes']['registration']['validatedAs'];
            }
        } else {
          $output .= "No data found.";
        }
    }

    $output .= "<div><strong>LEI Code " . $leiId . "</strong></div><hr>";

    $output .= '<div>
                  <table>
                    <tr>
                      <td>(Primary) Legal Name: </td>
                      <td>' . $legalName . '</td>
                    </tr>
                    <tr>
                      <td>Registered At: </td>
                      <td>' . $regiAt . '</td>
                    </tr>
                    <tr>
                      <td>Registered As: </td>
                      <td><strong>' . $regiAs . '</strong></td>
                    </tr>
                    <tr>
                      <td>Jurisdiction Of Formation: </td>
                      <td>' . $jurisdiction . '</td>
                    </tr>
                    <tr>
                      <td>General Category: </td>
                      <td>' . $category . '</td>
                    </tr>
                    <tr>
                      <td>Entity Legal Form: </td>
                      <td>' . $legalForm . '</td>
                    </tr>
                    <tr>
                      <td>Entity Status: </td>
                      <td>' . $status . '</td>
                    </tr>
                    <tr>
                      <td>OpenCorporates ID: </td>
                      <td>' . $ocid . '</td>
                    </tr>
                    <tr>
                      <td>S&P Global Company ID: </td>
                      <td>' . $spglobal . '</td>
                    </tr>
                  </table>
               </div>';

    $output .= '</br><div><strong>Address</strong></div><hr>';

    $output .= '<div>
                  <table>
                    <tr>
                      <td><strong>Legal</strong></td>
                    </tr>
                    <tr>
                      <td>' . $legalAdd1 . '</td>
                    </tr>
                    <tr>
                      <td>' . $legalAdd2 . '</td>
                    </tr>
                    <tr>
                      <td>' . $postalCode . '</td>
                    </tr>
                    <tr>
                      <td>' . $city . '</td>
                    </tr>
                    <tr>
                      <td>' . $region . '</td>
                    </tr>
                    <tr>
                      <td>' . $country . '</td>
                    </tr>
                  </table>
                  <br>
                  <table>
                    <tr>
                      <td><strong>Headquarters</strong></td>
                    </tr>
                    <tr>
                      <td>' . $headAdd1 . '</td>
                    </tr>
                    <tr>
                      <td>' . $headPostalCode . '</td>
                    </tr>
                    <tr>
                      <td>' . $headCity . '</td>
                    </tr>
                    <tr>
                      <td>' . $headRegion . '</td>
                    </tr>
                    <tr>
                      <td>' . $headCountry . '</td>
                    </tr>
                  </table>
                  </span>
               </div>';

    $output .= '</br><div><strong>Registration details</strong></div><hr>';

    $output .= '<div>
               <table>
                 <tr>
                   <td>Registration Date: </td>
                   <td>' . $initialRegistrationDate . '</td>
                 </tr>
                 <tr>
                   <td>Last Update: </td>
                   <td><strong>' . $lastUpdateDate . '</strong></td>
                 </tr>
                 <tr>
                   <td>Status: </td>
                   <td><strong>' . $regiStatus . '</strong></td>
                 </tr>
                 <tr>
                   <td>Next Renewal: </td>
                   <td>' . $nextRenewalDate . '</td>
                 </tr>
                 <tr>
                   <td>LEI Issuer: </td>
                   <td>' . $managingLou . '</td>
                 </tr>
                 <tr>
                   <td>Corroboration Level: </td>
                   <td>' . $corroborationLevel . '</td>
                 </tr>
                 <tr>
                   <td>Data Validated At: </td>
                   <td>' . $validatedAt . '</td>
                 </tr>
                 <tr>
                   <td>Data Validated As: </td>
                   <td>' . $validatedAs . '</td>
                 </tr>
               </table>
            </div>';

    // return $output;
    return [
      '#markup' => $output,
    ];
  }
}

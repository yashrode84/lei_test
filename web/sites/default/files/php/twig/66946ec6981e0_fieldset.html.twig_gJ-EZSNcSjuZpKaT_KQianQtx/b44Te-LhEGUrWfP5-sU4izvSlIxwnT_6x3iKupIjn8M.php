<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* core/themes/olivero/templates/form/fieldset.html.twig */
class __TwigTemplate_d7552baec229c481ab7ed9f1c19d08fc extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        $context["classes"] = [0 => "fieldset", 1 => ((twig_get_attribute($this->env, $this->source,         // line 35
($context["attributes"] ?? null), "hasClass", [0 => "fieldgroup"], "method", false, false, true, 35)) ? ("fieldset--group") : ("")), 2 => "js-form-item", 3 => "form-item", 4 => "js-form-wrapper", 5 => "form-wrapper"];
        // line 43
        $context["wrapper_classes"] = [0 => "fieldset__wrapper", 1 => ((twig_get_attribute($this->env, $this->source,         // line 45
($context["attributes"] ?? null), "hasClass", [0 => "fieldgroup"], "method", false, false, true, 45)) ? ("fieldset__wrapper--group") : (""))];
        // line 49
        $context["legend_span_classes"] = [0 => "fieldset__label", 1 => ((twig_get_attribute($this->env, $this->source,         // line 51
($context["attributes"] ?? null), "hasClass", [0 => "fieldgroup"], "method", false, false, true, 51)) ? ("fieldset__label--group") : ("")), 2 => ((        // line 52
($context["required"] ?? null)) ? ("js-form-required") : ("")), 3 => ((        // line 53
($context["required"] ?? null)) ? ("form-required") : (""))];
        // line 57
        $context["legend_classes"] = [0 => "fieldset__legend", 1 => (((twig_get_attribute($this->env, $this->source,         // line 59
($context["attributes"] ?? null), "hasClass", [0 => "fieldgroup"], "method", false, false, true, 59) &&  !twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "hasClass", [0 => "form-composite"], "method", false, false, true, 59))) ? ("fieldset__legend--group") : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 60
($context["attributes"] ?? null), "hasClass", [0 => "form-composite"], "method", false, false, true, 60)) ? ("fieldset__legend--composite") : ("")), 3 => (((        // line 61
($context["title_display"] ?? null) == "invisible")) ? ("fieldset__legend--invisible") : ("fieldset__legend--visible"))];
        // line 65
        $context["description_classes"] = [0 => "fieldset__description"];
        // line 69
        echo "
<fieldset";
        // line 70
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 70), 70, $this->source), "html", null, true);
        echo ">
  ";
        // line 72
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, ($context["legend"] ?? null), "title", [], "any", false, false, true, 72)) {
            // line 73
            echo "  <legend";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["legend"] ?? null), "attributes", [], "any", false, false, true, 73), "addClass", [0 => ($context["legend_classes"] ?? null)], "method", false, false, true, 73), 73, $this->source), "html", null, true);
            echo ">
    <span";
            // line 74
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["legend_span"] ?? null), "attributes", [], "any", false, false, true, 74), "addClass", [0 => ($context["legend_span_classes"] ?? null)], "method", false, false, true, 74), 74, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["legend"] ?? null), "title", [], "any", false, false, true, 74), 74, $this->source), "html", null, true);
            echo "</span>
  </legend>
  ";
        }
        // line 77
        echo "
  <div";
        // line 78
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($context["wrapper_classes"] ?? null)], "method", false, false, true, 78), 78, $this->source), "html", null, true);
        echo ">
    ";
        // line 79
        if (($context["inline_items"] ?? null)) {
            // line 80
            echo "      <div class=\"container-inline\">
    ";
        }
        // line 82
        echo "
    ";
        // line 83
        if (((($context["description_display"] ?? null) == "before") && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 83))) {
            // line 84
            echo "      <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 84), "addClass", [0 => ($context["description_classes"] ?? null)], "method", false, false, true, 84), 84, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 84), 84, $this->source), "html", null, true);
            echo "</div>
    ";
        }
        // line 86
        echo "    ";
        if (($context["prefix"] ?? null)) {
            // line 87
            echo "      <span class=\"fieldset__prefix\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 87, $this->source), "html", null, true);
            echo "</span>
    ";
        }
        // line 89
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 89, $this->source), "html", null, true);
        echo "
    ";
        // line 90
        if (($context["suffix"] ?? null)) {
            // line 91
            echo "      <span class=\"fieldset__suffix\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null), 91, $this->source), "html", null, true);
            echo "</span>
    ";
        }
        // line 93
        echo "    ";
        if (($context["errors"] ?? null)) {
            // line 94
            echo "      <div class=\"fieldset__error-message\">
        ";
            // line 95
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 95, $this->source), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 98
        echo "    ";
        if ((twig_in_filter(($context["description_display"] ?? null), [0 => "after", 1 => "invisible"]) && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 98))) {
            // line 99
            echo "      <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 99), "addClass", [0 => ($context["description_classes"] ?? null)], "method", false, false, true, 99), 99, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 99), 99, $this->source), "html", null, true);
            echo "</div>
    ";
        }
        // line 101
        echo "
    ";
        // line 102
        if (($context["inline_items"] ?? null)) {
            // line 103
            echo "      </div>
    ";
        }
        // line 105
        echo "  </div>
</fieldset>
";
    }

    public function getTemplateName()
    {
        return "core/themes/olivero/templates/form/fieldset.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 105,  156 => 103,  154 => 102,  151 => 101,  143 => 99,  140 => 98,  134 => 95,  131 => 94,  128 => 93,  122 => 91,  120 => 90,  115 => 89,  109 => 87,  106 => 86,  98 => 84,  96 => 83,  93 => 82,  89 => 80,  87 => 79,  83 => 78,  80 => 77,  72 => 74,  67 => 73,  64 => 72,  60 => 70,  57 => 69,  55 => 65,  53 => 61,  52 => 60,  51 => 59,  50 => 57,  48 => 53,  47 => 52,  46 => 51,  45 => 49,  43 => 45,  42 => 43,  40 => 35,  39 => 33,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/olivero/templates/form/fieldset.html.twig", "C:\\xampp\\htdocs\\LEI_asignment\\lei_drupal\\web\\core\\themes\\olivero\\templates\\form\\fieldset.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 33, "if" => 72);
        static $filters = array("escape" => 70);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}

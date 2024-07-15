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

/* core/themes/olivero/templates/datetime-wrapper.html.twig */
class __TwigTemplate_13d896a8712e616c11d3e3784afa5173 extends \Twig\Template
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
        // line 12
        $context["title_classes"] = [0 => "form-item__label", 1 => ((        // line 14
($context["required"] ?? null)) ? ("js-form-required") : ("")), 2 => ((        // line 15
($context["required"] ?? null)) ? ("form-required") : (""))];
        // line 18
        echo "<div class=\"form-item form-datetime-wrapper\">
  ";
        // line 19
        if (($context["title"] ?? null)) {
            // line 20
            echo "    <h4";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => ($context["title_classes"] ?? null)], "method", false, false, true, 20), 20, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 20, $this->source), "html", null, true);
            echo "</h4>
  ";
        }
        // line 22
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 22, $this->source), "html", null, true);
        echo "
  ";
        // line 23
        if (($context["errors"] ?? null)) {
            // line 24
            echo "    <div class=\"form-item__error-message\">
      ";
            // line 25
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 25, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 28
        echo "  ";
        if (($context["description"] ?? null)) {
            // line 29
            echo "    <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description_attributes"] ?? null), "addClass", [0 => "form-item__description"], "method", false, false, true, 29), 29, $this->source), "html", null, true);
            echo ">
      ";
            // line 30
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 30, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 33
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/olivero/templates/datetime-wrapper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 33,  80 => 30,  75 => 29,  72 => 28,  66 => 25,  63 => 24,  61 => 23,  56 => 22,  48 => 20,  46 => 19,  43 => 18,  41 => 15,  40 => 14,  39 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/olivero/templates/datetime-wrapper.html.twig", "C:\\xampp\\htdocs\\LEI_asignment\\lei_drupal\\web\\core\\themes\\olivero\\templates\\datetime-wrapper.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 12, "if" => 19);
        static $filters = array("escape" => 20);
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

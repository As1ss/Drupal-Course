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

/* themes/custom/curso_bootstrap/templates/field/field--node--field-tags.html.twig */
class __TwigTemplate_0b61ad8b1a5096d611856c03ad3b2091 extends Template
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
        // line 25
        $context["classes"] = ["field", ("field--name-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 27
($context["field_name"] ?? null), 27, $this->source))), ("field--type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 28
($context["field_type"] ?? null), 28, $this->source))), ("field--label-" . $this->sandbox->ensureToStringAllowed(        // line 29
($context["label_display"] ?? null), 29, $this->source)), "clearfix"];
        // line 34
        $context["title_classes"] = ["field__label", (((        // line 36
($context["label_display"] ?? null) == "inline")) ? ("inline") : (""))];
        // line 39
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 39), 39, $this->source), "html", null, true);
        echo ">
  ";
        // line 40
        if ( !($context["label_hidden"] ?? null)) {
            // line 41
            echo "    <h3";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [($context["title_classes"] ?? null)], "method", false, false, true, 41), 41, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 41, $this->source), "html", null, true);
            echo "</h3>
  ";
        }
        // line 43
        echo "  <ul class='links field__items'>
    ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 45
            echo "      <li";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 45), 45, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "content", [], "any", false, false, true, 45), 45, $this->source), "html", null, true);
            echo "</li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "  </ul>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["field_name", "field_type", "label_display", "attributes", "label_hidden", "title_attributes", "label", "items"]);    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/curso_bootstrap/templates/field/field--node--field-tags.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  80 => 47,  69 => 45,  65 => 44,  62 => 43,  54 => 41,  52 => 40,  47 => 39,  45 => 36,  44 => 34,  42 => 29,  41 => 28,  40 => 27,  39 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Bartik theme override for taxonomy term fields.
 *
 * Available variables:
 * - attributes: HTML attributes for the containing element.
 * - label_hidden: Whether to show the field label or not.
 * - title_attributes: HTML attributes for the label.
 * - label: The label for the field.
 * - content_attributes: HTML attributes for the content.
 * - items: List of all the field items. Each item contains:
 *   - attributes: List of HTML attributes for each item.
 *   - content: The field item's content.
 * - entity_type: The entity type to which the field belongs.
 * - field_name: The name of the field.
 * - field_type: The type of the field.
 * - label_display: The display settings for the label.
 *
 * @see template_preprocess_field()
 * @see bartik_preprocess_field()
 */
#}
{%
  set classes = [
    'field',
    'field--name-' ~ field_name|clean_class,
    'field--type-' ~ field_type|clean_class,
    'field--label-' ~ label_display,
    'clearfix',
  ]
%}
{%
  set title_classes = [
    'field__label',
    label_display == 'inline' ? 'inline',
  ]
%}
<div{{ attributes.addClass(classes) }}>
  {% if not label_hidden %}
    <h3{{ title_attributes.addClass(title_classes) }}>{{ label }}</h3>
  {% endif %}
  <ul class='links field__items'>
    {% for item in items %}
      <li{{ item.attributes }}>{{ item.content }}</li>
    {% endfor %}
  </ul>
</div>
", "themes/custom/curso_bootstrap/templates/field/field--node--field-tags.html.twig", "C:\\Users\\alexis.lopez\\workflow\\Drupal-Course\\drupal\\web\\themes\\custom\\curso_bootstrap\\templates\\field\\field--node--field-tags.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 25, "if" => 40, "for" => 44);
        static $filters = array("clean_class" => 27, "escape" => 39);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['clean_class', 'escape'],
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

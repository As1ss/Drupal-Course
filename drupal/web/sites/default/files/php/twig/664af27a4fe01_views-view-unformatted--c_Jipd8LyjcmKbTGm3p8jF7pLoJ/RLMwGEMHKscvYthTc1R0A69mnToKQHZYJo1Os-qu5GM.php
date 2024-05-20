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

/* themes/custom/curso_bootstrap/templates/views/views-view-unformatted--curso--page-1.html.twig */
class __TwigTemplate_752266dbff33697f286359bb5f765686 extends Template
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
        // line 21
        echo "<div>Unformatted de curso-> page 1</div>
";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 23
            echo "  ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "inline", [], "any", false, false, true, 23)) ? ("<span") : ("<div")));
            echo " class=\"views-summary views-summary-unformatted\">
  ";
            // line 24
            if (twig_get_attribute($this->env, $this->source, $context["row"], "separator", [], "any", false, false, true, 24)) {
                // line 25
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "separator", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
            }
            // line 27
            echo "  <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "url", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
            echo "\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 27), "addClass", [((twig_get_attribute($this->env, $this->source, $context["row"], "active", [], "any", false, false, true, 27)) ? ("is-active") : (""))], "method", false, false, true, 27), 27, $this->source), "href"), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "link", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
            echo "</a>
  ";
            // line 28
            if (twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "count", [], "any", false, false, true, 28)) {
                // line 29
                echo "    (";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "count", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
                echo ")
  ";
            }
            // line 31
            echo "  ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "inline", [], "any", false, false, true, 31)) ? ("</span>") : ("</div>")));
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["rows", "options"]);    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/curso_bootstrap/templates/views/views-view-unformatted--curso--page-1.html.twig";
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
        return array (  73 => 31,  67 => 29,  65 => 28,  56 => 27,  53 => 25,  51 => 24,  46 => 23,  42 => 22,  39 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for unformatted summary links.
 *
 * Available variables:
 * - rows: The rows contained in this view.
 *   - url: The URL to this row's content.
 *   - count: The number of items this summary item represents.
 *   - separator: A separator between each row.
 *   - attributes: HTML attributes for a row.
 *   - active: A flag indicating whether the row is active.
 * - options: Flags indicating how each row should be displayed. This contains:
 *   - count: A flag indicating whether the row's 'count' should be displayed.
 *   - inline: A flag indicating whether the item should be wrapped in an inline
 *     or block level HTML element.
 *
 * @see template_preprocess_views_view_summary_unformatted()
 */
#}
<div>Unformatted de curso-> page 1</div>
{% for row in rows  %}
  {{ options.inline ? '<span' : '<div' }} class=\"views-summary views-summary-unformatted\">
  {% if row.separator -%}
    {{ row.separator }}
  {%- endif %}
  <a href=\"{{ row.url }}\"{{ row.attributes.addClass(row.active ? 'is-active')|without('href') }}>{{ row.link }}</a>
  {% if options.count %}
    ({{ row.count }})
  {% endif %}
  {{ options.inline ? '</span>' : '</div>' }}
{% endfor %}
", "themes/custom/curso_bootstrap/templates/views/views-view-unformatted--curso--page-1.html.twig", "C:\\Users\\alexis.lopez\\workflow\\Drupal-Course\\drupal\\web\\themes\\custom\\curso_bootstrap\\templates\\views\\views-view-unformatted--curso--page-1.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 22, "if" => 24);
        static $filters = array("escape" => 25, "without" => 27);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
                ['escape', 'without'],
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

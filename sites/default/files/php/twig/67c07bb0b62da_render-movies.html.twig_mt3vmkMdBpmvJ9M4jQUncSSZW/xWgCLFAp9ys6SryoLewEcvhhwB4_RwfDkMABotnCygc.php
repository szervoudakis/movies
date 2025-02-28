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

/* modules/custom/best_movies/templates/render-movies.html.twig */
class __TwigTemplate_4ff40a241fa19fd9575d87f8d3b48b86 extends \Twig\Template
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
        // line 1
        echo "<div id='movie-items'>
   ";
        // line 2
        if ((twig_length_filter($this->env, ($context["movies"] ?? null)) > 0)) {
            // line 3
            echo "    <div class=\"row\">
   ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["movies"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["movie"]) {
                // line 5
                echo "        <div class=\"col-md-5\"> <!---->
            <div class=\"content-box-rounded\">
                
                <div class=\"card-field\">
                    <h4>";
                // line 9
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Title of Movie"));
                echo "</h4>
                    <p>";
                // line 10
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["movie"], "title", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
                echo "</p>
                </div>
                <div class=\"card-field\">
                    <h4>";
                // line 13
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Release date"));
                echo "</h4>
                    <p>";
                // line 14
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["movie"], "release_date", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                echo "</p>
                </div>
                ";
                // line 16
                $context["nameid"] = ("more-info" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["movie"], "nid", [], "any", false, false, true, 16), 16, $this->source));
                // line 17
                echo "                <div class=\"more-info\" id=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nameid"] ?? null), 17, $this->source), "html", null, true);
                echo "\" style=\"display:none;\">
                    <div class=\"card-field\">
                        <h4>";
                // line 19
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Original Title"));
                echo "</h4>
                        <p>";
                // line 20
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_striptags($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["movie"], "description", [], "any", false, false, true, 20), 20, $this->source)), "html", null, true);
                echo "</p>
                    </div>
                    <div class=\"card-field\">
                        <h4>";
                // line 23
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Type"));
                echo "</h4>
                        <p>";
                // line 24
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_striptags($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["movie"], "field_type", [], "any", false, false, true, 24), 24, $this->source)), "html", null, true);
                echo "</p>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-5\">
                    <input type=\"submit\" class=\"open-dialog-info\" id=\"";
                // line 29
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["movie"], "nid", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
                echo "\" value=\"Learn More..\" style=\"background-color:dark-blue;\">
                    </div>
                </div>
            </div>
        </div>
        ";
                // line 34
                if (((0 == twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 34) % 2) &&  !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, true, 34))) {
                    // line 35
                    echo "            <div class=\"clearfix\"></div> <!-- add clearfix every second item -->
        ";
                }
                // line 37
                echo "   ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movie'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "   </div>
   ";
        }
        // line 40
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/best_movies/templates/render-movies.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 40,  147 => 38,  133 => 37,  129 => 35,  127 => 34,  119 => 29,  111 => 24,  107 => 23,  101 => 20,  97 => 19,  91 => 17,  89 => 16,  84 => 14,  80 => 13,  74 => 10,  70 => 9,  64 => 5,  47 => 4,  44 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/best_movies/templates/render-movies.html.twig", "/var/www/html/modules/custom/best_movies/templates/render-movies.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2, "for" => 4, "set" => 16);
        static $filters = array("length" => 2, "t" => 9, "escape" => 10, "striptags" => 20);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['length', 't', 'escape', 'striptags'],
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

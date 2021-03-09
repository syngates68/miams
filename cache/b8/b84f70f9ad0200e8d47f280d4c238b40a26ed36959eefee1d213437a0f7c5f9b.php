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

/* plats\liste.html.twig */
class __TwigTemplate_0541942b569ef05dd6563d3ae8da19ba3271d7b565f9dfe6bb2bcf1ec6aef8cf extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "template.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("template.html.twig", "plats\\liste.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"list-container\">
        <div class=\"list-container__header\">
            <div class=\"list-header\">
                <h1>Liste des plats</h1>
                <p class=\"subtitle\">
                    Trouvez votre bonheur parmis les plats<br/> suivants, près de chez vous !
                </p>
                <a class=\"button button-secondary\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "plats/ajouter\">Proposer un plat</a>
            </div>
        </div>
        <div class=\"list-container__list\">
            <div class=\"dishes-list\">
                ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["plats"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 17
            echo "                    <div class=\"card\">
                        <div class=\"card-img-top\">
                            <img src=\"";
            // line 19
            echo twig_escape_filter($this->env, (($context["BASELINK"] ?? null) . twig_get_attribute($this->env, $this->source, $context["p"], "photo_plat", [], "any", false, false, false, 19)), "html", null, true);
            echo "\" alt=\"\">
                        </div>
                        <div class=\"card-body\">
                            <div class=\"avatar-block\">
                                <img src=\"";
            // line 23
            echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
            echo "assets/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["p"], "photo_vendeur", [], "any", false, false, false, 23), "html", null, true);
            echo "\" alt=\"Photo de profil de ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["p"], "vendeur", [], "any", false, false, false, 23), "html", null, true);
            echo "\">
                            </div>
                            <div class=\"card-body__informations\">
                                <div class=\"card-body__informations-top\">
                                    <div class=\"left-bloc\">
                                        <div class=\"title\"><a href=\"";
            // line 28
            echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
            echo "plats/";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["p"], "slug", [], "any", false, false, false, 28) . "-") . twig_get_attribute($this->env, $this->source, $context["p"], "id_plat", [], "any", false, false, false, 28)), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["p"], "nom_plat", [], "any", false, false, false, 28), "html", null, true);
            echo "</a></div>
                                        <div class=\"published-by\">Par ";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["p"], "vendeur", [], "any", false, false, false, 29), "html", null, true);
            echo "</div>
                                        <div class=\"published-at\">";
            // line 30
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["p"], "date_publication", [], "any", false, false, false, 30), "d/m/Y"), "html", null, true);
            echo "</div>
                                    </div>
                                    <div class=\"price\">
                                        <span class=\"value\">";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["p"], "prix", [], "any", false, false, false, 33), "html", null, true);
            echo "</span>
                                        <span class=\"euro\">€</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"card-footer\">
                                <a class=\"button button-primary-outline\" href=\"";
            // line 39
            echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
            echo "plats/";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["p"], "slug", [], "any", false, false, false, 39) . "-") . twig_get_attribute($this->env, $this->source, $context["p"], "id_plat", [], "any", false, false, false, 39)), "html", null, true);
            echo "\">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "plats\\liste.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 44,  121 => 39,  112 => 33,  106 => 30,  102 => 29,  94 => 28,  82 => 23,  75 => 19,  71 => 17,  67 => 16,  59 => 11,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "plats\\liste.html.twig", "C:\\wamp64\\www\\test\\App\\View\\plats\\liste.html.twig");
    }
}

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

/* inscription\inscription.html.twig */
class __TwigTemplate_8f36bb6fdcd8fae245f99b7273ab7f4ab2e77cd3c111fae628dd159e0c19d1bd extends Template
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
        $this->parent = $this->loadTemplate("template.html.twig", "inscription\\inscription.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"container-form\">
    <div class=\"form-bloc\">
        <h1>Inscription</h1>
        <form method=\"POST\" action=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "connexion\">
            ";
        // line 8
        if ((isset($context["error_connect"]) || array_key_exists("error_connect", $context))) {
            // line 9
            echo "                <div class=\"alert alert-danger\">
                    <span class=\"material-icons\">error</span>
                    <span class=\"message\">";
            // line 11
            echo twig_escape_filter($this->env, ($context["error_connect"] ?? null), "html", null, true);
            echo "</span>
                </div>
            ";
        }
        // line 14
        echo "            <div class=\"form-container\">
                <div class=\"input-form\">
                    <label for=\"nom\">Nom</label>
                    <input type=\"text\" name=\"nom\" id=\"nom\">
                </div>
                <div class=\"input-form\">
                    <label for=\"prenom\">Prénom</label>
                    <input type=\"text\" name=\"prenom\" id=\"prenom\">
                </div>
                <div class=\"input-form\">
                    <label for=\"mail\">Adresse mail</label>
                    <input type=\"email\" name=\"mail\" id=\"mail\">
                </div>
                <div class=\"input-form\">
                    <label for=\"pass\">Mot de passe</label>
                    <input type=\"password\" name=\"pass\" id=\"pass\">
                </div>
                <div class=\"input-form\">
                    <label for=\"pass_confirm\">Confirmation du mot de passe</label>
                    <input type=\"password\" name=\"pass_confirm\" id=\"pass_confirm\">
                </div>
                <button type=\"submit\" class=\"button button-primary\" name=\"submit_connexion\">S'inscrire</button>
                <div class=\"social-bloc\">
                    <button class=\"button button-social button-facebook\"><img src=\"";
        // line 37
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/img/facebook.svg\">Facebook</button>
                    <button class=\"button button-social button-google\"><img src=\"";
        // line 38
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/img/google.svg\">Google</button>
                </div>
            </div>
        </form>
        <div class=\"form-message\">
            <p>Vous possédez déjà un compte ? <a href=\"";
        // line 43
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "connexion\">Connectez-vous ici</a>.</p>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "inscription\\inscription.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 43,  100 => 38,  96 => 37,  71 => 14,  65 => 11,  61 => 9,  59 => 8,  55 => 7,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "inscription\\inscription.html.twig", "C:\\wamp64\\www\\test\\App\\View\\inscription\\inscription.html.twig");
    }
}

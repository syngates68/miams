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

/* connexion\connexion.html.twig */
class __TwigTemplate_275638b56abeb3d72c7fcfb39b6598e88db359b569f54bfbeecebdc022e07603 extends Template
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
        $this->parent = $this->loadTemplate("template.html.twig", "connexion\\connexion.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"container-form\">
    <div class=\"form-bloc\">
        <h1>Connexion</h1>
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
                    <label for=\"mail\">Adresse mail</label>
                    <input type=\"email\" name=\"mail\" id=\"mail\">
                </div>
                <div class=\"input-form\">
                    <label for=\"pass\">Mot de passe</label>
                    <input type=\"password\" name=\"pass\" id=\"pass\">
                    <span class=\"forgotten-password\">Mot de passe oublié ?</span>
                </div>
                <div class=\"input-form\">
                    <input type=\"checkbox\" name=\"remember_me\" id=\"remember_me\">
                    <label for=\"remember_me\" class=\"checkbox\">Rester connecté</label>
                </div>
                <button type=\"submit\" class=\"button button-primary\" name=\"submit_connexion\">Se connecter</button>
                <div class=\"social-bloc\">
                    <button class=\"button button-social button-facebook\"><img src=\"";
        // line 30
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/img/facebook.svg\">Facebook</button>
                    <button class=\"button button-social button-google\"><img src=\"";
        // line 31
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/img/google.svg\">Google</button>
                </div>
            </div>
        </form>
        <div class=\"form-message\">
            <p>Vous ne possédez pas encore de compte ? <a href=\"";
        // line 36
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "inscription\">Créez-vous en un ici</a>.</p>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "connexion\\connexion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 36,  93 => 31,  89 => 30,  71 => 14,  65 => 11,  61 => 9,  59 => 8,  55 => 7,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "connexion\\connexion.html.twig", "C:\\wamp64\\www\\test\\App\\View\\connexion\\connexion.html.twig");
    }
}

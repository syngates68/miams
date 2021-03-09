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

/* connexion\index.html.twig */
class __TwigTemplate_c052392f5c99770c4beb9c7141b3bf5016716daa192ebaa3dd12435cd9a5ed68 extends Template
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
        $this->parent = $this->loadTemplate("template.html.twig", "connexion\\index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"container-connexion\">
    <div class=\"bloc-formulaire bloc-connexion\">
        <div class=\"bloc-logo\">
            <img src=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/img/logo.svg\" alt=\"Logo de MIAMS\">
        </div>
        <h1>Se connecter</h1>
        <form method=\"POST\" action=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "connexion\">
            ";
        // line 11
        if ((isset($context["error_connect"]) || array_key_exists("error_connect", $context))) {
            // line 12
            echo "                <div class=\"alert alert-erreur\">
                    <span class=\"material-icons\">error</span>
                    <span class=\"message\">";
            // line 14
            echo twig_escape_filter($this->env, ($context["error_connect"] ?? null), "html", null, true);
            echo "</span>
                </div>
            ";
        }
        // line 17
        echo "            <div class=\"form-container\">
                <div class=\"row\">
                    <div class=\"col l12\">
                        <div class=\"input-form\">
                            <label for=\"mail\">Adresse mail</label>
                            <input type=\"email\" name=\"mail\" id=\"mail\">
                        </div>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col l12\">
                        <div class=\"input-form\">
                            <label for=\"pass\">Mot de passe</label>
                            <input type=\"password\" name=\"pass\" id=\"pass\">
                        </div>
                    </div>
                </div>
                <button type=\"submit\" class=\"btn-formulaire\" name=\"submit_connexion\">Connexion</button>
                <div class=\"bloc-social\">
                    <button class=\"btn-social btn-facebook\"><img src=\"";
        // line 36
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/img/facebook.svg\">Facebook</button>
                    <button class=\"btn-social btn-google\"><img src=\"";
        // line 37
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/img/google.svg\">Google</button>
                </div>
            </div>
        </form>
        <div class=\"bloc-non-membre\">
            <p>Vous ne possédez pas encore de compte ? <a href=\"";
        // line 42
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "inscription\">Créez-vous en un ici</a>.</p>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "connexion\\index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 42,  102 => 37,  98 => 36,  77 => 17,  71 => 14,  67 => 12,  65 => 11,  61 => 10,  55 => 7,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "connexion\\index.html.twig", "C:\\wamp64\\www\\test\\App\\View\\connexion\\index.html.twig");
    }
}

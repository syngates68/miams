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

/* template.html.twig */
class __TwigTemplate_e0336879dfbaf994764148db7595c77991bec1e918afb0eaf6c73c09224de7ec extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Commandez votre repas de ce soir en ligne</title>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/css/main.css\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\">
    <link href=\"https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap\" rel=\"stylesheet\"> 
    <link href=\"https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap\" rel=\"stylesheet\"> 
    <link href=\"https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap\" rel=\"stylesheet\"> 
    <link href=\"https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap\" rel=\"stylesheet\"> 
    <link href=\"https://fonts.googleapis.com/css2?family=Noto+Sans+JP:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap\" rel=\"stylesheet\"> 
    <link href=\"https://fonts.googleapis.com/css2?family=Mukta:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap\" rel=\"stylesheet\"> 
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap\" rel=\"stylesheet\"> 
    <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/js/librairies/jquery.min.js\"></script>
    <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/js/librairies/emoji-button-3.0.3.min.js\"></script>
    <link rel=\"stylesheet\" href=\"https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">
    <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/img/favicon.png\" />
    <!--<script src=\"//cdn.ckeditor.com/4.13.1/standard/ckeditor.js\"></script>-->
    <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/ckeditor/ckeditor.js\"></script>
    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/icon?family=Material+Icons\">
    <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    <!-- Système de modals -->
    <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/js/librairies/modaal.js\"></script>
    <link rel=\"stylesheet\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/css/librairies/modaal.css\">
    <script>
        var baseurl = \"";
        // line 28
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "\";
        var baselink = \"";
        // line 29
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "\";
    </script>
</head>
<body ";
        // line 32
        if ((isset($context["bg_full"]) || array_key_exists("bg_full", $context))) {
            echo "class=\"background-full\" style=\"background-image: url('";
            echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
            echo "assets/img/";
            echo twig_escape_filter($this->env, ($context["bg_full"] ?? null), "html", null, true);
            echo "');\"";
        }
        echo ">
    <div class=\"navbar ";
        // line 33
        if ((isset($context["eggshell"]) || array_key_exists("eggshell", $context))) {
            echo "eggshell-bg";
        }
        echo "\" ";
        if ((isset($context["navbar_background"]) || array_key_exists("navbar_background", $context))) {
            echo "style=\"background:";
            echo twig_escape_filter($this->env, ($context["navbar_background"] ?? null), "html", null, true);
            echo "\"";
        }
        echo ">
        <div class=\"navbar-content\">
            <div class=\"bloc-logo\">
                <a href=\"";
        // line 36
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 37
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/img/logo.svg\" alt=\"Logo de MIAMS\">
                </a>
            </div>
            <div class=\"links-block\">
                ";
        // line 41
        if ((isset($context["user"]) || array_key_exists("user", $context))) {
            // line 42
            echo "                    <div class=\"links-block__notifications\">
                        <a href=\"#\">
                            <span class=\"material-icons\">notifications_none</span>
                            ";
            // line 45
            if (((isset($context["nbr_notifications"]) || array_key_exists("nbr_notifications", $context)) && 1 === twig_compare(($context["nbr_notifications"] ?? null), 0))) {
                // line 46
                echo "                                <div class=\"notification sparkle\"></div>
                            ";
            }
            // line 48
            echo "                            <div class=\"title\">Notifications</div>
                        </a>
                    </div>
                    <div class=\"links-block__messages\">
                        <a href=\"";
            // line 52
            echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
            echo "messages/\">
                            <span class=\"material-icons\">chat_bubble_outline</span>
                            ";
            // line 54
            if (((isset($context["nbr_messages"]) || array_key_exists("nbr_messages", $context)) && 1 === twig_compare(($context["nbr_messages"] ?? null), 0))) {
                // line 55
                echo "                                <div class=\"notification sparkle\"></div>
                            ";
            }
            // line 57
            echo "                            <div class=\"title\">Messages</div>
                        </a>
                    </div>
                    <div class=\"user-block\">
                        <div class=\"user-block__avatar\">
                            <img src=\"";
            // line 62
            echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
            echo "assets/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "get_avatar", [], "any", false, false, false, 62), "html", null, true);
            echo "\" alt=\"Photo de profil de ";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "get_prenom", [], "any", false, false, false, 62) . " ") . twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "get_nom", [], "any", false, false, false, 62)), "html", null, true);
            echo "\">
                        </div>
                        <span class=\"user-block__username\"><a href=\"#\">";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "get_prenom", [], "any", false, false, false, 64), "html", null, true);
            echo "</a></span>
                        <a class=\"user-block__logout\" href=\"";
            // line 65
            echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
            echo "deconnexion\"><span class=\"material-icons\">logout</span></a>
                    </div>
                ";
        } else {
            // line 68
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
            echo "connexion\" class=\"button ";
            if ((isset($context["navbar_background"]) || array_key_exists("navbar_background", $context))) {
                echo "button-white";
            } else {
                echo "button-primary";
            }
            echo "\">Se connecter</a>
                ";
        }
        // line 70
        echo "            </div>
        </div>
    </div>
    <div class=\"site-content\">
        ";
        // line 74
        $this->displayBlock('content', $context, $blocks);
        // line 76
        echo "    </div>
    <script src=\"";
        // line 77
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/js/main.js\"></script>
</body>
</html>";
    }

    // line 74
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 75
        echo "        ";
    }

    public function getTemplateName()
    {
        return "template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 75,  219 => 74,  212 => 77,  209 => 76,  207 => 74,  201 => 70,  189 => 68,  183 => 65,  179 => 64,  170 => 62,  163 => 57,  159 => 55,  157 => 54,  152 => 52,  146 => 48,  142 => 46,  140 => 45,  135 => 42,  133 => 41,  126 => 37,  122 => 36,  108 => 33,  98 => 32,  92 => 29,  88 => 28,  83 => 26,  79 => 25,  72 => 21,  67 => 19,  62 => 17,  58 => 16,  46 => 7,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "template.html.twig", "C:\\wamp64\\www\\test\\App\\View\\template.html.twig");
    }
}

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

/* home\index.html.twig */
class __TwigTemplate_5ddee05a161da85e9d75b91df668b42fcbb9526f24d906a178dcaaedf5a35d77 extends Template
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
        $this->parent = $this->loadTemplate("template.html.twig", "home\\index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"home-container\">
        <div class=\"home-container__header\">
            <div class=\"home-header\">
                <h1>Ne soyez plus limités par la distance</h1>
                <p class=\"subtitle\">
                    Lorem ipsum dolor sit, amet consectetur 
                    adipisicing elit. Fugiat impedit accusantium debitis 
                    laudantium harum iure minus itaque, architecto, 
                    consectetur officia, ipsa hic! Illo ab fuga quidem 
                    quos sunt, provident ex!
                </p>
                <a href=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "plats/liste\" class=\"button button-secondary\">Liste des plats</a>
            </div>
            <div class=\"home-image\">
                <img src=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/img/bg-register.jpg\" />
            </div>
        </div>
        <div class=\"home-container__information\">
            <h2>Commandez ou proposez vos plats simplement</h2>
            <p class=\"subtitle\">
                Miams vous permet de commander ou de proposer des plats, de particulier
                à particulier pour ne plus être limités aux grandes villes.
            </p>
        </div>
        <div class=\"home-container__explanations\">
            <div class=\"explanation-block\">
                <div class=\"icon\"><span class=\"material-icons\">person</span></div>
                <div class=\"title\">Titre 1</div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing 
                    elit. Illum, nobis aut doloremque obcaecati nostrum 
                    voluptate architecto repudiandae cupiditate incidunt 
                    quae, minima eos eligendi minus tempora dignissimos 
                    suscipit aliquam ratione necessitatibus!
                </p>
            </div>
            <div class=\"explanation-block\">
                <div class=\"icon\"><span class=\"material-icons\">restaurant</span></div>
                <div class=\"title\">Titre 2</div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing 
                    elit. Illum, nobis aut doloremque obcaecati nostrum 
                    voluptate architecto repudiandae cupiditate incidunt 
                    quae, minima eos eligendi minus tempora dignissimos 
                    suscipit aliquam ratione necessitatibus!
                </p>
            </div>
            <div class=\"explanation-block\">
                <div class=\"icon\"><span class=\"material-icons\">euro</span></div>
                <div class=\"title\">Titre 3</div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing 
                    elit. Illum, nobis aut doloremque obcaecati nostrum 
                    voluptate architecto repudiandae cupiditate incidunt 
                    quae, minima eos eligendi minus tempora dignissimos 
                    suscipit aliquam ratione necessitatibus!
                </p>
            </div>
            <div class=\"explanation-block\">
                <div class=\"icon\"><span class=\"material-icons\">timer</span></div>
                <div class=\"title\">Titre 4</div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing 
                    elit. Illum, nobis aut doloremque obcaecati nostrum 
                    voluptate architecto repudiandae cupiditate incidunt 
                    quae, minima eos eligendi minus tempora dignissimos 
                    suscipit aliquam ratione necessitatibus!
                </p>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "home\\index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 18,  63 => 15,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home\\index.html.twig", "C:\\wamp64\\www\\test\\App\\View\\home\\index.html.twig");
    }
}

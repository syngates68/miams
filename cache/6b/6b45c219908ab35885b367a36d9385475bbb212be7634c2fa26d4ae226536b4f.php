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

/* messages\messages.html.twig */
class __TwigTemplate_477d5a6ea912b295fed982546d8aa62e5982be3828b7de07bf3b2c54e0a75106 extends Template
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
        $this->parent = $this->loadTemplate("template.html.twig", "messages\\messages.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"messages-container\">
    <div class=\"messages-container__top\">
        <div class=\"block-top\">
            <h1>Mes messages</h1>
        </div>
    </div>
    <div class=\"messages-container__body\">
        <div class=\"messages-list\">
            ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["messages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 13
            echo "                <div class=\"message-block ";
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["m"], "lu", [], "any", false, false, false, 13), 0)) {
                echo "not-read";
            }
            echo "\">
                    <div class=\"main-block\">
                        <div class=\"send-by\">";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "utilisateur_envoi", [], "any", false, false, false, 15), "html", null, true);
            echo "</div>
                        <div class=\"message-content\">";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "contenu", [], "any", false, false, false, 16), "html", null, true);
            echo "</div>
                    </div>
                    <div class=\"send-at\">";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "date_message", [], "any", false, false, false, 18), "html", null, true);
            echo "</div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "        </div>
        <div class=\"messages-discussion\">
            Coucou
        </div>
    </div>
</div>
<script src=\"";
        // line 27
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/js/messages.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "messages\\messages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 27,  90 => 21,  81 => 18,  76 => 16,  72 => 15,  64 => 13,  60 => 12,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "messages\\messages.html.twig", "C:\\wamp64\\www\\test\\App\\View\\messages\\messages.html.twig");
    }
}

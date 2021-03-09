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

/* plats\ajouter.html.twig */
class __TwigTemplate_ec2b981d01826c99806275807179564c5a8884780995d1a1fcd688cb8735f7f4 extends Template
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
        $this->parent = $this->loadTemplate("template.html.twig", "plats\\ajouter.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<div class=\"add-dish-container\">
    <div class=\"add-dish-container__top\">
        <div class=\"block-top\">
            <h1>Proposez votre plat</h1>
            <p class=\"subtitle\">Renseignez les champs ci-dessous<br/>pour proposer votre plat.</p>
        </div>
    </div>
    <div class=\"add-dish-container__body\">
        <div class=\"block-content\">
            <form method=\"POST\" action=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "plats/ajouter\" id=\"add-dish-form\" enctype=\"multipart/form-data\">
                ";
        // line 15
        if ((isset($context["error_add"]) || array_key_exists("error_add", $context))) {
            // line 16
            echo "                    <div class=\"alert alert-danger\">
                        <span class=\"material-icons\">error</span>
                        <span class=\"message\">";
            // line 18
            echo twig_escape_filter($this->env, ($context["error_add"] ?? null), "html", null, true);
            echo "</span>
                    </div>
                ";
        }
        // line 21
        echo "                <div class=\"step\">
                    <div class=\"step-title\">Informations sur le plat</div>
                    <div class=\"dish-informations\">
                        <div class=\"main-informations\">
                            <div class=\"input-form\">
                                <label for=\"nom_plat\">Nom de votre plat</label>
                                <input type=\"text\" name=\"nom_plat\" id=\"nom_plat\" ";
        // line 27
        if (twig_get_attribute($this->env, $this->source, ($context["_inputs"] ?? null), "_nom_plat", [], "array", true, true, false, 27)) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["_inputs"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["_nom_plat"] ?? null) : null), "html", null, true);
            echo "\"";
        }
        echo ">
                            </div>
                            <div class=\"input-form\">
                                <div class=\"input-radio\">
                                    <input type=\"radio\" name=\"type_plat\" id=\"type_plat_1\" value=\"1\" ";
        // line 31
        if ((twig_get_attribute($this->env, $this->source, ($context["_inputs"] ?? null), "_type_plat", [], "array", true, true, false, 31) && 0 === twig_compare((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["_inputs"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["_type_plat"] ?? null) : null), 1))) {
            echo "checked";
        }
        echo ">
                                    <label for=\"type_plat_1\" class=\"checkbox\">Entrée</label>
                                </div>
                                <div class=\"input-radio\">
                                    <input type=\"radio\" name=\"type_plat\" id=\"type_plat_2\" value=\"2\" ";
        // line 35
        if ((twig_get_attribute($this->env, $this->source, ($context["_inputs"] ?? null), "_type_plat", [], "array", true, true, false, 35) && 0 === twig_compare((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["_inputs"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["_type_plat"] ?? null) : null), 2))) {
            echo "checked";
        }
        echo ">
                                    <label for=\"type_plat_2\" class=\"checkbox\">Plat</label>
                                </div>
                                <div class=\"input-radio\">
                                    <input type=\"radio\" name=\"type_plat\" id=\"type_plat_3\" value=\"3\" ";
        // line 39
        if ((twig_get_attribute($this->env, $this->source, ($context["_inputs"] ?? null), "_type_plat", [], "array", true, true, false, 39) && 0 === twig_compare((($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["_inputs"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["_type_plat"] ?? null) : null), 3))) {
            echo "checked";
        }
        echo ">
                                    <label for=\"type_plat_3\" class=\"checkbox\">Dessert</label>
                                </div>
                            </div>
                        </div>
                        <div class=\"dish-picture\" id=\"dish-picture\">
                            <div class=\"block-add-picture\" onclick=\"\$('#photo-plat').click()\">
                                <div class=\"clickable\">
                                    <span class=\"material-icons\">panorama</span>
                                    <p>Cliquez ci-dessous ou glissez votre photo</p>
                                </div>
                            </div>
                            <input type=\"file\" name=\"photo_plat\" id=\"photo-plat\" style=\"display:none;\">
                        </div>
                    </div>
                </div>
                <div class=\"step\">
                    <div class=\"step-title\">Informations sur la vente</div>
                    <div class=\"row l6 s12\">
                        <div class=\"input-form\">
                            <label for=\"heure_debut\">heure de début</label>
                            <select name=\"heure_debut\" id=\"heure_debut\">
                                ";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, (twig_length_filter($this->env, ($context["heures"] ?? null)) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 62
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["heures"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4[$context["i"]] ?? null) : null), "html", null, true);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, ($context["_inputs"] ?? null), "_heure_debut", [], "array", true, true, false, 62) && 0 === twig_compare((($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = ($context["_inputs"] ?? null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666["_heure_debut"] ?? null) : null), (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = ($context["heures"] ?? null)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e[$context["i"]] ?? null) : null)))) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = ($context["heures"] ?? null)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52[$context["i"]] ?? null) : null), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "                            </select>
                        </div>
                        <div class=\"input-form\">
                            <label for=\"heure_fin\">Heure de fin</label>
                            <select name=\"heure_fin\" id=\"heure_fin\">
                                ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, (twig_length_filter($this->env, ($context["heures"] ?? null)) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 70
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, (($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = ($context["heures"] ?? null)) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136[$context["i"]] ?? null) : null), "html", null, true);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, ($context["_inputs"] ?? null), "_heure_fin", [], "array", true, true, false, 70) && 0 === twig_compare((($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = ($context["_inputs"] ?? null)) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386["_heure_fin"] ?? null) : null), (($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 = ($context["heures"] ?? null)) && is_array($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9) || $__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 instanceof ArrayAccess ? ($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9[$context["i"]] ?? null) : null)))) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, (($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae = ($context["heures"] ?? null)) && is_array($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae) || $__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae instanceof ArrayAccess ? ($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae[$context["i"]] ?? null) : null), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "                            </select>
                        </div>
                    </div>
                    <div class=\"row l6 s12\">
                        <div class=\"input-form\">
                            <label for=\"prix\">Prix</label>
                            <input type=\"text\" name=\"prix\" id=\"prix\" ";
        // line 78
        if (twig_get_attribute($this->env, $this->source, ($context["_inputs"] ?? null), "_prix", [], "array", true, true, false, 78)) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f = ($context["_inputs"] ?? null)) && is_array($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f) || $__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f instanceof ArrayAccess ? ($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f["_prix"] ?? null) : null), "html", null, true);
            echo "\"";
        }
        echo ">
                        </div>
                        <div class=\"input-form\">
                            <label for=\"quantite\">Quantité</label>
                            <input type=\"text\" name=\"quantite\" id=\"quantite\" ";
        // line 82
        if (twig_get_attribute($this->env, $this->source, ($context["_inputs"] ?? null), "_quantite", [], "array", true, true, false, 82)) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 = ($context["_inputs"] ?? null)) && is_array($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40) || $__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 instanceof ArrayAccess ? ($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40["_quantite"] ?? null) : null), "html", null, true);
            echo "\"";
        }
        echo ">
                        </div>
                    </div>
                </div>
                <div class=\"step\">
                    <div class=\"step-title\">Localisation</div>
                    <div class=\"input-form\">
                        <label for=\"adresse\">Adresse</label>
                        <input type=\"text\" name=\"adresse\" id=\"adresse\" ";
        // line 90
        if (twig_get_attribute($this->env, $this->source, ($context["_inputs"] ?? null), "_adresse", [], "array", true, true, false, 90)) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f = ($context["_inputs"] ?? null)) && is_array($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f) || $__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f instanceof ArrayAccess ? ($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f["_adresse"] ?? null) : null), "html", null, true);
            echo "\"";
        }
        echo ">
                    </div>
                    <div class=\"row l6 s12\">
                        <div class=\"input-form\">
                            <label for=\"code_postal\">Code Postal</label>
                            <input type=\"text\" name=\"code_postal\" id=\"code_postal\" value=\"68127\">
                        </div>
                        <div class=\"input-form\">
                            <label for=\"ville\">Ville</label>
                            <input type=\"text\" name=\"ville\" id=\"ville\" value=\"Niederhergheim\">
                        </div>
                    </div>
                </div>
                <div class=\"step\">
                    <div class=\"step-title\">Informations supplémentaires</div>
                    <div class=\"input-form\">
                        <textarea name=\"informations_supplementaires\" id=\"informations_supplementaires\">";
        // line 106
        if (twig_get_attribute($this->env, $this->source, ($context["_inputs"] ?? null), "_informations_supplementaires", [], "array", true, true, false, 106)) {
            echo (($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 = ($context["_inputs"] ?? null)) && is_array($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760) || $__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 instanceof ArrayAccess ? ($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760["_informations_supplementaires"] ?? null) : null);
        }
        echo "</textarea>
                    </div>
                </div>
                <button class=\"button button-primary\">Proposer votre plat</button>
            </form>
        </div>
    </div>
</div>
<script src=\"";
        // line 114
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/js/ajouter_plat.js\"></script>

";
    }

    public function getTemplateName()
    {
        return "plats\\ajouter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 114,  244 => 106,  221 => 90,  206 => 82,  195 => 78,  187 => 72,  172 => 70,  168 => 69,  161 => 64,  146 => 62,  142 => 61,  115 => 39,  106 => 35,  97 => 31,  86 => 27,  78 => 21,  72 => 18,  68 => 16,  66 => 15,  62 => 14,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "plats\\ajouter.html.twig", "C:\\wamp64\\www\\test\\App\\View\\plats\\ajouter.html.twig");
    }
}

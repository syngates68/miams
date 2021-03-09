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

/* plats\plat.html.twig */
class __TwigTemplate_af59ea947496246a5a9d91df1300f958d523d31ed8c2437bd316f04962b443b0 extends Template
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
        $this->parent = $this->loadTemplate("template.html.twig", "plats\\plat.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"dish-container\">
    <div class=\"dish-container__header\">
        <div class=\"block-top\">
            <div class=\"main-informations\">
                <h1 class=\"dish-name\">";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "nom_plat", [], "any", false, false, false, 8), "html", null, true);
        echo "</h1>
                <div class=\"published-by\">Proposé par ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "vendeur", [], "any", false, false, false, 9), "html", null, true);
        echo " le ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "date_publication", [], "any", false, false, false, 9), "d/m/Y"), "html", null, true);
        echo "</div>
            </div>
            <div class=\"buttons-block\">
                <button class=\"button button-white-outline reserver\">Réserver votre part</button>
                <button class=\"button button-secondary contacter\">Contacter vendeur</button>
            </div>
        </div>
        <div class=\"dish-image-block\">
            <img src=\"";
        // line 17
        echo twig_escape_filter($this->env, (($context["BASELINK"] ?? null) . twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "photo_plat", [], "any", false, false, false, 17)), "html", null, true);
        echo "\" alt=\"Photo du plat\">
        </div>
    </div>
    <div class=\"dish-container__body\">

        ";
        // line 23
        echo "        <div id=\"reserver\" style=\"display:none;\">
            <p style=\"font-size:16px;line-height:2em;color:#08133b;font-weight:600;\">
                Afin de finaliser votre réservation, veuillez remplir les
                champs ci-dessous.
                <br/> 
                Ces informations seront transmises au
                vendeur de ce plat.
            </p>
            <div class=\"form-container\">
                <div class=\"alert alert-danger\" id=\"alert_commande\" style=\"display:none;\">
                    <span class=\"material-icons\">error</span>
                    <span class=\"message\"></span>
                </div>
                <form id=\"form_reservation\" action=\"";
        // line 36
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "plats/valider_reservation\" method=\"POST\">
                    <input type=\"hidden\" name=\"id_plat\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "id_plat", [], "any", false, false, false, 37), "html", null, true);
        echo "\">
                    <input type=\"hidden\" name=\"prix\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "prix", [], "any", false, false, false, 38), "html", null, true);
        echo "\">
                    <div class=\"row l6 s12\">
                        <div class=\"input-form\">
                            <label for=\"quantite\">Quantité souhaitée</label>
                            <input type=\"text\" name=\"quantite\" id=\"quantite\">
                        </div>
                        <div class=\"input-form\">
                            <label for=\"heure\">Heure souhaitée de récupération</label>
                            <select name=\"heure\" id=\"heure\">
                                ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, (($context["nbr_heures"] ?? null) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["j"]) {
            // line 48
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["heures"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[$context["j"]] ?? null) : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["heures"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[$context["j"]] ?? null) : null), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['j'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "                            </select>
                        </div>
                    </div>
                    <p style=\"font-size:12px;line-height:2em;\">
                        Total : <span class=\"montant\">0</span>€
                    </p>
                    <p style=\"font-size:16px;line-height:2em;color:#08133b;font-weight:600;\">
                        L'heure souhaitée n'est indiquée qu'à titre informatif,
                        afin que le vendeur puisse s'organiser au mieux pour la
                        récupération des plats réservés.
                    </p>
                    <button class=\"button button-primary\" name=\"submit_reservation\">Valider la réservation</button>
                </form>
            </div>
        </div>

        ";
        // line 67
        echo "        <div id=\"contacter\" style=\"display:none;\">
            <p style=\"font-size:24px;color:#08133b;font-weight:600;padding:0;margin:0;\">Envoyer un message à ";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "vendeur", [], "any", false, false, false, 68), "html", null, true);
        echo "</p>
            <div class=\"alert alert-danger\" id=\"alert_message\" style=\"display:none;\">
                <span class=\"material-icons\">error</span>
                <span class=\"message\"></span>
            </div>
            <div class=\"alert alert-success\" id=\"success_message\" style=\"display:none;\">
                <span class=\"material-icons\">check</span>
                <span class=\"message\"></span>
            </div>
            <div class=\"form-container\">
                <form action=\"";
        // line 78
        echo twig_escape_filter($this->env, ($context["BASEURL"] ?? null), "html", null, true);
        echo "messages/envoi_message\" method=\"POST\" id=\"form_envoi_message\">
                    <div class=\"row\">
                        <div class=\"input-form\">
                            <div class=\"count\"><span id=\"chars\">0</span>/100</div>
                            <textarea name=\"message\" style=\"resize:none;min-height:300px;line-height:2em;\" placeholder=\"Bonjour, je souhaiterais avoir des informations complémentaires sur votre plat...\"></textarea>
                        </div>
                    </div>
                    <button class=\"button button-primary\" style=\"width:100%;\" name=\"submit_message\" type=\"submit\" disabled><span class=\"material-icons\">send</span><span class=\"button-text\">Envoyer</span></button>
                </form>
            </div>
        </div>

        <div class=\"block-content\">
            <a href=\"";
        // line 91
        echo twig_escape_filter($this->env, (($context["BASELINK"] ?? null) . twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "photo_plat", [], "any", false, false, false, 91)), "html", null, true);
        echo "\" class=\"see-picture\">Agrandir la photo</a>
            <div class=\"informations\">
                <p class=\"dish-container-title\">Informations :</p>
                <div class=\"dish-price\">";
        // line 94
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "prix", [], "any", false, false, false, 94), "html", null, true);
        echo "€<span class=\"unity\">/unité</span></div>
                <div class=\"dish-quantity\">Reste ";
        // line 95
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "quantite", [], "any", false, false, false, 95), "html", null, true);
        echo "</div>
                <div class=\"dish-hours\">Disponible de ";
        // line 96
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "heure_debut", [], "any", false, false, false, 96), "html", null, true);
        echo " à ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "heure_fin", [], "any", false, false, false, 96), "html", null, true);
        echo "</div>
                <div class=\"dish-address\">";
        // line 97
        echo twig_escape_filter($this->env, ((((twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "adresse", [], "any", false, false, false, 97) . " ") . twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "ville", [], "any", false, false, false, 97)) . " ") . twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "code_postal", [], "any", false, false, false, 97)), "html", null, true);
        echo "</div>
                <div class=\"dish-map\">
                    <img src=\"";
        // line 99
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/img/map.png\" alt=\"Adresse du vendeur\">
                </div>
            </div>
            <div class=\"more-informations\">
                <p class=\"dish-container-title\">Informations supplémentaires :</p>
                ";
        // line 104
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "informations_supplementaires", [], "any", false, false, false, 104), null)) {
            // line 105
            echo "                    <div class=\"more-informations__text\">
                        ";
            // line 106
            echo twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "informations_supplementaires", [], "any", false, false, false, 106);
            echo "
                    </div>
                ";
        } else {
            // line 109
            echo "                    <span>Aucune information supplémentaire</span>
                ";
        }
        // line 111
        echo "            </div>
            <div class=\"alert alert-info\">
                <span class=\"material-icons\">info</span>
                <span class=\"message\">
                    Si vous êtes victimes d'allergies ou d'intolérence à un aliment, 
                    n'hésitez pas à contacter le vendeur afin de savoir si le plat 
                    ne représente aucun danger pour votre santé.
                </span>
            </div>
            <div class=\"dish-seller\">
                <p class=\"dish-container-title\">Vendeur :</p>
                <div class=\"seller-block\">
                    <div class=\"seller-avatar\">
                        <img src=\"";
        // line 124
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "photo_vendeur", [], "any", false, false, false, 124), "html", null, true);
        echo "\" alt=\"Photo de ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "vendeur", [], "any", false, false, false, 124), "html", null, true);
        echo "\">
                    </div>
                    <div class=\"seller-informations\">
                        <p class=\"seller-name\">";
        // line 127
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plat"] ?? null), "vendeur", [], "any", false, false, false, 127), "html", null, true);
        echo "</p>
                        <p class=\"member-since\">Membre depuis le 01/01/2021</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src=\"";
        // line 135
        echo twig_escape_filter($this->env, ($context["BASELINK"] ?? null), "html", null, true);
        echo "assets/js/plats.js\"></script>
<script>
    //Envisager de les ouvrir avec AJAX pour recharger le contenu à chaque fois
    \$('.reserver').modaal({
        content_source: '#reserver',
        animation_speed : 100,
        width: 700
    });
    \$('.contacter').modaal({
        content_source: '#contacter',
        animation_speed : 100,
        width: 500
    });
    \$('.see-picture').modaal({
        type: 'image',
        animation_speed : 100
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "plats\\plat.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  265 => 135,  254 => 127,  244 => 124,  229 => 111,  225 => 109,  219 => 106,  216 => 105,  214 => 104,  206 => 99,  201 => 97,  195 => 96,  191 => 95,  187 => 94,  181 => 91,  165 => 78,  152 => 68,  149 => 67,  131 => 50,  120 => 48,  116 => 47,  104 => 38,  100 => 37,  96 => 36,  81 => 23,  73 => 17,  60 => 9,  56 => 8,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "plats\\plat.html.twig", "C:\\wamp64\\www\\test\\App\\View\\plats\\plat.html.twig");
    }
}

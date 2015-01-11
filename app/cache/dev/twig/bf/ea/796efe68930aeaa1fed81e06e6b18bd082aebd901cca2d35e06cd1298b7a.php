<?php

/* LoginLoginBundle:Sysparam:show.html.twig */
class __TwigTemplate_bfea796efe68930aeaa1fed81e06e6b18bd082aebd901cca2d35e06cd1298b7a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::masteradmin.html.twig");

        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
            'foundation' => array($this, 'block_foundation'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::masteradmin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_contenido($context, array $blocks = array())
    {
        // line 4
        echo "    <h2 class=\"titulo\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Detalle del parámetro"), "html", null, true);
        echo "</h2>
    <hr>
    ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 7
            echo "        <div class=\"error\">
            <table>
                <tr><td><img  src=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/warning.png"), "html", null, true);
            echo "\"/></td>
                    <td>";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage"))), "html", null, true);
            echo "</td>
                </tr>
            </table>
        </div><br>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    <table style=\"border:none;\">
        <tr>
            ";
        // line 17
        if (((isset($context["deleteaction"]) ? $context["deleteaction"] : $this->getContext($context, "deleteaction")) == "S")) {
            // line 18
            echo "                <td>
                    <a href=\"#\" data-reveal-id=\"myNormal\" class=\"button radius\">
                        <img  src=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/delete32.png"), "html", null, true);
            echo "\"/>
                        <span>";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Eliminar Parámetro"), "html", null, true);
            echo "</span>
                    </a>
                </td>
            ";
        }
        // line 25
        echo "            <td>
                <a href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("multiparamgrid", array("sysparamid" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" class=\"button radius\">
                    <img  src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/parameter32.png"), "html", null, true);
        echo "\"/>
                    <span>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Parametros multiples"), "html", null, true);
        echo "</span>
                </a>
            </td>
        </tr>
    </table>
    <table class=\"record_properties\">

        <tr>
            <td class=\"titulocampo\">";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("nombre"), "html", null, true);
        echo "</td>
            <td>";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <td class=\"titulocampo\">";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Valor"), "html", null, true);
        echo "</td>
            <td>";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "value"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <td class=\"titulocampo\">";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descripción"), "html", null, true);
        echo "</td>
            <td>";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "description"), "html", null, true);
        echo "</td>
        </tr>
    </table>

    <div class=\"reveal-modal small\" id=\"myNormal\" data-reveal >
        &iquest;";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delete.sysparam.question"), "html", null, true);
        echo "?
        <br><br>
        <table class=\"dialogo\">
            <tr>
                <td><a class=\"radius button\" href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("action_deletesysparam", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Aceptar"), "html", null, true);
        echo "</a></td>
                <td><a id =\"cancelar\" class=\"radius button\" href=\"#\">";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cancelar"), "html", null, true);
        echo "</a></td>
            </tr>
        </table>
        <a class=\"close-reveal-modal\"><img src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/dialog_close.png"), "html", null, true);
        echo "\"/></a>
    </div>
    <script>
        ";
        // line 61
        $this->displayBlock('foundation', $context, $blocks);
        // line 66
        echo "    </script>
    <a href=\"";
        // line 67
        echo $this->env->getExtension('routing')->getPath("sysparamgrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/back24.png"), "html", null, true);
        echo "\"/>
        <span>";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Parámetros del Sistema"), "html", null, true);
        echo "</span>
    </a>
";
    }

    // line 61
    public function block_foundation($context, array $blocks = array())
    {
        // line 62
        echo "        \$(\"#cancelar\").click(function (e) {
            \$('#myNormal').foundation('reveal', 'close');
        });
        ";
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Sysparam:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 62,  181 => 61,  174 => 69,  170 => 68,  166 => 67,  163 => 66,  161 => 61,  155 => 58,  149 => 55,  143 => 54,  136 => 50,  128 => 45,  124 => 44,  118 => 41,  114 => 40,  108 => 37,  104 => 36,  93 => 28,  89 => 27,  85 => 26,  82 => 25,  75 => 21,  71 => 20,  67 => 18,  65 => 17,  61 => 15,  50 => 10,  46 => 9,  42 => 7,  38 => 6,  32 => 4,  29 => 3,);
    }
}

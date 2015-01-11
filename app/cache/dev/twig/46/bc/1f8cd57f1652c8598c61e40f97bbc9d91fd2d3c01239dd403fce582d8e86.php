<?php

/* LoginLoginBundle:Role:show.html.twig */
class __TwigTemplate_46bc1f8cd57f1652c8598c61e40f97bbc9d91fd2d3c01239dd403fce582d8e86 extends Twig_Template
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
        echo "   <h2 class=\"titulo\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Detalle de Roles"), "html", null, true);
        echo "</h2>
   <hr>
   ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 7
            echo "    <div class=\"error\">
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
        echo "   <table style=\"border:none;\">
        <tr>
        <td> 
          <a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("rolelist");
        echo "\" class=\"button radius\">
              <img  src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/userrole.png"), "html", null, true);
        echo "\"/>
              <span>";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Lista de Roles"), "html", null, true);
        echo "</span>
          </a>   
        </td>
            ";
        // line 23
        if (((isset($context["addroleactios"]) ? $context["addroleactios"] : $this->getContext($context, "addroleactios")) == "S")) {
            // line 24
            echo "            <td>
            <a href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("roleactiongrid", array("roleid" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\" class=\"button radius\">
              <img  src=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/actions.png"), "html", null, true);
            echo "\"/>
              <span>";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Acciones"), "html", null, true);
            echo "</span>
             </a>
            </td>
            ";
        }
        // line 31
        echo "            ";
        if (((isset($context["deleteaction"]) ? $context["deleteaction"] : $this->getContext($context, "deleteaction")) == "S")) {
            // line 32
            echo "           <td>
           <a href=\"#\" data-reveal-id=\"myNormal\" class=\"button radius\">
              <img  src=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/delete32.png"), "html", null, true);
            echo "\"/>
              <span>";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Eliminar Rol"), "html", null, true);
            echo "</span>
           </a>
           </td>
           ";
        }
        // line 39
        echo "        </tr>    
    </table>
   <table class=\"record_properties\">
       
           
            <tr>
                <td class=\"titulocampo\">";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rol"), "html", null, true);
        echo "</td>
                <td>";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name"), "html", null, true);
        echo "</td>
            </tr>
            
                
       
    </table>
      
   <div class=\"reveal-modal small\" id=\"myNormal\" data-reveal >
      &iquest;";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delete.rol.question"), "html", null, true);
        echo "?
\t  <br><br>
\t  <table class=\"dialogo\">
\t  <tr>
\t  <td><a class=\"radius button\" href=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("role_deletemodal", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Aceptar"), "html", null, true);
        echo "</a></td>
\t  <td><a id =\"cancelar\" class=\"radius button\" href=\"#\">";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cancelar"), "html", null, true);
        echo "</a></td>
\t  </tr>
\t  </table>
      <a class=\"close-reveal-modal\"><img src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/dialog_close.png"), "html", null, true);
        echo "\"/></a>
  </div>
    <script>
     ";
        // line 65
        $this->displayBlock('foundation', $context, $blocks);
        // line 69
        echo " 
    </script>
";
    }

    // line 65
    public function block_foundation($context, array $blocks = array())
    {
        // line 66
        echo "   \$(\"#cancelar\").click(function (e) {
    \$('#myNormal').foundation('reveal', 'close');
});
";
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Role:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 66,  174 => 65,  168 => 69,  166 => 65,  160 => 62,  154 => 59,  148 => 58,  141 => 54,  130 => 46,  126 => 45,  118 => 39,  111 => 35,  107 => 34,  103 => 32,  100 => 31,  93 => 27,  89 => 26,  85 => 25,  82 => 24,  80 => 23,  74 => 20,  70 => 19,  66 => 18,  61 => 15,  50 => 10,  46 => 9,  42 => 7,  38 => 6,  32 => 4,  29 => 3,);
    }
}

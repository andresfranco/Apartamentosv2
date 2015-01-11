<?php

/* TwigBundle:Exception:error404.html.twig */
class __TwigTemplate_6f8fb6b4188e3988a3d6d95565e63313fdb533b48115997e1a695422d52332fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<!DOCTYPE html>
<html>
  <head>
        ";
        // line 5
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo "\t\t
    </head> 
    
    <body  bgcolor=\"silver\">
   
 
      <center><div class=\"panel\" data-equalizer-watch=\"\" style=\"height: 80%; width:100%;margin: auto;\">
              <img src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/404.png"), "html", null, true);
        echo "\"/><br><br>
              <p class=\"error404\">";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pagina no encontrada, por favor verifique"), "html", null, true);
        echo "</p><br><br><br>
              
              <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\" class=\"button radius\">
              <img  src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/home2.png"), "html", null, true);
        echo "\"/>
              <span>";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Volver a la aplicación"), "html", null, true);
        echo "</span>
          </a> 
    
     
     
       </div>
      </center>
    
    </body>
  
 
</html>";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "                
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bmatznerfoundation/css/foundation.css"), "html", null, true);
        echo "\" />
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/error404.css"), "html", null, true);
        echo "\" />
        ";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error404.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 8,  76 => 7,  73 => 6,  70 => 5,  54 => 22,  50 => 21,  46 => 20,  41 => 18,  37 => 17,  28 => 10,  26 => 5,  20 => 1,);
    }
}

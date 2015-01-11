<?php

/* LoginLoginBundle:Action:new.html.twig */
class __TwigTemplate_697db11dd54295e4b714c31710ebd758aa87a1a15528d8596f0b340e88e30ef6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::masteradmin.html.twig");

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'contenido' => array($this, 'block_contenido'),
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

    // line 2
    public function block_javascripts($context, array $blocks = array())
    {
        // line 3
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script type=\"text/javascript\" src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.validate.js"), "html", null, true);
        echo "\"></script>
";
        // line 5
        $this->env->loadTemplate("LoginLoginBundle:Action:validateaction.html.twig")->display($context);
    }

    // line 7
    public function block_contenido($context, array $blocks = array())
    {
        // line 8
        echo "    <h2 class=\"titulo\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nueva Acción"), "html", null, true);
        echo "</h2>
    <hr> 
";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
    ";
        // line 11
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "LoginLoginBundle:Form:form_errors.html.twig"));
        // line 12
        echo "    <div>
        ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "actionname"), 'label');
        echo "
        ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "actionname"), 'widget');
        echo "
        ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "actionname"), 'errors');
        echo "
    </div>
    <div>
        ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'label');
        echo "
        ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'widget');
        echo "
        ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'errors');
        echo "
    </div>

";
        // line 23
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
<div> 
<br>    
<a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("actiongrid");
        echo "\" class=\"button radius\">
<img  src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/back24.png"), "html", null, true);
        echo "\"/>
<span>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Acciones"), "html", null, true);
        echo "</span>
 </a>   
</div>  
";
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Action:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 28,  100 => 27,  96 => 26,  90 => 23,  84 => 20,  80 => 19,  76 => 18,  70 => 15,  66 => 14,  62 => 13,  59 => 12,  57 => 11,  53 => 10,  47 => 8,  44 => 7,  40 => 5,  36 => 4,  32 => 3,  29 => 2,);
    }
}

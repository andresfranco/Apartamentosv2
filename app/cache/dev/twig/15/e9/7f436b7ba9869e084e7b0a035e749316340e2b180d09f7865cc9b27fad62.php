<?php

/* LoginLoginBundle:Roleaction:new.html.twig */
class __TwigTemplate_15e97f436b7ba9869e084e7b0a035e749316340e2b180d09f7865cc9b27fad62 extends Twig_Template
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

    // line 3
    public function block_javascripts($context, array $blocks = array())
    {
        // line 4
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script type=\"text/javascript\" src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.validate.js"), "html", null, true);
        echo "\"></script>

";
        // line 7
        $this->env->loadTemplate("LoginLoginBundle:Roleaction:validateroleaction.html.twig")->display($context);
    }

    // line 9
    public function block_contenido($context, array $blocks = array())
    {
        // line 10
        echo "    <h2 class=\"titulo\">";
        echo "Nueva acción del rol";
        echo " / ";
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('routing')->getUrl("Rolenametwig", array("roleid" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "roleid"), "method"))), array());
        // line 11
        echo "    <hr> 
    ";
        // line 12
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
    ";
        // line 13
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "LoginLoginBundle:Form:form_errors.html.twig"));
        // line 14
        echo "    <div id=\"userdiv\">
        ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "roleid"), 'label');
        echo "
        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "roleid"), 'widget');
        echo "
        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "roleid"), 'errors');
        echo "
    </div>
    <div>
        ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "actionid"), 'label');
        echo "
        ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "actionid"), 'widget');
        echo "
        ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "actionid"), 'errors');
        echo "
    </div>
    
    <br>
    
    <div>";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "</div>
    
";
        // line 29
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
        <br><div> 
          <a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("roleactiongrid", array("roleid" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "roleid"), "method"))), "html", null, true);
        echo "\" class=\"button radius\">
              <img  src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/back24.png"), "html", null, true);
        echo "\"/>
              <span>";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Acciones del rol"), "html", null, true);
        echo "</span>
          </a>   
    </div> 
    
";
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Roleaction:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 33,  109 => 32,  105 => 31,  100 => 29,  95 => 27,  87 => 22,  83 => 21,  79 => 20,  73 => 17,  69 => 16,  65 => 15,  62 => 14,  60 => 13,  56 => 12,  53 => 11,  48 => 10,  45 => 9,  41 => 7,  36 => 5,  32 => 4,  29 => 3,);
    }
}

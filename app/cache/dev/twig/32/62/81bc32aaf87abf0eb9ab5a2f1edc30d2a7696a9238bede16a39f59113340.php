<?php

/* LoginLoginBundle:Sysparam:new.html.twig */
class __TwigTemplate_326281bc32aaf87abf0eb9ab5a2f1edc30d2a7696a9238bede16a39f59113340 extends Twig_Template
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
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script type=\"text/javascript\" src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.validate.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 5
        $this->env->loadTemplate("LoginLoginBundle:Sysparam:validatesysparam.html.twig")->display($context);
    }

    // line 7
    public function block_contenido($context, array $blocks = array())
    {
        // line 8
        echo "    <h2 class=\"titulo\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nuevo Parámetro del sistema"), "html", null, true);
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'label');
        echo "
        ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'widget');
        echo "
        ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'errors');
        echo "
    </div>
    <div>
        ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "value"), 'label');
        echo "
        ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "value"), 'widget');
        echo "
        ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "value"), 'errors');
        echo "
    </div>
    <div>
        ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'label');
        echo "
        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'widget');
        echo "
        ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'errors');
        echo "
    </div>

    ";
        // line 28
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
    <div>
        <br>
        <a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("sysparamgrid");
        echo "\" class=\"button radius\">
            <img  src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/back24.png"), "html", null, true);
        echo "\"/>
            <span>";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Parámetros del Sistema"), "html", null, true);
        echo "</span>
        </a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Sysparam:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 33,  115 => 32,  111 => 31,  105 => 28,  99 => 25,  95 => 24,  91 => 23,  85 => 20,  81 => 19,  77 => 18,  71 => 15,  67 => 14,  63 => 13,  60 => 12,  58 => 11,  54 => 10,  48 => 8,  45 => 7,  41 => 5,  37 => 4,  32 => 3,  29 => 2,);
    }
}

<?php

/* LoginLoginBundle:Multiparam:new.html.twig */
class __TwigTemplate_525f536edb9fc20f0e2534d3efbb3141a0a629d87ee27eb1bd422b9250f2e460 extends Twig_Template
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
        $this->env->loadTemplate("LoginLoginBundle:Multiparam:validatemultiparam.html.twig")->display($context);
    }

    // line 7
    public function block_contenido($context, array $blocks = array())
    {
        // line 8
        echo "    <h2 class=\"titulo\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nuevo Parámetro multiple"), "html", null, true);
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sysparamid"), 'label');
        echo "
        ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sysparamid"), 'widget');
        echo "
        ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sysparamid"), 'errors');
        echo "
    </div>

    <div>
        ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "value"), 'label');
        echo "
        ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "value"), 'widget');
        echo "
        ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "value"), 'errors');
        echo "
    </div>
    <div>
        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'label');
        echo "
        ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'widget');
        echo "
        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'errors');
        echo "
    </div>

    ";
        // line 29
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
    <div>
        <br>
        <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("multiparamgrid", array("sysparamid" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "sysparamid"), "method"))), "html", null, true);
        echo "\" class=\"button radius\">
            <img  src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/back24.png"), "html", null, true);
        echo "\"/>
            <span>";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Parámetros multiples"), "html", null, true);
        echo "</span>
        </a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Multiparam:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 34,  116 => 33,  112 => 32,  106 => 29,  100 => 26,  96 => 25,  92 => 24,  86 => 21,  82 => 20,  78 => 19,  71 => 15,  67 => 14,  63 => 13,  60 => 12,  58 => 11,  54 => 10,  48 => 8,  45 => 7,  41 => 5,  37 => 4,  32 => 3,  29 => 2,);
    }
}

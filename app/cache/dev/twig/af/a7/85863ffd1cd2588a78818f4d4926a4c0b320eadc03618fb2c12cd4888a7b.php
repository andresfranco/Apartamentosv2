<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_afa785863ffd1cd2588a78818f4d4926a4c0b320eadc03618fb2c12cd4888a7b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
            'title' => array($this, 'block_title'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('head', $context, $blocks);
        // line 4
        echo "


";
        // line 7
        $this->displayBlock('body', $context, $blocks);
        // line 19
        echo "
";
    }

    // line 1
    public function block_head($context, array $blocks = array())
    {
        // line 2
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/exception.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        if (((isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")) == 404)) {
            // line 9
            echo "    ";
            $this->env->loadTemplate("TwigBundle:Exception:error404.html.twig")->display($context);
            // line 10
            echo " 
 ";
        } else {
            // line 12
            echo "    ";
            $this->displayBlock('title', $context, $blocks);
            // line 15
            echo "    ";
            $this->env->loadTemplate("TwigBundle:Exception:exception.html.twig")->display($context);
        }
        // line 17
        echo "    
";
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  74 => 13,  71 => 12,  66 => 17,  62 => 15,  59 => 12,  55 => 10,  52 => 9,  49 => 8,  46 => 7,  39 => 2,  36 => 1,  31 => 19,  29 => 7,  24 => 4,  22 => 1,);
    }
}

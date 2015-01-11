<?php

/* TwigBundle:Exception:trace.txt.twig */
class __TwigTemplate_95b3937c39d85d2d09faed065fb6fa5ee20410cb9c71e307c06b5fb62b5007c5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "function")) {
            // line 2
            echo "    at ";
            echo (($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "class") . $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "type")) . $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "function"));
            echo "(";
            echo $this->env->getExtension('code')->formatArgsAsText($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "args"));
            echo ")
";
        } else {
            // line 4
            echo "    at n/a
";
        }
        // line 6
        if (($this->getAttribute((isset($context["trace"]) ? $context["trace"] : null), "file", array(), "any", true, true) && $this->getAttribute((isset($context["trace"]) ? $context["trace"] : null), "line", array(), "any", true, true))) {
            // line 7
            echo "        in ";
            echo $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "file");
            echo " line ";
            echo $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "line");
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:trace.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 14,  38 => 13,  35 => 7,  26 => 5,  80 => 19,  57 => 16,  51 => 15,  44 => 10,  25 => 3,  21 => 2,  101 => 24,  94 => 22,  89 => 20,  85 => 19,  79 => 18,  75 => 17,  72 => 16,  68 => 14,  64 => 12,  56 => 9,  41 => 9,  33 => 6,  27 => 4,  202 => 93,  200 => 92,  197 => 91,  188 => 85,  184 => 83,  174 => 75,  172 => 74,  169 => 73,  167 => 72,  164 => 71,  159 => 68,  157 => 67,  152 => 64,  143 => 60,  139 => 58,  137 => 57,  134 => 56,  124 => 48,  122 => 47,  118 => 45,  116 => 44,  113 => 43,  106 => 41,  102 => 40,  92 => 21,  87 => 20,  70 => 26,  67 => 25,  63 => 24,  50 => 8,  40 => 17,  32 => 12,  19 => 1,  74 => 13,  71 => 12,  66 => 15,  62 => 15,  59 => 12,  55 => 13,  52 => 21,  49 => 8,  46 => 7,  39 => 6,  36 => 7,  31 => 5,  29 => 4,  24 => 4,  22 => 2,);
    }
}

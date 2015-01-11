<?php

/* TwigBundle:Exception:logs.html.twig */
class __TwigTemplate_6839fdf1c3151098df0df7a9781516312f5d47f59aaf8ae464824a6ee7346edf extends Twig_Template
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
        echo "<ol class=\"traces logs\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : $this->getContext($context, "logs")));
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 3
            echo "        <li";
            if (($this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priority") >= 400)) {
                echo " class=\"error\"";
            } elseif (($this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priority") >= 300)) {
                echo " class=\"warning\"";
            }
            echo ">
            ";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priorityName"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "message"), "html", null, true);
            echo "
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "</ol>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:logs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 4,  26 => 3,  80 => 19,  57 => 14,  51 => 12,  44 => 10,  25 => 4,  21 => 2,  101 => 24,  94 => 22,  89 => 20,  85 => 19,  79 => 18,  75 => 17,  72 => 16,  68 => 14,  64 => 12,  56 => 9,  41 => 9,  33 => 5,  27 => 4,  202 => 93,  200 => 92,  197 => 91,  188 => 85,  184 => 83,  174 => 75,  172 => 74,  169 => 73,  167 => 72,  164 => 71,  159 => 68,  157 => 67,  152 => 64,  143 => 60,  139 => 58,  137 => 57,  134 => 56,  124 => 48,  122 => 47,  118 => 45,  116 => 44,  113 => 43,  106 => 41,  102 => 40,  92 => 21,  87 => 20,  70 => 26,  67 => 25,  63 => 24,  50 => 8,  40 => 17,  32 => 12,  19 => 1,  74 => 13,  71 => 12,  66 => 15,  62 => 15,  59 => 12,  55 => 13,  52 => 21,  49 => 8,  46 => 7,  39 => 6,  36 => 7,  31 => 5,  29 => 7,  24 => 3,  22 => 2,);
    }
}

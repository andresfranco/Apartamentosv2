<?php

/* topbar.html.twig */
class __TwigTemplate_b3c58f065e65c7c1b26a2cfca91c1c8350e9d8edaf238ec95157732a7b8daf52 extends Twig_Template
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
        echo " <nav class=\"top-bar\" data-topbar data-options=\"is_hover: false\">
            <ul class=\"title-area\">
                <li class=\"toggle-topbar menu-icon\"><a href=\"#\"><span></span></a></li>
                <li class=\"name\">
                    <h1><img src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logoapp.png"), "html", null, true);
        echo "\"/><span class=\"titleproduct\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("CONDO HANDLER"), "html", null, true);
        echo "</span></h1>
                </li>
            </ul>
         <section class=\"top-bar-section\">
            <ul class=\"right\">
                <li ><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method"), twig_array_merge($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route_params"), "method"), array("_locale" => "en"))), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/english.png"), "html", null, true);
        echo "\"/></a></li>
                <li ><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method"), twig_array_merge($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route_params"), "method"), array("_locale" => "es"))), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/spanish.png"), "html", null, true);
        echo "\"/></a></li>
                <li>
                    <a href=\"#\"><img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/usernav.png"), "html", null, true);
        echo "\"/><b>";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username")), "html", null, true);
        echo "</b></a>
                </li>  
                <li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logout.png"), "html", null, true);
        echo "\"/><b>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("SALIR"), "html", null, true);
        echo "</b></a></li>
            </ul>
          <ul class=\"left\">
              <li><a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("iniciologin");
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/homepage.png"), "html", null, true);
        echo "\"/><b>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("INICIO"), "html", null, true);
        echo "</b></a></li>
\t
\t</ul>
       </section>
</nav>
";
    }

    public function getTemplateName()
    {
        return "topbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 15,  41 => 11,  25 => 5,  19 => 1,  173 => 43,  166 => 41,  162 => 39,  159 => 38,  156 => 37,  152 => 29,  145 => 30,  143 => 28,  139 => 26,  127 => 41,  121 => 37,  113 => 31,  111 => 25,  101 => 18,  98 => 17,  95 => 16,  91 => 15,  88 => 14,  82 => 10,  77 => 9,  74 => 8,  67 => 6,  64 => 5,  58 => 4,  53 => 47,  51 => 16,  46 => 14,  42 => 12,  39 => 8,  37 => 5,  33 => 4,  363 => 122,  356 => 119,  352 => 118,  348 => 117,  343 => 115,  339 => 114,  335 => 113,  330 => 111,  326 => 110,  322 => 109,  316 => 106,  312 => 105,  308 => 104,  304 => 103,  300 => 102,  292 => 97,  288 => 96,  284 => 95,  279 => 93,  275 => 92,  271 => 91,  266 => 89,  262 => 88,  258 => 87,  252 => 84,  248 => 83,  244 => 82,  238 => 79,  230 => 73,  223 => 69,  219 => 68,  215 => 67,  210 => 65,  206 => 64,  202 => 63,  197 => 61,  193 => 60,  189 => 59,  184 => 57,  180 => 56,  176 => 55,  171 => 42,  167 => 52,  163 => 51,  157 => 48,  153 => 47,  149 => 28,  144 => 44,  140 => 43,  136 => 25,  132 => 41,  129 => 43,  123 => 39,  119 => 36,  115 => 35,  110 => 33,  106 => 32,  102 => 31,  97 => 29,  93 => 28,  89 => 27,  83 => 24,  79 => 23,  75 => 22,  69 => 19,  65 => 18,  61 => 17,  56 => 15,  52 => 14,  48 => 13,  44 => 12,  35 => 10,  31 => 4,  28 => 1,);
    }
}

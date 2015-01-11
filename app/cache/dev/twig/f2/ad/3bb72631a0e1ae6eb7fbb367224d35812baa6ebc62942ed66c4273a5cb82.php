<?php

/* topbar.html.twig */
class __TwigTemplate_f2ad3bb72631a0e1ae6eb7fbb367224d35812baa6ebc62942ed66c4273a5cb82 extends Twig_Template
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
        return array (  55 => 15,  41 => 11,  25 => 5,  19 => 1,  173 => 43,  171 => 42,  166 => 41,  162 => 39,  159 => 38,  156 => 37,  152 => 29,  149 => 28,  145 => 30,  143 => 28,  139 => 26,  136 => 25,  127 => 41,  121 => 37,  113 => 31,  111 => 25,  101 => 18,  98 => 17,  95 => 16,  91 => 15,  88 => 14,  82 => 10,  77 => 9,  74 => 8,  67 => 6,  64 => 5,  58 => 4,  53 => 47,  51 => 16,  46 => 14,  42 => 12,  39 => 8,  37 => 5,  33 => 4,  386 => 131,  380 => 128,  376 => 127,  372 => 126,  367 => 124,  363 => 123,  359 => 122,  354 => 120,  350 => 119,  346 => 118,  341 => 116,  337 => 115,  333 => 114,  327 => 111,  323 => 110,  319 => 109,  315 => 108,  312 => 107,  310 => 106,  302 => 101,  298 => 100,  294 => 99,  289 => 97,  285 => 96,  281 => 95,  276 => 93,  272 => 92,  268 => 91,  263 => 89,  259 => 88,  255 => 87,  249 => 84,  245 => 83,  241 => 82,  235 => 79,  228 => 74,  221 => 69,  217 => 68,  213 => 67,  208 => 65,  204 => 64,  200 => 63,  195 => 61,  191 => 60,  187 => 59,  182 => 57,  178 => 56,  174 => 55,  169 => 53,  165 => 52,  161 => 51,  155 => 48,  151 => 47,  147 => 46,  142 => 44,  138 => 43,  134 => 42,  129 => 43,  123 => 39,  119 => 36,  115 => 35,  110 => 33,  106 => 32,  102 => 31,  97 => 29,  93 => 28,  89 => 27,  83 => 24,  79 => 23,  75 => 22,  69 => 19,  65 => 18,  61 => 17,  56 => 15,  52 => 14,  48 => 13,  44 => 12,  35 => 10,  31 => 4,  28 => 1,);
    }
}

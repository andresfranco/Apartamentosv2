<?php

/* ::masteradmin.html.twig */
class __TwigTemplate_82098b6a689f187d19d17d201ef471e11f6452b90f97890dac2cf9e94e741687 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'javascript_footer' => array($this, 'block_javascript_footer'),
            'body' => array($this, 'block_body'),
            'contenido' => array($this, 'block_contenido'),
            'grid' => array($this, 'block_grid'),
            'footer' => array($this, 'block_footer'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
       <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 5
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 8
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </head>
    <body>
     ";
        // line 14
        $this->displayBlock('javascript_footer', $context, $blocks);
        // line 15
        echo "    
   ";
        // line 16
        $this->displayBlock('body', $context, $blocks);
        // line 47
        echo "</html>  
   ";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Administrar Apartamentos"), "html", null, true);
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/masterfoundation.css"), "html", null, true);
        echo "\" />
\t";
    }

    // line 8
    public function block_javascripts($context, array $blocks = array())
    {
        // line 9
        echo "\t\t<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
                <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("foundation/js/foundation.min.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    // line 14
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 15
        echo "                 ";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "        <!-- TOP NAV BAR -->
        ";
        // line 18
        $this->env->loadTemplate("topbar.html.twig")->display($context);
        echo " 
       <!-- Main Content Section -->
      <div id=\"contenido\" style=\"height:100%;\">    
         <div  class=\"large-12 columns\" >
\t       
\t   <div  class=\"large-11 columns\">
\t    <!-- Content--> 
           ";
        // line 25
        $this->displayBlock('contenido', $context, $blocks);
        // line 31
        echo "\t  </div>
       </div>
  </div>
  
    <!-- Footer --> 
  <div class=\"large-12 columns\" style=\"background-color: black;color:white;\">
    ";
        // line 37
        $this->displayBlock('footer', $context, $blocks);
        // line 39
        echo "\t
      </div>
  ";
        // line 41
        $this->displayBlock('script', $context, $blocks);
        // line 43
        echo " 
 </body>
 
";
    }

    // line 25
    public function block_contenido($context, array $blocks = array())
    {
        // line 26
        echo "                   
                    <!-- Grids-->
                   ";
        // line 28
        $this->displayBlock('grid', $context, $blocks);
        // line 30
        echo "\t  ";
    }

    // line 28
    public function block_grid($context, array $blocks = array())
    {
        // line 29
        echo "                    ";
    }

    // line 37
    public function block_footer($context, array $blocks = array())
    {
        // line 38
        echo "         ";
        $this->env->loadTemplate("footer.html.twig")->display($context);
        // line 39
        echo "\t";
    }

    // line 41
    public function block_script($context, array $blocks = array())
    {
        echo "   
   ";
        // line 42
        $this->env->loadTemplate("foundationscript.html.twig")->display($context);
        // line 43
        echo "  ";
    }

    public function getTemplateName()
    {
        return "::masteradmin.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  173 => 43,  171 => 42,  166 => 41,  162 => 39,  159 => 38,  156 => 37,  152 => 29,  149 => 28,  145 => 30,  143 => 28,  139 => 26,  136 => 25,  127 => 41,  121 => 37,  113 => 31,  111 => 25,  101 => 18,  98 => 17,  95 => 16,  91 => 15,  88 => 14,  82 => 10,  77 => 9,  74 => 8,  67 => 6,  64 => 5,  58 => 4,  53 => 47,  51 => 16,  46 => 14,  42 => 12,  39 => 8,  37 => 5,  33 => 4,  386 => 131,  380 => 128,  376 => 127,  372 => 126,  367 => 124,  363 => 123,  359 => 122,  354 => 120,  350 => 119,  346 => 118,  341 => 116,  337 => 115,  333 => 114,  327 => 111,  323 => 110,  319 => 109,  315 => 108,  312 => 107,  310 => 106,  302 => 101,  298 => 100,  294 => 99,  289 => 97,  285 => 96,  281 => 95,  276 => 93,  272 => 92,  268 => 91,  263 => 89,  259 => 88,  255 => 87,  249 => 84,  245 => 83,  241 => 82,  235 => 79,  228 => 74,  221 => 69,  217 => 68,  213 => 67,  208 => 65,  204 => 64,  200 => 63,  195 => 61,  191 => 60,  187 => 59,  182 => 57,  178 => 56,  174 => 55,  169 => 53,  165 => 52,  161 => 51,  155 => 48,  151 => 47,  147 => 46,  142 => 44,  138 => 43,  134 => 42,  129 => 43,  123 => 39,  119 => 36,  115 => 35,  110 => 33,  106 => 32,  102 => 31,  97 => 29,  93 => 28,  89 => 27,  83 => 24,  79 => 23,  75 => 22,  69 => 19,  65 => 18,  61 => 17,  56 => 15,  52 => 14,  48 => 15,  44 => 12,  35 => 6,  31 => 4,  28 => 1,);
    }
}

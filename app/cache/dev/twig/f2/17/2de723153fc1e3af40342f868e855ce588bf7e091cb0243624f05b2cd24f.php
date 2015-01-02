<?php

/* ::masteradmin.html.twig */
class __TwigTemplate_f2172de723153fc1e3af40342f868e855ce588bf7e091cb0243624f05b2cd24f extends Twig_Template
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
        return array (  173 => 43,  166 => 41,  162 => 39,  159 => 38,  156 => 37,  152 => 29,  145 => 30,  143 => 28,  139 => 26,  127 => 41,  121 => 37,  113 => 31,  111 => 25,  101 => 18,  98 => 17,  95 => 16,  91 => 15,  88 => 14,  82 => 10,  77 => 9,  74 => 8,  67 => 6,  64 => 5,  58 => 4,  53 => 47,  51 => 16,  46 => 14,  42 => 12,  39 => 8,  37 => 5,  33 => 4,  363 => 122,  356 => 119,  352 => 118,  348 => 117,  343 => 115,  339 => 114,  335 => 113,  330 => 111,  326 => 110,  322 => 109,  316 => 106,  312 => 105,  308 => 104,  304 => 103,  300 => 102,  292 => 97,  288 => 96,  284 => 95,  279 => 93,  275 => 92,  271 => 91,  266 => 89,  262 => 88,  258 => 87,  252 => 84,  248 => 83,  244 => 82,  238 => 79,  230 => 73,  223 => 69,  219 => 68,  215 => 67,  210 => 65,  206 => 64,  202 => 63,  197 => 61,  193 => 60,  189 => 59,  184 => 57,  180 => 56,  176 => 55,  171 => 42,  167 => 52,  163 => 51,  157 => 48,  153 => 47,  149 => 28,  144 => 44,  140 => 43,  136 => 25,  132 => 41,  129 => 43,  123 => 39,  119 => 36,  115 => 35,  110 => 33,  106 => 32,  102 => 31,  97 => 29,  93 => 28,  89 => 27,  83 => 24,  79 => 23,  75 => 22,  69 => 19,  65 => 18,  61 => 17,  56 => 15,  52 => 14,  48 => 15,  44 => 12,  35 => 6,  31 => 4,  28 => 1,);
    }
}

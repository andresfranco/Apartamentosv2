<?php

/* LexikTranslationBundle::layout.html.twig */
class __TwigTemplate_0eb9eb2ae99bf206818fbe74ca3a83c653fe54f3655e1aa5679c0f2fc38b1434 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::masteradmin.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'contenido' => array($this, 'block_contenido'),
            'javascript_footer' => array($this, 'block_javascript_footer'),
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
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "            ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
           <link rel=\"stylesheet\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/jquery-ui-translate.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
         ";
    }

    // line 6
    public function block_javascripts($context, array $blocks = array())
    {
        // line 7
        echo "           ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
        ";
    }

    // line 10
    public function block_contenido($context, array $blocks = array())
    {
        // line 11
        echo "    
        ";
    }

    // line 14
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 15
        echo "            
            <script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/jquery-ui-translate.css"), "html", null, true);
        echo "\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "LexikTranslationBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 16,  66 => 15,  63 => 14,  58 => 11,  55 => 10,  48 => 7,  45 => 6,  34 => 3,  31 => 2,  658 => 146,  643 => 144,  639 => 143,  635 => 142,  628 => 139,  618 => 136,  610 => 133,  600 => 130,  594 => 127,  590 => 126,  585 => 123,  579 => 121,  576 => 120,  573 => 119,  568 => 112,  559 => 110,  545 => 108,  542 => 107,  528 => 106,  506 => 104,  503 => 103,  486 => 102,  471 => 101,  468 => 100,  465 => 99,  446 => 98,  443 => 97,  437 => 92,  423 => 91,  419 => 89,  416 => 88,  413 => 87,  407 => 85,  404 => 84,  392 => 82,  380 => 80,  378 => 79,  366 => 77,  363 => 76,  360 => 75,  357 => 74,  354 => 73,  351 => 72,  345 => 70,  342 => 69,  340 => 68,  320 => 67,  317 => 66,  300 => 65,  296 => 63,  293 => 62,  289 => 45,  279 => 38,  276 => 37,  261 => 35,  251 => 33,  248 => 32,  246 => 31,  243 => 30,  226 => 29,  218 => 26,  215 => 25,  212 => 24,  209 => 23,  203 => 167,  197 => 165,  193 => 163,  187 => 161,  185 => 160,  182 => 159,  176 => 157,  173 => 156,  167 => 154,  164 => 153,  161 => 152,  158 => 119,  156 => 118,  150 => 114,  148 => 97,  144 => 95,  142 => 62,  137 => 59,  131 => 57,  129 => 56,  122 => 54,  118 => 52,  116 => 51,  108 => 48,  102 => 47,  99 => 46,  97 => 23,  94 => 22,  91 => 21,  86 => 170,  84 => 21,  77 => 17,  73 => 16,  70 => 15,  67 => 14,  51 => 10,  47 => 8,  42 => 7,  39 => 4,  33 => 4,);
    }
}

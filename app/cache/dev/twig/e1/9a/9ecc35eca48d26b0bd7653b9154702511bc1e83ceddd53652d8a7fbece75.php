<?php

/* LexikTranslationBundle::layout.html.twig */
class __TwigTemplate_e19a9ecc35eca48d26b0bd7653b9154702511bc1e83ceddd53652d8a7fbece75 extends Twig_Template
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
        return array (  69 => 16,  66 => 15,  63 => 14,  58 => 11,  55 => 10,  48 => 7,  45 => 6,  34 => 3,  31 => 2,  663 => 148,  648 => 146,  644 => 145,  640 => 144,  633 => 141,  623 => 138,  615 => 135,  605 => 132,  599 => 129,  595 => 128,  590 => 125,  584 => 123,  581 => 122,  578 => 121,  573 => 114,  564 => 112,  550 => 110,  547 => 109,  533 => 108,  511 => 106,  508 => 105,  491 => 104,  476 => 103,  473 => 102,  470 => 101,  451 => 100,  448 => 99,  442 => 94,  428 => 93,  424 => 91,  421 => 90,  418 => 89,  412 => 87,  409 => 86,  397 => 84,  385 => 82,  383 => 81,  371 => 79,  368 => 78,  365 => 77,  362 => 76,  359 => 75,  356 => 74,  350 => 72,  347 => 71,  345 => 70,  325 => 69,  322 => 68,  305 => 67,  301 => 65,  298 => 64,  294 => 45,  284 => 38,  281 => 37,  266 => 35,  256 => 33,  253 => 32,  251 => 31,  248 => 30,  231 => 29,  223 => 26,  220 => 25,  217 => 24,  214 => 23,  208 => 169,  202 => 167,  198 => 165,  192 => 163,  190 => 162,  187 => 161,  181 => 159,  178 => 158,  172 => 156,  169 => 155,  166 => 154,  163 => 121,  161 => 120,  155 => 116,  153 => 99,  149 => 97,  147 => 64,  142 => 61,  136 => 59,  134 => 58,  127 => 56,  123 => 54,  121 => 53,  112 => 50,  104 => 48,  102 => 47,  99 => 46,  97 => 23,  94 => 22,  91 => 21,  86 => 172,  84 => 21,  77 => 17,  73 => 16,  70 => 15,  67 => 14,  51 => 10,  47 => 8,  42 => 7,  39 => 4,  33 => 4,);
    }
}

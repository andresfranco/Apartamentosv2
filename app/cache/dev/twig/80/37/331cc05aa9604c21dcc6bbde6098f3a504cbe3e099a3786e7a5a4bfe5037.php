<?php

/* foundationscript.html.twig */
class __TwigTemplate_8037331cc05aa9604c21dcc6bbde6098f3a504cbe3e099a3786e7a5a4bfe5037 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'foundation' => array($this, 'block_foundation'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>
      \$(document).foundation();
      ";
        // line 3
        $this->displayBlock('foundation', $context, $blocks);
        // line 4
        echo "  
  </script>
";
    }

    // line 3
    public function block_foundation($context, array $blocks = array())
    {
        // line 4
        echo "      ";
    }

    public function getTemplateName()
    {
        return "foundationscript.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  32 => 3,  26 => 4,  24 => 3,  20 => 1,  23 => 3,  55 => 15,  41 => 11,  25 => 5,  19 => 1,  173 => 43,  166 => 41,  162 => 39,  159 => 38,  156 => 37,  152 => 29,  145 => 30,  143 => 28,  139 => 26,  127 => 41,  121 => 37,  113 => 31,  111 => 25,  101 => 18,  98 => 17,  95 => 16,  91 => 15,  88 => 14,  82 => 10,  77 => 9,  74 => 8,  67 => 6,  64 => 5,  58 => 4,  53 => 47,  51 => 16,  46 => 14,  42 => 12,  39 => 8,  37 => 5,  33 => 4,  363 => 122,  356 => 119,  352 => 118,  348 => 117,  343 => 115,  339 => 114,  335 => 113,  330 => 111,  326 => 110,  322 => 109,  316 => 106,  312 => 105,  308 => 104,  304 => 103,  300 => 102,  292 => 97,  288 => 96,  284 => 95,  279 => 93,  275 => 92,  271 => 91,  266 => 89,  262 => 88,  258 => 87,  252 => 84,  248 => 83,  244 => 82,  238 => 79,  230 => 73,  223 => 69,  219 => 68,  215 => 67,  210 => 65,  206 => 64,  202 => 63,  197 => 61,  193 => 60,  189 => 59,  184 => 57,  180 => 56,  176 => 55,  171 => 42,  167 => 52,  163 => 51,  157 => 48,  153 => 47,  149 => 28,  144 => 44,  140 => 43,  136 => 25,  132 => 41,  129 => 43,  123 => 39,  119 => 36,  115 => 35,  110 => 33,  106 => 32,  102 => 31,  97 => 29,  93 => 28,  89 => 27,  83 => 24,  79 => 23,  75 => 22,  69 => 19,  65 => 18,  61 => 17,  56 => 15,  52 => 14,  48 => 13,  44 => 12,  35 => 4,  31 => 4,  28 => 1,);
    }
}

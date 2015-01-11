<?php

/* foundationscript.html.twig */
class __TwigTemplate_f0f8aa1e8e2eb0ca52564ff8b2a6d53b1cecf9c4d255d9cddda1bb66771707ea extends Twig_Template
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
        return array (  32 => 3,  26 => 4,  24 => 3,  20 => 1,  23 => 3,  55 => 15,  41 => 11,  25 => 5,  19 => 1,  173 => 43,  171 => 42,  166 => 41,  162 => 39,  159 => 38,  156 => 37,  152 => 29,  149 => 28,  145 => 30,  143 => 28,  139 => 26,  136 => 25,  127 => 41,  121 => 37,  113 => 31,  111 => 25,  101 => 18,  98 => 17,  95 => 16,  91 => 15,  88 => 14,  82 => 10,  77 => 9,  74 => 8,  67 => 6,  64 => 5,  58 => 4,  53 => 47,  51 => 16,  46 => 14,  42 => 12,  39 => 8,  37 => 5,  33 => 4,  386 => 131,  380 => 128,  376 => 127,  372 => 126,  367 => 124,  363 => 123,  359 => 122,  354 => 120,  350 => 119,  346 => 118,  341 => 116,  337 => 115,  333 => 114,  327 => 111,  323 => 110,  319 => 109,  315 => 108,  312 => 107,  310 => 106,  302 => 101,  298 => 100,  294 => 99,  289 => 97,  285 => 96,  281 => 95,  276 => 93,  272 => 92,  268 => 91,  263 => 89,  259 => 88,  255 => 87,  249 => 84,  245 => 83,  241 => 82,  235 => 79,  228 => 74,  221 => 69,  217 => 68,  213 => 67,  208 => 65,  204 => 64,  200 => 63,  195 => 61,  191 => 60,  187 => 59,  182 => 57,  178 => 56,  174 => 55,  169 => 53,  165 => 52,  161 => 51,  155 => 48,  151 => 47,  147 => 46,  142 => 44,  138 => 43,  134 => 42,  129 => 43,  123 => 39,  119 => 36,  115 => 35,  110 => 33,  106 => 32,  102 => 31,  97 => 29,  93 => 28,  89 => 27,  83 => 24,  79 => 23,  75 => 22,  69 => 19,  65 => 18,  61 => 17,  56 => 15,  52 => 14,  48 => 13,  44 => 12,  35 => 4,  31 => 4,  28 => 1,);
    }
}

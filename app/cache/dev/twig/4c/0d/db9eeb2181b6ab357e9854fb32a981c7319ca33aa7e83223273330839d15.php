<?php

/* A2lixTranslationFormBundle::default.html.twig */
class __TwigTemplate_4c0ddb9eeb2181b6ab357e9854fb32a981c7319ca33aa7e83223273330839d15 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'a2lix_translations_widget' => array($this, 'block_a2lix_translations_widget'),
            'a2lix_translationsForms_widget' => array($this, 'block_a2lix_translationsForms_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('a2lix_translations_widget', $context, $blocks);
        // line 30
        echo "
";
        // line 31
        $this->displayBlock('a2lix_translationsForms_widget', $context, $blocks);
    }

    // line 1
    public function block_a2lix_translations_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
    <div class=\"a2lix_translations tabbable\">
        <ul class=\"a2lix_translationsLocales nav nav-tabs\">
        ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
            // line 6
            echo "            ";
            $context["locale"] = $this->getAttribute($this->getAttribute((isset($context["translationsFields"]) ? $context["translationsFields"] : $this->getContext($context, "translationsFields")), "vars"), "name");
            // line 7
            echo "
            <li ";
            // line 8
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "locale") == (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")))) {
                echo "class=\"active\"";
            }
            echo ">
                <a href=\"#\" data-toggle=\"tab\" data-target=\".a2lix_translationsFields-";
            // line 9
            echo twig_escape_filter($this->env, (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), "html", null, true);
            echo "\">
                    ";
            // line 10
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))), "html", null, true);
            echo "
                    ";
            // line 11
            if (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "default_locale") == (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")))) {
                echo "[Default]";
            }
            // line 12
            echo "                    ";
            if ($this->getAttribute($this->getAttribute((isset($context["translationsFields"]) ? $context["translationsFields"] : $this->getContext($context, "translationsFields")), "vars"), "required")) {
                echo "*";
            }
            // line 13
            echo "                </a>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "        </ul>

        <div class=\"a2lix_translationsFields tab-content\">
        ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
            // line 20
            echo "            ";
            $context["locale"] = $this->getAttribute($this->getAttribute((isset($context["translationsFields"]) ? $context["translationsFields"] : $this->getContext($context, "translationsFields")), "vars"), "name");
            // line 21
            echo "
            <div class=\"a2lix_translationsFields-";
            // line 22
            echo twig_escape_filter($this->env, (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), "html", null, true);
            echo " tab-pane ";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "locale") == (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")))) {
                echo "active";
            }
            echo "\">
                ";
            // line 23
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["translationsFields"]) ? $context["translationsFields"] : $this->getContext($context, "translationsFields")), 'errors');
            echo "
                ";
            // line 24
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["translationsFields"]) ? $context["translationsFields"] : $this->getContext($context, "translationsFields")), 'widget');
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "        </div>
    </div>
";
    }

    // line 31
    public function block_a2lix_translationsForms_widget($context, array $blocks = array())
    {
        // line 32
        echo "    ";
        $this->displayBlock("a2lix_translations_widget", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "A2lixTranslationFormBundle::default.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  126 => 32,  123 => 31,  117 => 27,  108 => 24,  104 => 23,  96 => 22,  93 => 21,  90 => 20,  86 => 19,  73 => 13,  68 => 12,  64 => 11,  56 => 9,  50 => 8,  47 => 7,  44 => 6,  40 => 5,  33 => 2,  30 => 1,  26 => 31,  23 => 30,  21 => 1,  35 => 9,  31 => 8,  27 => 7,  19 => 1,  133 => 38,  129 => 37,  125 => 36,  119 => 33,  113 => 30,  109 => 29,  105 => 28,  99 => 25,  95 => 24,  91 => 23,  85 => 20,  81 => 16,  77 => 18,  71 => 15,  67 => 14,  63 => 13,  60 => 10,  58 => 11,  54 => 10,  48 => 8,  45 => 7,  41 => 5,  37 => 4,  32 => 3,  29 => 2,);
    }
}

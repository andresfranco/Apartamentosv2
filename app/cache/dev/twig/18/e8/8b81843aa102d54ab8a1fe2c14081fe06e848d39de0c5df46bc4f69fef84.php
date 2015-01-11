<?php

/* LoginLoginBundle:Sysparam:validatesysparam.html.twig */
class __TwigTemplate_18e88b81843aa102d54ab8a1fe2c14081fe06e848d39de0c5df46bc4f69fef84 extends Twig_Template
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
        echo "<script type=\"text/javascript\">
    \$(function() {
        \$(\"#form\").validate({
            rules: {\"login_loginbundle_sysparam[name]\":{required:true},
                    \"login_loginbundle_sysparam[value]\":{required:true}},
            messages:{\"login_loginbundle_sysparam[name]\":{required:\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("sysparam.name.validate"), "html", null, true);
        echo "\"},
                      \"login_loginbundle_sysparam[value]\":{required:\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("sysparam.value.validate"), "html", null, true);
        echo "\"}},

            submitHandler: function(form) {
                form.submit();
            }
        });

    });
</script>";
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Sysparam:validatesysparam.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 7,  26 => 6,  19 => 1,  119 => 33,  115 => 32,  111 => 31,  105 => 28,  99 => 25,  95 => 24,  91 => 23,  85 => 20,  81 => 19,  77 => 18,  71 => 15,  67 => 14,  63 => 13,  60 => 12,  58 => 11,  54 => 10,  48 => 8,  45 => 7,  41 => 5,  37 => 4,  32 => 3,  29 => 2,);
    }
}

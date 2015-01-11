<?php

/* LoginLoginBundle:Action:validateaction.html.twig */
class __TwigTemplate_e8b32f16d925dbfc4519e6686b6bf541b20eca9b591828e51faf30a35870b8b3 extends Twig_Template
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
        rules: {\"login_loginbundle_action[actionname]\":{required:true}},
        messages: {\"login_loginbundle_action[actionname]\":{required:\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("actionname.validate"), "html", null, true);
        echo "\"}},
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
</script>
";
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Action:validateaction.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 5,  19 => 1,  104 => 28,  100 => 27,  96 => 26,  90 => 23,  84 => 20,  80 => 19,  76 => 18,  70 => 15,  66 => 14,  62 => 13,  59 => 12,  57 => 11,  53 => 10,  47 => 8,  44 => 7,  40 => 5,  36 => 4,  32 => 3,  29 => 2,);
    }
}

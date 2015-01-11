<?php

/* LoginLoginBundle:Roleaction:validateroleaction.html.twig */
class __TwigTemplate_b0051b2ecac97cea9705a2f095685cc4ea565830078af521d84c88d0bbbb6106 extends Twig_Template
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
        echo "<script>
  \$(document).ready(function(){
      \$(\"#userdiv\").hide(); 
  });
  
  \$(function() {
    \$(\"#form\").validate({\t
        rules: {\"login_loginbundle_roleaction[actionid]\": \"required\"},
        messages: {\"login_loginbundle_roleaction[actionid]\": \"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("roleaction.actionid.validate"), "html", null, true);
        echo "\"},
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
        return "LoginLoginBundle:Roleaction:validateroleaction.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,  113 => 33,  109 => 32,  105 => 31,  100 => 29,  95 => 27,  87 => 22,  83 => 21,  79 => 20,  73 => 17,  69 => 16,  65 => 15,  62 => 14,  60 => 13,  56 => 12,  53 => 11,  48 => 10,  45 => 9,  41 => 7,  36 => 5,  32 => 4,  29 => 9,);
    }
}

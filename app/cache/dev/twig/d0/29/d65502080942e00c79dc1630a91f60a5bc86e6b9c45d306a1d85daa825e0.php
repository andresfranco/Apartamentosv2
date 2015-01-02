<?php

/* LoginLoginBundle:Security:login.html.twig */
class __TwigTemplate_d029d65502080942e00c79dc1630a91f60a5bc86e6b9c45d306a1d85daa825e0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<head>       
";
        // line 3
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        $this->displayBlock('javascripts', $context, $blocks);
        // line 13
        echo "</head>
<body id=\"bodylogin\">
     <fieldset>
      <div><img src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/adminlogin.png"), "html", null, true);
        echo "\"/><b><span class=\"titulologin\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("SYSTEM ADMINISTRATION"), "html", null, true);
        echo "</span></b></div>
      <br><br>
      <div class=\"error\">
        <label id=\"labelerror\" class=\"error2\">
        ";
        // line 20
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 21
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message"), array(), "messages"), "html", null, true);
            echo "<br><br>
        ";
        }
        // line 23
        echo "        </label>
      </div>
      <form id=\"loginform\" action=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
        <label for=\"username\" class=\"labellogin\"><b>";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Username:"), "html", null, true);
        echo "</b></label>
        <input id=\"username\" type=\"text\" name=\"_username\"/>
        <label for=\"password\" class=\"labellogin\"><b>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Password:"), "html", null, true);
        echo "</b></label>
        <input id=\"password\" type=\"password\" name=\"_password\"/>
        <button type=\"submit\" name=\"login\" class=\"button radius\"/>";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("login"), "html", null, true);
        echo "</button>
      </form>
     </fieldset>
 </body>";
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "   <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/masterfoundation.css"), "html", null, true);
        echo "\" />
   <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/login.css"), "html", null, true);
        echo "\" />
";
    }

    // line 7
    public function block_javascripts($context, array $blocks = array())
    {
        // line 8
        echo "   <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
   <script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("foundation/js/foundation.min.js"), "html", null, true);
        echo "\"></script>
   <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.validate.js"), "html", null, true);
        echo "\"></script>
   <script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/validatelogin.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 11,  102 => 10,  98 => 9,  93 => 8,  90 => 7,  84 => 5,  79 => 4,  76 => 3,  68 => 30,  63 => 28,  58 => 26,  54 => 25,  50 => 23,  44 => 21,  42 => 20,  33 => 16,  28 => 13,  26 => 7,  24 => 3,  21 => 2,);
    }
}

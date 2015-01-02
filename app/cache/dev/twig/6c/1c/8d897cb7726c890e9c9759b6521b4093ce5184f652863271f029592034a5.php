<?php

/* LoginLoginBundle:Security:inicio.html.twig */
class __TwigTemplate_6c1c8d897cb7726c890e9c9759b6521b4093ce5184f652863271f029592034a5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::masteradmin.html.twig");

        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
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

    // line 3
    public function block_contenido($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"large-12 columns\">
    
    <h2 class=\"titulo\">";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Inicio"), "html", null, true);
        echo "</h2>
   
    <hr>
    <br>
    <div class=\"large-6 columns\">
 
        <div><h5>";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("configure.condo.title"), "html", null, true);
        echo "</h5> </div><br>
    <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("companygrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/condominio48.png"), "html", null, true);
        echo "\"/><br>
        <b><span>";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Condominio"), "html", null, true);
        echo "</span></b>
    </a> 
    <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("towergrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/tower48.png"), "html", null, true);
        echo "\"/><br>
        <b><span>";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Torres"), "html", null, true);
        echo "</span></b>
    </a> 

     <a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("apartmentgrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/apartamentos48.png"), "html", null, true);
        echo "\"/><br>
        <b><span>";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Apartamentos"), "html", null, true);
        echo "</span></b>
     </a> 
    
     <a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("employeegrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/employee48.png"), "html", null, true);
        echo "\"/><br>
        <b><span>";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Empleados"), "html", null, true);
        echo "</span></b>
     </a> 
     <a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("providergrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/provider48.png"), "html", null, true);
        echo "\"/><br>
        <b><span>";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Proveedores"), "html", null, true);
        echo "</span></b>
     </a> 
     <a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("constcompanygrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/constcompany48.png"), "html", null, true);
        echo "\"/><br>
        <b><span>";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Constructoras"), "html", null, true);
        echo "</span></b>
     </a>
    <br><br>
    ";
        // line 40
        echo "    
    <div><h5>";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("manage.budget.title"), "html", null, true);
        echo "</h5></div><br>
    <a href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("causegrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/cause48.png"), "html", null, true);
        echo "\"/><br>
        <b><span>";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Causas"), "html", null, true);
        echo "</span></b>
    </a> 
    <a href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("expensegrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/expense48.png"), "html", null, true);
        echo "\"/><br>
        <b><span>";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Gastos"), "html", null, true);
        echo "</span></b>
    </a> 

     <a href=\"";
        // line 51
        echo $this->env->getExtension('routing')->getPath("bankgrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/bank48.png"), "html", null, true);
        echo "\"/><br>
        <b><span>";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Bancos"), "html", null, true);
        echo "</span></b>
    </a>
    <a href=\"";
        // line 55
        echo $this->env->getExtension('routing')->getPath("accountgrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/account48.png"), "html", null, true);
        echo "\"/><br>
              <b><span>";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cuentas"), "html", null, true);
        echo "</span></b>
    </a>
    <a href=\"";
        // line 59
        echo $this->env->getExtension('routing')->getPath("incomegrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/income48.png"), "html", null, true);
        echo "\"/><br>
             <b><span>";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ingresos"), "html", null, true);
        echo "</span></b>
    </a> 
     <a href=\"";
        // line 63
        echo $this->env->getExtension('routing')->getPath("paymentgrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/payment48.png"), "html", null, true);
        echo "\"/><br>
              <b><span>";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pagos"), "html", null, true);
        echo "</span></b>
    </a> 
     <a href=\"";
        // line 67
        echo $this->env->getExtension('routing')->getPath("statementview");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/statement.png"), "html", null, true);
        echo "\"/><br>
              <b><span>";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Estado de Cuenta"), "html", null, true);
        echo "</span></b>
    </a>
       <br>
       <br>
       ";
        // line 73
        echo " 
    <br><br>

     
    </div>
   <div class=\"large-6 columns\">
       <div><h5>";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("config.residents.title"), "html", null, true);
        echo "</h5> </div><br>
    

    <a href=\"";
        // line 82
        echo $this->env->getExtension('routing')->getPath("residentsgrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/resident48.png"), "html", null, true);
        echo "\"/><br>
              <b><span>";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Residentes"), "html", null, true);
        echo "</span></b>
    </a> 

     <a href=\"";
        // line 87
        echo $this->env->getExtension('routing')->getPath("vehiclegrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/car48.png"), "html", null, true);
        echo "\"/><br>
              <b><span>";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Vehículos"), "html", null, true);
        echo "</span></b>
    </a> 
     <a href=\"";
        // line 91
        echo $this->env->getExtension('routing')->getPath("parkinggrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/parking48.png"), "html", null, true);
        echo "\"/><br>
              <b><span>";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Estacionamientos"), "html", null, true);
        echo "</span></b>
    </a> 
    <a href=\"";
        // line 95
        echo $this->env->getExtension('routing')->getPath("locationgrid");
        echo "\" class=\"button radius\">
        <img  src=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/location48.png"), "html", null, true);
        echo "\"/><br>
              <b><span>";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Localización"), "html", null, true);
        echo "</span></b>
    </a> 
     
    <br><br>  
    
       ";
        // line 102
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            echo " 
    <div><h5>";
            // line 103
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("config.system.title"), "html", null, true);
            echo "</h5></div><br>
      <a href=\"";
            // line 104
            echo $this->env->getExtension('routing')->getPath("userslist");
            echo "\" class=\"button radius\">
        <img  src=\"";
            // line 105
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/usertitle48.png"), "html", null, true);
            echo "\"/><br>
        <b><span>";
            // line 106
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usuarios  "), "html", null, true);
            echo "</span></b>
    </a>  

    <a href=\"";
            // line 109
            echo $this->env->getExtension('routing')->getPath("rolelist");
            echo "\" class=\"button radius\">
        <img  src=\"";
            // line 110
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/userroletitle.png"), "html", null, true);
            echo "\"/><br>
              <b><span>";
            // line 111
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Roles"), "html", null, true);
            echo "</span>
    </a> 
     <a href=\"";
            // line 113
            echo $this->env->getExtension('routing')->getPath("actiongrid");
            echo "\" class=\"button radius\">
        <img  src=\"";
            // line 114
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/actions48.png"), "html", null, true);
            echo "\"/><br>
              <b><span>";
            // line 115
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Acciones"), "html", null, true);
            echo "</span>
    </a>
      <a href=\"";
            // line 117
            echo $this->env->getExtension('routing')->getPath("lexik_translation_grid");
            echo "\" class=\"button radius\">
        <img  src=\"";
            // line 118
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/trans48.png"), "html", null, true);
            echo "\"/><br>
              <b><span>";
            // line 119
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Etiquetas"), "html", null, true);
            echo "</span>
    </a>
    
    ";
        }
        // line 122
        echo "   
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Security:inicio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  363 => 122,  356 => 119,  352 => 118,  348 => 117,  343 => 115,  339 => 114,  335 => 113,  330 => 111,  326 => 110,  322 => 109,  316 => 106,  312 => 105,  308 => 104,  304 => 103,  300 => 102,  292 => 97,  288 => 96,  284 => 95,  279 => 93,  275 => 92,  271 => 91,  266 => 89,  262 => 88,  258 => 87,  252 => 84,  248 => 83,  244 => 82,  238 => 79,  230 => 73,  223 => 69,  219 => 68,  215 => 67,  210 => 65,  206 => 64,  202 => 63,  197 => 61,  193 => 60,  189 => 59,  184 => 57,  180 => 56,  176 => 55,  171 => 53,  167 => 52,  163 => 51,  157 => 48,  153 => 47,  149 => 46,  144 => 44,  140 => 43,  136 => 42,  132 => 41,  129 => 40,  123 => 37,  119 => 36,  115 => 35,  110 => 33,  106 => 32,  102 => 31,  97 => 29,  93 => 28,  89 => 27,  83 => 24,  79 => 23,  75 => 22,  69 => 19,  65 => 18,  61 => 17,  56 => 15,  52 => 14,  48 => 13,  44 => 12,  35 => 6,  31 => 4,  28 => 3,);
    }
}

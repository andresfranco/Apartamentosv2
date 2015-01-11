<?php

/* LoginLoginBundle:Security:inicio.html.twig */
class __TwigTemplate_94b1e942720be4a5fc34208b26ba47c07a632e94113ff945af1cc795dd1bf543 extends Twig_Template
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
        echo "    <div class=\"large-12 columns\">

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
        // line 41
        echo "            <div><h5>";
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
        // line 74
        echo "            <br><br>


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
            <a href=\"";
        // line 99
        echo $this->env->getExtension('routing')->getPath("reservationgrid");
        echo "\" class=\"button radius\">
                <img  src=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/reservation48.png"), "html", null, true);
        echo "\"/><br>
                <b><span>";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reservaciones"), "html", null, true);
        echo "</span></b>
            </a>

            <br><br>

   ";
        // line 106
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 107
            echo "        <div>
          <h5>";
            // line 108
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("config.system.title"), "html", null, true);
            echo "</h5></div><br>
          <a href=\"";
            // line 109
            echo $this->env->getExtension('routing')->getPath("userslist");
            echo "\" class=\"button radius\">
            <img  src=\"";
            // line 110
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/usertitle48.png"), "html", null, true);
            echo "\"/><br>
            <b><span>";
            // line 111
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usuarios  "), "html", null, true);
            echo "</span></b>
          </a>

          <a href=\"";
            // line 114
            echo $this->env->getExtension('routing')->getPath("rolelist");
            echo "\" class=\"button radius\">
              <img  src=\"";
            // line 115
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/userroletitle.png"), "html", null, true);
            echo "\"/><br>
              <b><span>";
            // line 116
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Roles"), "html", null, true);
            echo "</span></b>
          </a>
          <a href=\"";
            // line 118
            echo $this->env->getExtension('routing')->getPath("actiongrid");
            echo "\" class=\"button radius\">
              <img  src=\"";
            // line 119
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/actions48.png"), "html", null, true);
            echo "\"/><br>
              <b><span>";
            // line 120
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Acciones"), "html", null, true);
            echo "</span></b>
          </a>
          <a href=\"";
            // line 122
            echo $this->env->getExtension('routing')->getPath("lexik_translation_grid");
            echo "\" class=\"button radius\">
              <img  src=\"";
            // line 123
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/trans48.png"), "html", null, true);
            echo "\"/><br>
              <b><span>";
            // line 124
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Etiquetas"), "html", null, true);
            echo "</span></b>
          </a>
           <a href=\"";
            // line 126
            echo $this->env->getExtension('routing')->getPath("sysparamgrid");
            echo "\" class=\"button radius\">
               <img  src=\"";
            // line 127
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/param48.png"), "html", null, true);
            echo "\"/><br>
               <b><span>";
            // line 128
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Parámetros"), "html", null, true);
            echo "</span></b>
           </a>
   ";
        }
        // line 131
        echo "        </div>
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
        return array (  386 => 131,  380 => 128,  376 => 127,  372 => 126,  367 => 124,  363 => 123,  359 => 122,  354 => 120,  350 => 119,  346 => 118,  341 => 116,  337 => 115,  333 => 114,  327 => 111,  323 => 110,  319 => 109,  315 => 108,  312 => 107,  310 => 106,  302 => 101,  298 => 100,  294 => 99,  289 => 97,  285 => 96,  281 => 95,  276 => 93,  272 => 92,  268 => 91,  263 => 89,  259 => 88,  255 => 87,  249 => 84,  245 => 83,  241 => 82,  235 => 79,  228 => 74,  221 => 69,  217 => 68,  213 => 67,  208 => 65,  204 => 64,  200 => 63,  195 => 61,  191 => 60,  187 => 59,  182 => 57,  178 => 56,  174 => 55,  169 => 53,  165 => 52,  161 => 51,  155 => 48,  151 => 47,  147 => 46,  142 => 44,  138 => 43,  134 => 42,  129 => 41,  123 => 37,  119 => 36,  115 => 35,  110 => 33,  106 => 32,  102 => 31,  97 => 29,  93 => 28,  89 => 27,  83 => 24,  79 => 23,  75 => 22,  69 => 19,  65 => 18,  61 => 17,  56 => 15,  52 => 14,  48 => 13,  44 => 12,  35 => 6,  31 => 4,  28 => 3,);
    }
}

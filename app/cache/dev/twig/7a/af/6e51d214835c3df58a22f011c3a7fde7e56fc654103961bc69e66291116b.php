<?php

/* LoginLoginBundle:Roleaction:roleactiongrid.html.twig */
class __TwigTemplate_7aaf6e51d214835c3df58a22f011c3a7fde7e56fc654103961bc69e66291116b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::masteradmin.html.twig");

        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
            'grid' => array($this, 'block_grid'),
            'grid_search' => array($this, 'block_grid_search'),
            'grid_titles' => array($this, 'block_grid_titles'),
            'grid_rows' => array($this, 'block_grid_rows'),
            'grid_pager' => array($this, 'block_grid_pager'),
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
        echo "    <div>
         <h2 class=\"titulo\">";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Acciones del rol"), "html", null, true);
        echo " / ";
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('routing')->getUrl("Rolenametwig", array("roleid" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "roleid"), "method"))), array());
        echo "</h2>
         
    </div> 
        
    <hr>   
    
    ";
        // line 11
        $this->displayBlock('grid', $context, $blocks);
    }

    public function block_grid($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"grid\">
       ";
        // line 13
        $this->displayBlock('grid_search', $context, $blocks);
        // line 36
        echo "        <div>
            <a href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("roleaction_new", array("roleid" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "roleid"), "method"))), "html", null, true);
        echo "\"><img  src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/new.png"), "html", null, true);
        echo "\"/></a>
         </div>
        <br>
       ";
        // line 40
        if (((($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount") > 0) || $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isFiltered")) || ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "noDataMessage") === false))) {
            // line 41
            echo "        
            
            <form id=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "routeUrl"), "html", null, true);
            echo "\" method=\"post\">
          <div class=\"grid_header\">
          ";
            // line 45
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "massActions")) > 0)) {
                // line 46
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("actions", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
          ";
            }
            // line 48
            echo "          </div>
        <div class=\"grid_body\">
        <table>
      ";
            // line 51
            $this->displayBlock('grid_titles', $context, $blocks);
            // line 83
            echo "    </thead>
    <tbody>
     ";
            // line 85
            $this->displayBlock('grid_rows', $context, $blocks);
            // line 102
            echo "    </tbody>
        </table>
        </div>
        <div class=\"grid_footer\">
        ";
            // line 106
            if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isPagerSectionVisible")) {
                // line 107
                echo "            ";
                $this->displayBlock('grid_pager', $context, $blocks);
                // line 140
                echo "        ";
            }
            // line 141
            echo "        ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "exports")) > 0)) {
                // line 142
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("exports", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 144
            echo "        ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "tweaks")) > 0)) {
                // line 145
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("tweaks", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 147
            echo "        </div>
        ";
            // line 148
            if ((isset($context["withjs"]) ? $context["withjs"] : $this->getContext($context, "withjs"))) {
                // line 149
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 151
            echo "    </form>
";
        } else {
            // line 153
            echo "    ";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("no_data", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
";
        }
        // line 155
        echo "</div>
 <br><br><div> 
          <a href=\"";
        // line 157
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_role_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "roleid"), "method"))), "html", null, true);
        echo "\" class=\"button radius\">
              <img  src=\"";
        // line 158
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/back24.png"), "html", null, true);
        echo "\"/>
              <span>";
        // line 159
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Detalles del Rol"), "html", null, true);
        echo "</span>
          </a>   
    </div>
";
    }

    // line 13
    public function block_grid_search($context, array $blocks = array())
    {
        // line 14
        echo "       ";
        if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isFilterSectionVisible")) {
            // line 15
            echo "          <div class=\"grid-search\">
          <form id=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_search\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "routeUrl"), "html", null, true);
            echo "\" method=\"post\">
          <table class=\"busqueda\">
              <tr>  
          ";
            // line 19
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "columns"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                // line 20
                echo "               
             ";
                // line 21
                if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "isFilterable") && !twig_in_filter($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "type"), array(0 => "actions", 1 => "massaction")))) {
                    // line 22
                    echo "                ";
                    $context["columnTitle"] = ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title"));
                    // line 23
                    echo "                <td><div class=\"";
                    echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index")), "html", null, true);
                    echo "\"><label>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                    echo "</label>";
                    echo $this->env->getExtension('datagrid_twig_extension')->getGridFilter((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), false);
                    echo "</div></td>
            ";
                }
                // line 25
                echo "            
          ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "                <td valign=\"bottom\">
                    <input type=\"submit\" value=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Buscar"), "html", null, true);
            echo "\"/>
                </td>
              </tr>
          </table>
          </form>
          </div>
        ";
        }
        // line 35
        echo "       ";
    }

    // line 51
    public function block_grid_titles($context, array $blocks = array())
    {
        // line 52
        echo "      <thead>       
      <tr class=\"grid-row-titles\">
       ";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "columns"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 55
            echo "        ";
            if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                // line 56
                echo "            <th class=\"";
                if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "align") != "left")) {
                    echo "align-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "align"), "html", null, true);
                }
                if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "class")) {
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "class"), "html", null, true);
                }
                if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "last")) {
                    echo " last-column";
                }
                echo "\"";
                if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "size") > (-1))) {
                    echo " style=\"width:";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "size"), "html", null, true);
                    echo "px;\"";
                }
                echo ">";
                // line 57
                ob_start();
                // line 58
                echo "            ";
                if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "type") == "massaction")) {
                    // line 59
                    echo "                <input type=\"checkbox\" class=\"grid-mass-selector\" onclick=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
                    echo "_markVisible(this.checked);\"/>
            ";
                } else {
                    // line 61
                    echo "                ";
                    $context["columnTitle"] = (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title")) . "__abbr");
                    // line 62
                    echo "                ";
                    if (($this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))) == (isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle")))) {
                        // line 63
                        echo "                    ";
                        $context["columnTitle"] = ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title"));
                        // line 64
                        echo "                ";
                    }
                    // line 65
                    echo "                ";
                    if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "sortable")) {
                        // line 66
                        echo "                <a class=\"order\" href=\"";
                        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("order", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")));
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Order by"), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                        echo "</a>
                    
                    ";
                        // line 68
                        if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "order") == "asc")) {
                            // line 69
                            echo "                     <a class=\"order\" href=\"";
                            echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("order", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")));
                            echo "\" title=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Order by"), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                            echo "\"><img src=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/sort_up.gif"), "html", null, true);
                            echo "\"/> </a>
                    ";
                        } elseif (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "order") == "desc")) {
                            // line 71
                            echo "                        <a class=\"order\" href=\"";
                            echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("order", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")));
                            echo "\" title=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Order by"), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                            echo "\"><img src=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/sort_down.gif"), "html", null, true);
                            echo "\"/> </a>
                    ";
                        }
                        // line 73
                        echo "                ";
                    } else {
                        // line 74
                        echo "                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                        echo "
                ";
                    }
                    // line 76
                    echo "            ";
                }
                // line 77
                echo "            ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 78
                echo "</th>
         ";
            }
            // line 80
            echo "       ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "    </tr>
     ";
    }

    // line 85
    public function block_grid_rows($context, array $blocks = array())
    {
        // line 86
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "rows"));
        $context['_iterated'] = false;
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 87
            echo "    ";
            $context["last_row"] = $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "last");
            // line 88
            echo "    ";
            ob_start();
            // line 89
            echo "        <tr";
            if (($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "color") != "")) {
                echo " style=\"background-color:";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "color"), "html", null, true);
                echo ";\"";
            }
            echo " class=\"grid-row-cells ";
            echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index")), "html", null, true);
            if (($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "class") != "")) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "class"), "html", null, true);
            }
            echo "\">
        ";
            // line 90
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "columns"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                // line 91
                echo "            ";
                if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                    // line 92
                    echo "                <td class=\"grid-column-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "renderBlockId"), "html", null, true);
                    if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "class")) {
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "class"), "html", null, true);
                    }
                    if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "align") != "left")) {
                        echo " align-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "align"), "html", null, true);
                    }
                    if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "last")) {
                        echo " last-column";
                    }
                    if ((isset($context["last_row"]) ? $context["last_row"] : $this->getContext($context, "last_row"))) {
                        echo " last-row";
                    }
                    echo "\">";
                    echo $this->env->getExtension('datagrid_twig_extension')->getGridCell((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), (isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                    echo "</td>
            ";
                }
                // line 94
                echo "        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 96
            echo "    </tr>
    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 98
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("no_result", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
        echo "    
";
    }

    // line 107
    public function block_grid_pager($context, array $blocks = array())
    {
        // line 108
        echo "    ";
        if ((isset($context["pagerfanta"]) ? $context["pagerfanta"] : $this->getContext($context, "pagerfanta"))) {
            // line 109
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getPagerfanta((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
    ";
        } else {
            // line 111
            echo "        <div class=\"pager\" >
            <table class=\"paginado\">
                <tr>
               <td>";
            // line 114
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->transchoice("%count% Resultados, ", $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount"), array("%count%" => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount"))), "html", null, true);
            echo "
                 ";
            // line 115
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pagina"), "html", null, true);
            echo "
                </td>
                <td>
               <input type=\"button\" class=\"paginado\" ";
            // line 118
            if (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") <= 0)) {
                echo "disabled=\"disabled\"";
            }
            echo " value=\"<\" onclick=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_previousPage();\"/> 
                </td>
                    <td>
                      <input type=\"text\" class=\"current\" value=\"";
            // line 121
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") + 1), "html", null, true);
            echo "\" size=\"2\" onkeypress=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_enterPage(event, parseInt(this.value)-1);\"/>
                    </td>
                    <td>
                       <input type=\"button\" value=\">\" class=\"paginado\" ";
            // line 124
            if (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") >= ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "pageCount") - 1))) {
                echo "disabled=\"disabled\"";
            }
            echo " onclick=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_nextPage();\"/>         
                    </td>
                    <td>
                        ";
            // line 127
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("de %count%", array("%count%" => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "pageCount"))), "html", null, true);
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(", Mostrar"), "html", null, true);
            echo "
                    </td>
                    <td>
                   <select onchange=\"return ";
            // line 130
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_resultsPerPage(this.value);\" class=\"paginado\">
                      ";
            // line 131
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "limits"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 132
                echo "                      <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
                echo "\"";
                if (((isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")) == $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "limit"))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
                echo "</option>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 134
            echo "                   </td>   
                </tr>
            </table>            
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Roleaction:roleactiongrid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  627 => 134,  612 => 132,  608 => 131,  604 => 130,  597 => 127,  587 => 124,  579 => 121,  569 => 118,  563 => 115,  559 => 114,  554 => 111,  548 => 109,  545 => 108,  542 => 107,  537 => 100,  528 => 98,  514 => 96,  511 => 95,  497 => 94,  475 => 92,  472 => 91,  455 => 90,  440 => 89,  437 => 88,  434 => 87,  415 => 86,  412 => 85,  407 => 81,  393 => 80,  389 => 78,  386 => 77,  383 => 76,  377 => 74,  374 => 73,  362 => 71,  350 => 69,  348 => 68,  336 => 66,  333 => 65,  330 => 64,  327 => 63,  324 => 62,  321 => 61,  315 => 59,  312 => 58,  310 => 57,  290 => 56,  287 => 55,  270 => 54,  266 => 52,  263 => 51,  259 => 35,  249 => 28,  246 => 27,  231 => 25,  221 => 23,  218 => 22,  216 => 21,  213 => 20,  196 => 19,  188 => 16,  185 => 15,  182 => 14,  179 => 13,  171 => 159,  167 => 158,  163 => 157,  159 => 155,  153 => 153,  149 => 151,  143 => 149,  141 => 148,  138 => 147,  132 => 145,  129 => 144,  123 => 142,  120 => 141,  117 => 140,  114 => 107,  112 => 106,  106 => 102,  104 => 85,  100 => 83,  98 => 51,  93 => 48,  87 => 46,  85 => 45,  78 => 43,  74 => 41,  72 => 40,  64 => 37,  61 => 36,  59 => 13,  56 => 12,  50 => 11,  39 => 5,  36 => 4,  33 => 3,);
    }
}

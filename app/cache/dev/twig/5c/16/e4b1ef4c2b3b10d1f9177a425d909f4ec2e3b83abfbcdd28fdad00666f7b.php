<?php

/* LoginLoginBundle:Action:actiongrid.html.twig */
class __TwigTemplate_5c16e4b1ef4c2b3b10d1f9177a425d909f4ec2e3b83abfbcdd28fdad00666f7b extends Twig_Template
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

    // line 2
    public function block_contenido($context, array $blocks = array())
    {
        // line 3
        echo "  <img style=\"float:left;\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/actions48.png"), "html", null, true);
        echo "\"/> 
  <h2 class=\"titulo\">";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Acciones de Seguridad"), "html", null, true);
        echo "</h2>
   <hr>   
    ";
        // line 6
        $this->displayBlock('grid', $context, $blocks);
        // line 155
        echo " ";
    }

    // line 6
    public function block_grid($context, array $blocks = array())
    {
        // line 7
        echo "    <div class=\"grid\">
        ";
        // line 8
        $this->displayBlock('grid_search', $context, $blocks);
        // line 31
        echo "        ";
        if (((isset($context["create"]) ? $context["create"] : $this->getContext($context, "create")) == "S")) {
            // line 32
            echo "            <div>
                <a href=\"";
            // line 33
            echo $this->env->getExtension('routing')->getPath((isset($context["urlnew"]) ? $context["urlnew"] : $this->getContext($context, "urlnew")));
            echo "\"><img  src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/newitem.png"), "html", null, true);
            echo "\"/></a>
            </div>
        ";
        }
        // line 36
        echo "
       ";
        // line 37
        if (((($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount") > 0) || $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isFiltered")) || ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "noDataMessage") === false))) {
            // line 38
            echo "       
        <br>
        <form id=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "routeUrl"), "html", null, true);
            echo "\" method=\"post\">
          <div class=\"grid_header\">
          ";
            // line 42
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "massActions")) > 0)) {
                // line 43
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("actions", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
          ";
            }
            // line 45
            echo "          </div>
        <div class=\"grid_body\">
        <table>
      ";
            // line 48
            $this->displayBlock('grid_titles', $context, $blocks);
            // line 81
            echo "    </thead>
    <tbody>
     ";
            // line 83
            $this->displayBlock('grid_rows', $context, $blocks);
            // line 100
            echo "    </tbody>
        </table>
        </div>
        <div class=\"grid_footer\">
        ";
            // line 104
            if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isPagerSectionVisible")) {
                // line 105
                echo "            ";
                $this->displayBlock('grid_pager', $context, $blocks);
                // line 138
                echo "        ";
            }
            // line 139
            echo "        ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "exports")) > 0)) {
                // line 140
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("exports", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 142
            echo "        ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "tweaks")) > 0)) {
                // line 143
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("tweaks", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 145
            echo "        </div>
        ";
            // line 146
            if ((isset($context["withjs"]) ? $context["withjs"] : $this->getContext($context, "withjs"))) {
                // line 147
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 149
            echo "    </form>
";
        } else {
            // line 151
            echo "   <br>";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("no_data", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
";
        }
        // line 153
        echo "</div>
";
    }

    // line 8
    public function block_grid_search($context, array $blocks = array())
    {
        // line 9
        echo "       ";
        if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isFilterSectionVisible")) {
            // line 10
            echo "          <div class=\"grid-search\">
          <form id=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_search\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "routeUrl"), "html", null, true);
            echo "\" method=\"post\">
          <table class=\"busqueda\">
              <tr>  
          ";
            // line 14
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
                // line 15
                echo "               
             ";
                // line 16
                if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "isFilterable") && !twig_in_filter($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "type"), array(0 => "actions", 1 => "massaction")))) {
                    // line 17
                    echo "                ";
                    $context["columnTitle"] = ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title"));
                    // line 18
                    echo "                <td><div class=\"";
                    echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index")), "html", null, true);
                    echo "\"><label>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                    echo "</label>";
                    echo $this->env->getExtension('datagrid_twig_extension')->getGridFilter((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), false);
                    echo "</div></td>
            ";
                }
                // line 20
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
            // line 22
            echo "                <td valign=\"bottom\">
                    <input type=\"submit\" value=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Buscar"), "html", null, true);
            echo "\"/>
                </td>
              </tr>
          </table>
          </form>
          </div>
        ";
        }
        // line 30
        echo "       ";
    }

    // line 48
    public function block_grid_titles($context, array $blocks = array())
    {
        // line 49
        echo "      <thead>       
      <tr class=\"grid-row-titles\">
       ";
        // line 51
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
            // line 52
            echo "        ";
            if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                // line 53
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
                // line 54
                ob_start();
                // line 55
                echo "            ";
                if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "type") == "massaction")) {
                    // line 56
                    echo "                <input type=\"checkbox\" class=\"grid-mass-selector\" onclick=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
                    echo "_markVisible(this.checked);\"/>
            ";
                } else {
                    // line 58
                    echo "                ";
                    $context["columnTitle"] = (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title")) . "__abbr");
                    // line 59
                    echo "                ";
                    if (($this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))) == (isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle")))) {
                        // line 60
                        echo "                    ";
                        $context["columnTitle"] = ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title"));
                        // line 61
                        echo "                ";
                    }
                    // line 62
                    echo "                ";
                    if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "sortable")) {
                        // line 63
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
                        // line 65
                        if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "order") == "asc")) {
                            // line 66
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
                            // line 68
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
                        // line 70
                        echo "                ";
                    } else {
                        // line 71
                        echo "                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                        echo "
                ";
                    }
                    // line 73
                    echo "            ";
                }
                // line 74
                echo "            ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 75
                echo "</th>
         ";
            }
            // line 77
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
        // line 78
        echo "    </tr>
    
     ";
    }

    // line 83
    public function block_grid_rows($context, array $blocks = array())
    {
        // line 84
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
            // line 85
            echo "    ";
            $context["last_row"] = $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "last");
            // line 86
            echo "    ";
            ob_start();
            // line 87
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
            // line 88
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
                // line 89
                echo "            ";
                if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                    // line 90
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
                // line 92
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
            // line 93
            echo "    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 94
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
            // line 96
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("no_result", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        echo "    
";
    }

    // line 105
    public function block_grid_pager($context, array $blocks = array())
    {
        // line 106
        echo "    ";
        if ((isset($context["pagerfanta"]) ? $context["pagerfanta"] : $this->getContext($context, "pagerfanta"))) {
            // line 107
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getPagerfanta((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
    ";
        } else {
            // line 109
            echo "        <div class=\"pager\" >
            <table class=\"paginado\">
                <tr>
               <td>";
            // line 112
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->transchoice("%count% Resultados, ", $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount"), array("%count%" => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount"))), "html", null, true);
            echo "
                 ";
            // line 113
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pagina"), "html", null, true);
            echo "
                </td>
                <td>
               <input type=\"button\" class=\"paginado\" ";
            // line 116
            if (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") <= 0)) {
                echo "disabled=\"disabled\"";
            }
            echo " value=\"<\" onclick=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_previousPage();\"/> 
                </td>
                    <td>
                      <input type=\"text\" class=\"current\" value=\"";
            // line 119
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") + 1), "html", null, true);
            echo "\" size=\"2\" onkeypress=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_enterPage(event, parseInt(this.value)-1);\"/>
                    </td>
                    <td>
                       <input type=\"button\" value=\">\" class=\"paginado\" ";
            // line 122
            if (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") >= ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "pageCount") - 1))) {
                echo "disabled=\"disabled\"";
            }
            echo " onclick=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_nextPage();\"/>         
                    </td>
                    <td>
                        ";
            // line 125
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("de %count%", array("%count%" => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "pageCount"))), "html", null, true);
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(", Mostrar"), "html", null, true);
            echo "
                    </td>
                    <td>
                   <select onchange=\"return ";
            // line 128
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_resultsPerPage(this.value);\" class=\"paginado\">
                      ";
            // line 129
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "limits"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 130
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
            // line 132
            echo "                   </td>   
                </tr>
            </table>            
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Action:actiongrid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  618 => 132,  603 => 130,  599 => 129,  595 => 128,  588 => 125,  578 => 122,  570 => 119,  560 => 116,  554 => 113,  550 => 112,  545 => 109,  539 => 107,  536 => 106,  533 => 105,  528 => 98,  519 => 96,  505 => 94,  502 => 93,  488 => 92,  466 => 90,  463 => 89,  446 => 88,  431 => 87,  428 => 86,  425 => 85,  406 => 84,  403 => 83,  397 => 78,  383 => 77,  379 => 75,  376 => 74,  373 => 73,  367 => 71,  364 => 70,  352 => 68,  340 => 66,  338 => 65,  326 => 63,  323 => 62,  320 => 61,  317 => 60,  314 => 59,  311 => 58,  305 => 56,  302 => 55,  300 => 54,  280 => 53,  277 => 52,  260 => 51,  256 => 49,  253 => 48,  249 => 30,  239 => 23,  236 => 22,  221 => 20,  211 => 18,  208 => 17,  206 => 16,  203 => 15,  186 => 14,  178 => 11,  175 => 10,  172 => 9,  169 => 8,  164 => 153,  158 => 151,  154 => 149,  148 => 147,  146 => 146,  143 => 145,  137 => 143,  134 => 142,  128 => 140,  125 => 139,  122 => 138,  119 => 105,  117 => 104,  111 => 100,  109 => 83,  105 => 81,  103 => 48,  98 => 45,  92 => 43,  90 => 42,  83 => 40,  79 => 38,  77 => 37,  74 => 36,  66 => 33,  63 => 32,  60 => 31,  58 => 8,  55 => 7,  52 => 6,  48 => 155,  46 => 6,  41 => 4,  36 => 3,  33 => 2,);
    }
}

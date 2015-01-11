<?php

/* LexikTranslationBundle:Edition:Translationgrid.html.twig */
class __TwigTemplate_c00d298aa6e4e18477f2f6fa911d197346cb755bebe32e5a53ec687d9df939b3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
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
        return $this->env->resolveTemplate((isset($context["layout"]) ? $context["layout"] : $this->getContext($context, "layout")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("translations.page_title", array(), "LexikTranslationBundle"), "html", null, true);
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    ";
        // line 8
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "438b731_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_438b731_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/optimized-jqgrid_ui.jqgrid_1.css");
            // line 10
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
        } else {
            // asset "438b731"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_438b731") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/optimized-jqgrid.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
        }
        unset($context["asset_url"]);
    }

    // line 14
    public function block_contenido($context, array $blocks = array())
    {
        // line 15
        echo "<div>
         <img style=\"float:left;\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/translations48.png"), "html", null, true);
        echo "\"/>
         <h2 class=\"titulo\">";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Etiquetas"), "html", null, true);
        echo "</h2>
         
    </div> 
    <hr>  
    ";
        // line 21
        $this->displayBlock('grid', $context, $blocks);
        // line 172
        echo "
";
    }

    // line 21
    public function block_grid($context, array $blocks = array())
    {
        // line 22
        echo "    <div class=\"grid\">
        ";
        // line 23
        $this->displayBlock('grid_search', $context, $blocks);
        // line 46
        echo "        <div>
            ";
        // line 47
        if (((isset($context["create"]) ? $context["create"] : $this->getContext($context, "create")) == "S")) {
            // line 48
            echo "            <a href=\"";
            echo $this->env->getExtension('routing')->getPath("lexik_translation_new");
            echo "\"><img  src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/new.png"), "html", null, true);
            echo "\"/></a>
            ";
        }
        // line 50
        echo "            <a href=\"";
        echo $this->env->getExtension('routing')->getPath("lexik_translation_invalidate_cache");
        echo "\"><img  src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/refresh.png"), "html", null, true);
        echo "\"/></a>
         </div>
        <br>
       ";
        // line 53
        if (((($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount") > 0) || $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isFiltered")) || ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "noDataMessage") === false))) {
            // line 54
            echo "        
            
            <form id=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "routeUrl"), "html", null, true);
            echo "\" method=\"post\">
          <div class=\"grid_header\">
          ";
            // line 58
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "massActions")) > 0)) {
                // line 59
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("actions", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
          ";
            }
            // line 61
            echo "          </div>
        <div class=\"grid_body\">
        <table>
      ";
            // line 64
            $this->displayBlock('grid_titles', $context, $blocks);
            // line 97
            echo "    </thead>
    <tbody>
     ";
            // line 99
            $this->displayBlock('grid_rows', $context, $blocks);
            // line 116
            echo "    </tbody>
        </table>
        </div>
        <div class=\"grid_footer\">
        ";
            // line 120
            if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isPagerSectionVisible")) {
                // line 121
                echo "            ";
                $this->displayBlock('grid_pager', $context, $blocks);
                // line 154
                echo "        ";
            }
            // line 155
            echo "        ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "exports")) > 0)) {
                // line 156
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("exports", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 158
            echo "        ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "tweaks")) > 0)) {
                // line 159
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("tweaks", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 161
            echo "        </div>
        ";
            // line 162
            if ((isset($context["withjs"]) ? $context["withjs"] : $this->getContext($context, "withjs"))) {
                // line 163
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 165
            echo "    </form>
";
        } else {
            // line 167
            echo "    ";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("no_data", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
";
        }
        // line 169
        echo "</div>
      
";
    }

    // line 23
    public function block_grid_search($context, array $blocks = array())
    {
        // line 24
        echo "       ";
        if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isFilterSectionVisible")) {
            // line 25
            echo "          <div class=\"grid-search\">
          <form id=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_search\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "routeUrl"), "html", null, true);
            echo "\" method=\"post\">
          <table class=\"busqueda\">
              <tr>  
          ";
            // line 29
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
                // line 30
                echo "               
             ";
                // line 31
                if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "isFilterable") && !twig_in_filter($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "type"), array(0 => "actions", 1 => "massaction")))) {
                    // line 32
                    echo "                ";
                    $context["columnTitle"] = ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title"));
                    // line 33
                    echo "                <td><div class=\"";
                    echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index")), "html", null, true);
                    echo "\"><label>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                    echo "</label>";
                    echo $this->env->getExtension('datagrid_twig_extension')->getGridFilter((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), false);
                    echo "</div></td>
            ";
                }
                // line 35
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
            // line 37
            echo "                <td valign=\"bottom\">
                    <input type=\"submit\" value=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Buscar"), "html", null, true);
            echo "\"/>
                </td>
              </tr>
          </table>
          </form>
          </div>
        ";
        }
        // line 45
        echo "       ";
    }

    // line 64
    public function block_grid_titles($context, array $blocks = array())
    {
        // line 65
        echo "      <thead>       
      <tr class=\"grid-row-titles\">
       ";
        // line 67
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
            // line 68
            echo "        ";
            if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                // line 69
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
                // line 70
                ob_start();
                // line 71
                echo "            ";
                if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "type") == "massaction")) {
                    // line 72
                    echo "                <input type=\"checkbox\" class=\"grid-mass-selector\" onclick=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
                    echo "_markVisible(this.checked);\"/>
            ";
                } else {
                    // line 74
                    echo "                ";
                    $context["columnTitle"] = (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title")) . "__abbr");
                    // line 75
                    echo "                ";
                    if (($this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))) == (isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle")))) {
                        // line 76
                        echo "                    ";
                        $context["columnTitle"] = ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title"));
                        // line 77
                        echo "                ";
                    }
                    // line 78
                    echo "                ";
                    if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "sortable")) {
                        // line 79
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
                        // line 81
                        if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "order") == "asc")) {
                            // line 82
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
                            // line 84
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
                        // line 86
                        echo "                ";
                    } else {
                        // line 87
                        echo "                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                        echo "
                ";
                    }
                    // line 89
                    echo "            ";
                }
                // line 90
                echo "            ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 91
                echo "</th>
         ";
            }
            // line 93
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
        // line 94
        echo "    </tr>
    
     ";
    }

    // line 99
    public function block_grid_rows($context, array $blocks = array())
    {
        // line 100
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
            // line 101
            echo "    ";
            $context["last_row"] = $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "last");
            // line 102
            echo "    ";
            ob_start();
            // line 103
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
            // line 104
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
                // line 105
                echo "            ";
                if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                    // line 106
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
                // line 108
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
            // line 109
            echo "    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 110
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
            // line 112
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("no_result", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        echo "    
";
    }

    // line 121
    public function block_grid_pager($context, array $blocks = array())
    {
        // line 122
        echo "    ";
        if ((isset($context["pagerfanta"]) ? $context["pagerfanta"] : $this->getContext($context, "pagerfanta"))) {
            // line 123
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getPagerfanta((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
    ";
        } else {
            // line 125
            echo "        <div class=\"pager\" >
            <table class=\"paginado\">
                <tr>
               <td>";
            // line 128
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->transchoice("%count% Resultados, ", $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount"), array("%count%" => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount"))), "html", null, true);
            echo "
                 ";
            // line 129
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pagina"), "html", null, true);
            echo "
                </td>
                <td>
               <input type=\"button\" class=\"paginado\" ";
            // line 132
            if (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") <= 0)) {
                echo "disabled=\"disabled\"";
            }
            echo " value=\"<\" onclick=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_previousPage();\"/> 
                </td>
                    <td>
                      <input type=\"text\" class=\"current\" value=\"";
            // line 135
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") + 1), "html", null, true);
            echo "\" size=\"2\" onkeypress=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_enterPage(event, parseInt(this.value)-1);\"/>
                    </td>
                    <td>
                       <input type=\"button\" value=\">\" class=\"paginado\" ";
            // line 138
            if (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") >= ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "pageCount") - 1))) {
                echo "disabled=\"disabled\"";
            }
            echo " onclick=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_nextPage();\"/>         
                    </td>
                    <td>
                        ";
            // line 141
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("de %count%", array("%count%" => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "pageCount"))), "html", null, true);
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(", Mostrar"), "html", null, true);
            echo "
                    </td>
                    <td>
                   <select onchange=\"return ";
            // line 144
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_resultsPerPage(this.value);\" class=\"paginado\">
                      ";
            // line 145
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "limits"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 146
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
            // line 148
            echo "                   </td>   
                </tr>
            </table>            
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "LexikTranslationBundle:Edition:Translationgrid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  663 => 148,  648 => 146,  644 => 145,  640 => 144,  633 => 141,  623 => 138,  615 => 135,  605 => 132,  599 => 129,  595 => 128,  590 => 125,  584 => 123,  581 => 122,  578 => 121,  573 => 114,  564 => 112,  550 => 110,  547 => 109,  533 => 108,  511 => 106,  508 => 105,  491 => 104,  476 => 103,  473 => 102,  470 => 101,  451 => 100,  448 => 99,  442 => 94,  428 => 93,  424 => 91,  421 => 90,  418 => 89,  412 => 87,  409 => 86,  397 => 84,  385 => 82,  383 => 81,  371 => 79,  368 => 78,  365 => 77,  362 => 76,  359 => 75,  356 => 74,  350 => 72,  347 => 71,  345 => 70,  325 => 69,  322 => 68,  305 => 67,  301 => 65,  298 => 64,  294 => 45,  284 => 38,  281 => 37,  266 => 35,  256 => 33,  253 => 32,  251 => 31,  248 => 30,  231 => 29,  223 => 26,  220 => 25,  217 => 24,  214 => 23,  208 => 169,  202 => 167,  198 => 165,  192 => 163,  190 => 162,  187 => 161,  181 => 159,  178 => 158,  172 => 156,  169 => 155,  166 => 154,  163 => 121,  161 => 120,  155 => 116,  153 => 99,  149 => 97,  147 => 64,  142 => 61,  136 => 59,  134 => 58,  127 => 56,  123 => 54,  121 => 53,  112 => 50,  104 => 48,  102 => 47,  99 => 46,  97 => 23,  94 => 22,  91 => 21,  86 => 172,  84 => 21,  77 => 17,  73 => 16,  70 => 15,  67 => 14,  51 => 10,  47 => 8,  42 => 7,  39 => 6,  33 => 4,);
    }
}

<?php

/* LoginLoginBundle:Multiparam:multiparamgrid.html.twig */
class __TwigTemplate_773024dec174d3167ca183f425e209ea7e10fd2a8fb185663e6e5035fa0609e4 extends Twig_Template
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
        echo "    <img style=\"float:left;\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/param48.png"), "html", null, true);
        echo "\"/>
    <h2 class=\"titulo\">";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Parámetros multiples"), "html", null, true);
        echo "</h2>
    <hr>
    ";
        // line 6
        $this->displayBlock('grid', $context, $blocks);
    }

    public function block_grid($context, array $blocks = array())
    {
        // line 7
        echo "        <div class=\"grid\">
            ";
        // line 8
        $this->displayBlock('grid_search', $context, $blocks);
        // line 31
        echo "            ";
        if (((isset($context["create"]) ? $context["create"] : $this->getContext($context, "create")) == "S")) {
            // line 32
            echo "                <div>
                    <a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["urlnew"]) ? $context["urlnew"] : $this->getContext($context, "urlnew")), array("sysparamid" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
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
                echo "                            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("actions", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
                        ";
            }
            // line 45
            echo "                    </div>
                    <div class=\"grid_body\">
                        <table>
                            ";
            // line 48
            $this->displayBlock('grid_titles', $context, $blocks);
            // line 81
            echo "                            </thead>
                            <tbody>
                            ";
            // line 83
            $this->displayBlock('grid_rows', $context, $blocks);
            // line 100
            echo "                            </tbody>
                        </table>
                    </div>
                    <div class=\"grid_footer\">
                        ";
            // line 104
            if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isPagerSectionVisible")) {
                // line 105
                echo "                            ";
                $this->displayBlock('grid_pager', $context, $blocks);
                // line 138
                echo "                        ";
            }
            // line 139
            echo "                        ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "exports")) > 0)) {
                // line 140
                echo "                            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("exports", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
                        ";
            }
            // line 142
            echo "                        ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "tweaks")) > 0)) {
                // line 143
                echo "                            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("tweaks", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
                        ";
            }
            // line 145
            echo "                    </div>
                    ";
            // line 146
            if ((isset($context["withjs"]) ? $context["withjs"] : $this->getContext($context, "withjs"))) {
                // line 147
                echo "                        ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
                    ";
            }
            // line 149
            echo "                </form>
            ";
        } else {
            // line 151
            echo "                <br>";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("no_data", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
            ";
        }
        // line 153
        echo "        </div>
    ";
    }

    // line 8
    public function block_grid_search($context, array $blocks = array())
    {
        // line 9
        echo "                ";
        if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isFilterSectionVisible")) {
            // line 10
            echo "                    <div class=\"grid-search\">
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
                    echo "                                            ";
                    $context["columnTitle"] = ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title"));
                    // line 18
                    echo "                                            <td><div class=\"";
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
            echo "                                    <td valign=\"bottom\">
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
        echo "            ";
    }

    // line 48
    public function block_grid_titles($context, array $blocks = array())
    {
        // line 49
        echo "                            <thead>
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
            echo "                                    ";
            if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                // line 53
                echo "                                        <th class=\"";
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
                echo "                                                ";
                if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "type") == "massaction")) {
                    // line 56
                    echo "                                                    <input type=\"checkbox\" class=\"grid-mass-selector\" onclick=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
                    echo "_markVisible(this.checked);\"/>
                                                ";
                } else {
                    // line 58
                    echo "                                                    ";
                    $context["columnTitle"] = (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title")) . "__abbr");
                    // line 59
                    echo "                                                    ";
                    if (($this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))) == (isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle")))) {
                        // line 60
                        echo "                                                        ";
                        $context["columnTitle"] = ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title"));
                        // line 61
                        echo "                                                    ";
                    }
                    // line 62
                    echo "                                                    ";
                    if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "sortable")) {
                        // line 63
                        echo "                                                        <a class=\"order\" href=\"";
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
                            echo "                                                            <a class=\"order\" href=\"";
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
                            echo "                                                            <a class=\"order\" href=\"";
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
                        echo "                                                    ";
                    } else {
                        // line 71
                        echo "                                                        ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                        echo "
                                                    ";
                    }
                    // line 73
                    echo "                                                ";
                }
                // line 74
                echo "                                            ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 75
                echo "</th>
                                    ";
            }
            // line 77
            echo "                                ";
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
        echo "                            </tr>

                            ";
    }

    // line 83
    public function block_grid_rows($context, array $blocks = array())
    {
        // line 84
        echo "                                ";
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
            echo "                                    ";
            $context["last_row"] = $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "last");
            // line 86
            echo "                                    ";
            ob_start();
            // line 87
            echo "                                        <tr";
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
                echo "                                            ";
                if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                    // line 90
                    echo "                                                <td class=\"grid-column-";
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
                echo "                                        ";
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
            echo "                                    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 94
            echo "                                    </tr>
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
            echo "                                    ";
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
        echo "                                ";
        if ((isset($context["pagerfanta"]) ? $context["pagerfanta"] : $this->getContext($context, "pagerfanta"))) {
            // line 107
            echo "                                    ";
            echo $this->env->getExtension('datagrid_twig_extension')->getPagerfanta((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
                                ";
        } else {
            // line 109
            echo "                                    <div class=\"pager\" >
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
                echo "                                                            <option value=\"";
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
            echo "                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                ";
        }
        // line 137
        echo "                            ";
    }

    public function getTemplateName()
    {
        return "LoginLoginBundle:Multiparam:multiparamgrid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  622 => 137,  615 => 132,  600 => 130,  596 => 129,  592 => 128,  585 => 125,  575 => 122,  567 => 119,  557 => 116,  551 => 113,  547 => 112,  542 => 109,  536 => 107,  533 => 106,  530 => 105,  525 => 98,  516 => 96,  502 => 94,  499 => 93,  485 => 92,  463 => 90,  460 => 89,  443 => 88,  428 => 87,  425 => 86,  422 => 85,  403 => 84,  400 => 83,  394 => 78,  380 => 77,  376 => 75,  373 => 74,  370 => 73,  364 => 71,  361 => 70,  349 => 68,  337 => 66,  335 => 65,  323 => 63,  320 => 62,  317 => 61,  314 => 60,  311 => 59,  308 => 58,  302 => 56,  299 => 55,  297 => 54,  277 => 53,  274 => 52,  257 => 51,  253 => 49,  250 => 48,  246 => 30,  236 => 23,  233 => 22,  218 => 20,  208 => 18,  205 => 17,  203 => 16,  200 => 15,  183 => 14,  175 => 11,  172 => 10,  169 => 9,  166 => 8,  161 => 153,  155 => 151,  151 => 149,  145 => 147,  143 => 146,  140 => 145,  134 => 143,  131 => 142,  125 => 140,  122 => 139,  119 => 138,  116 => 105,  114 => 104,  108 => 100,  106 => 83,  102 => 81,  100 => 48,  95 => 45,  89 => 43,  87 => 42,  80 => 40,  76 => 38,  74 => 37,  71 => 36,  63 => 33,  60 => 32,  57 => 31,  55 => 8,  52 => 7,  46 => 6,  41 => 4,  36 => 3,  33 => 2,);
    }
}

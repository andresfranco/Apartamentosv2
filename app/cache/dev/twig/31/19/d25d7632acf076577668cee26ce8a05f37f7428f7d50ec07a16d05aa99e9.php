<?php

/* APYDataGridBundle::blocks.html.twig */
class __TwigTemplate_3119d25d7632acf076577668cee26ce8a05f37f7428f7d50ec07a16d05aa99e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'grid' => array($this, 'block_grid'),
            'grid_no_data' => array($this, 'block_grid_no_data'),
            'grid_no_result' => array($this, 'block_grid_no_result'),
            'grid_titles' => array($this, 'block_grid_titles'),
            'grid_filters' => array($this, 'block_grid_filters'),
            'grid_search' => array($this, 'block_grid_search'),
            'grid_rows' => array($this, 'block_grid_rows'),
            'grid_pager' => array($this, 'block_grid_pager'),
            'grid_pager_totalcount' => array($this, 'block_grid_pager_totalcount'),
            'grid_pager_selectpage' => array($this, 'block_grid_pager_selectpage'),
            'grid_pager_results_perpage' => array($this, 'block_grid_pager_results_perpage'),
            'grid_actions' => array($this, 'block_grid_actions'),
            'grid_exports' => array($this, 'block_grid_exports'),
            'grid_tweaks' => array($this, 'block_grid_tweaks'),
            'grid_column_actions_cell' => array($this, 'block_grid_column_actions_cell'),
            'grid_column_massaction_cell' => array($this, 'block_grid_column_massaction_cell'),
            'grid_column_boolean_cell' => array($this, 'block_grid_column_boolean_cell'),
            'grid_column_array_cell' => array($this, 'block_grid_column_array_cell'),
            'grid_column_cell' => array($this, 'block_grid_column_cell'),
            'grid_column_operator' => array($this, 'block_grid_column_operator'),
            'grid_column_filter_type_input' => array($this, 'block_grid_column_filter_type_input'),
            'grid_column_filter_type_select' => array($this, 'block_grid_column_filter_type_select'),
            'grid_column_filter_type_massaction' => array($this, 'block_grid_column_filter_type_massaction'),
            'grid_column_filter_type_actions' => array($this, 'block_grid_column_filter_type_actions'),
            'grid_scripts' => array($this, 'block_grid_scripts'),
            'grid_scripts_goto' => array($this, 'block_grid_scripts_goto'),
            'grid_scripts_reset' => array($this, 'block_grid_scripts_reset'),
            'grid_scripts_previous_page' => array($this, 'block_grid_scripts_previous_page'),
            'grid_scripts_next_page' => array($this, 'block_grid_scripts_next_page'),
            'grid_scripts_enter_page' => array($this, 'block_grid_scripts_enter_page'),
            'grid_scripts_results_per_page' => array($this, 'block_grid_scripts_results_per_page'),
            'grid_scripts_mark_visible' => array($this, 'block_grid_scripts_mark_visible'),
            'grid_scripts_mark_all' => array($this, 'block_grid_scripts_mark_all'),
            'grid_scripts_switch_operator' => array($this, 'block_grid_scripts_switch_operator'),
            'grid_scripts_submit_form' => array($this, 'block_grid_scripts_submit_form'),
            'grid_scripts_ajax' => array($this, 'block_grid_scripts_ajax'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('grid', $context, $blocks);
        // line 43
        $this->displayBlock('grid_no_data', $context, $blocks);
        // line 45
        $this->displayBlock('grid_no_result', $context, $blocks);
        // line 59
        $this->displayBlock('grid_titles', $context, $blocks);
        // line 90
        $this->displayBlock('grid_filters', $context, $blocks);
        // line 100
        $this->displayBlock('grid_search', $context, $blocks);
        // line 116
        $this->displayBlock('grid_rows', $context, $blocks);
        // line 136
        $this->displayBlock('grid_pager', $context, $blocks);
        // line 148
        $this->displayBlock('grid_pager_totalcount', $context, $blocks);
        // line 152
        $this->displayBlock('grid_pager_selectpage', $context, $blocks);
        // line 161
        $this->displayBlock('grid_pager_results_perpage', $context, $blocks);
        // line 170
        $this->displayBlock('grid_actions', $context, $blocks);
        // line 195
        $this->displayBlock('grid_exports', $context, $blocks);
        // line 210
        $this->displayBlock('grid_tweaks', $context, $blocks);
        // line 225
        $this->displayBlock('grid_column_actions_cell', $context, $blocks);
        // line 234
        $this->displayBlock('grid_column_massaction_cell', $context, $blocks);
        // line 238
        $this->displayBlock('grid_column_boolean_cell', $context, $blocks);
        // line 242
        $this->displayBlock('grid_column_array_cell', $context, $blocks);
        // line 252
        $this->displayBlock('grid_column_cell', $context, $blocks);
        // line 265
        $this->displayBlock('grid_column_operator', $context, $blocks);
        // line 277
        $this->displayBlock('grid_column_filter_type_input', $context, $blocks);
        // line 294
        $this->displayBlock('grid_column_filter_type_select', $context, $blocks);
        // line 338
        $this->displayBlock('grid_column_filter_type_massaction', $context, $blocks);
        // line 342
        $this->displayBlock('grid_column_filter_type_actions', $context, $blocks);
        // line 345
        echo "


";
        // line 349
        $this->displayBlock('grid_scripts', $context, $blocks);
        // line 364
        echo "
";
        // line 365
        $this->displayBlock('grid_scripts_goto', $context, $blocks);
        // line 373
        echo "
";
        // line 374
        $this->displayBlock('grid_scripts_reset', $context, $blocks);
        // line 382
        echo "
";
        // line 383
        $this->displayBlock('grid_scripts_previous_page', $context, $blocks);
        // line 391
        echo "
";
        // line 392
        $this->displayBlock('grid_scripts_next_page', $context, $blocks);
        // line 400
        echo "
";
        // line 401
        $this->displayBlock('grid_scripts_enter_page', $context, $blocks);
        // line 417
        echo "
";
        // line 418
        $this->displayBlock('grid_scripts_results_per_page', $context, $blocks);
        // line 426
        echo "
";
        // line 427
        $this->displayBlock('grid_scripts_mark_visible', $context, $blocks);
        // line 456
        echo "
";
        // line 457
        $this->displayBlock('grid_scripts_mark_all', $context, $blocks);
        // line 481
        echo "
";
        // line 482
        $this->displayBlock('grid_scripts_switch_operator', $context, $blocks);
        // line 513
        echo "
";
        // line 514
        $this->displayBlock('grid_scripts_submit_form', $context, $blocks);
        // line 530
        echo "
";
        // line 531
        $this->displayBlock('grid_scripts_ajax', $context, $blocks);
    }

    // line 2
    public function block_grid($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"grid\">
";
        // line 4
        if (((($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount") > 0) || $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isFiltered")) || ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "noDataMessage") === false))) {
            // line 5
            echo "    <form id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "routeUrl"), "html", null, true);
            echo "\" method=\"post\">
        <div class=\"grid_header\">
        ";
            // line 7
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "massActions")) > 0)) {
                // line 8
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("actions", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 10
            echo "        </div>
        <div class=\"grid_body\">
        <table>
        ";
            // line 13
            if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isTitleSectionVisible")) {
                // line 14
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("titles", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 16
            echo "        ";
            if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isFilterSectionVisible")) {
                // line 17
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("filters", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 19
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("rows", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
        </table>
        </div>
        <div class=\"grid_footer\">
        ";
            // line 23
            if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isPagerSectionVisible")) {
                // line 24
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGridPager((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 26
            echo "        ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "exports")) > 0)) {
                // line 27
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("exports", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 29
            echo "        ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "tweaks")) > 0)) {
                // line 30
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("tweaks", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 32
            echo "        </div>
        ";
            // line 33
            if ((isset($context["withjs"]) ? $context["withjs"] : $this->getContext($context, "withjs"))) {
                // line 34
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                echo "
        ";
            }
            // line 36
            echo "    </form>
";
        } else {
            // line 38
            echo "    ";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("no_data", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
";
        }
        // line 40
        echo "</div>
";
    }

    // line 43
    public function block_grid_no_data($context, array $blocks = array())
    {
        echo "<p class=\"no_data\">";
        echo $this->env->getExtension('translator')->trans((($this->getAttribute((isset($context["grid"]) ? $context["grid"] : null), "noDataMessage", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["grid"]) ? $context["grid"] : null), "noDataMessage"), "No data")) : ("No data")));
        echo "</p>";
    }

    // line 45
    public function block_grid_no_result($context, array $blocks = array())
    {
        // line 46
        ob_start();
        // line 47
        $context["nbColumns"] = 0;
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "columns"));
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 49
            echo "    ";
            if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                // line 50
                echo "        ";
                $context["nbColumns"] = ((isset($context["nbColumns"]) ? $context["nbColumns"] : $this->getContext($context, "nbColumns")) + 1);
                // line 51
                echo "    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "<tr class=\"grid-row-cells\">
    <td class=\"last-column last-row\" colspan=\"";
        // line 54
        echo twig_escape_filter($this->env, (isset($context["nbColumns"]) ? $context["nbColumns"] : $this->getContext($context, "nbColumns")), "html", null, true);
        echo "\" style=\"text-align: center;\">";
        echo $this->env->getExtension('translator')->trans((($this->getAttribute((isset($context["grid"]) ? $context["grid"] : null), "noResultMessage", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["grid"]) ? $context["grid"] : null), "noResultMessage"), "No result")) : ("No result")));
        echo "</td>
</tr>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 59
    public function block_grid_titles($context, array $blocks = array())
    {
        // line 60
        echo "    <tr class=\"grid-row-titles\">
    ";
        // line 61
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
            // line 62
            echo "        ";
            if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                // line 63
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
                // line 64
                ob_start();
                // line 65
                echo "            ";
                if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "type") == "massaction")) {
                    // line 66
                    echo "                <input type=\"checkbox\" class=\"grid-mass-selector\" onclick=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
                    echo "_markVisible(this.checked);\"/>
            ";
                } else {
                    // line 68
                    echo "                ";
                    $context["columnTitle"] = (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title")) . "__abbr");
                    // line 69
                    echo "                ";
                    if (($this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))) == (isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle")))) {
                        // line 70
                        echo "                    ";
                        $context["columnTitle"] = ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title"));
                        // line 71
                        echo "                ";
                    }
                    // line 72
                    echo "                ";
                    if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "sortable")) {
                        // line 73
                        echo "                    <a class=\"order\" href=\"";
                        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("order", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")));
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Order by"), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                        echo "</a>
                    ";
                        // line 74
                        if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "order") == "asc")) {
                            // line 75
                            echo "                        <div class=\"sort_up\"></div>
                    ";
                        } elseif (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "order") == "desc")) {
                            // line 77
                            echo "                        <div class=\"sort_down\"></div>
                    ";
                        }
                        // line 79
                        echo "                ";
                    } else {
                        // line 80
                        echo "                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                        echo "
                ";
                    }
                    // line 82
                    echo "            ";
                }
                // line 83
                echo "            ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 84
                echo "</th>
        ";
            }
            // line 86
            echo "    ";
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
        // line 87
        echo "    </tr>
";
    }

    // line 90
    public function block_grid_filters($context, array $blocks = array())
    {
        // line 91
        echo "    <tr class=\"grid-row-filters\">
    ";
        // line 92
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
            // line 93
            echo "        ";
            if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                // line 94
                echo "        <th class=\"";
                if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "class")) {
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
                if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "filterable")) {
                    echo $this->env->getExtension('datagrid_twig_extension')->getGridFilter((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
                }
                echo "</th>
        ";
            }
            // line 96
            echo "    ";
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
        // line 97
        echo "    </tr>
";
    }

    // line 100
    public function block_grid_search($context, array $blocks = array())
    {
        // line 101
        if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isFilterSectionVisible")) {
            // line 102
            echo "    <div class=\"grid-search\">
        <form id=\"";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_search\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "routeUrl"), "html", null, true);
            echo "\" method=\"post\">
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
                if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "isFilterable") && !twig_in_filter($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "type"), array(0 => "actions", 1 => "massaction")))) {
                    // line 106
                    echo "                ";
                    $context["columnTitle"] = ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "prefixTitle") . $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "title"));
                    // line 107
                    echo "                <div class=\"";
                    echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index")), "html", null, true);
                    echo "\"><label>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["columnTitle"]) ? $context["columnTitle"] : $this->getContext($context, "columnTitle"))), "html", null, true);
                    echo "</label>";
                    echo $this->env->getExtension('datagrid_twig_extension')->getGridFilter((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), false);
                    echo "</div>
            ";
                }
                // line 109
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
            // line 110
            echo "            <div class=\"grid-search-action\"><input type=\"submit\" class=\"grid-search-submit\" value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Search"), "html", null, true);
            echo "\"/><input type=\"button\" class=\"grid-search-reset\" value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reset"), "html", null, true);
            echo "\" onclick=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_reset();\"/></div>
        </form>
    </div>
";
        }
    }

    // line 116
    public function block_grid_rows($context, array $blocks = array())
    {
        // line 117
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
            // line 118
            echo "    ";
            $context["last_row"] = $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "last");
            // line 119
            echo "    ";
            ob_start();
            // line 120
            echo "        ";
            ob_start();
            // line 121
            echo "            ";
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
                // line 122
                echo "                ";
                if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "visible", array(0 => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isReadyForExport")), "method")) {
                    // line 123
                    echo "                    <td class=\"grid-column-";
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
                // line 125
                echo "            ";
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
            // line 126
            echo "        ";
            $context["gridColumns"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 127
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
            // line 128
            echo twig_escape_filter($this->env, (isset($context["gridColumns"]) ? $context["gridColumns"] : $this->getContext($context, "gridColumns")), "html", null, true);
            echo "
    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 130
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
            // line 132
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("no_result", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 136
    public function block_grid_pager($context, array $blocks = array())
    {
        // line 137
        echo "    ";
        if ((isset($context["pagerfanta"]) ? $context["pagerfanta"] : $this->getContext($context, "pagerfanta"))) {
            // line 138
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getPagerfanta((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
    ";
        } else {
            // line 140
            echo "        <div class=\"pager\" style=\"float:left\">
            ";
            // line 141
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("pager_totalcount", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
            ";
            // line 142
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("pager_selectpage", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
            ";
            // line 143
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("pager_results_perpage", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
            echo "
        </div>
    ";
        }
    }

    // line 148
    public function block_grid_pager_totalcount($context, array $blocks = array())
    {
        // line 149
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->transchoice("%count% Results, ", $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount"), array("%count%" => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount"))), "html", null, true);
        echo "
";
    }

    // line 152
    public function block_grid_pager_selectpage($context, array $blocks = array())
    {
        // line 153
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Page"), "html", null, true);
        echo "
";
        // line 154
        ob_start();
        // line 155
        echo "<input type=\"button\" class=\"prev\" ";
        if (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") <= 0)) {
            echo "disabled=\"disabled\"";
        }
        echo " value=\"<\" onclick=\"return ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_previousPage();\"/>
<input type=\"text\" class=\"current\" value=\"";
        // line 156
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") + 1), "html", null, true);
        echo "\" size=\"2\" onkeypress=\"return ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_enterPage(event, parseInt(this.value)-1);\"/>
<input type=\"button\" value=\">\" class=\"next\" ";
        // line 157
        if (($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") >= ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "pageCount") - 1))) {
            echo "disabled=\"disabled\"";
        }
        echo " onclick=\"return ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_nextPage();\"/> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("of %count%", array("%count%" => $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "pageCount"))), "html", null, true);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 161
    public function block_grid_pager_results_perpage($context, array $blocks = array())
    {
        // line 162
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(", Display"), "html", null, true);
        echo "
<select onchange=\"return ";
        // line 163
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_resultsPerPage(this.value);\">
";
        // line 164
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "limits"));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 165
            echo "    <option value=\"";
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
        // line 167
        echo "</select> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Items per page"), "html", null, true);
        echo "
";
    }

    // line 170
    public function block_grid_actions($context, array $blocks = array())
    {
        // line 171
        echo "<div class=\"mass-actions\">
    <span class=\"grid_massactions_helper\">
        <a href=\"#\" onclick=\"return ";
        // line 173
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_markVisible(true);\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Select visible"), "html", null, true);
        echo "</a> |
        <a href=\"#\" onclick=\"return ";
        // line 174
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_markVisible(false);\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Deselect visible"), "html", null, true);
        echo "</a> |
        <a href=\"#\" onclick=\"return ";
        // line 175
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_markAll(true);\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Select all"), "html", null, true);
        echo "</a> |
        <a href=\"#\" onclick=\"return ";
        // line 176
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_markAll(false);\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Deselect all"), "html", null, true);
        echo "</a>
        <span class=\"mass-actions-selected\" id=\"";
        // line 177
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_mass_action_selected\"></span>
    </span>
    ";
        // line 179
        ob_start();
        // line 180
        echo "    <div style=\"float:right;\" class=\"grid_massactions\">
        ";
        // line 181
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Action"), "html", null, true);
        echo "
        <input type=\"hidden\" id=\"";
        // line 182
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_mass_action_all\" name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, twig_constant("APY\\DataGridBundle\\Grid\\Grid::REQUEST_QUERY_MASS_ACTION_ALL_KEYS_SELECTED"), "html", null, true);
        echo "]\" value=\"0\"/>
        <select name=\"";
        // line 183
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, twig_constant("APY\\DataGridBundle\\Grid\\Grid::REQUEST_QUERY_MASS_ACTION"), "html", null, true);
        echo "]\">
            <option value=\"-1\"></option>
            ";
        // line 185
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "massActions"));
        foreach ($context['_seq'] as $context["key"] => $context["massAction"]) {
            // line 186
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["massAction"]) ? $context["massAction"] : $this->getContext($context, "massAction")), "title")), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['massAction'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 188
        echo "        </select>
        <input type=\"submit\"  value=\"";
        // line 189
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Submit Action"), "html", null, true);
        echo "\"/>
    </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 192
        echo "</div>
";
    }

    // line 195
    public function block_grid_exports($context, array $blocks = array())
    {
        // line 196
        echo "<div class=\"exports\" style=\"float:right\">
    ";
        // line 197
        ob_start();
        // line 198
        echo "        ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Export"), "html", null, true);
        echo "
            <select name=\"";
        // line 199
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, twig_constant("APY\\DataGridBundle\\Grid\\Grid::REQUEST_QUERY_EXPORT"), "html", null, true);
        echo "]\">
            <option value=\"-1\"></option>
            ";
        // line 201
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "exports"));
        foreach ($context['_seq'] as $context["key"] => $context["export"]) {
            // line 202
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["export"]) ? $context["export"] : $this->getContext($context, "export")), "title")), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['export'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 204
        echo "        </select>
        <input type=\"submit\" value=\"";
        // line 205
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Export"), "html", null, true);
        echo "\"/>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 207
        echo "</div>
";
    }

    // line 210
    public function block_grid_tweaks($context, array $blocks = array())
    {
        // line 211
        echo "<div class=\"tweaks\" style=\"float:right\">
    ";
        // line 212
        ob_start();
        // line 213
        echo "        ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Tweaks"), "html", null, true);
        echo "
            <select name=\"";
        // line 214
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, twig_constant("APY\\DataGridBundle\\Grid\\Grid::REQUEST_QUERY_TWEAK"), "html", null, true);
        echo "]\">
            <option value=\"\"></option>
            ";
        // line 216
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "tweaks"));
        foreach ($context['_seq'] as $context["key"] => $context["tweak"]) {
            // line 217
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["tweak"]) ? $context["tweak"] : $this->getContext($context, "tweak")), "title")), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['tweak'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 219
        echo "        </select>
        <input type=\"submit\" value=\"";
        // line 220
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Tweak"), "html", null, true);
        echo "\"/>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 222
        echo "</div>
";
    }

    // line 225
    public function block_grid_column_actions_cell($context, array $blocks = array())
    {
        // line 226
        echo "    ";
        $context["actions"] = $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "getActionsToRender", array(0 => (isset($context["row"]) ? $context["row"] : $this->getContext($context, "row"))), "method");
        // line 227
        echo "    <ul class=\"grid-row-actions\">
    ";
        // line 228
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["actions"]) ? $context["actions"] : $this->getContext($context, "actions")));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 229
            echo "        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "route"), $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "routeParameters", array(0 => (isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 1 => (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action"))), "method"), false), "html", null, true);
            echo "\" target=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "target"), "html", null, true);
            echo "\"";
            if ($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "confirm")) {
                echo " onclick=\"return confirm('";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "confirmMessage"), "html", null, true);
                echo "')\"";
            }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "attributes"));
            foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                echo " ";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
                echo "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "title")), "html", null, true);
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 231
        echo "    </ul>
";
    }

    // line 234
    public function block_grid_column_massaction_cell($context, array $blocks = array())
    {
        // line 235
        echo "    <input type=\"checkbox\" class=\"action\" value=\"1\" name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
        echo "][";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "primaryFieldValue"), "html", null, true);
        echo "]\"/>
";
    }

    // line 238
    public function block_grid_column_boolean_cell($context, array $blocks = array())
    {
        // line 239
        echo "    <span class=\"grid_boolean_";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
        echo "\">";
        $this->displayBlock("grid_column_cell", $context, $blocks);
        echo "</span>
";
    }

    // line 242
    public function block_grid_column_array_cell($context, array $blocks = array())
    {
        // line 243
        $context["sourceValues"] = $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "field", array(0 => $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id")), "method");
        // line 244
        $context["values"] = (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"));
        // line 245
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["values"]) ? $context["values"] : $this->getContext($context, "values")));
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
        foreach ($context['_seq'] as $context["key"] => $context["index"]) {
            // line 246
            $context["value"] = (isset($context["index"]) ? $context["index"] : $this->getContext($context, "index"));
            // line 247
            echo "    ";
            $context["sourceValue"] = $this->getAttribute((isset($context["sourceValues"]) ? $context["sourceValues"] : $this->getContext($context, "sourceValues")), (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), array(), "array");
            // line 248
            echo "    ";
            $this->displayBlock("grid_column_cell", $context, $blocks);
            echo $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "separator");
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['index'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 252
    public function block_grid_column_cell($context, array $blocks = array())
    {
        // line 253
        ob_start();
        // line 254
        if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "filterable") && $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "searchOnClick"))) {
            // line 255
            echo "    ";
            $context["sourceValue"] = ((array_key_exists("sourceValue", $context)) ? ((isset($context["sourceValue"]) ? $context["sourceValue"] : $this->getContext($context, "sourceValue"))) : ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "field", array(0 => $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id")), "method")));
            // line 256
            echo "    <a href=\"?";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
            echo "][from]=";
            echo twig_escape_filter($this->env, twig_urlencode_filter((isset($context["sourceValue"]) ? $context["sourceValue"] : $this->getContext($context, "sourceValue"))), "html", null, true);
            echo "\" class=\"searchOnClick\">";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
            echo "</a>
";
        } elseif (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "safe") === false)) {
            // line 258
            echo "    ";
            echo (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"));
            echo "
";
        } else {
            // line 260
            echo "    ";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "safe"));
            echo "
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 265
    public function block_grid_column_operator($context, array $blocks = array())
    {
        // line 266
        if ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "operatorsVisible")) {
            // line 267
            echo "<span class=\"grid-filter-operator\">
    <select name=\"";
            // line 268
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
            echo "][operator]\" onchange=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_switchOperator(this, '";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "__";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
            echo "__query__'";
            if (((isset($context["submitOnChange"]) ? $context["submitOnChange"] : $this->getContext($context, "submitOnChange")) === false)) {
                echo ", false";
            }
            echo ");\">
    ";
            // line 269
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "operators"));
            foreach ($context['_seq'] as $context["_key"] => $context["operator"]) {
                // line 270
                echo "        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["operator"]) ? $context["operator"] : $this->getContext($context, "operator")), "html", null, true);
                echo "\"";
                if (((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["operator"]) ? $context["operator"] : $this->getContext($context, "operator")))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["operator"]) ? $context["operator"] : $this->getContext($context, "operator"))), "html", null, true);
                echo "</option>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['operator'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 272
            echo "    </select>
</span>
";
        }
    }

    // line 277
    public function block_grid_column_filter_type_input($context, array $blocks = array())
    {
        // line 278
        $context["btwOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTW");
        // line 279
        $context["btweOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTWE");
        // line 280
        $context["isNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNULL");
        // line 281
        $context["isNotNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNOTNULL");
        // line 282
        $context["op"] = (($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : null), "data", array(), "any", false, true), "operator", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "data"), "operator")) : ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "defaultOperator")));
        // line 283
        $context["from"] = (($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : null), "data", array(), "any", false, true), "from", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "data"), "from")) : (null));
        // line 284
        $context["to"] = (($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : null), "data", array(), "any", false, true), "to", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "data"), "to")) : (null));
        // line 285
        echo "<span class=\"grid-filter-input\">
    ";
        // line 286
        echo $this->env->getExtension('datagrid_twig_extension')->getGridColumnOperator((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), (isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")), (isset($context["submitOnChange"]) ? $context["submitOnChange"] : $this->getContext($context, "submitOnChange")));
        echo "
    <span class=\"grid-filter-input-query\">
        <input type=\"";
        // line 288
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "inputType"), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["from"]) ? $context["from"] : $this->getContext($context, "from")), "html", null, true);
        echo "\" class=\"grid-filter-input-query-from\" name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
        echo "][from]\" id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "__";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
        echo "__query__from\" ";
        if (((isset($context["submitOnChange"]) ? $context["submitOnChange"] : $this->getContext($context, "submitOnChange")) === true)) {
            echo "onkeypress=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_submitForm(event, this.form);\"";
        }
        echo " ";
        echo (((((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["isNullOperator"]) ? $context["isNullOperator"] : $this->getContext($context, "isNullOperator"))) || ((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["isNotNullOperator"]) ? $context["isNotNullOperator"] : $this->getContext($context, "isNotNullOperator"))))) ? ("style=\"display: none;\" disabled=\"disabled\"") : (""));
        echo " />
        <input type=\"";
        // line 289
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "inputType"), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["to"]) ? $context["to"] : $this->getContext($context, "to")), "html", null, true);
        echo "\" class=\"grid-filter-input-query-to\" name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
        echo "][to]\" id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "__";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
        echo "__query__to\" ";
        if (((isset($context["submitOnChange"]) ? $context["submitOnChange"] : $this->getContext($context, "submitOnChange")) === true)) {
            echo "onkeypress=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "_submitForm(event, this.form);\"";
        }
        echo " ";
        echo (((((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["btwOperator"]) ? $context["btwOperator"] : $this->getContext($context, "btwOperator"))) || ((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["btweOperator"]) ? $context["btweOperator"] : $this->getContext($context, "btweOperator"))))) ? ("") : ("style=\"display: none;\" disabled=\"disabled\""));
        echo " />
    </span>
</span>
";
    }

    // line 294
    public function block_grid_column_filter_type_select($context, array $blocks = array())
    {
        // line 295
        $context["btwOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTW");
        // line 296
        $context["btweOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTWE");
        // line 297
        $context["isNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNULL");
        // line 298
        $context["isNotNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNOTNULL");
        // line 299
        $context["op"] = (($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : null), "data", array(), "any", false, true), "operator", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "data"), "operator")) : ($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "defaultOperator")));
        // line 300
        $context["from"] = (($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : null), "data", array(), "any", false, true), "from", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "data"), "from")) : (null));
        // line 301
        $context["to"] = (($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : null), "data", array(), "any", false, true), "to", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "data"), "to")) : (null));
        // line 302
        $context["multiple"] = $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "selectMulti");
        // line 303
        $context["expanded"] = $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "selectExpanded");
        // line 304
        echo "<span class=\"grid-filter-select\">
    ";
        // line 305
        echo $this->env->getExtension('datagrid_twig_extension')->getGridColumnOperator((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), (isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")), (isset($context["submitOnChange"]) ? $context["submitOnChange"] : $this->getContext($context, "submitOnChange")));
        echo "
    <span class=\"grid-filter-select-query\">
    ";
        // line 307
        if ((isset($context["expanded"]) ? $context["expanded"] : $this->getContext($context, "expanded"))) {
            // line 308
            echo "        <span class=\"grid-filter-select-query-from\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "__";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
            echo "__query__from\" ";
            echo (((((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["isNullOperator"]) ? $context["isNullOperator"] : $this->getContext($context, "isNullOperator"))) || ((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["isNotNullOperator"]) ? $context["isNotNullOperator"] : $this->getContext($context, "isNotNullOperator"))))) ? ("style=\"display: none;\" disabled=\"disabled\"") : (""));
            echo ">
        ";
            // line 309
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "values"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 310
                echo "            <span><input type=\"";
                if ((isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple"))) {
                    echo "checkbox";
                } else {
                    echo "radio";
                }
                echo "\" name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
                echo "[";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
                echo "][from][]\" value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
                echo "\" ";
                if (twig_in_filter((isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), (isset($context["from"]) ? $context["from"] : $this->getContext($context, "from")))) {
                    echo " checked=\"checked\"";
                }
                echo " ";
                if (((isset($context["submitOnChange"]) ? $context["submitOnChange"] : $this->getContext($context, "submitOnChange")) === true)) {
                    echo "onclick=\"return ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
                    echo "_submitForm(event, this.form);\"";
                }
                echo "/><label>";
                echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
                echo "</label></span>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 312
            echo "        </span>
        <span class=\"grid-filter-select-query-to\" id=\"";
            // line 313
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "__";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
            echo "__query__to\" ";
            echo (((((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["btwOperator"]) ? $context["btwOperator"] : $this->getContext($context, "btwOperator"))) || ((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["btweOperator"]) ? $context["btweOperator"] : $this->getContext($context, "btweOperator"))))) ? ("") : ("style=\"display: none;\" disabled=\"disabled\""));
            echo ">
        ";
            // line 314
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "values"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 315
                echo "            <span><input type=\"";
                if ((isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple"))) {
                    echo "checkbox";
                } else {
                    echo "radio";
                }
                echo "\" name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
                echo "[";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
                echo "][to]\" value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
                echo "\" ";
                if (((!(null === (isset($context["to"]) ? $context["to"] : $this->getContext($context, "to")))) && ((isset($context["to"]) ? $context["to"] : $this->getContext($context, "to")) == (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key"))))) {
                    echo " checked=\"checked\"";
                }
                echo " ";
                if (((isset($context["submitOnChange"]) ? $context["submitOnChange"] : $this->getContext($context, "submitOnChange")) === true)) {
                    echo "onclick=\"return ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
                    echo "_submitForm(event, this.form);\"";
                }
                echo "/><label>";
                echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
                echo "</label></span>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 317
            echo "        </span>
        ";
            // line 318
            if ((isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple"))) {
                echo "<input type=\"submit\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Go"), "html", null, true);
                echo "\" />";
            }
            // line 319
            echo "    ";
        } else {
            // line 320
            echo "        <select";
            if ((isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple"))) {
                echo " multiple=\"multiple\"";
            }
            echo " name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
            echo "][from][]\" class=\"grid-filter-select-query-from\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "__";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
            echo "__query__from\" ";
            if (((isset($context["submitOnChange"]) ? $context["submitOnChange"] : $this->getContext($context, "submitOnChange")) === true)) {
                echo "onchange=\"return ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
                echo "_submitForm(event, this.form);\"";
            }
            echo " ";
            echo (((((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["isNullOperator"]) ? $context["isNullOperator"] : $this->getContext($context, "isNullOperator"))) || ((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["isNotNullOperator"]) ? $context["isNotNullOperator"] : $this->getContext($context, "isNotNullOperator"))))) ? ("style=\"display: none;\" disabled=\"disabled\"") : (""));
            echo ">
            <option value=\"\">&nbsp;</option>
            ";
            // line 322
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "values"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 323
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
                echo "\"";
                if (twig_in_filter((isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), (isset($context["from"]) ? $context["from"] : $this->getContext($context, "from")))) {
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
            // line 325
            echo "        </select>
        <select name=\"";
            // line 326
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
            echo "][to]\" class=\"grid-filter-select-query-to\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
            echo "__";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "id"), "html", null, true);
            echo "__query__to\" ";
            if (((isset($context["submitOnChange"]) ? $context["submitOnChange"] : $this->getContext($context, "submitOnChange")) === true)) {
                echo "onchange=\"return ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
                echo "_submitForm(event, this.form);\"";
            }
            echo " ";
            echo (((((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["btwOperator"]) ? $context["btwOperator"] : $this->getContext($context, "btwOperator"))) || ((isset($context["op"]) ? $context["op"] : $this->getContext($context, "op")) == (isset($context["btweOperator"]) ? $context["btweOperator"] : $this->getContext($context, "btweOperator"))))) ? ("") : ("style=\"display: none;\" disabled=\"disabled\""));
            echo ">
            <option value=\"\">&nbsp;</option>
            ";
            // line 328
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "values"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 329
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
                echo "\"";
                if (((!(null === (isset($context["to"]) ? $context["to"] : $this->getContext($context, "to")))) && ((isset($context["to"]) ? $context["to"] : $this->getContext($context, "to")) == (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key"))))) {
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
            // line 331
            echo "        </select>
        ";
            // line 332
            if ((isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple"))) {
                echo "<input type=\"submit\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Go"), "html", null, true);
                echo "\" />";
            }
            // line 333
            echo "    ";
        }
        // line 334
        echo "    </span>
</span>
";
    }

    // line 338
    public function block_grid_column_filter_type_massaction($context, array $blocks = array())
    {
        // line 339
        echo "    <input type=\"button\" class=\"grid-search-reset\" value=\"R\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reset"), "html", null, true);
        echo "\" onclick=\"return ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_reset();\"/>
";
    }

    // line 342
    public function block_grid_column_filter_type_actions($context, array $blocks = array())
    {
        // line 343
        echo "    <a class=\"grid-reset\" href=\"";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("reset", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reset"), "html", null, true);
        echo "</a>
";
    }

    // line 349
    public function block_grid_scripts($context, array $blocks = array())
    {
        // line 350
        echo "<script type=\"text/javascript\">
";
        // line 351
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_goto", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "
";
        // line 352
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_reset", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "
";
        // line 353
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_previous_page", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "
";
        // line 354
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_next_page", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "
";
        // line 355
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_enter_page", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "
";
        // line 356
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_results_per_page", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "
";
        // line 357
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_mark_visible", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "
";
        // line 358
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_mark_all", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "
";
        // line 359
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_switch_operator", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "
";
        // line 360
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_submit_form", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "
";
        // line 361
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_ajax", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "
</script>
";
    }

    // line 365
    public function block_grid_scripts_goto($context, array $blocks = array())
    {
        // line 366
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_goto(url)
{
    window.location.href = url;

    return false;
}
";
    }

    // line 374
    public function block_grid_scripts_reset($context, array $blocks = array())
    {
        // line 375
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_reset()
{
    ";
        // line 377
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_goto('";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("reset", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "');

    return false;
}
";
    }

    // line 383
    public function block_grid_scripts_previous_page($context, array $blocks = array())
    {
        // line 384
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_previousPage()
{
    ";
        // line 386
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_goto('";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("page", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") - 1));
        echo "');

    return false;
}
";
    }

    // line 392
    public function block_grid_scripts_next_page($context, array $blocks = array())
    {
        // line 393
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_nextPage()
{
    ";
        // line 395
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_goto('";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("page", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "page") + 1));
        echo "');

    return false;
}
";
    }

    // line 401
    public function block_grid_scripts_enter_page($context, array $blocks = array())
    {
        // line 402
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_enterPage(event, page)
{
    key = event.which;

    if (window.event) {
        key = window.event.keyCode; //IE
    }

    if (key == 13) {
        ";
        // line 411
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_goto('";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("page", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "' + page);

        return false;
    }
}
";
    }

    // line 418
    public function block_grid_scripts_results_per_page($context, array $blocks = array())
    {
        // line 419
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_resultsPerPage(limit)
{
    ";
        // line 421
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_goto('";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("limit", (isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")));
        echo "' + limit);

    return true;
}
";
    }

    // line 427
    public function block_grid_scripts_mark_visible($context, array $blocks = array())
    {
        // line 428
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_markVisible(select)
{
    var form = document.getElementById('";
        // line 430
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "');

    var counter = 0;

    for (var i=0; i < form.elements.length; i++ ) {
        if (form.elements[i].type == 'checkbox') {
            form.elements[i].checked = select;

            if (form.elements[i].checked){
               counter++;
            }
        }
    }

    ";
        // line 444
        if ($this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "isFilterSectionVisible")) {
            // line 445
            echo "    counter--;
    ";
        }
        // line 447
        echo "
    var selected = document.getElementById('";
        // line 448
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_mass_action_selected');
    selected.innerHTML = counter > 0 ? '";
        // line 449
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Selected _s_ rows"), "html", null, true);
        echo "'.replace('_s_', counter) : '';

    document.getElementById('";
        // line 451
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_mass_action_all').value = '0';

    return false;
}
";
    }

    // line 457
    public function block_grid_scripts_mark_all($context, array $blocks = array())
    {
        // line 458
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_markAll(select)
{
    var form = document.getElementById('";
        // line 460
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "');

    for (var i=0; i < form.elements.length; i++ ) {
        if (form.elements[i].type == 'checkbox') {
            form.elements[i].checked = select;
        }
    }

    var selected = document.getElementById('";
        // line 468
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_mass_action_selected');

    if (select) {
        document.getElementById('";
        // line 471
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_mass_action_all').value = '1';
        selected.innerHTML = '";
        // line 472
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Selected _s_ rows"), "html", null, true);
        echo "'.replace('_s_', '";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "totalCount"), "html", null, true);
        echo "');
    } else {
        document.getElementById('";
        // line 474
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_mass_action_all').value = '0';
        selected.innerHTML = '';
    }

    return false;
}
";
    }

    // line 482
    public function block_grid_scripts_switch_operator($context, array $blocks = array())
    {
        // line 483
        $context["btwOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTW");
        // line 484
        $context["btweOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTWE");
        // line 485
        $context["isNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNULL");
        // line 486
        $context["isNotNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNOTNULL");
        // line 487
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_switchOperator(elt, query_, submitOnChange)
{
\tsubmitOnChange = (typeof submitOnChange == 'undefined') ? true : submitOnChange;
    var inputFrom = document.getElementById(query_+'from');
    var inputTo = document.getElementById(query_+'to');
    if ((elt.options[elt.selectedIndex].value == '";
        // line 492
        echo twig_escape_filter($this->env, (isset($context["btwOperator"]) ? $context["btwOperator"] : $this->getContext($context, "btwOperator")), "html", null, true);
        echo "') || (elt.options[elt.selectedIndex].value == '";
        echo twig_escape_filter($this->env, (isset($context["btweOperator"]) ? $context["btweOperator"] : $this->getContext($context, "btweOperator")), "html", null, true);
        echo "')) {
        inputFrom.style.display = '';
        inputFrom.disabled=false;
        inputTo.style.display = '';
        inputTo.disabled=false;
    } else if ((elt.options[elt.selectedIndex].value == '";
        // line 497
        echo twig_escape_filter($this->env, (isset($context["isNullOperator"]) ? $context["isNullOperator"] : $this->getContext($context, "isNullOperator")), "html", null, true);
        echo "') || (elt.options[elt.selectedIndex].value == '";
        echo twig_escape_filter($this->env, (isset($context["isNotNullOperator"]) ? $context["isNotNullOperator"] : $this->getContext($context, "isNotNullOperator")), "html", null, true);
        echo "')) {
        inputFrom.style.display = 'none';
        inputFrom.disabled=true;
        inputTo.style.display = 'none';
        inputTo.disabled=true;
        if (submitOnChange) {
            elt.form.submit();
        }
    } else {
        inputFrom.style.display = '';
        inputFrom.disabled=false;
        inputTo.style.display = 'none';
        inputTo.disabled=true;
    }
}
";
    }

    // line 514
    public function block_grid_scripts_submit_form($context, array $blocks = array())
    {
        // line 515
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "hash"), "html", null, true);
        echo "_submitForm(event, form)
{
    key = event.which;

    if (window.event) {
        key = window.event.keyCode; //IE
    }

    if (event.type != 'keypress' || key == 13) {
        form.submit();
    }

    return true;
}
";
    }

    // line 531
    public function block_grid_scripts_ajax($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "APYDataGridBundle::blocks.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  1920 => 531,  1900 => 515,  1897 => 514,  1875 => 497,  1865 => 492,  1856 => 487,  1854 => 486,  1852 => 485,  1850 => 484,  1848 => 483,  1845 => 482,  1834 => 474,  1827 => 472,  1823 => 471,  1817 => 468,  1806 => 460,  1800 => 458,  1797 => 457,  1788 => 451,  1783 => 449,  1779 => 448,  1776 => 447,  1772 => 445,  1770 => 444,  1753 => 430,  1747 => 428,  1744 => 427,  1733 => 421,  1727 => 419,  1724 => 418,  1712 => 411,  1699 => 402,  1696 => 401,  1685 => 395,  1679 => 393,  1676 => 392,  1665 => 386,  1659 => 384,  1656 => 383,  1645 => 377,  1639 => 375,  1636 => 374,  1624 => 366,  1621 => 365,  1614 => 361,  1610 => 360,  1606 => 359,  1602 => 358,  1598 => 357,  1594 => 356,  1590 => 355,  1586 => 354,  1582 => 353,  1578 => 352,  1574 => 351,  1571 => 350,  1568 => 349,  1559 => 343,  1556 => 342,  1547 => 339,  1544 => 338,  1538 => 334,  1535 => 333,  1529 => 332,  1526 => 331,  1511 => 329,  1507 => 328,  1488 => 326,  1485 => 325,  1470 => 323,  1466 => 322,  1442 => 320,  1439 => 319,  1433 => 318,  1430 => 317,  1399 => 315,  1395 => 314,  1387 => 313,  1384 => 312,  1353 => 310,  1349 => 309,  1340 => 308,  1338 => 307,  1333 => 305,  1330 => 304,  1328 => 303,  1326 => 302,  1324 => 301,  1322 => 300,  1320 => 299,  1318 => 298,  1316 => 297,  1314 => 296,  1312 => 295,  1309 => 294,  1283 => 289,  1261 => 288,  1256 => 286,  1253 => 285,  1251 => 284,  1249 => 283,  1247 => 282,  1245 => 281,  1243 => 280,  1241 => 279,  1239 => 278,  1236 => 277,  1229 => 272,  1214 => 270,  1210 => 269,  1194 => 268,  1191 => 267,  1189 => 266,  1186 => 265,  1177 => 260,  1171 => 258,  1159 => 256,  1156 => 255,  1154 => 254,  1152 => 253,  1149 => 252,  1131 => 248,  1128 => 247,  1126 => 246,  1109 => 245,  1107 => 244,  1105 => 243,  1102 => 242,  1091 => 239,  1088 => 238,  1077 => 235,  1074 => 234,  1069 => 231,  1038 => 229,  1034 => 228,  1031 => 227,  1028 => 226,  1025 => 225,  1020 => 222,  1015 => 220,  1012 => 219,  1001 => 217,  997 => 216,  990 => 214,  985 => 213,  983 => 212,  980 => 211,  977 => 210,  972 => 207,  967 => 205,  964 => 204,  953 => 202,  949 => 201,  942 => 199,  937 => 198,  935 => 197,  932 => 196,  929 => 195,  924 => 192,  918 => 189,  915 => 188,  904 => 186,  900 => 185,  893 => 183,  885 => 182,  881 => 181,  878 => 180,  876 => 179,  871 => 177,  865 => 176,  859 => 175,  853 => 174,  847 => 173,  843 => 171,  840 => 170,  833 => 167,  818 => 165,  814 => 164,  810 => 163,  806 => 162,  803 => 161,  790 => 157,  784 => 156,  775 => 155,  773 => 154,  769 => 153,  766 => 152,  760 => 149,  757 => 148,  749 => 143,  745 => 142,  741 => 141,  738 => 140,  732 => 138,  729 => 137,  726 => 136,  715 => 132,  701 => 130,  696 => 128,  681 => 127,  678 => 126,  664 => 125,  642 => 123,  639 => 122,  621 => 121,  618 => 120,  612 => 118,  593 => 117,  590 => 116,  576 => 110,  562 => 109,  552 => 107,  549 => 106,  546 => 105,  529 => 104,  523 => 103,  520 => 102,  518 => 101,  515 => 100,  510 => 97,  496 => 96,  475 => 94,  472 => 93,  455 => 92,  452 => 91,  449 => 90,  444 => 87,  430 => 86,  426 => 84,  423 => 83,  420 => 82,  414 => 80,  411 => 79,  407 => 77,  401 => 74,  390 => 73,  387 => 72,  384 => 71,  381 => 70,  378 => 69,  375 => 68,  369 => 66,  366 => 65,  344 => 63,  341 => 62,  324 => 61,  321 => 60,  318 => 59,  305 => 53,  298 => 51,  295 => 50,  292 => 49,  288 => 48,  286 => 47,  284 => 46,  281 => 45,  273 => 43,  268 => 40,  262 => 38,  258 => 36,  252 => 34,  247 => 32,  241 => 30,  238 => 29,  232 => 27,  229 => 26,  223 => 24,  221 => 23,  213 => 19,  207 => 17,  204 => 16,  198 => 14,  196 => 13,  191 => 10,  185 => 8,  173 => 4,  170 => 3,  167 => 2,  163 => 531,  160 => 530,  158 => 514,  153 => 482,  150 => 481,  148 => 457,  138 => 418,  135 => 417,  133 => 401,  130 => 400,  128 => 392,  123 => 383,  120 => 382,  118 => 374,  115 => 373,  113 => 365,  110 => 364,  103 => 345,  101 => 342,  99 => 338,  97 => 294,  93 => 265,  91 => 252,  85 => 234,  83 => 225,  81 => 210,  79 => 195,  77 => 170,  75 => 161,  73 => 152,  69 => 136,  67 => 116,  65 => 100,  61 => 59,  59 => 45,  622 => 137,  615 => 119,  600 => 130,  596 => 129,  592 => 128,  585 => 125,  575 => 122,  567 => 119,  557 => 116,  551 => 113,  547 => 112,  542 => 109,  536 => 107,  533 => 106,  530 => 105,  525 => 98,  516 => 96,  502 => 94,  499 => 93,  485 => 92,  463 => 90,  460 => 89,  443 => 88,  428 => 87,  425 => 86,  422 => 85,  403 => 75,  400 => 83,  394 => 78,  380 => 77,  376 => 75,  373 => 74,  370 => 73,  364 => 64,  361 => 70,  349 => 68,  337 => 66,  335 => 65,  323 => 63,  320 => 62,  317 => 61,  314 => 60,  311 => 59,  308 => 54,  302 => 56,  299 => 55,  297 => 54,  277 => 53,  274 => 52,  257 => 51,  253 => 49,  250 => 33,  246 => 30,  236 => 23,  233 => 22,  218 => 20,  208 => 18,  205 => 17,  203 => 16,  200 => 15,  183 => 7,  175 => 5,  172 => 10,  169 => 9,  166 => 8,  161 => 153,  155 => 513,  151 => 149,  145 => 456,  143 => 427,  140 => 426,  134 => 143,  131 => 142,  125 => 391,  122 => 139,  119 => 138,  116 => 105,  114 => 104,  108 => 349,  106 => 83,  102 => 81,  100 => 48,  95 => 277,  89 => 242,  87 => 238,  80 => 40,  76 => 38,  74 => 37,  71 => 148,  63 => 90,  60 => 32,  57 => 43,  55 => 2,  52 => 7,  46 => 6,  41 => 4,  36 => 3,  33 => 2,);
    }
}

<?php
$options_saved = get_option('imic_options');
$css = '';

if ($options_saved && isset($options_saved['content_background'])) {
    $saved_css = get_option('vestige_dynamic_css');
    if ($saved_css == '') {
        $fonts_args = array('family' => '', 'subset' => '');
        $font_family = $font_subset = array();
        foreach ($options_saved as $key => $value) {
            if ($key == 'content_background') {
                $class = '.content';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'content_padding') {
                $class = '.content';
                $style = 'padding-top:' . $value['padding-top'] . ';';
                $style = 'padding-bottom:' . $value['padding-bottom'] . ';';
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'header_background_alpha' && isset($value['rgba'])) {
                $class = '.site-header, .header-style2 .site-header, .header-style3 .site-header';
                $style = 'background-color:' . $value['rgba'] . ';';
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'header_background') {
                $class = '.site-header, .header-style2 .site-header, .header-style3 .site-header';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'sticky_header_background') {
                $class = '.header-style1 .is-sticky .site-header, .header-style2 .is-sticky .site-header, .header-style3 .is-sticky .main-navbar';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'sticky_link_color') {
                $class = 'html .is-sticky .site-header .main-navigation > ul > li > a';
                $style = 'color:' . $value['regular'] . ';';
                $css .= $class . '{' . $style . '}';
                $css .= $class . ':hover{color:' . $value['hover'] . ';}';
                $css .= $class . ':active{color:' . $value['active'] . ';}';
            } elseif ($key == 'show_page_title_typo') {
                $class = '.page-header > div > div > span';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'h1_logo_background') {
                $class = '.header-style1 .site-logo';
                $style = 'background-color:' . $value['background-color'] . ';';
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'logo_spacing') {
                $class = '.site-logo h1';
                $style = 'padding-top:' . $value['padding-top'] . ';';
                $style = 'padding-bottom:' . $value['padding-bottom'] . ';';
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'main_nav_link_typo') {
                $class = '.main-navigation > ul > li > a, .search-module-trigger, .cart-module-trigger';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'main_nav_link') {
                $class = '.main-navigation > ul > li > a, .search-module-trigger, .cart-module-trigger';
                $style = 'color:' . $value['regular'] . ';';
                $css .= $class . '{' . $style . '}';
                $css .= $class . ':hover{color:' . $value['hover'] . ';}';
                $css .= $class . ':active{color:' . $value['active'] . ';}';
            } elseif ($key == 'dd_background') {
                $class = '.dd-menu > ul > li ul';
                $style = 'background-color:' . $value['background-color'] . ';';
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'dd_item_border') {
                $class = '.dd-menu > ul > li > ul li > a';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'border-style' || $tag == 'border-color') {
                        $style .= $tag . ':' . $st . ';';
                    } else {
                        $style .= 'border-bottom:' . $st . ';';
                    }
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'dd_item_border_left') {
                $class = '.dd-menu > ul > li > ul li';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'border-style' || $tag == 'border-color') {
                        $style .= $tag . ':' . $st . ';';
                    } else {
                        $style .= 'border-left:' . $st . ';';
                    }
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'dd_item_spacing') {
                $class = '.dd-menu > ul > li > ul li > a';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'dd_item_background') {
                $class = '.dd-menu > ul > li > ul li > a:hover';
                $style = 'background-color:' . $value['background-color'] . ';';
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'dd_item_link_typo') {
                $class = '.dd-menu > ul > li > ul li > a';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'dd_item_link_color') {
                $class = '.dd-menu > ul > li > ul li > a';
                $style = 'color:' . $value['regular'] . ';';
                $css .= $class . '{' . $style . '}';
                $css .= $class . ':hover{color:' . $value['hover'] . ';}';
                $css .= $class . ':active{color:' . $value['active'] . ';}';
            } elseif ($key == 'mm_title_typo') {
                $class = '.dd-menu .megamenu-container .megamenu-sub-title';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'mm_content_typo') {
                $class = '.dd-menu .megamenu-container';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'mm_background') {
                $class = '.dd-menu > ul > li > ul li > a:hover';
                $style = 'background-color:' . $value['background-color'] . ';';
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'tfooter_bg') {
                $class = '.site-footer';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'footer_top_spacing') {
                $class = '.site-footer';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'tfooter_border') {
                $class = '.site-footer';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'border-style' || $tag == 'border-color') {
                        $style .= $tag . ':' . $st . ';';
                    } else {
                        $style .= 'border-top:' . $st . ';';
                    }
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'widgettitle_typo') {
                $class = '.footer-widget .widgettitle, .footer-widget .widget-title';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'tfwidget_typo') {
                $class = '.site-footer';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'tfooter_link_color') {
                $class = '.site-footer a';
                $style = 'color:' . $value['regular'] . ';';
                $css .= $class . '{' . $style . '}';
                $css .= $class . ':hover{color:' . $value['hover'] . ';}';
                $css .= $class . ':active{color:' . $value['active'] . ';}';
            } elseif ($key == 'bfooter_bg') {
                $class = '.site-footer-bottom';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'footer_bottom_spacing') {
                $class = '.site-footer-bottom';
                $style = 'padding-top:' . $value['padding-top'] . ';';
                $style = 'padding-bottom:' . $value['padding-bottom'] . ';';
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'bfooter_border') {
                $class = '.site-footer-bottom';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'border-style' || $tag == 'border-color') {
                        $style .= $tag . ':' . $st . ';';
                    } else {
                        $style .= 'border-top:' . $st . ';';
                    }
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'bfwidget_typo') {
                $class = '.site-footer-bottom';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'bfooter_link_color') {
                $class = '.site-footer-bottom a';
                $style = 'color:' . $value['regular'] . ';';
                $css .= $class . '{' . $style . '}';
                $css .= $class . ':hover{color:' . $value['hover'] . ';}';
                $css .= $class . ':active{color:' . $value['active'] . ';}';
            } elseif ($key == 'footer_bottom_icons') {
                $class = '.site-footer-bottom .social-icons-colored li a';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'footer_bottom_icons_link_color') {
                $class = '.site-footer-bottom .social-icons-colored li a';
                $style = 'color:' . $value['regular'] . ';';
                $css .= $class . '{' . $style . '}';
                $css .= $class . ':hover{color:' . $value['hover'] . ';}';
                $css .= (isset($value['active'])) ? $class . ':active{color:' . $value['active'] . ';}' : '';
            } elseif ($key == 'footer_bottom_icons_bg') {
                $class = '.site-footer-bottom .social-icons-colored li a';
                $style = 'background-color:' . $value['background-color'] . ';';
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'footer_bottom_icons_dimension') {
                $class = '.site-footer-bottom .social-icons-colored li a';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'sidebar_widget_bg') {
                $class = '#sidebar-col .widget';
                $style = 'background-color:' . $value['background-color'] . ';';
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'sidebar_widget_border') {
                $class = '#sidebar-col .widget';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'sidebar_widget_text') {
                $class = '#sidebar-col .widget';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'sidebar_widget_links') {
                $class = '#sidebar-col .widget a';
                $style = 'color:' . $value['regular'] . ';';
                $css .= $class . '{' . $style . '}';
                $css .= $class . ':hover{color:' . $value['hover'] . ';}';
                $css .= $class . ':active{color:' . $value['active'] . ';}';
            } elseif ($key == 'sidebar_font_typography') {
                $class = '#sidebar-col .widgettitle, #sidebar-col .widget-title';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && isset($value['subsets']) && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'sidebar_widget_title_border') {
                $class = '#sidebar-col .widgettitle, #sidebar-col .widget-title';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'border-style' || $tag == 'border-color') {
                        $style .= $tag . ':' . $st . ';';
                    } else {
                        $style .= 'border-bottom:' . $st . ';';
                    }
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'share_icons_box_size') {
                $class = '.social-share-bar .social-icons-colored li a';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'share_icons_font_size') {
                $class = '.social-share-bar .social-icons-colored li a';
                $style = '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'heading_font_typography') {
                $class = 'h1,h2,h3,h4,h5,h6,blockquote p';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'body_font_typography') {
                $class = 'body, h1 .label, h2 .label, h3 .label, h4 .label, h5 .label, h6 .label, h4, .selectpicker.btn-default, body, .main-navigation, .skewed-title-bar h4, .widget-title, .sidebar-widget .widgettitle, .icon-box h3, .btn-default';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'button_font_typography') {
                $class = '.btn, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce input.button, .wpcf7-form .wpcf7-submit, .noticebar .ow-button-base a';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'h1_font_typography') {
                $class = 'h1';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'h2_font_typography') {
                $class = 'h2';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'h3_font_typography') {
                $class = 'h3';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'h4_font_typography') {
                $class = 'h4';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'h5_font_typography') {
                $class = 'h5';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'h6_font_typography') {
                $class = 'h6';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            } elseif ($key == 'body_unique_font_typography') {
                $class = 'body';
                $style = '';
                $font_separator = '';
                $subset_separator = '';
                $font_family[] = (isset($value['google']) && $value['google'] == true && $value['font-family'] != '') ? $font_separator . $value['font-family'] : '';
                $font_subset[] = (isset($value['google']) && $value['google'] == true && $value['subsets'] != '') ? $subset_separator . $value['subsets'] : '';
                foreach ($value as $tag => $st) {
                    if ($st == '' || is_array($st) || $tag == 'google' || $tag == 'units') continue;
                    if ($tag == 'background-image') {
                        $st = 'url("' . $st . '")';
                    }
                    $style .= $tag . ':' . $st . ';';
                }
                $css .= $class . '{' . $style . '}';
            }
            $font_family_implode = implode('|', array_unique(array_filter($font_family)));
            $font_subset_implode = implode(',', array_unique(array_filter($font_subset)));
            update_option('vestige_dynamic_css', $css);
            update_option('vestige_dynamic_fonts', array('family' => $font_family_implode, 'subset' => $font_subset_implode));
        }
    } else {
        function vestige_enqueue_dynamic_css()
        {
            $dynamic_css = get_option('vestige_dynamic_css');
            $dynamic_fonts = get_option('vestige_dynamic_fonts');
            if ($dynamic_css != '1' && $dynamic_css != '') {
                $theme_info = wp_get_theme();
                wp_enqueue_style('vestige-fonts', add_query_arg($dynamic_fonts, "//fonts.googleapis.com/css"), array(), $theme_info->get('Version'), 'all');
                wp_add_inline_style('imic_main', $dynamic_css);
            }
        }
        add_action('wp_enqueue_scripts', 'vestige_enqueue_dynamic_css', 9999);
    }
}
add_action('redux/options/imic_options/saved', 'vestige_use_new_dynamic_css');
function vestige_use_new_dynamic_css()
{
    update_option('vestige_dynamic_css', '1');
}

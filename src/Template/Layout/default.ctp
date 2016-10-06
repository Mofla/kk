<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>



    <?= $this->fetch('../meta') ?>
    <?= $this->fetch('../css') ?>
    <?= $this->fetch('../script') ?>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="#1 selling multi-purpose bootstrap admin theme sold in themeforest marketplace packed with angularjs, material design, rtl support with over thausands of templates and ui elements and plugins to power any type of web applications including saas and admin dashboards. Preview page of Theme #3 for "
          name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <?= $this->Html->css('../assets/global/plugins/font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('../assets/global/plugins/simple-line-icons/simple-line-icons.min.css') ?>
    <?= $this->Html->css('../assets/global/plugins/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') ?>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <?= $this->Html->css('../assets/global/css/components.min.css') ?>
    <?= $this->Html->css('../assets/global/css/plugins.min.css') ?>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <?= $this->Html->css('../assets/layouts/layout3/css/layout.min.css') ?>
    <?= $this->Html->css('../assets/layouts/layout3/css/themes/default.min.css') ?>
    <?= $this->Html->css('../assets/layouts/layout3/css/custom.min.css') ?>
    <!-- END THEME LAYOUT STYLES -->
    <?= $this->Html->css('forum-styles.css') ?>
    <?= $this->html->script('../assets/global/plugins/jquery.min.js') ?>

    <link rel="shortcut icon" href="favicon.ico" />
</head>
<body>


<body class="page-container-bg-solid">
<div class="page-wrapper">
    <div class="page-wrapper-row">
        <div class="page-wrapper-top">
            <!-- BEGIN HEADER -->
            <div class="page-header">
                <!-- BEGIN HEADER TOP -->
                <div class="page-header-top">
                    <div class="container">
                        <!-- BEGIN LOGO -->
                        <div class="page-logo">
                            <a href="index.html">
                                <img src="../assets/layouts/layout3/img/logo-default.jpg" alt="logo" class="logo-default">
                            </a>
                        </div>
                        <!-- END LOGO -->
                        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                        <a href="javascript:;" class="menu-toggler"></a>
                        <!-- END RESPONSIVE MENU TOGGLER -->
                        <!-- BEGIN TOP NAVIGATION MENU -->
                        <div class="top-menu">
                            <ul class="nav navbar-nav pull-right">
                                <!-- BEGIN NOTIFICATION DROPDOWN -->
                                <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                                <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                                <!-- END NOTIFICATION DROPDOWN -->
                                <!-- BEGIN TODO DROPDOWN -->
                                <!-- END TODO DROPDOWN -->
                                <li class="droddown dropdown-separator">
                                    <span class="separator"></span>
                                </li>
                                <!-- BEGIN INBOX DROPDOWN -->
                                <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <span class="circle">0</span>
                                        <span class="corner"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="external">
                                            <h3>You have
                                                <strong>0 New</strong> Messages</h3>
                                            <a href="app_inbox.html">view all</a>
                                        </li>
<!--                                        <li>-->
<!--                                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                                <span class="photo">-->
<!--                                                                    <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>-->
<!--                                                        <span class="subject">-->
<!--                                                                    <span class="from"> Lisa Wong </span>-->
<!--                                                                    <span class="time">Just Now </span>-->
<!--                                                                </span>-->
<!--                                                        <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                                <span class="photo">-->
<!--                                                                    <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>-->
<!--                                                        <span class="subject">-->
<!--                                                                    <span class="from"> Richard Doe </span>-->
<!--                                                                    <span class="time">16 mins </span>-->
<!--                                                                </span>-->
<!--                                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                                <span class="photo">-->
<!--                                                                    <img src="../assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>-->
<!--                                                        <span class="subject">-->
<!--                                                                    <span class="from"> Bob Nilson </span>-->
<!--                                                                    <span class="time">2 hrs </span>-->
<!--                                                                </span>-->
<!--                                                        <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                                <span class="photo">-->
<!--                                                                    <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>-->
<!--                                                        <span class="subject">-->
<!--                                                                    <span class="from"> Lisa Wong </span>-->
<!--                                                                    <span class="time">40 mins </span>-->
<!--                                                                </span>-->
<!--                                                        <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                                <span class="photo">-->
<!--                                                                    <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>-->
<!--                                                        <span class="subject">-->
<!--                                                                    <span class="from"> Richard Doe </span>-->
<!--                                                                    <span class="time">46 mins </span>-->
<!--                                                                </span>-->
<!--                                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
                                    </ul>
                                </li>
                                <!-- END INBOX DROPDOWN -->
                                <!-- BEGIN USER LOGIN DROPDOWN -->
                                <li class="dropdown dropdown-user dropdown-dark">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <img alt="" class="img-circle" src="../assets/layouts/layout3/img/avatar9.jpg">
                                        <span class="username username-hide-mobile">Nick</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-default">
                                        <li>
                                            <a href="page_user_profile_1.html">
                                                <i class="icon-user"></i> My Profile </a>
                                        </li>
                                        <li>
                                            <a href="app_calendar.html">
                                                <i class="icon-calendar"></i> My Calendar </a>
                                        </li>
                                        <li>
                                            <a href="app_inbox.html">
                                                <i class="icon-envelope-open"></i> My Inbox
                                                <span class="badge badge-danger"> 0</span>
                                            </a>
                                        </li>
<!--                                        <li>-->
<!--                                            <a href="app_todo_2.html">-->
<!--                                                <i class="icon-rocket"></i> My Tasks-->
<!--                                                <span class="badge badge-success"> 0 </span>-->
<!--                                            </a>-->
<!--                                        </li>-->
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="page_user_lock_1.html">
                                                <i class="icon-lock"></i> Lock Screen </a>
                                        </li>
                                        <li>
                                            <a href="page_user_login_1.html">
                                                <i class="icon-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- END USER LOGIN DROPDOWN -->
                                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                                <li class="dropdown dropdown-extended quick-sidebar-toggler">
                                    <span class="sr-only">Toggle Quick Sidebar</span>
                                    <i class="icon-logout"></i>
                                </li>
                                <!-- END QUICK SIDEBAR TOGGLER -->
                            </ul>
                        </div>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
                <!-- END HEADER TOP -->
                <!-- BEGIN HEADER MENU -->
                <div class="page-header-menu">
                    <div class="container">
                        <!-- BEGIN HEADER SEARCH BOX -->
                        <form class="search-form" action="page_general_search.html" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="query">
                                <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                            </div>
                        </form>
                        <!-- END HEADER SEARCH BOX -->
                        <!-- BEGIN MEGA MENU -->
                        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                        <div class="hor-menu  hor-menu-light">
                            <ul class="nav navbar-nav">
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a href="javascript:;"> Dashboard
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class=" ">
                                            <a href="index.html" class="nav-link  ">
                                                <i class="icon-bar-chart"></i> Default Dashboard
                                                <span class="badge badge-success">1</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="dashboard_2.html" class="nav-link  ">
                                                <i class="icon-bulb"></i> Dashboard 2 </a>
                                        </li>
                                        <li class=" ">
                                            <a href="dashboard_3.html" class="nav-link  ">
                                                <i class="icon-graph"></i> Dashboard 3
                                                <span class="badge badge-danger">3</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown mega-menu-dropdown  ">
                                    <a href="javascript:;"> UI Features
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu" style="min-width: 710px">
                                        <li>
                                            <div class="mega-menu-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <a href="ui_colors.html"> Color Library </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_general.html"> General Components </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_buttons.html"> Buttons </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_buttons_spinner.html"> Spinner Buttons </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_confirmations.html"> Popover Confirmations </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_sweetalert.html"> Bootstrap Sweet Alerts </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_icons.html"> Font Icons </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_socicons.html"> Social Icons </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_typography.html"> Typography </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_tabs_accordions_navs.html"> Tabs, Accordions & Navs </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_tree.html"> Tree View </a>
                                                            </li>
                                                            <li>
                                                                <a href="maps_google.html"> Google Maps </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <a href="maps_vector.html"> Vector Maps </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_timeline.html"> Timeline 1 </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_timeline_2.html"> Timeline 2 </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_timeline_horizontal.html"> Horizontal Timeline </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_page_progress_style_1.html"> Page Progress Bar - Flash </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_page_progress_style_2.html"> Page Progress Bar - Big Counter </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_blockui.html"> Block UI </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_bootstrap_growl.html"> Bootstrap Growl Notifications </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_notific8.html"> Notific8 Notifications </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_toastr.html"> Toastr Notifications </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_bootbox.html"> Bootbox Dialogs </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <a href="ui_alerts_api.html"> Metronic Alerts API </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_session_timeout.html"> Session Timeout </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_idle_timeout.html"> User Idle Timeout </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_modals.html"> Modals </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_extended_modals.html"> Extended Modals </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_tiles.html"> Tiles </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_datepaginator.html"> Date Paginator </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_nestable.html"> Nestable List </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown classic-menu-dropdown active">
                                    <a href="javascript:;"> Layouts
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class=" active">
                                            <a href="layout_mega_menu_light.html" class="nav-link  active"> Light Mega Menu </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_top_bar_light.html" class="nav-link  "> Light Top Bar Dropdowns </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_fluid_page.html" class="nav-link  "> Fluid Page </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_top_bar_fixed.html" class="nav-link  "> Fixed Top Bar </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_mega_menu_fixed.html" class="nav-link  "> Fixed Mega Menu </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_disabled_menu.html" class="nav-link  "> Disabled Menu Links </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_blank_page.html" class="nav-link  "> Blank Page </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                    <a href="javascript:;"> Components
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu" style="min-width: ">
                                        <li>
                                            <div class="mega-menu-content">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <h3>Components 1</h3>
                                                            </li>
                                                            <li>
                                                                <a href="components_date_time_pickers.html"> Date & Time Pickers </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_color_pickers.html"> Color Pickers </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_select2.html"> Select2 Dropdowns </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_multiselect_dropdown.html"> Bootstrap Multiselect Dropdowns </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_select.html"> Bootstrap Select </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_multi_select.html"> Bootstrap Multiple Select </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <h3>Components 2</h3>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_select_splitter.html"> Select Splitter </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_clipboard.html"> Clipboard </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_typeahead.html"> Typeahead Autocomplete </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_tagsinput.html"> Bootstrap Tagsinput </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_switch.html"> Bootstrap Switch </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_maxlength.html"> Bootstrap Maxlength </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <h3>Components 3</h3>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_fileinput.html"> Bootstrap File Input </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_touchspin.html"> Bootstrap Touchspin </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_form_tools.html"> Form Widgets & Tools </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_context_menu.html"> Context Menu </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_editors.html"> Markdown & WYSIWYG Editors </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <h3>Components 4</h3>
                                                            </li>
                                                            <li>
                                                                <a href="components_code_editors.html"> Code Editors </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_ion_sliders.html"> Ion Range Sliders </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_noui_sliders.html"> NoUI Range Sliders </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_knob_dials.html"> Knob Circle Dials </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a href="javascript:;"> More
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-settings"></i> Form Stuff
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="form_controls.html" class="nav-link "> Bootstrap Form
                                                        <br>Controls </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_controls_md.html" class="nav-link "> Material Design
                                                        <br>Form Controls </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_validation.html" class="nav-link "> Form Validation </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_validation_states_md.html" class="nav-link "> Material Design
                                                        <br>Form Validation States </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_validation_md.html" class="nav-link "> Material Design
                                                        <br>Form Validation </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_layouts.html" class="nav-link "> Form Layouts </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_repeater.html" class="nav-link "> Form Repeater </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_input_mask.html" class="nav-link "> Form Input Mask </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_editable.html" class="nav-link "> Form X-editable </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_wizard.html" class="nav-link "> Form Wizard </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_icheck.html" class="nav-link "> iCheck Controls </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_image_crop.html" class="nav-link "> Image Cropping </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_fileupload.html" class="nav-link "> Multiple File Upload </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_dropzone.html" class="nav-link "> Dropzone File Upload </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-briefcase"></i> Tables
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="table_static_basic.html" class="nav-link "> Basic Tables </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="table_static_responsive.html" class="nav-link "> Responsive Tables </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="table_bootstrap.html" class="nav-link "> Bootstrap Tables </a>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="javascript:;" class="nav-link nav-toggle"> Datatables
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="">
                                                            <a href="table_datatables_managed.html" class="nav-link "> Managed Datatables </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_buttons.html" class="nav-link "> Buttons Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_colreorder.html" class="nav-link "> Colreorder Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_rowreorder.html" class="nav-link "> Rowreorder Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_scroller.html" class="nav-link "> Scroller Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_fixedheader.html" class="nav-link "> FixedHeader Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_responsive.html" class="nav-link "> Responsive Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_editable.html" class="nav-link "> Editable Datatables </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_ajax.html" class="nav-link "> Ajax Datatables </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="?p=" class="nav-link nav-toggle ">
                                                <i class="icon-wallet"></i> Portlets
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="portlet_boxed.html" class="nav-link "> Boxed Portlets </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="portlet_light.html" class="nav-link "> Light Portlets </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="portlet_solid.html" class="nav-link "> Solid Portlets </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="portlet_ajax.html" class="nav-link "> Ajax Portlets </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="portlet_draggable.html" class="nav-link "> Draggable Portlets </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="?p=" class="nav-link nav-toggle ">
                                                <i class="icon-settings"></i> Elements
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="elements_steps.html" class="nav-link "> Steps </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="elements_lists.html" class="nav-link "> Lists </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="elements_ribbons.html" class="nav-link "> Ribbons </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="elements_overlay.html" class="nav-link "> Overlays </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="elements_cards.html" class="nav-link "> User Cards </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-bar-chart"></i> Charts
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="charts_amcharts.html" class="nav-link "> amChart </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="charts_flotcharts.html" class="nav-link "> Flot Charts </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="charts_flowchart.html" class="nav-link "> Flow Charts </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="charts_google.html" class="nav-link "> Google Charts </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="charts_echarts.html" class="nav-link "> eCharts </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="charts_morris.html" class="nav-link "> Morris Charts </a>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="javascript:;" class="nav-link nav-toggle"> HighCharts
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="">
                                                            <a href="charts_highcharts.html" class="nav-link " target="_blank"> HighCharts </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="charts_highstock.html" class="nav-link " target="_blank"> HighStock </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="charts_highmaps.html" class="nav-link " target="_blank"> HighMaps </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a href="javascript:;">
                                        <i class="icon-briefcase"></i> Pages
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-basket"></i> eCommerce
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="ecommerce_index.html" class="nav-link ">
                                                        <i class="icon-home"></i> Dashboard </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="ecommerce_orders.html" class="nav-link ">
                                                        <i class="icon-basket"></i> Orders </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="ecommerce_orders_view.html" class="nav-link ">
                                                        <i class="icon-tag"></i> Order View </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="ecommerce_products.html" class="nav-link ">
                                                        <i class="icon-graph"></i> Products </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="ecommerce_products_edit.html" class="nav-link ">
                                                        <i class="icon-graph"></i> Product Edit </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-docs"></i> Apps
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="app_todo.html" class="nav-link ">
                                                        <i class="icon-clock"></i> Todo 1 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="app_todo_2.html" class="nav-link ">
                                                        <i class="icon-check"></i> Todo 2 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="app_inbox.html" class="nav-link ">
                                                        <i class="icon-envelope"></i> Inbox </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="app_calendar.html" class="nav-link ">
                                                        <i class="icon-calendar"></i> Calendar </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="app_ticket.html" class="nav-link ">
                                                        <i class="icon-notebook"></i> Support </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-user"></i> User
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="page_user_profile_1.html" class="nav-link ">
                                                        <i class="icon-user"></i> Profile 1 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_user_profile_1_account.html" class="nav-link ">
                                                        <i class="icon-user-female"></i> Profile 1 Account </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_user_profile_1_help.html" class="nav-link ">
                                                        <i class="icon-user-following"></i> Profile 1 Help </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_user_profile_2.html" class="nav-link ">
                                                        <i class="icon-users"></i> Profile 2 </a>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="javascript:;" class="nav-link nav-toggle">
                                                        <i class="icon-notebook"></i> Login
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="">
                                                            <a href="page_user_login_1.html" class="nav-link " target="_blank"> Login Page 1 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_user_login_2.html" class="nav-link " target="_blank"> Login Page 2 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_user_login_3.html" class="nav-link " target="_blank"> Login Page 3 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_user_login_4.html" class="nav-link " target="_blank"> Login Page 4 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_user_login_5.html" class="nav-link " target="_blank"> Login Page 5 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_user_login_6.html" class="nav-link " target="_blank"> Login Page 6 </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_user_lock_1.html" class="nav-link " target="_blank">
                                                        <i class="icon-lock"></i> Lock Screen 1 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_user_lock_2.html" class="nav-link " target="_blank">
                                                        <i class="icon-lock-open"></i> Lock Screen 2 </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-social-dribbble"></i> General
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="page_general_about.html" class="nav-link ">
                                                        <i class="icon-info"></i> About </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_contact.html" class="nav-link ">
                                                        <i class="icon-call-end"></i> Contact </a>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="javascript:;" class="nav-link nav-toggle">
                                                        <i class="icon-notebook"></i> Portfolio
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="">
                                                            <a href="page_general_portfolio_1.html" class="nav-link "> Portfolio 1 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_portfolio_2.html" class="nav-link "> Portfolio 2 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_portfolio_3.html" class="nav-link "> Portfolio 3 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_portfolio_4.html" class="nav-link "> Portfolio 4 </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="javascript:;" class="nav-link nav-toggle">
                                                        <i class="icon-magnifier"></i> Search
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="">
                                                            <a href="page_general_search.html" class="nav-link "> Search 1 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_search_2.html" class="nav-link "> Search 2 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_search_3.html" class="nav-link "> Search 3 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_search_4.html" class="nav-link "> Search 4 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_search_5.html" class="nav-link "> Search 5 </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_pricing.html" class="nav-link ">
                                                        <i class="icon-tag"></i> Pricing </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_faq.html" class="nav-link ">
                                                        <i class="icon-wrench"></i> FAQ </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_blog.html" class="nav-link ">
                                                        <i class="icon-pencil"></i> Blog </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_blog_post.html" class="nav-link ">
                                                        <i class="icon-note"></i> Blog Post </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_invoice.html" class="nav-link ">
                                                        <i class="icon-envelope"></i> Invoice </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_invoice_2.html" class="nav-link ">
                                                        <i class="icon-envelope"></i> Invoice 2 </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-settings"></i> System
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="page_system_coming_soon.html" class="nav-link " target="_blank"> Coming Soon </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_system_404_1.html" class="nav-link "> 404 Page 1 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_system_404_2.html" class="nav-link " target="_blank"> 404 Page 2 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_system_404_3.html" class="nav-link " target="_blank"> 404 Page 3 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_system_500_1.html" class="nav-link "> 500 Page 1 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_system_500_2.html" class="nav-link " target="_blank"> 500 Page 2 </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- END MEGA MENU -->
                    </div>
                </div>
                <!-- END HEADER MENU -->
            </div>
            <!-- END HEADER -->
        </div>
    </div>
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <div class="container">
                            <!-- BEGIN PAGE TITLE -->

                            <!-- END PAGE TITLE -->
                            <!-- BEGIN PAGE TOOLBAR --><!-- END PAGE TOOLBAR -->
                        </div>
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content">
                        <div class="container">
                            <!-- BEGIN PAGE BREADCRUMBS -->
                            <!-- END PAGE BREADCRUMBS -->
                            <!-- BEGIN PAGE CONTENT INNER -->
                            <div class="page-content-inner">
                                <?= $this->fetch('content') ?>
                            </div>
                            <!-- END PAGE CONTENT INNER -->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT BODY -->
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
<!--                <a href="javascript:;" class="page-quick-sidebar-toggler">-->
<!--                    <i class="icon-login"></i>-->
<!--                </a>-->
<!--                <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">-->
<!--                    <div class="page-quick-sidebar">-->
<!--                        <ul class="nav nav-tabs">-->
<!--                            <li class="active">-->
<!--                                <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users-->
<!--                                    <span class="badge badge-danger">2</span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts-->
<!--                                    <span class="badge badge-success">7</span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="dropdown">-->
<!--                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More-->
<!--                                    <i class="fa fa-angle-down"></i>-->
<!--                                </a>-->
<!--                                <ul class="dropdown-menu pull-right">-->
<!--                                    <li>-->
<!--                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">-->
<!--                                            <i class="icon-bell"></i> Alerts </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">-->
<!--                                            <i class="icon-info"></i> Notifications </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">-->
<!--                                            <i class="icon-speech"></i> Activities </a>-->
<!--                                    </li>-->
<!--                                    <li class="divider"></li>-->
<!--                                    <li>-->
<!--                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">-->
<!--                                            <i class="icon-settings"></i> Settings </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                        <div class="tab-content">-->
<!--                            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">-->
<!--                                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">-->
<!--                                    <h3 class="list-heading">Staff</h3>-->
<!--                                    <ul class="media-list list-items">-->
<!--                                        <li class="media">-->
<!--                                            <div class="media-status">-->
<!--                                                <span class="badge badge-success">8</span>-->
<!--                                            </div>-->
<!--                                            <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">-->
<!--                                            <div class="media-body">-->
<!--                                                <h4 class="media-heading">Bob Nilson</h4>-->
<!--                                                <div class="media-heading-sub"> Project Manager </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="media">-->
<!--                                            <img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">-->
<!--                                            <div class="media-body">-->
<!--                                                <h4 class="media-heading">Nick Larson</h4>-->
<!--                                                <div class="media-heading-sub"> Art Director </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="media">-->
<!--                                            <div class="media-status">-->
<!--                                                <span class="badge badge-danger">3</span>-->
<!--                                            </div>-->
<!--                                            <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">-->
<!--                                            <div class="media-body">-->
<!--                                                <h4 class="media-heading">Deon Hubert</h4>-->
<!--                                                <div class="media-heading-sub"> CTO </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="media">-->
<!--                                            <img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">-->
<!--                                            <div class="media-body">-->
<!--                                                <h4 class="media-heading">Ella Wong</h4>-->
<!--                                                <div class="media-heading-sub"> CEO </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                    <h3 class="list-heading">Customers</h3>-->
<!--                                    <ul class="media-list list-items">-->
<!--                                        <li class="media">-->
<!--                                            <div class="media-status">-->
<!--                                                <span class="badge badge-warning">2</span>-->
<!--                                            </div>-->
<!--                                            <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">-->
<!--                                            <div class="media-body">-->
<!--                                                <h4 class="media-heading">Lara Kunis</h4>-->
<!--                                                <div class="media-heading-sub"> CEO, Loop Inc </div>-->
<!--                                                <div class="media-heading-small"> Last seen 03:10 AM </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="media">-->
<!--                                            <div class="media-status">-->
<!--                                                <span class="label label-sm label-success">new</span>-->
<!--                                            </div>-->
<!--                                            <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">-->
<!--                                            <div class="media-body">-->
<!--                                                <h4 class="media-heading">Ernie Kyllonen</h4>-->
<!--                                                <div class="media-heading-sub"> Project Manager,-->
<!--                                                    <br> SmartBizz PTL </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="media">-->
<!--                                            <img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">-->
<!--                                            <div class="media-body">-->
<!--                                                <h4 class="media-heading">Lisa Stone</h4>-->
<!--                                                <div class="media-heading-sub"> CTO, Keort Inc </div>-->
<!--                                                <div class="media-heading-small"> Last seen 13:10 PM </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="media">-->
<!--                                            <div class="media-status">-->
<!--                                                <span class="badge badge-success">7</span>-->
<!--                                            </div>-->
<!--                                            <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">-->
<!--                                            <div class="media-body">-->
<!--                                                <h4 class="media-heading">Deon Portalatin</h4>-->
<!--                                                <div class="media-heading-sub"> CFO, H&D LTD </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="media">-->
<!--                                            <img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">-->
<!--                                            <div class="media-body">-->
<!--                                                <h4 class="media-heading">Irina Savikova</h4>-->
<!--                                                <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="media">-->
<!--                                            <div class="media-status">-->
<!--                                                <span class="badge badge-danger">4</span>-->
<!--                                            </div>-->
<!--                                            <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">-->
<!--                                            <div class="media-body">-->
<!--                                                <h4 class="media-heading">Maria Gomez</h4>-->
<!--                                                <div class="media-heading-sub"> Manager, Infomatic Inc </div>-->
<!--                                                <div class="media-heading-small"> Last seen 03:10 AM </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                                <div class="page-quick-sidebar-item">-->
<!--                                    <div class="page-quick-sidebar-chat-user">-->
<!--                                        <div class="page-quick-sidebar-nav">-->
<!--                                            <a href="javascript:;" class="page-quick-sidebar-back-to-list">-->
<!--                                                <i class="icon-arrow-left"></i>Back</a>-->
<!--                                        </div>-->
<!--                                        <div class="page-quick-sidebar-chat-user-messages">-->
<!--                                            <div class="post out">-->
<!--                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />-->
<!--                                                <div class="message">-->
<!--                                                    <span class="arrow"></span>-->
<!--                                                    <a href="javascript:;" class="name">Bob Nilson</a>-->
<!--                                                    <span class="datetime">20:15</span>-->
<!--                                                    <span class="body"> When could you send me the report ? </span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="post in">-->
<!--                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />-->
<!--                                                <div class="message">-->
<!--                                                    <span class="arrow"></span>-->
<!--                                                    <a href="javascript:;" class="name">Ella Wong</a>-->
<!--                                                    <span class="datetime">20:15</span>-->
<!--                                                    <span class="body"> Its almost done. I will be sending it shortly </span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="post out">-->
<!--                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />-->
<!--                                                <div class="message">-->
<!--                                                    <span class="arrow"></span>-->
<!--                                                    <a href="javascript:;" class="name">Bob Nilson</a>-->
<!--                                                    <span class="datetime">20:15</span>-->
<!--                                                    <span class="body"> Alright. Thanks! :) </span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="post in">-->
<!--                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />-->
<!--                                                <div class="message">-->
<!--                                                    <span class="arrow"></span>-->
<!--                                                    <a href="javascript:;" class="name">Ella Wong</a>-->
<!--                                                    <span class="datetime">20:16</span>-->
<!--                                                    <span class="body"> You are most welcome. Sorry for the delay. </span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="post out">-->
<!--                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />-->
<!--                                                <div class="message">-->
<!--                                                    <span class="arrow"></span>-->
<!--                                                    <a href="javascript:;" class="name">Bob Nilson</a>-->
<!--                                                    <span class="datetime">20:17</span>-->
<!--                                                    <span class="body"> No probs. Just take your time :) </span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="post in">-->
<!--                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />-->
<!--                                                <div class="message">-->
<!--                                                    <span class="arrow"></span>-->
<!--                                                    <a href="javascript:;" class="name">Ella Wong</a>-->
<!--                                                    <span class="datetime">20:40</span>-->
<!--                                                    <span class="body"> Alright. I just emailed it to you. </span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="post out">-->
<!--                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />-->
<!--                                                <div class="message">-->
<!--                                                    <span class="arrow"></span>-->
<!--                                                    <a href="javascript:;" class="name">Bob Nilson</a>-->
<!--                                                    <span class="datetime">20:17</span>-->
<!--                                                    <span class="body"> Great! Thanks. Will check it right away. </span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="post in">-->
<!--                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />-->
<!--                                                <div class="message">-->
<!--                                                    <span class="arrow"></span>-->
<!--                                                    <a href="javascript:;" class="name">Ella Wong</a>-->
<!--                                                    <span class="datetime">20:40</span>-->
<!--                                                    <span class="body"> Please let me know if you have any comment. </span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="post out">-->
<!--                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />-->
<!--                                                <div class="message">-->
<!--                                                    <span class="arrow"></span>-->
<!--                                                    <a href="javascript:;" class="name">Bob Nilson</a>-->
<!--                                                    <span class="datetime">20:17</span>-->
<!--                                                    <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="page-quick-sidebar-chat-user-form">-->
<!--                                            <div class="input-group">-->
<!--                                                <input type="text" class="form-control" placeholder="Type a message here...">-->
<!--                                                <div class="input-group-btn">-->
<!--                                                    <button type="button" class="btn green">-->
<!--                                                        <i class="icon-paper-clip"></i>-->
<!--                                                    </button>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">-->
<!--                                <div class="page-quick-sidebar-alerts-list">-->
<!--                                    <h3 class="list-heading">General</h3>-->
<!--                                    <ul class="feeds list-items">-->
<!--                                        <li>-->
<!--                                            <div class="col1">-->
<!--                                                <div class="cont">-->
<!--                                                    <div class="cont-col1">-->
<!--                                                        <div class="label label-sm label-info">-->
<!--                                                            <i class="fa fa-check"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="cont-col2">-->
<!--                                                        <div class="desc"> You have 4 pending tasks.-->
<!--                                                            <span class="label label-sm label-warning "> Take action-->
<!--                                                                        <i class="fa fa-share"></i>-->
<!--                                                                    </span>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col2">-->
<!--                                                <div class="date"> Just now </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="javascript:;">-->
<!--                                                <div class="col1">-->
<!--                                                    <div class="cont">-->
<!--                                                        <div class="cont-col1">-->
<!--                                                            <div class="label label-sm label-success">-->
<!--                                                                <i class="fa fa-bar-chart-o"></i>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="cont-col2">-->
<!--                                                            <div class="desc"> Finance Report for year 2013 has been released. </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="col2">-->
<!--                                                    <div class="date"> 20 mins </div>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <div class="col1">-->
<!--                                                <div class="cont">-->
<!--                                                    <div class="cont-col1">-->
<!--                                                        <div class="label label-sm label-danger">-->
<!--                                                            <i class="fa fa-user"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="cont-col2">-->
<!--                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col2">-->
<!--                                                <div class="date"> 24 mins </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <div class="col1">-->
<!--                                                <div class="cont">-->
<!--                                                    <div class="cont-col1">-->
<!--                                                        <div class="label label-sm label-info">-->
<!--                                                            <i class="fa fa-shopping-cart"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="cont-col2">-->
<!--                                                        <div class="desc"> New order received with-->
<!--                                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col2">-->
<!--                                                <div class="date"> 30 mins </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <div class="col1">-->
<!--                                                <div class="cont">-->
<!--                                                    <div class="cont-col1">-->
<!--                                                        <div class="label label-sm label-success">-->
<!--                                                            <i class="fa fa-user"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="cont-col2">-->
<!--                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col2">-->
<!--                                                <div class="date"> 24 mins </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <div class="col1">-->
<!--                                                <div class="cont">-->
<!--                                                    <div class="cont-col1">-->
<!--                                                        <div class="label label-sm label-info">-->
<!--                                                            <i class="fa fa-bell-o"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="cont-col2">-->
<!--                                                        <div class="desc"> Web server hardware needs to be upgraded.-->
<!--                                                            <span class="label label-sm label-warning"> Overdue </span>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col2">-->
<!--                                                <div class="date"> 2 hours </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="javascript:;">-->
<!--                                                <div class="col1">-->
<!--                                                    <div class="cont">-->
<!--                                                        <div class="cont-col1">-->
<!--                                                            <div class="label label-sm label-default">-->
<!--                                                                <i class="fa fa-briefcase"></i>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="cont-col2">-->
<!--                                                            <div class="desc"> IPO Report for year 2013 has been released. </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="col2">-->
<!--                                                    <div class="date"> 20 mins </div>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                    <h3 class="list-heading">System</h3>-->
<!--                                    <ul class="feeds list-items">-->
<!--                                        <li>-->
<!--                                            <div class="col1">-->
<!--                                                <div class="cont">-->
<!--                                                    <div class="cont-col1">-->
<!--                                                        <div class="label label-sm label-info">-->
<!--                                                            <i class="fa fa-check"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="cont-col2">-->
<!--                                                        <div class="desc"> You have 4 pending tasks.-->
<!--                                                            <span class="label label-sm label-warning "> Take action-->
<!--                                                                        <i class="fa fa-share"></i>-->
<!--                                                                    </span>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col2">-->
<!--                                                <div class="date"> Just now </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="javascript:;">-->
<!--                                                <div class="col1">-->
<!--                                                    <div class="cont">-->
<!--                                                        <div class="cont-col1">-->
<!--                                                            <div class="label label-sm label-danger">-->
<!--                                                                <i class="fa fa-bar-chart-o"></i>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="cont-col2">-->
<!--                                                            <div class="desc"> Finance Report for year 2013 has been released. </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="col2">-->
<!--                                                    <div class="date"> 20 mins </div>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <div class="col1">-->
<!--                                                <div class="cont">-->
<!--                                                    <div class="cont-col1">-->
<!--                                                        <div class="label label-sm label-default">-->
<!--                                                            <i class="fa fa-user"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="cont-col2">-->
<!--                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col2">-->
<!--                                                <div class="date"> 24 mins </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <div class="col1">-->
<!--                                                <div class="cont">-->
<!--                                                    <div class="cont-col1">-->
<!--                                                        <div class="label label-sm label-info">-->
<!--                                                            <i class="fa fa-shopping-cart"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="cont-col2">-->
<!--                                                        <div class="desc"> New order received with-->
<!--                                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col2">-->
<!--                                                <div class="date"> 30 mins </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <div class="col1">-->
<!--                                                <div class="cont">-->
<!--                                                    <div class="cont-col1">-->
<!--                                                        <div class="label label-sm label-success">-->
<!--                                                            <i class="fa fa-user"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="cont-col2">-->
<!--                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col2">-->
<!--                                                <div class="date"> 24 mins </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <div class="col1">-->
<!--                                                <div class="cont">-->
<!--                                                    <div class="cont-col1">-->
<!--                                                        <div class="label label-sm label-warning">-->
<!--                                                            <i class="fa fa-bell-o"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="cont-col2">-->
<!--                                                        <div class="desc"> Web server hardware needs to be upgraded.-->
<!--                                                            <span class="label label-sm label-default "> Overdue </span>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col2">-->
<!--                                                <div class="date"> 2 hours </div>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="javascript:;">-->
<!--                                                <div class="col1">-->
<!--                                                    <div class="cont">-->
<!--                                                        <div class="cont-col1">-->
<!--                                                            <div class="label label-sm label-info">-->
<!--                                                                <i class="fa fa-briefcase"></i>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="cont-col2">-->
<!--                                                            <div class="desc"> IPO Report for year 2013 has been released. </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="col2">-->
<!--                                                    <div class="date"> 20 mins </div>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">-->
<!--                                <div class="page-quick-sidebar-settings-list">-->
<!--                                    <h3 class="list-heading">General Settings</h3>-->
<!--                                    <ul class="list-items borderless">-->
<!--                                        <li> Enable Notifications-->
<!--                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>-->
<!--                                        <li> Allow Tracking-->
<!--                                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>-->
<!--                                        <li> Log Errors-->
<!--                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>-->
<!--                                        <li> Auto Sumbit Issues-->
<!--                                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>-->
<!--                                        <li> Enable SMS Alerts-->
<!--                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>-->
<!--                                    </ul>-->
<!--                                    <h3 class="list-heading">System Settings</h3>-->
<!--                                    <ul class="list-items borderless">-->
<!--                                        <li> Security Level-->
<!--                                            <select class="form-control input-inline input-sm input-small">-->
<!--                                                <option value="1">Normal</option>-->
<!--                                                <option value="2" selected>Medium</option>-->
<!--                                                <option value="e">High</option>-->
<!--                                            </select>-->
<!--                                        </li>-->
<!--                                        <li> Failed Email Attempts-->
<!--                                            <input class="form-control input-inline input-sm input-small" value="5" /> </li>-->
<!--                                        <li> Secondary SMTP Port-->
<!--                                            <input class="form-control input-inline input-sm input-small" value="3560" /> </li>-->
<!--                                        <li> Notify On System Error-->
<!--                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>-->
<!--                                        <li> Notify On SMTP Error-->
<!--                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>-->
<!--                                    </ul>-->
<!--                                    <div class="inner-content">-->
<!--                                        <button class="btn btn-success">-->
<!--                                            <i class="icon-settings"></i> Save Changes</button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
        </div>
    </div>

<!-- END QUICK NAV -->
<!--[if lt IE 9]>






    <footer>
        <div class="page-wrapper-row">
        <div class="page-wrapper-bottom">
            <!-- BEGIN FOOTER -->
    <!-- BEGIN PRE-FOOTER -->
    <div class="page-prefooter">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                    <h2>About</h2>
                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam dolore. </p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs12 footer-block">
                    <h2>Subscribe Email</h2>
                    <div class="subscribe-form">
                        <form action="javascript:;">
                            <div class="input-group">
                                <input type="text" placeholder="mail@email.com" class="form-control">
                                <span class="input-group-btn">
                                                    <button class="btn" type="submit">Submit</button>
                                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                    <h2>Follow Us On</h2>
                    <ul class="social-icons">
                        <li>
                            <a href="javascript:;" data-original-title="rss" class="rss"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="facebook" class="facebook"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="twitter" class="twitter"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="googleplus" class="googleplus"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="linkedin" class="linkedin"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="youtube" class="youtube"></a>
                        </li>
                        <li>
                            <a href="javascript:;" data-original-title="vimeo" class="vimeo"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                    <h2>Contacts</h2>
                    <address class="margin-bottom-40"> Phone: 800 123 3456
                        <br> Email:
                        <a href="mailto:info@metronic.com">info@metronic.com</a>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <!-- END PRE-FOOTER -->
    <!-- BEGIN INNER FOOTER -->

    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
    <!-- END INNER FOOTER -->
    <!-- END FOOTER -->
</div>
</div>
</div>
<!-- BEGIN QUICK NAV -->
<!--<nav class="quick-nav">-->
<!--    <a class="quick-nav-trigger" href="#0">-->
<!--        <span aria-hidden="true"></span>-->
<!--    </a>-->
<!--    <ul>-->
<!--        <li>-->
<!--            <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank" class="active">-->
<!--                <span>Purchase Metronic</span>-->
<!--                <i class="icon-basket"></i>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/reviews/4021469?ref=keenthemes" target="_blank">-->
<!--                <span>Customer Reviews</span>-->
<!--                <i class="icon-users"></i>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="http://keenthemes.com/showcast/" target="_blank">-->
<!--                <span>Showcase</span>-->
<!--                <i class="icon-user"></i>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="http://keenthemes.com/metronic-theme/changelog/" target="_blank">-->
<!--                <span>Changelog</span>-->
<!--                <i class="icon-graph"></i>-->
<!--            </a>-->
<!--        </li>-->
<!--    </ul>-->
<!--    <span aria-hidden="true" class="quick-nav-bg"></span>-->
<!--</nav>-->
<div class="quick-nav-overlay"></div>
    </footer>
<?= $this->html->script('../assets/global/plugins/respond.min.js') ?>
<?= $this->html->script('../assets/global/plugins/excanvas.min.js') ?>
<?= $this->html->script('../assets/global/plugins/ie8.fix.min.js') ?>
<!--[endif]-->
<!-- BEGIN CORE PLUGINS -->

<?= $this->html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>
<?= $this->html->script('../assets/global/plugins/js.cookie.min.js') ?>
<?= $this->html->script('../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>
<?= $this->html->script('../assets/global/plugins/jquery.blockui.min.js') ?>
<?= $this->html->script('../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<?= $this->html->script('../assets/global/scripts/app.min.js') ?>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<?= $this->html->script('../assets/layouts/layout3/scripts/layout.min.js') ?>
<?= $this->html->script('../assets/layouts/layout3/scripts/demo.min.js') ?>
<?= $this->html->script('../assets/layouts/global/scripts/quick-sidebar.min.js') ?>
<?= $this->html->script('../assets/layouts/global/scripts/quick-nav.min.js') ?>
<?= $this->Html->script('../build/jquery.datetimepicker.full.min.js') ?>
<?= $this->Html->css('../css/jquery.datetimepicker.css') ?>
<script>

    //datetimepicker on date field
    $('#datepicker').datetimepicker({
        timepicker:false,
        format: "Y-m-d"
    });
</script>
</body>

<!-- END THEME LAYOUT SCRIPTS -->
</html>

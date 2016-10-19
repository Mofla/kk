<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>

    <!--<style>
        #taille {
            width: 240px;
            height: 212px;
        }
    </style>-->

    <meta charset="utf-8"/>
    <title>Metronic | The Ultimate Multi-purpose Bootstrap Admin Dashboard Theme | Theme #3 | Portfolio 1</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta
        content="#1 selling multi-purpose bootstrap admin theme sold in themeforest marketplace packed with angularjs, material design, rtl support with over thausands of templates and ui elements and plugins to power any type of web applications including saas and admin dashboards. Preview page of Theme #3 for Portfolio 1 - Basic Grid"
        name="description"/>
    <meta content="" name="author"/>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"
          type="text/css"/>


    <link href="../assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css"/>


    <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css"/>


    <link href="../assets/pages/css/portfolio.min.css" rel="stylesheet" type="text/css"/>


    <link href="../assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="../assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid">
<div class="page-wrapper">
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content">
                        <div class="container">
                            <!-- BEGIN PAGE CONTENT INNER -->
                            <div class="page-content-inner">
                                <div class="portfolio-content portfolio-1">
                                    <div id="js-filters-juicy-projects" class="cbp-l-filters-button">
                                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase">All
                                            <div class="cbp-filter-counter"></div>
                                        </div>
                                        <?php foreach ($promotions as $promotion): ?>
                                            <div data-filter=".<?= $promotion->promotion ?>" class="cbp-filter-item btn dark btn-outline uppercase">Promotion <?= $promotion->promotion ?>
                                                <div class="cbp-filter-counter"></div>
                                            </div>
                                        <?php endforeach; ?>

                                        <div id="js-grid-juicy-projects">
                                            <?php foreach ($users as $user): ?>
                                                <div class="cbp-item . <?= $user->promotion ?>" id="taille">
                                                    <div class="cbp-caption">
                                                        <div class="cbp-caption-defaultWrap"
                                                             style="background-color: #444d58">
                                                            <img src="../uploads/user/<?= $user->picture_url ?>" alt="" style="border: 1px solid black"></div>
                                                        <div class="cbp-caption-activeWrap">
                                                            <div class="cbp-l-caption-alignCenter">
                                                                <div class="cbp-l-caption-body">
                                                                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $user->id]); ?>"
                                                                       class="cbp-singlePage cbp-l-caption-buttonLeft btn green uppercase ">Profil</a>
                                                                    <a href="<?= $this->Url->build(['controller' => 'Portfolios', 'action' => '/', $user->id])?>"
                                                                       class="cbp-l-caption-buttonRight btn green uppercase ">Projets</a>
                                                                    <!--cbp-singlePage -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="cbp-l-grid-projects-title uppercase text-center"><?= h($user->firstname) ?></div>
                                                    <div
                                                        class="cbp-l-grid-projects-desc uppercase text-center"><?= h($user->lastname) ?></div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <br>
                                        <div class="paginator">
                                            <ul class="pagination">
                                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                                <?= $this->Paginator->numbers() ?>
                                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                            </ul>
                                            <p><?= $this->Paginator->counter() ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PAGE CONTENT INNER -->
                            </div>
                        </div>
                        <!-- END PAGE CONTENT BODY -->
                        <!-- END CONTENT BODY -->
                    </div>
                    <!-- END CONTENT -->
                </div>

                <!-- END CONTAINER -->
            </div>
        </div>
    </div>
    <!--[if lt IE 9]>
    <script src="../assets/global/plugins/respond.min.js"></script>
    <script src="../assets/global/plugins/excanvas.min.js"></script>
    <script src="../assets/global/plugins/ie8.fix.min.js"></script>
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="../assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../assets/pages/scripts/portfolio-1.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
    <script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
    <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>


<head>
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
    <link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"
          type="text/css"/>


    <link href="../../assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css"/>


    <link href="../../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="../../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css"/>


    <link href="../../assets/pages/css/portfolio.min.css" rel="stylesheet" type="text/css"/>


    <link href="../../assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="../../assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="favicon.ico"/>

</head>
<div class="page-content-inner">
    <div class="profile">
        <div class="tabbable-line tabbable-full-width">
            <ul class="nav nav-tabs">
                <li>
                    <a href="#tab_1_3" data-toggle="tab"> Présentation</a>
                </li>
                <li class="active">
                    <a href="#tab_1_1" data-toggle="tab"> Apprenants</a>
                </li>
                <li>
                    <a href="#tab_1_6" data-toggle="tab"> Projets</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">
                    <div class="row">
                        <div class="col-md-12">
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
                                                                <div class="row profile-account">
                                                                    <div class="col-md-12">
                                                                        <div class="related">
                                                                            <h2 class="text-center" style="font-size: 40px; font-weight: 900"><?= __('Apprenants Promotion' . ' ' . $promotion->year) ?></h2>
                                                                            <br>
                                                                            <?php if (!empty($promotion->users)): ?>
                                                                            <div id="js-grid-juicy-projects">
                                                                                <?php foreach ($promotion->users as $users): ?>
                                                                                    <div class="cbp-item" id="taille">
                                                                                        <div class="cbp-caption">
                                                                                            <div class="cbp-caption-defaultWrap"
                                                                                                 style="background-color: #444d58">
                                                                                                <img
                                                                                                    src="../../uploads/user/<?= $users->picture_url ?>"
                                                                                                    alt=""
                                                                                                    style="border: 1px solid black; max-height: 215px ">
                                                                                            </div>
                                                                                            <div class="cbp-caption-activeWrap">
                                                                                                <div
                                                                                                    class="cbp-l-caption-alignCenter">
                                                                                                    <div
                                                                                                        class="cbp-l-caption-body">
                                                                                                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $users->id, 'prefix' => false]); ?>"
                                                                                                           class="cbp-singlePage cbp-l-caption-buttonLeft btn green uppercase ">Profil</a>
                                                                                                        <a href="<?= $this->Url->build(['controller' => 'Portfolios', 'action' => '/', $users->id, 'prefix' => false]) ?>"
                                                                                                           class="cbp-l-caption-buttonRight btn green uppercase ">Projets</a>
                                                                                                        <!--cbp-singlePage -->
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="cbp-l-grid-projects-title uppercase text-center"><?= h($users->firstname) ?></div>
                                                                                        <div
                                                                                            class="cbp-l-grid-projects-desc uppercase text-center"><?= h($users->lastname) ?></div>
                                                                                    </div>
                                                                                <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <!--<div class="paginator">
                                <ul class="pagination">
                                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('next') . ' >') ?>
                                </ul>
                                <p><?= $this->Paginator->counter() ?></p>
                            </div>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- END PAGE CONTENT INNER -->
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
                                </div>
                                <!--end tab-pane-->
                            </div>

                        </div>
                    </div>
                </div>
                <!--tab_1_2-->
                <div class="tab-pane" id="tab_1_3">
                    <div class="promotions view large-12 medium-8 columns content" style="background-color: red">
                        <img src="../../uploads/promotion/<?= $promotion->picture_url?>" style="width: 100%; height: 600px">
                    </div>
                    <div class="promotions view large-12 medium-8 columns content" style="background-color: yellow">
                        <h2 class="text-center" style="font-size: 40px; font-weight: 900"><?= h($promotion->name) ?></h2>
                                <!--<?=$this->Html->image('../../uploads/promotion/'.$promotion->picture_url )?>-->
                            <h3 class="text-center" style="font-weight: 900"><?= __('Description') ?></h3>
                            <?= $this->Text->autoParagraph(h($promotion->description)); ?>
                    </div>



                    <!--end tab-pane-->
                    <div class="tab-pane" id="tab_1_6">
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- END CONTAINER -->
            </div>
        </div>
    </div>
</div>
<script src="/../assets/global/plugins/respond.min.js"></script>
<script src="/../assets/global/plugins/excanvas.min.js"></script>
<script src="/../assets/global/plugins/ie8.fix.min.js"></script>
<!-- BEGIN CORE PLUGINS -->
<script src="/../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/../assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/../assets/pages/scripts/portfolio-1.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="/../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="/../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="/../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="/../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>



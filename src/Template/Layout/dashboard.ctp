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

$cakeDescription = 'Simplon Epinal';
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
    <meta content="Simplon Epinal numérique dev web développeur developper internet école formation"
          name="description" />
    <meta content="" name="Simplon" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <?= $this->Html->css('../assets/global/plugins/font-awesome/css/font-awesome.min.css') ?>
    <!--<?= $this->Html->css('../assets/global/plugins/simple-line-icons/simple-line-icons.min.css') ?>--->
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
    <?= $this->Html->meta(
        'favicon.ico',
        '/favicon.ico',
        ['type' => 'icon']
    );
    ?>
</head>


<body class="page-container-bg-solid">
<div class="page-wrapper">
    <?php $id = $this->request->session()->read('Auth.User.id')?>
    <?php echo $this->cell('Menu::display', [$id]);?>
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

                            <!-- BEGIN PAGE BREADCRUMBS -->
                            <!-- END PAGE BREADCRUMBS -->
                            <!-- BEGIN PAGE CONTENT INNER -->
                            <div class="page-content-inner">
                                <?= $this->fetch('content') ?>
                            </div>
                            <!-- END PAGE CONTENT INNER -->

                    </div>
                    <!-- END PAGE CONTENT BODY -->
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->

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
    
    <!-- END PRE-FOOTER -->
    <!-- BEGIN INNER FOOTER -->

    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
    <!-- END INNER FOOTER -->
    <!-- END FOOTER -->
</div>



<div class="quick-nav-overlay"></div>
</footer>
<!--<?= $this->html->script('../assets/global/plugins/respond.min.js') ?>-->
<!--<?= $this->html->script('../assets/global/plugins/excanvas.min.js') ?>-->
<!--<?= $this->html->script('../assets/global/plugins/ie8.fix.min.js') ?>-->
<!--&lt;!&ndash;[endif]&ndash;&gt;-->
<!--&lt;!&ndash; BEGIN CORE PLUGINS &ndash;&gt;-->

<?= $this->html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>
<!--<?= $this->html->script('../assets/global/plugins/js.cookie.min.js') ?>-->
<!--<?= $this->html->script('../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>-->
<!--<?= $this->html->script('../assets/global/plugins/jquery.blockui.min.js') ?>-->
<!--<?= $this->html->script('../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>-->
<!--&lt;!&ndash; END CORE PLUGINS &ndash;&gt;-->
<!--&lt;!&ndash; BEGIN THEME GLOBAL SCRIPTS &ndash;&gt;-->
<!--<?= $this->html->script('../assets/global/scripts/app.min.js') ?>-->
<!--&lt;!&ndash; END THEME GLOBAL SCRIPTS &ndash;&gt;-->
<!--&lt;!&ndash; BEGIN THEME LAYOUT SCRIPTS &ndash;&gt;-->
<!--<?= $this->html->script('../assets/layouts/layout3/scripts/layout.min.js') ?>-->
<!--<?= $this->html->script('../assets/layouts/layout3/scripts/demo.min.js') ?>-->
<!--<?= $this->html->script('../assets/layouts/global/scripts/quick-sidebar.min.js') ?>-->
<!--<?= $this->html->script('../assets/layouts/global/scripts/quick-nav.min.js') ?>-->
<!--<?= $this->Html->script('../js/jquery.js') ?>-->
<!--<?= $this->Html->script('../build/jquery.datetimepicker.full.min.js') ?>-->
<!--<?= $this->Html->css('../css/jquery.datetimepicker.css') ?>-->



</body>

<!-- END THEME LAYOUT SCRIPTS -->
</html>

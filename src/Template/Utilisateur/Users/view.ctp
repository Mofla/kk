<?php $this->layout = 'front'; ?>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<style>
    .op:hover {
        opacity: 0.5;
    }

    ul {
        list-style: none;
    }

    .lang {
        background-color: #ed1450;
        color: white;
        width: 110px;
        border: 1px solid white;
    }

    .info {
        font-size: 18px;
    }
</style>

<!-- END PAGE TITLE -->
<!-- BEGIN PAGE TOOLBAR -->
<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">
            <div class="profile">
                <div class="tabbable-line tabbable-full-width">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="list-unstyled profile-nav">
                                        <li>
                                            <?= $this->Html->image('../uploads/user/' . $user->picture_url, ['class' => 'img-responsive pic-bordered']) ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h1 class="text-center"
                                                        style="font-weight: 900; color: #327ad5"><?= $user->firstname ?> <?= $user->lastname ?></h1>
                                                </div>
                                                <div class="panel-body" style="min-height: 170px">
                                                    <?php foreach ($promotions as $promotion): ?>
                                                        <?php
                                                        // Cut the description if too long
                                                        $description = mb_substr($promotion->description, 0, 550);
                                                        echo $description;
                                                        echo (strlen($description) < strlen($promotion->description)) ? '...' : '';
                                                        ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 info text-center">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h1 class="text-center" style="font-weight: 900; color: #327ad5">
                                                        Informations</h1>
                                                </div>
                                                <div class="panel panel-body">
                                                    <i class="fa fa-map-marker "></i> <?= $user->city ?><br>
                                                    <i class="fa fa-birthday-cake "></i> <?= $user->birthday ?><br>
                                                    <i class="fa fa-at "></i> <?= $user->email ?>
                                                    <?php foreach ($promotions as $promotion): ?>
                                                        <div class="social-icons" style="margin-top: 13px">
                                                            <?php if ($promotion->facebook_link != '') { ?>
                                                                <a href="<?= ($promotion->facebook_link) ?>">
                                                                    <i class="fa fa-facebook-official op"
                                                                       style="font-size: 45px" title="Facebook"></i></a>
                                                            <?php } else { ?>
                                                                <i class="fa fa-facebook-official op"
                                                                   style="font-size: 45px;color: grey"></i>
                                                            <?php } ?>
                                                            <?php if ($promotion->twitter_link != '') { ?>
                                                                <a href="<?= ($promotion->twitter_link) ?>">
                                                                    <i class="fa fa-twitter-square op"
                                                                       style="color: lightskyblue;font-size: 45px"
                                                                       title="Twitter"></i></a>
                                                            <?php } else { ?>
                                                                <i class="fa fa-twitter-square op"
                                                                   style="color: grey;font-size: 45px"></i>
                                                            <?php } ?>
                                                            <?php if ($promotion->linkedin_link != '') { ?>
                                                                <a href="<?= ($promotion->linkedin_link) ?>">
                                                                    <i class="fa fa-linkedin-square op"
                                                                       style="color: blue;font-size: 45px"
                                                                       title="Linkedin"></i></a>
                                                            <?php } else { ?>
                                                                <i class="fa fa-linkedin-square op"
                                                                   style="color: grey;font-size: 45px"></i>
                                                            <?php } ?>
                                                            <?php if ($user->github_username != '') { ?>
                                                                <a href="https://github.com/<?= $user->github_username ?>">
                                                                    <i class="fa fa-github-square op"
                                                                       style="color: black;font-size: 45px"
                                                                       title="Github"></i></a>
                                                            <?php } else { ?>
                                                                <i class="fa fa-github-square op"
                                                                   style="color: grey;font-size: 45px"></i>
                                                            <?php } ?>
                                                            <?php if ($promotion->web_site != '') { ?>
                                                                <a href="<?= ($promotion->web_site) ?>">
                                                                    <i class="fa fa-at op"
                                                                       style="color: red;font-size: 45px"
                                                                       title="Accéder au site web"></i></a>
                                                            <?php } else { ?>
                                                                <i class="fa fa-at op"
                                                                   style="color: grey;font-size: 45px"></i>
                                                            <?php } ?>
                                                            <?php if ($promotion->cv_url != '') { ?>
                                                                <a href="../../uploads/cv/<?= ($promotion->cv_url) ?>">
                                                                    <i class="fa fa-file-pdf-o"
                                                                       style="font-size: 45px"
                                                                       title="Télécharger le CV"></i></a>
                                                            <?php } else { ?>
                                                                <i class="fa fa-file-pdf-o"
                                                                   style="font-size: 45px;color: grey"></i>
                                                            <?php } ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-8-->
                                    </div>
                                    <br>
                                    <!--end row-->
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <?php foreach ($promotions as $promotion): ?>
                                            <h1 style="font-weight: 900; color: #327ad5">Languages Maitrisés</h1>
                                        </div>
                                        <div class="panel-body">
                                            <?php if ($promotion->language_html) { ?>
                                                <div><span class="btn lang">HTML</span></div>
                                            <?php } ?>
                                            <?php if ($promotion->language_css) { ?>
                                                <div><span class="btn lang">CSS</span></div>
                                            <?php } ?>
                                            <?php if ($promotion->language_javascript) { ?>
                                                <div><span class="btn lang">JAVASCRIPT</span></div>
                                            <?php } ?>
                                            <?php if ($promotion->language_jquery) { ?>
                                                <div><span class="btn lang">JQUERY</span></div>
                                            <?php } ?>
                                            <?php if ($promotion->language_php) { ?>
                                                <div><span class="btn lang">PHP</span></div>
                                            <?php } ?>
                                            <?php if ($promotion->language_sql) { ?>
                                                <div><span class="btn lang">SQL</span></div>
                                            <?php } ?>
                                            <?php if ($promotion->language_cakephp) { ?>
                                                <div><span class="btn lang">CAKEPHP</span></div>
                                            <?php } ?>
                                            <?php if ($promotion->language_bootstrap) { ?>
                                                <div><span class="btn lang">BOOTSTRAP</span></div>
                                            <?php } ?>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h1 class="text-center" style="font-weight: 900; color: #327ad5">
                                                Projets</h1>
                                        </div>
                                        <div class="panel-body">
                                            <?php foreach ($user->projects as $projects): ?>
                                                <div class="col-md-4 well text-center"
                                                     style="background-color: white;min-height: 350px;border: 1px solid lightblue">
                                                    <div style="min-height: 300px">
                                                        <?= $this->Html->image('../uploads/portfolios/' . $projects->picture_url, ['class' => 'img-responsive']) ?>
                                                        <h3 style="font-weight: 900"><?= $projects->name ?></h3>
                                                    </div>

                                                    <div>
                                                        <a href="<?= $this->Url->build(['controller' => 'Portfolios', 'action' => 'view', $projects->id, 'prefix' => 'portfolios']) ?>"
                                                           class="btn btn-info">Détails</a>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->
    </div>
</div>

<!--<div class="row">
    <div class="col-md-12" style="background-color: yellow">


    </div>
</div>-->


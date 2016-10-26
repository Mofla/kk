<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<style>
    .op:hover {
        opacity: 0.5;
    }
    ul {
        list-style: none;
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
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab"> Profil </a>
                        </li>
                    </ul>
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
                                        <div class="col-md-6 profile-info">

                                            <h1 class="font-green sbold uppercase"><?= $user->firstname ?> <?= $user->lastname ?></h1>
                                            <div class="list-inline" style="font-size: 18px">
                                                <i class="fa fa-map-marker"></i> <?= $user->city ?><br>
                                                <i class="fa fa-birthday-cake"></i> <?= $user->birthday ?><br>
                                                <i class="fa fa-phone"></i> <?= $user->phone ?><br>
                                                <i class="fa fa-mobile"></i> <?= $user->cellphone ?><br>
                                                <i class="fa fa-at"></i> <?= $user->email ?><br>
                                                <i class="fa fa-user"></i> <?= $user->role->name ?><br>
                                                <?php foreach ($promotions as $promotion): ?>
                                                    <div class="social-icons" style="margin-top: 13px">
                                                        <?php if ($promotion->facebook_link != '') { ?>
                                                            <a href="<?= ($promotion->facebook_link) ?>">
                                                                <i class="fa fa-facebook-official op" style="font-size: 45px"></i></a>
                                                        <?php } else { ?>
                                                            <i class="fa fa-facebook-official op" style="font-size: 45px;color: grey"></i>
                                                        <?php } ?>
                                                        <?php if ($promotion->twitter_link != '') { ?>
                                                            <a href="<?= ($promotion->twitter_link) ?>">
                                                                <i class="fa fa-twitter-square op" style="color: lightskyblue;font-size: 45px"></i></a>
                                                        <?php } else { ?>
                                                            <i class="fa fa-twitter-square op" style="color: grey;font-size: 45px"></i>
                                                        <?php } ?>
                                                        <?php if ($promotion->linkedin_link != '') { ?>
                                                            <a href="<?= ($promotion->linkedin_link) ?>">
                                                                <i class="fa fa-linkedin-square op" style="color: blue;font-size: 45px"></i></a>
                                                        <?php } else { ?>
                                                            <i class="fa fa-linkedin-square op" style="color: grey;font-size: 45px"></i>
                                                        <?php } ?>
                                                        <?php if ($user->github_username != '') { ?>
                                                            <a href="https://github.com/<?= $user->github_username ?>">
                                                                <i class="fa fa-github-square op" style="color: black;font-size: 45px"></i></a>
                                                        <?php } else { ?>
                                                            <i class="fa fa-github-square op" style="color: grey;font-size: 45px"></i>
                                                        <?php } ?>
                                                        <?php if ($promotion->web_site != '') { ?>
                                                            <a href="<?= ($promotion->web_site) ?>">
                                                                <i class="fa fa-at op" style="color: red;font-size: 45px"></i></a>
                                                        <?php } else { ?>
                                                            <i class="fa fa-at op" style="color: grey;font-size: 45px"></i>
                                                        <?php } ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <h1 class="font-green sbold uppercase text-center">Description</h1>
                                            <?php foreach ($promotions as $promotion): ?>
                                                <?php
                                                // Cut the description if too long
                                                $description = mb_substr($promotion->description, 0, 550);
                                                echo $description;
                                                echo (strlen($description) < strlen($promotion->description)) ? '...' : '';
                                                ?>
                                            <?php endforeach; ?>
                                        </div>
                                        <!--end col-md-8-->
                                    </div>
                                    <br>
                                    <!--end row-->
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <?php foreach ($promotions as $promotion): ?>
                                        <h1 class="font-green sbold uppercase">languages maitrisés</h1>
                                        <ul>
                                            <?php if ($promotion->language_html) { ?>
                                            <li><span style="background-color: #444d58;color: white" class="btn">HTML</span></li>
                                            <?php } ?>
                                            <?php if ($promotion->language_css) { ?>
                                            <li><span style="background-color: #444d58;color: white" class="btn">CSS</span></li>
                                            <?php } ?>
                                            <?php if ($promotion->language_javascript) { ?>
                                            <li><span style="background-color: #444d58;color: white" class="btn">JAVASCRIPT</span></li>
                                            <?php } ?>
                                            <?php if ($promotion->language_jquery) { ?>
                                            <li><span style="background-color: #444d58;color: white" class="btn">JQUERY</span></li>
                                            <?php } ?>
                                            <?php if ($promotion->language_php) { ?>
                                            <li><span style="background-color: #444d58;color: white" class="btn">PHP</span></li>
                                            <?php } ?>
                                            <?php if ($promotion->language_sql) { ?>
                                            <li><span style="background-color: #444d58;color: white" class="btn">SQL</span></li>
                                            <?php } ?>
                                            <?php if ($promotion->language_cakephp) { ?>
                                            <li><span style="background-color: #444d58;color: white" class="btn">CAKEPHP</span></li>
                                            <?php } ?>
                                            <?php if ($promotion->language_bootstrap) { ?>
                                            <li><span style="background-color: #444d58;color: white" class="btn">BOOTSTRAP</span></li>
                                            <?php } ?>
                                        </ul>
                                    <?php endforeach; ?>
                                </div>
                                <div class="col-md-9">
                                    <h1 class="font-green sbold uppercase text-center">projets</h1>
                                    <?php foreach ($user->projects as $projects): ?>
                                        <div class="col-md-4 well text-center" style="background-color: white">
                                            <?= $this->Html->image('../uploads/portfolios/' . $projects->picture_url, ['class' => 'img-responsive']) ?>
                                            <h3 style="font-weight: 900"><?= $projects->name ?></h3>
                                            <a href="<?= $this->Url->build(['controller' => 'Portfolios', 'action' => 'view', $projects->id, 'prefix' => 'portfolios']) ?>"
                                               class="cbp-l-caption-buttonRight btn green uppercase ">Détails</a>
                                        </div>
                                    <?php endforeach; ?>
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


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Promotion'), ['action' => 'edit', $promotion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Promotion'), ['action' => 'delete', $promotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>


<div class="page-content-inner">
    <div class="profile">
        <div class="tabbable-line tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1_1" data-toggle="tab"> Présentation </a>
                </li>
                <li>
                    <a href="#tab_1_3" data-toggle="tab"> Apprenants </a>
                </li>
                <li>
                    <a href="#tab_1_6" data-toggle="tab"> Projets </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="promotions view large-9 medium-8 columns content">
                                <h3><?= h($promotion->name) ?></h3>
                                <table class="vertical-table">
                                    <tr>
                                        <th scope="row"><?= __('Name') ?></th>
                                        <td><?= h($promotion->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Picture Url') ?></th>
                                        <td><?= h($promotion->picture_url) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Id') ?></th>
                                        <td><?= $this->Number->format($promotion->id) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Year') ?></th>
                                        <td><?= $this->Number->format($promotion->year) ?></td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <h4><?= __('Description') ?></h4>
                                    <?= $this->Text->autoParagraph(h($promotion->description)); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--tab_1_2-->
                <div class="tab-pane" id="tab_1_3">
                    <div class="row profile-account">
                        <div class="col-md-9">
                            <div class="related">
                                <h4><?= __('Related Users') ?></h4>
                                <?php if (!empty($promotion->users)): ?>
                                <div id="js-grid-juicy-projects">
                                    <?php foreach ($promotion->users as $users): ?>
                                        <div class="cbp-item" id="taille">
                                            <div class="cbp-caption">
                                                <div class="cbp-caption-defaultWrap"
                                                     style="background-color: #444d58">
                                                    <img src="../uploads/user/<?= $users->picture_url ?>" alt=""
                                                         style="border: 1px solid black; max-height: 215px ">
                                                </div>
                                                <div class="cbp-caption-activeWrap">
                                                    <div class="cbp-l-caption-alignCenter">
                                                        <div class="cbp-l-caption-body">
                                                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $users->id]); ?>"
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
                                    </table>
                                    <?php endif; ?>
                                </div>
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
                    <!--end tab-pane-->
                    <div class="tab-pane" id="tab_1_6">
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT INNER -->
</div>
</div>
<!-- END PAGE CONTENT BODY -->
<!-- END CONTENT BODY -->
</div>



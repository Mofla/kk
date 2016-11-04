<?php use Cake\Utility\TextHelper; ?>


<h3><?= __('Mes journaux') ?></h3><hr>
    <div class="container">
    <div class="row">
        <?php foreach ($diaries as $diary): ?>
        <div class="col-md-4">
                <div class="clearfix">
                    <div class="panel panel-primary">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-9">
                            <h3 class="panel-title"> <?=
                                    $this->Text->truncate($diary->project->description,40,[
                                        'ellipsis' => '...',
                                        'exact' => false
                                    ]) ;?>
                                  </h3>
                                </div>
                                <div class="col-md-2">
                            <div class="actions">
                                <div class="btn-group">
                                    <a
                                        class="btn btn-default btn-sm"
                                        style="background-color: #f4d03f;" href=<?= $this->Url->build(['controller' => 'Diaries', 'action' => 'view', $diary->id]);?> ><i class="glyphicon glyphicon-eye-open"></i></a>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel-body">
                            <p><?=h($this->Text->truncate($diary->project->description,40,[
                                    'ellipsis' => '...',
                                    'exact' => false
                                ]));?></p>
                        </div>
                        <!-- List group -->
                        <ul class="list-group">
                            <li class="list-group-item"><?= h($this->Text->truncate(end($diary->entries)->content ,30 ,[
                                    'ellipsis' => '...',
                                    'exact' => false
                                ]));?>
                                <span class="badge badge-success"><span> <?= h(end($diary->entries)->date)?></span>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
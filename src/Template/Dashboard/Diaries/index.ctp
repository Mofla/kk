
    <h3><?= __('Mes journaux') ?></h3><hr>
    <div class="page-content-inner">
    <div class="row">
        <div class="col-md-4">
            <?php foreach ($diaries as $diary): ?>
                <div class="clearfix">
                    <div class="panel panel-warning">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            <h3 class="panel-title"> <?= $diary->has('project') ? $this->Html->link($diary->project->name, ['controller' => 'Diaries', 'action' => 'view', $diary->id]) : '' ?></h3>
                        </div>
                        <div class="panel-body">
                            <p><?=h($diary->project->description);?></p>
                        </div>
                        <!-- List group -->
                        <ul class="list-group">
            <?php foreach ($diary->entries as $entry): ?>

                            <li class="list-group-item"><?= h($entry->content)?>
                                <span class="badge badge-success"><span> <?= h($entry->date)?></span>
                            </li>
            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
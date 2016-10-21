<div id="taskModal" class="modal bs-example-modal-lg fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">


                <div class="tasks view large-12 medium-12 columns content">
                    <?php if ($task->state->name == "todo"): ?>
                    <div class="portlet box  blue" id="task-<?= $task->id ?>">
                        <div class="portlet-title">
                            <div class="caption">TODO : <?= $task->name ?> - Projet : <?= $task->project->name ?> -
                                Du <?= $task->start_date ?> Au <?= $task->end_date ?></div>
                            <?php endif; ?>
                            <?php if ($task->state->name == "doing"): ?>
                            <div class="portlet box  yellow-soft" id="task-<?= $task->id ?>">
                                <div class="portlet-title">
                                    <div class="caption">DOING : <?= $task->name ?> - Projet
                                        : <?= $task->project->name ?> - Du <?= $task->start_date ?>
                                        Au <?= $task->end_date ?></div>
                                    <?php endif; ?>
                                    <?php if ($task->state->name == "done"): ?>
                                    <div class="portlet box  green-jungle" id="task-<?= $task->id ?>">
                                        <div class="portlet-title">
                                            <div class="caption">DONE : <?= $task->name ?> - Projet
                                                : <?= $task->project->name ?> - Du <?= $task->start_date ?>
                                                Au <?= $task->end_date ?></div>
                                            <?php endif; ?>

                                            <div class="actions">
                                                <div class="btn-group">
                                                    <a class="btn btn-default btn-sm" href="javascript:;"
                                                       data-toggle="dropdown">
                                                        <i class="icon-wrench"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <?= $this->Html->link('<i class="fa fa-pencil"></i> Editer ', ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['id' => 'task-' . $task->id, 'class' => 'edittask', 'escape' => false]) ?>
                                                        </li>
                                                        <li>
                                                            <?= $this->Form->postLink('<i class="glyphicon glyphicon-trash"></i> Supprimer', ['controller' => 'Tasks', 'action' => 'delete', $task->id], ['escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                                                        </li>
                                                        <li>
                                                            <a data-dismiss="modal">X Fermer</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="portlet box grey-cascade">
                                                        <div class="portlet-title">
                                                            <div class="caption">Description</div>
                                                            <div class="actions">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-default btn-sm"><i
                                                                            class="icon-wrench"></i> </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <?= $this->Text->autoParagraph(h($task->description)); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="portlet box grey-salsa">
                                                        <div class="portlet-title">
                                                            <div class="caption">Utilisateurs</div>
                                                            <div class="actions">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-default btn-sm"><i
                                                                            class="icon-wrench"></i> </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <?php if (!empty($task->users)): ?>
                                                                <table cellpadding="0" cellspacing="0">
                                                                    <?php foreach ($task->users as $users): ?>
                                                                        <tr>
                                                                            <td><?= h($users->firstname) ?></td>
                                                                            <td><?= h($users->lastname) ?></td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </table>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="portlet box grey-silver">
                                                    <div class="portlet-title">
                                                        <div class="caption">Fil de discussion</div>
                                                        <div class="actions">
                                                            <div class="btn-group">
                                                                <a class="btn btn-default btn-sm"><i
                                                                        class="glyphicon glyphicon-eye-open"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="forum"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- <div class="modal-footer">
                                     <button class="btn" data-dismiss="modal">Annuler</button>
                                 </div>-->
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    //loads the forum and changed its behaviour
                    function getThread() {
                        //thread url
                        var url = '<?= $this->Url->build(['controller' => 'Forums/Threads', 'action' => 'view', $task->thread_id, 'prefix' => false]); ?>';
                        //loads the forum
                        $('#forum').load(url, function () {

                            //hides shit
                            $('.dash-hide').hide();

                            //listener on post button
                            $('.dash-post').on('click', function (event) {
                                event.preventDefault();
                                var postUrl = $(this).attr('href').split('/');
                                var loadUrl = '<?= $this->Url->build(['controller' => 'Forums/Posts', 'action' => 'add', 'prefix' => false]); ?>' + '/' + postUrl[4];

                                $('#forum').load(loadUrl, function (event) {
                                   /* $('.dash-posted').on('click', function () {
                                        console.log('bite');
                                    })*/



                                });
                            })
                        });
                    }
                   getThread();

                </script>
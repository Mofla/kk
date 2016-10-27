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

                    var action = "";
                    //loads the forum and changed its behaviour
                    function getThread(action) {

                        //scrolls to bottom after adding a post
                        //todo: fixit
                        if (action == 'add') {

                            $('html, body').animate({
                                scrollTop: $(document).height()
                            });
                        }

                        //thread url
                        var url = '<?= $this->Url->build(['action' => 'viewforum', $task->thread_id]); ?>';
                        //loads the forum
                        $('#forum').load(url, function () {

                            //hides shit
                            $('.dash-hide').hide();
                            $('#search-forum-input').hide();
                            $('#search-forum').hide();

                            //listener on post button
                            $('.dash-post').on('click', function (event) {
                                event.preventDefault();
                                var postUrl = $(this).attr('href').split('/');
                                var loadUrl = '<?= $this->Url->build(['action' => 'addpost']); ?>' + '/' + postUrl[4];


                                $('#forum').load(loadUrl, function () {
                                    $('.dash-hide').hide();
                                    $('.dash-posted').on('click', function () {
                                        event.preventDefault();

                                        var preUrl = $('.form-post').attr('action').split('/');
                                        var postedUrl = '<?= $this->Url->build(['action' => 'addpost']); ?>' + '/' + preUrl[4];

                                        var data = {
                                            title: $('.dash-title').val(),
                                            message: $('.note-editable').text()

                                        };
                                        $.ajax({
                                            type: 'post',
                                            data: data,
                                            url: postedUrl,
                                            success: function () {
                                                getThread('add');
                                            }
                                        })
                                    })
                                });
                            })
                        });
                    }
                   getThread();

                </script>
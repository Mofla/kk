<div class="col-md-12">
    <div class="todo-ui">
        <!-- BEGIN TODO CONTENT -->
        <div class="todo-content">
            <div class="portlet light ">
                <!-- PROJECT HEAD -->
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bar-chart font-green-sharp hide"></i>
                        <span class="caption-helper">PROJET : </span> &nbsp;
                        <span
                            class="caption-subject font-green-sharp bold uppercase"><?= $diary->project->name ?></span>
                    </div>
                </div>
                <!-- end PROJECT HEAD -->
                <div class="portlet-body">
                    <div class="row">
                        <div id="list" class="col-md-5 col-sm-4">
                            <!--start enties list -->
                            <div class="todo-tasklist">
                                <?php foreach ($diary->entries as $entries): ?>
                                <div id=<?=$entries->id ?> class="row cut">
                                    <div class="col-12">
                                        <div class="todo-tasklist-item todo-tasklist-item-border ">
                                            <div id="entrie<?=$entries->id ?>" class="todo-tasklist-item-text cut"><?= $entries->content ?>
                                            </div><br>
                                            <div class="todo-tasklist-controls pull-left">
                                                                                    <span class="todo-tasklist-date">
                                                                                        <i class="fa fa-calendar"></i><?= $entries->date ?></span>
                                            </div>
                                        </div>
                                        </div>
                                            </div>
                                    <hr>
                                                <?php endforeach; ?>

                                            </div>
                                            <!--end enties list -->
                                        </div>
                                        <div class="todo-tasklist-devider"></div>
                                        <div class="col-md-7 col-sm-8">

                                            <?= $this->Form->create($entries,
                                                ['class' => 'form-horizontal',
                                                    'type' => 'post',
                                                    'id' => 'sort'
//                            'url' => ['controller'=>'Entries','action' => 'edit',$entries->id]
                                                ]) ?>
                                            <!-- TASK HEAD -->
                                            <div class="form">
                                                <div class="form-group">
                                                    <div class="col-md-8 col-sm-8">
                                                        <div class="todo-taskbody-user">

                                                            <?= $this->Html->image('../uploads/user/' . $diary->user->picture_url,
                                                                ['class' => 'todo-userpic pull-left',
                                                                    'width' => '50px',
                                                                    'height' => '50px'
                                                                ]) ?>
                                                            <span
                                                                class="todo-username pull-left"><?= $diary->user->username ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="todo-taskbody-date pull-right">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END TASK HEAD -->
                                                <!-- TASK DESC -->
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <?= $this->Form->hidden($entries->id, ['id' => "id_entrie"]); ?>
                                                        <?= $this->Form->input('content',
                                                            ['label' => false,
                                                                'class' => 'form-control todo-taskbody-taskdesc',
                                                                'rows' => "8",

                                                            ]); ?>

                                                        <form id="content" action="#" class="form-horizontal form-bordered">
                                                            <div class="form-body">

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- END TASK DESC -->

                                                <div class="form-group">
                                                    <div class="col-md-12">

                                                    </div>
                                                    <!-- TASK TAGS -->
                                                    <div class="form-actions right todo-form-actions">
                                                        <?= $this->Form->button('Valider',
                                                            ['class' => 'btn btn-circle btn-sm green'
                                                            ]) ?>
                                                        <button class="btn btn-circle btn-sm btn-default">Annuler
                                                        </button>
                                                    </div>
                                                </div>

                                                <?= $this->Form->end() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TODO CONTENT -->
                        </div>
                    </div>

                    <script>
                        $("#sort").submit(function (e) {
                            e.preventDefault();
                            var data = $(this).serialize();
                            var edit = '<?= $this->Url->build(['controller' => 'Entries', 'action' => 'edit']); ?>';
                            var list = '<?= $this->Url->build(['controller' => 'Diaries', 'action' => 'view']); ?>?'

                            $.ajax({
                                url: edit,
                                type: 'post',
                                data: data
                        })
                            ;
                            console.log(edit);
                            console.log(data);
                            $('#list').load(list);

                        });
                    </script>

<script>
$('.cut').click(function() {
    var id = $(this).attr('id');
    var paste = $('#entrie'.concat(id)).text();
    $('#content').text(paste);
    $('#id_entrie').attr("name",id);
    console.log(id);
//    console.log(paste);
});
</script>

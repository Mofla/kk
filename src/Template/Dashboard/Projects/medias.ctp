<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>

<?= $this->Html->css('sweetalert.css') ?>


<div class="row" id="file-form" style="display: none">
    <div class="col-md-5 col-sm-5 col-xs-5">
        <div class="portlet box blue-chambray">
            <div class="portlet-title">
                <div class="caption">
                    Ajouter un fichier
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a id="close-form">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($file, ['enctype' => 'multipart/form-data']) ?>
                <input name="project_id" type="hidden" value="<?= $project->id ?>">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="input-group input-large">
                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                            <span class="fileinput-filename"> </span>
                        </div>
                        <span class="input-group-addon btn default btn-file">
                                                                                    <span class="fileinput-new"> Joindre un fichier </span>
                                                                                    <span class="fileinput-exists"> Modifier </span>
                                                                                    <input type="file"
                                                                                           name="upload"> </span>
                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists"
                           data-dismiss="fileinput">
                            Retirer </a>
                    </div>
                </div>
                <?= $this->Form->button('VALIDER', ['class' => 'btn blue-chambray']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <!--pour chaque fichier-->
    <?php foreach ($project->files as $files) : ?>


        <div class="col-md-2 col-sm-2 col-xs-2">
            <div class="portlet box  blue-chambray">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="glyphicon glyphicon-file fa-md"></span>
                        <?= $files->name ?>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a id="file-<?= $files->id ?>"
                               class="btn btn-default btn-sm delete-file"><i
                                    class="glyphicon glyphicon-trash"></i></a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body" style="text-align: center">
                    <!--recuperer l'extension-->

                    <?php $extension = explode(".", $files->name); ?>
                    <!--si fichier texte-->
                    <?php if ($extension[1] == 'txt') : ?>
                        <?= $this->Html->link(
                            $this->Html->image("../uploads/icons/ext/txt.png", ["alt" => "Fichier texte", 'class' => 'joint']),
                            "../uploads/dashboard/" . $files->name,
                            ['escape' => false, 'target' => '_blank']
                        ); ?>

                        <!--si fichier zip-->
                    <?php elseif ($extension[1] == 'zip') : ?>
                        <?= $this->Html->link(
                            $this->Html->image("../uploads/icons/ext/zip.png", ["alt" => "Fichier texte", 'class' => 'joint']),
                            "../uploads/dashboard/" . $files->name,
                            ['escape' => false, 'target' => '_blank']
                        ); ?>

                        <!--si fichier rar-->
                    <?php elseif ($extension[1] == 'rar') : ?>
                        <?= $this->Html->link(
                            $this->Html->image("../uploads/icons/ext/rar.png", ["alt" => "Fichier texte", 'class' => 'joint']),
                            "../uploads/dashboard/" . $files->name,
                            ['escape' => false, 'target' => '_blank']
                        ); ?>

                        <!--si fichier log-->
                    <?php elseif ($extension[1] == 'log') : ?>
                        <?= $this->Html->link(
                            $this->Html->image("../uploads/icons/ext/log.png", ["alt" => "Fichier texte", 'class' => 'joint']),
                            "../uploads/dashboard/" . $files->name,
                            ['escape' => false, 'target' => '_blank']
                        ); ?>

                        <!--si fichier pdf-->
                    <?php elseif ($extension[1] == 'pdf') : ?>
                        <?= $this->Html->link(
                            $this->Html->image("../uploads/icons/ext/pdf.png", ["alt" => "Fichier texte", 'class' => 'joint']),
                            "../uploads/dashboard/" . $files->name,
                            ['escape' => false, 'target' => '_blank']
                        ); ?>

                        <!--si fichier css-->
                    <?php elseif ($extension[1] == 'css') : ?>
                        <?= $this->Html->link(
                            $this->Html->image("../uploads/icons/ext/css.png", ["alt" => "Fichier texte", 'class' => 'joint']),
                            "../uploads/dashboard/" . $files->name,
                            ['escape' => false, 'target' => '_blank']
                        ); ?>

                        <!--si fichier php-->
                    <?php elseif ($extension[1] == 'php') : ?>
                        <?= $this->Html->link(
                            $this->Html->image("../uploads/icons/ext/php.png", ["alt" => "Fichier texte", 'class' => 'joint']),
                            "../uploads/dashboard/" . $files->name,
                            ['escape' => false, 'target' => '_blank']
                        ); ?>

                        <!--si fichier html-->
                    <?php elseif ($extension[1] == 'html') : ?>
                        <?= $this->Html->link(
                            $this->Html->image("../uploads/icons/ext/html.png", ["alt" => "Fichier texte", 'class' => 'joint']),
                            "../uploads/dashboard/" . $files->name,
                            ['escape' => false, 'target' => '_blank']
                        ); ?>

                        <!--si fichier img-->
                    <?php elseif ($extension[1] == 'png' || $extension[1] == 'jpg' || $extension[1] == 'jpeg' || $extension[1] == 'gif') : ?>
                        <?= $this->Html->link(
                            $this->Html->image("../uploads/dashboard/" . $files->name, ["alt" => "Fichier texte", 'class' => 'joint']),
                            "../uploads/dashboard/" . $files->name,
                            ['escape' => false, 'target' => '_blank']
                        ); ?>

                        <!--si fichier inconnu-->
                    <?php else : ?>
                        <?= $this->Html->link(
                            $this->Html->image("../uploads/icons/ext/default.png", ["alt" => "Fichier texte", 'class' => 'joint']),
                            "../uploads/dashboard/" . $files->name,
                            ['escape' => false, 'target' => '_blank']
                        ); ?>
                    <?php endif ?>
                </div>
            </div>
        </div>


    <?php endforeach ?>
</div>

<?= $this->Html->script('sweetalert.min.js') ?>

<script>

    //shows and hides file form
    $('#add-file').on('click', function () {
        $('#file-form').toggle();
    });
    function closeForm() {
        $('#file-form').hide();
    }
    $('#close-form').on('click', function () {
        closeForm();
    });

    <?php
        if (empty($project->files)): ?>
    $('#file-form').show();
    <?php endif;?>


    //delete file
    $('.delete-file').on('click', function (item) {

        var thisItem = $(this).closest('.portlet');

        swal({
                title: "Etes-vous sur de vouloir supprimer ce fichier ?",
                text: "La suppression est définitive.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Annuler",
                confirmButtonText: "Oui, supprimer.",
                closeOnConfirm: false
            },
            function () {

                var fileId = item.currentTarget.id.split('-');

                var url = '<?= $this->Url->build(["controller" => "Projects", "action" => "deletefile"]); ?>' + '/' + fileId[1];

                $.ajax({
                    type: 'post',
                    url: url,
                    success: function () {
                        closeForm();
                        thisItem.hide();
                        swal("Fichier supprimé !", "Le fichier a été supprimé avec succès.", "success");
                    }
                });
            });

    })
</script>
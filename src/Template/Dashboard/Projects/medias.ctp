<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>

    <h3>Uploader un fichier</h3>
<?= $this->Form->create($file, ['enctype' => 'multipart/form-data']) ?>
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
            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                Retirer </a>
        </div>
    </div>
<?= $this->Form->button('Valider', ['class' => 'btn btn-success']) ?>
<?= $this->Form->end() ?>


<?php foreach ($project->files as $file): ?>
    <?php debug($file)?>
<?= $file->name ?>
<?php endforeach; ?>

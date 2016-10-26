<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>


<?= $this->Form->create($file, ['enctype' => 'multipart/form-data']) ?>
            <input name="project_id" type="hidden" value="<?= $project->id?>">
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


<td> <u>Fichier Joint :</u> <br>
    <!--pour chaque fichier-->
    <?php foreach($project->files as $files) : ?>
        <!--recuperer l'extension-->
        <?= $files->name?>
        <?php $extension = explode(".",$files->name); ?>
        <!--si fichier texte-->
        <?php if ($extension[1] == 'txt') : ?>
            <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/txt.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/dashboard/".$files->name,
                ['escape' => false, 'target' => '_blank']
            );  ?>

            <!--si fichier zip-->
        <?php elseif  ($extension[1] == 'zip') : ?>
            <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/zip.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/dashboard/".$files->name,
                ['escape' => false, 'target' => '_blank']
            );  ?>

            <!--si fichier rar-->
        <?php elseif  ($extension[1] == 'rar') : ?>
            <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/rar.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/dashboard/".$files->name,
                ['escape' => false, 'target' => '_blank']
            );  ?>

            <!--si fichier log-->
        <?php elseif  ($extension[1] == 'log') : ?>
            <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/log.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/dashboard/".$files->name,
                ['escape' => false, 'target' => '_blank']
            );  ?>

            <!--si fichier pdf-->
        <?php elseif  ($extension[1] == 'pdf') : ?>
            <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/pdf.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/dashboard/".$files->name,
                ['escape' => false, 'target' => '_blank']
            );  ?>

            <!--si fichier css-->
        <?php elseif  ($extension[1] == 'css') : ?>
            <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/css.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/dashboard/".$files->name,
                ['escape' => false, 'target' => '_blank']
            );  ?>

            <!--si fichier php-->
        <?php elseif  ($extension[1] == 'php') : ?>
            <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/php.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/dashboard/".$files->name,
                ['escape' => false, 'target' => '_blank']
            );  ?>

            <!--si fichier html-->
        <?php elseif  ($extension[1] == 'html') : ?>
            <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/html.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/dashboard/".$files->name,
                ['escape' => false, 'target' => '_blank']
            );  ?>

            <!--si fichier img-->
        <?php elseif  ($extension[1] == 'png' || $extension[1] == 'jpg' || $extension[1] == 'jpeg' || $extension[1] == 'gif' ) : ?>
            <?= $this->Html->link(
                $this->Html->image("../uploads/dashboard/".$files->name, ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/dashboard/".$files->name,
                ['escape' => false, 'target' => '_blank']
            );  ?>

            <!--si fichier inconnu-->
        <?php else : ?>
            <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/default.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/dashboard/".$files->name,
                ['escape' => false, 'target' => '_blank']
            );  ?>
        <?php endif ?>
    <?php endforeach ?>
</td>


<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
        <?= $this->Form->create($promotion,['enctype' => 'multipart/form-data']) ?>
        <fieldset>
            <legend><?= __('Ajouter une promotion') ?></legend>
            <div class="form-group">
                <label class="label-control">Année: </label>
            <?=$this->Form->input('name',['class' => 'form-control']);?>
            </div>
            <div class="form-group">
                <label class="label-control">Année: </label>
            <?=$this->Form->input('description',['class' => 'form-control']);?>
                </div>
            <div class="form-group">
                <label class="label-control">Année: </label>
            <?=$this->Form->input('year',['class' => 'form-control']);?>
            </div>

            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                <div>
                    <span class="btn default btn-file">
                        <span class="fileinput-new"> Choisir une image de couverture </span>
                        <?= $this->Form->input('picture',['type' => 'file','class' => 'form-control', 'label' => false]);?>
                    </span>
                </div>
            </div>
        </fieldset>
        <hr>
        <div class="text-center">
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-sm btn-primary']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

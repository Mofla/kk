<?= $this->Html->css('multi-select.css') ?>
<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>

<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-center">
        <?= $this->Form->create($permissionsRoles) ?>
        <fieldset>
            <legend>Définir la permission :</legend>
            <div class="h3 well"><?= $permissions->name ?></div>
            <div class="well"><i><?= $permissions->description ?></i></div>
            <?php
            echo $this->Form->input('roles._ids', ['options' => $roles,'id' => 'multiselect','class' => 'form-control']);
            ?>
        </fieldset>
        <hr>
        <div class="text-center">
            <?= $this->Form->button('Valider',['class' => 'btn btn-sm btn-primary']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<?= $this->Html->script('jquery.multi-select.js') ?>
<script>
    $('#multiselect').multiSelect()
</script>
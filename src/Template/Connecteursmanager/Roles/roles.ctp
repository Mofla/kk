<?= $this->Html->css('multi-select.css') ?>
<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>

<?= $this->Form->create($permissions,['url' => ['action' => 'add']]) ?>
<?= $this->Form->hidden('role_id',['value' => $id]) ?>
<?= $this->Form->input('permissions._ids',['options' => $list,'id' => 'multiselect','class' => 'form-control']) ?>
<hr>
<div class="text-center">
    <?= $this->Form->submit('Valider',['class' => 'btn btn-info btn-lg']) ?>
</div>
<?= $this->Form->end() ?>


<?= $this->Html->script('jquery.multi-select.js') ?>
<script>
    $('#multiselect').multiSelect()
</script>

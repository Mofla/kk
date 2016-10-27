<?= $this->Html->css('multi-select.css') ?>
<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>
<div class="rooms form large-9 medium-8 columns content">
    <?= $this->Form->create($room) ?>
    <fieldset>
        <legend><?= __('Add Room') ?></legend>
        <div class="form-group">
        <?php
            echo  $this->Form->input('name',['class' => 'form-control']);
            echo  $this->Form->input('creator',['class' => 'hidden','value'=>$id]);
            echo $this->Form->input('users._ids', ['options' => $users,'id' => 'multiselect','class' => 'form-control']);
        ?></div>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->script('jquery.multi-select.js') ?>
    <script>
        $('#multiselect').multiSelect()
    </script>
</div>

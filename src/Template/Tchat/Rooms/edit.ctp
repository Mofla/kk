<?= $this->Html->css('multi-select.css') ?>
<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>
<legend>
    <?= __('Edit Room') ?>
    <?= $this->Form->postLink(__('Delete'),['action' => 'delete', $room->id],['confirm' => __('Etes-vous sûr que vous voulez supprimer le salon {0} ?', $room->name),'class'=>'btn default red-stripe']) ?>
</legend>
<div class="rooms form large-9 medium-8 columns content">
    <?= $this->Form->create($room) ?>
    <fieldset>
        <?php
        echo $this->Form->input('name',['class' => 'form-control']);
        echo  $this->Form->input('description',['class' => 'form-control']);
        echo $this->Form->input('users._ids', ['options' => $users,'id' => 'multiselect','class' => 'form-control']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->script('jquery.multi-select.js') ?>
    <script>
        $('#multiselect').multiSelect()
    </script>
</div>


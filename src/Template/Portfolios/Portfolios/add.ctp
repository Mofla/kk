<?= $this->Html->css('multi-select.css') ?>
<?= $this->Html->css('multi-select.css') ?>
<div class="row">
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
    <?= $this->Form->create($portfolio,['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Add Portfolio') ?></legend>
        <?php
            echo $this->Form->input('name',['class' => 'form-control']);
            echo $this->Form->input('description',['class' => 'form-control']);
            echo $this->Form->input('url',['class' => 'form-control']);
            echo $this->Form->input('picture',['type' => 'file']);
            echo $this->Form->input('users._ids', ['options' => $users,'id' => 'multiselect','class' => 'form-control']);
        ?>
    </fieldset>
    <hr>
    <div class="text-center">
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-sm btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
</div>
<?= $this->Html->script('jquery.multi-select.js') ?>
<script>
    $('#multiselect').multiSelect()
</script>

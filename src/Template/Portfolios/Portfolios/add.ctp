<div class="row">
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
    <?= $this->Form->create($portfolio) ?>
    <fieldset>
        <legend><?= __('Add Portfolio') ?></legend>
        <?php
            echo $this->Form->input('name',['class' => 'form-control']);
            echo $this->Form->input('description',['class' => 'form-control']);
            echo $this->Form->input('url',['class' => 'form-control']);
            echo $this->Form->input('users._ids', ['options' => $users,'class' => 'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
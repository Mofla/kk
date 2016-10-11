<?= $this->element('Forum/admin-menu') ?>
<div class="col-md-9">
    <?= $this->Form->create($forum) ?>
    <fieldset>
        <legend><?= __('Edit Forum') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('active');
            echo $this->Form->input('category_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

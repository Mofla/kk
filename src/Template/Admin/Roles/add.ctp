<?= $this->Html->css('../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css') ?>
<?= $this->Html->css('../assets/global/plugins/jquery-multi-select/css/multi-select.css') ?>
<?= $this->Html->css('../assets/global/plugins/select2/css/select2.min.css') ?>
<?= $this->Html->css('../assets/global/plugins/select2/css/select2-bootstrap.min.css') ?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Add Role') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('permissions._ids', ['options' => $permissions, 'class' => 'multi-select']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


<?= $this->Html->script('../assets/global/plugins/jquery.min.js') ?>

<?= $this->Html->script('../assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js') ?>
<?= $this->Html->script('../assets/pages/scripts/components-multi-select.js') ?>
<?= $this->Html->script('../assets/global/plugins/select2/js/select2.full.min.js') ?>


<script>
    $('.multi-select').multiSelect();


</script>
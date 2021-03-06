<?= $this->Html->css('multi-select.css') ?>
<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>
<div class="breadcrum">
    <?= $this->Html->link(ucfirst($this->request->params['prefix']),'/'.$this->request->params['prefix']) ?> /
    <?= $this->Html->link(ucfirst($this->request->params['controller']),['controller' => $this->request->params['controller'], 'action' => '/']) ?> /
    <?= ucfirst($this->request->params['action']) ?>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <?= $this->Form->create($permission) ?>
            <?= $this->Form->input('role_id',['options' => $roles]) ?>
            <?= $this->Form->input('permissions._ids',['options' => $permissions,'id' => 'multiselect']) ?>
            <?= $this->Form->button('Définir',['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>


<?= $this->Html->script('jquery.multi-select.js') ?>
<script>
    $('#multiselect').multiSelect()
</script>
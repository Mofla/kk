<div class="breadcrum">
    <?= $this->Html->link($this->request->params['prefix'],'/'.$this->request->params['prefix']) ?> /
    <?= $this->Html->link($this->request->params['controller'],['controller' => $this->request->params['controller'], 'action' => '/']) ?> /
    <?= $this->Html->link($this->request->params['action'],['controller' => $this->request->params['controller'],'action' => $this->request->params['action']]) ?>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <legend class="text-center">
            Ajouter une permission
        </legend>
        <?= $this->Form->create($permission) ?>
        <?= $this->Form->input('name',[
            'label' => 'Nom de la permission',
            'class' => 'form-control'
        ]) ?>
        <?= $this->Form->input('description',[
            'label' => 'Description',
            'class' => 'form-control'
        ]) ?>
        <hr>
        <div class="text-center">
            <?= $this->Form->button('Ajouter',['class' => 'btn btn-info']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
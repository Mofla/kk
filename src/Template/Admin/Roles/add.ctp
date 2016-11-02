<div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1">
        <?= $this->Form->create($role) ?>
        <legend class="text-center">Ajouter un role</legend>
            <?= $this->Form->input('name',['class' => 'form-control']) ?>
        <?= $this->Form->input('description',['class' => 'form-control']) ?>
        <hr>
        <div class="text-center">
            <?= $this->Form->submit('Valider',[
                'class' => 'btn btn-success'
            ]) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
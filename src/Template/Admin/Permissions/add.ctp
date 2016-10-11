<div class="profile">
    <div class="tab-pane" id="tab_1_3">
        <div class="row profile-account">
            <div class="col-md-3">
                <ul class="ver-inline-menu tabbable margin-bottom-10">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_1-1">
                            <i class="fa fa-cog"></i> Ajouter une permission
                        </a>
                        <span class="after"> </span>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div id="tab_1-1" class="tab-pane active">
                        <?= $this->Form->create($permission) ?>
                        <fieldset>
                            <legend><?= __('Nouvelle permission') ?></legend>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control">Nom de la permission : </label>
                                    <?= $this->Form->input('name',['label'=>false, 'class'=>'form-control']); ?>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Description : </label>
                                    <?= $this->Form->input('description',['label'=>false, 'class'=>'form-control']); ?>
                                </div>
                                <div class="mt-checkbox-inline">
                                    <label class="mt-checkbox">
                                        <?= $this->Form->input('menu',['label'=>false, 'class'=>'']); ?>
                                        Afficher dans le menu
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="label-control">Rôle :</label>
                                    <?= $this->Form->input('roles._ids', ['options' => $roles, 'label'=>false, 'class'=>'form-control']); ?>
                                </div>
                            </div>
                        </fieldset>
                        <?= $this->Form->button('Submit',['class'=>'btn green']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

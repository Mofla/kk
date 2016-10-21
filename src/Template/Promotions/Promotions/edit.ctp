<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>


<div class="page-content">
    <div class="container">
        <div class="page-content-inner">
            <div class="tab-pane" id="tab_1_3">
                <div class="row profile-account">
                    <div class="col-md-3">
                        <ul class="ver-inline-menu tabbable margin-bottom-10">
                            <li class="active">
                                <a data-toggle="tab" href="#tab_1-1">
                                    <i class="fa fa-cog"></i> Editer promotion
                                </a>
                                <span class="after"> </span>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_2-2">
                                    <i class="fa fa-picture-o"></i> Changer Photo de couverture </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div id="tab_1-1" class="tab-pane active">
                                <div class="profile">
                                    <div class="tab-pane" id="tab_1_3">
                                        <div class="row profile-account">
                                            <div class="col-md-12">
                                                <div class="tab-content">
                                                    <div id="tab_1-1" class="tab-pane active">
                                                        <?= $this->Form->create($promotion, ['enctype' => 'multipart/form-data']) ?>
                                                        <fieldset>
                                                            <legend><?= __('Editer la Promotion') ?></legend>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="label-control">Nom: </label>
                                                                    <?=$this->Form->input('name',['label' => false]);?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control"> Description: </label>
                                                                    <?= $this->Form->input('description',['label' => false]);?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Année: </label>
                                                                    <?= $this->Form->input('year',['label' => false]);?>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <?= $this->Form->button('Submit', ['class' => 'btn green']) ?>
                                                        <?= $this->Form->end() ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab_2-2" class="tab-pane">
                                <?= $this->Form->create($promotion,['enctype' => 'multipart/form-data']) ?>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                      <span class="btn default btn-file">
                        <span class="fileinput-new"> Choisir un image</span>
                        <?= $this->Form->input('picture',['type' => 'file']);?>
                      </span>

                                    </div>
                                </div>
                                <?= $this->Form->button(__('Submit'),['class' => 'btn green']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>

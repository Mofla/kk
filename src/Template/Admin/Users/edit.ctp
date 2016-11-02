<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>
<?= $this->Html->link('Accueil', ['controller' => 'Pages', 'action' => '/', 'prefix' => false]) ?> /
<?= $this->Html->link($this->request->params['controller'], ['action' => 'index']) ?> /
<?= $user->firstname . $user->lastname ?>
<div class="page-content">
    <div class="container">
        <div class="page-content-inner">
            <div class="tab-pane" id="tab_1_3">
                <div class="row profile-account">
                    <div class="col-md-3">
                        <ul class="ver-inline-menu tabbable margin-bottom-10">
                            <li class="active">
                                <a data-toggle="tab" href="#tab_1-1">
                                    <i class="fa fa-cog"></i> Editer profil
                                </a>
                                <span class="after"> </span>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_2-2">
                                    <i class="fa fa-picture-o"></i> Changer Avatar </a>
                            </li>
                            <?php if($user->promotion != NULL){?>
                            <li>
                                <a data-toggle="tab" href="#tab_3-3">
                                    <i class="fa fa-picture-o"></i> Profil Publique</a>
                            </li>
                            <?php } else {?>
                            <li>
                                <a data-toggle="tab" href="#tab_4-4">
                                    <i class="fa fa-picture-o"></i> Profil Publique</a>
                            </li>
                            <?php }?>
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
                                                        <?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
                                                        <fieldset>
                                                            <legend><?= __('Editer son profil') ?></legend>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="label-control">Rôle: </label>
                                                                    <?= $this->Form->input('role_id', ['options' => $roles, 'label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Pseudo: </label>
                                                                    <?= $this->Form->input('username', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Mot depasse : </label>
                                                                    <?= $this->Form->input('password', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Email: </label>
                                                                    <?= $this->Form->input('email', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Compte Github
                                                                        : </label>
                                                                    <?= $this->Form->input('github_username', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="label-control">Prénom : </label>
                                                                    <?= $this->Form->input('firstname', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Nom : </label>
                                                                    <?= $this->Form->input('lastname', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Adresse : </label>
                                                                    <?= $this->Form->input('address', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Code Postal : </label>
                                                                    <?= $this->Form->input('zipcode', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Ville : </label>
                                                                    <?= $this->Form->input('city', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Téléphone : </label>
                                                                    <?= $this->Form->input('phone', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Portable : </label>
                                                                    <?= $this->Form->input('cellphone', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Numéro d'urgence
                                                                        : </label>
                                                                    <?= $this->Form->input('emergency_phone', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label-control">Date de naissance
                                                                        : </label>
                                                                    <?= $this->Form->input('birthday', ['type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'datepicker']); ?>
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
                                <fieldset>
                                    <legend><?= __('Changez votre avatar') ?></legend>
                                </fieldset>
                                <?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 300px; height: 300px;">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                         style="max-width: 300px; max-height: 300px;"></div>
                                    <div>
                    <span class="btn default btn-file">
                      <span class="fileinput-new"> Selectionner une image </span>
                      <span class="fileinput-exists"> Modifier </span>
                      <input type="file" name="picture">
                    </span>
                                        <a href="javascript:;" class="btn red fileinput-exists"
                                           data-dismiss="fileinput"> Retirer </a>
                                    </div>
                                </div>
                                <br>

                                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm green']) ?>
                                <?= $this->Form->end() ?>
                            </div>

                            <?php if($user->promotion != NULL){?>
                            <div id="tab_3-3" class="tab-pane">
                                <script>
                                    var url = '../../../../../../promotions/editer/<?= $user->promotion->id ?>';

                                    $('#tab_3-3').load(url, function () {
                                    });
                                </script>
                            </div>
                            <?php } else {?>
                            <div id="tab_4-4" class="tab-pane">
                                <script>
                                    var url1 = '../../../../../../promotions/ajouter';

                                    $('#tab_4-4').load(url1, function () {
                                    });
                                </script>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?= $this->Html->script('jquery.datetimepicker.full.min.js') ?>
    <?= $this->Html->css('jquery.datetimepicker.css') ?>

    <script>
        $('#datepicker').datetimepicker({
            timepicker: false,
            format: "m/d/y"
        });






    </script>

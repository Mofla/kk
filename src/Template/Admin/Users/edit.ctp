<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>
<?= $this->Html->link('Accueil',['controller' => 'Pages','action' => '/','prefix' => false]) ?> /
<?= $this->Html->link($this->request->params['controller'],['action' => 'index']) ?> /
<?= $user->firstname.$user->lastname ?>
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
              <li>
                <a data-toggle="tab" href="#tab_3-3">
                  <i class="fa fa-picture-o"></i> Profil Publique</a>
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
                                      <label class="label-control">Compte Github : </label>
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
                                      <label class="label-control">Numéro d'urgence : </label>
                                      <?= $this->Form->input('emergency_phone', ['label' => false, 'class' => 'form-control']); ?>
                                    </div>
                                    <div class="form-group">
                                      <label class="label-control">Date de naissance : </label>
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
                  <?= $this->Form->create($user,['enctype' => 'multipart/form-data']) ?>

                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 300px; height: 300px;">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 300px;"> </div>
                  <div>
                    <span class="btn default btn-file">
                      <span class="fileinput-new"> Selectionner une image </span>
                      <span class="fileinput-exists"> Modifier </span>
                      <input type="file" name="picture">
                    </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Retirer </a>
                  </div>
                </div><br>

                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-sm green']) ?>
                <?= $this->Form->end() ?>
              </div>
              <div id="tab_3-3" class="tab-pane">

                <div class="row profile-account">
                  <div class="col-md-12">
                    <div class="tab-content">
                      <?php foreach ($promotion as $promotion): ?>
                        <?= $this->Form->create($promotion,['enctype' => 'multipart/form-data']) ?>
                        <fieldset>
                          <legend><?= __('Editer mon Profil Publique') ?></legend>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label-control">Description: </label>
                              <?= $this->Form->input('description',['label' => false]);?>
                            </div>
                            <div class="form-group">
                              <label class="label-control">Facebook: </label>
                              <?= $this->Form->input('facebook_link',['label' => false]);?>
                            </div>
                            <div class="form-group">
                              <label class="label-control">Twitter: </label>
                              <?= $this->Form->input('twitter_link',['label' => false]);?>
                            </div>
                            <div class="form-group">
                              <label class="label-control">Linkedin: </label>
                              <?= $this->Form->input('linkedin_link',['label' => false]);?>
                            </div>
                            <div class="form-group">
                              <label class="label-control">Cv: </label>
                              <?= $this->Form->input('cv_url',['label' => false]);?>
                            </div>
                            <div class="form-group">
                              <label class="label-control">Site Web: </label>
                              <?= $this->Form->input('web_site',['label' => false]);?>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <?= $this->Form->input('language_html',['label' => false]);?>html
                            </div>
                            <div class="form-group">
                              <?= $this->Form->input('language_css',['label' => false]);?>css
                            </div>
                            <div class="form-group">
                              <?= $this->Form->input('language_javascript',['label' => false]);?>javascript
                            </div>
                            <div class="form-group">
                              <?= $this->Form->input('language_jquery',['label' => false]);?>jquery
                            </div>
                            <div class="form-group">
                              <?= $this->Form->input('language_php',['label' => false]);?>php
                            </div>
                            <div class="form-group">
                              <?= $this->Form->input('language_sql',['label' => false]);?>sql
                            </div>
                            <div class="form-group">
                              <?= $this->Form->input('language_cakephp',['label' => false]);?>cakephp
                            </div>
                            <div class="form-group">
                              <?= $this->Form->input('language_bootstrap',['label' => false]);?>bootstrap
                            </div>
                          </div>
                        </fieldset>
                        <?= $this->Form->button('Envoyer', ['class' => 'btn green']) ?>
                        <?= $this->Form->end() ?>
                      <?php endforeach;?>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div>
  <?= $this->Html->script('jquery.datetimepicker.full.min.js') ?>
  <?= $this->Html->css('jquery.datetimepicker.css') ?>

  <script>
    $('#datepicker').datetimepicker({
      timepicker:false,
      format: "m/d/y"
    });
  </script>

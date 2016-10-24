<?= $this->Html->link('Accueil',['controller' => 'Pages','action' => '/','prefix' => false]) ?> /
<?= $this->Html->link($this->request->params['controller'],['action' => 'index']) ?> /
<div class="profile">
  <div class="tab-pane" id="tab_1_3">
    <div class="row profile-account">
      <div class="col-md-3">
        <ul class="ver-inline-menu tabbable margin-bottom-10">
          <li class="active">
            <a data-toggle="tab" href="#tab_1-1">
              <i class="fa fa-cog"></i> Ajouter un compte
            </a>
            <span class="after"> </span>
          </li>
        </ul>
      </div>
      <div class="col-md-9">
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">

            <?= $this->Form->create($user,['enctype' => 'multipart/form-data']) ?>
              <fieldset>
                <legend><?= __('Nouvel Utilisateur') ?></legend>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="label-control">Rôle : </label>
                      <?= $this->Form->input('role_id', ['options' => $roles, 'label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                     <label class="label-control"> Promotion : </label>
                      <?= $this->Form->input('promotion',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Pseudo : </label>
                      <?= $this->Form->input('username',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Mot de passe : </label>
                      <?= $this->Form->input('password',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Email : </label>
                      <?= $this->Form->input('email',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Compte Github : </label><?= $this->Form->input('github_username',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Url avatar
                        : </label>
                      <?= $this->Form->input('picture',['type' => 'file']); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="label-control">Prénom : </label><?= $this->Form->input('firstname',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Nom : </label>
                      <?= $this->Form->input('lastname',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Adresse : </label>
                      <?= $this->Form->input('address',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Code Postal : </label>
                      <?= $this->Form->input('zipcode',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Ville : </label>
                      <?= $this->Form->input('city',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Téléphone : </label>
                      <?= $this->Form->input('phone',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Portable : </label>
                      <?= $this->Form->input('cellphone',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Numéro d'urgence : </label>
                      <?= $this->Form->input('emergency_phone',['label'=>false, 'class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Date de naissance : </label>
                      <?= $this->Form->input('birthday', ['type' => 'text','label'=>false, 'class'=>'form-control', 'id' => 'datepicker']); ?>
                    </div>

                  </div>
                </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
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
    timepicker:false,
    format: "m/d/y"
  });
</script>


<div class="profile">
  <div class="tab-pane" id="tab_1_3">
    <div class="row profile-account">
<!--      <div class="col-md-3">
        <ul class="ver-inline-menu tabbable margin-bottom-10">
          <li class="active">
            <a data-toggle="tab" href="#tab_1-1">
              <i class="fa fa-cog"></i> Personal info
            </a>
            <span class="after"> </span>
          </li>
          <li>
            <a data-toggle="tab" href="#tab_2-2">
              <i class="fa fa-picture-o"></i> Change Avatar </a>
          <li>
          <li>
            <a data-toggle="tab" href="#tab_3-3">
              <i class="fa fa-lock"></i> Change Password </a>
          </li>
          <li>
            <a data-toggle="tab" href="#tab_4-4">
               <i class="fa fa-eye"></i> Privacity Settings </a>
          </li>
        </ul>
      </div>-->
      <div class="col-md-8 col-md-offset-2">
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
            <?= $this->Form->create($user) ?>
              <fieldset>
                <legend><?= __('Add User') ?></legend>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rôle :<?= $this->Form->input('role_id', ['options' => $roles, 'label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                     <label> Promotion : <?= $this->Form->input('promotion',['label'=>'']); ?> </label>
                    </div>
                    <div class="form-group">
                      <label>Pseudo :<?= $this->Form->input('username',['label'=>'']); ?> </label>
                    </div>
                    <div class="form-group">
                      <label>Mot de passe :<?= $this->Form->input('password',['label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                      <label>Email :<?= $this->Form->input('email',['label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                      <label>Compte Github :<?= $this->Form->input('github_username',['label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                      <label>Url avatar :<?= $this->Form->input('picture_url',['label'=>'']); ?></label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Prénom :<?= $this->Form->input('firstname',['label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                      <label>Nom :<?= $this->Form->input('lastname',['label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                      <label>Adresse :<?= $this->Form->input('address',['label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                      <label>Code Postal :<?= $this->Form->input('zipcode',['label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                      <label>Ville :<?= $this->Form->input('city',['label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                      <label>Téléphone :<?= $this->Form->input('phone',['label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                      <label>Portable :<?= $this->Form->input('cellphone',['label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                      <label>Numéro d'urgence :<?= $this->Form->input('emergency_phone',['label'=>'']); ?></label>
                    </div>
                    <div class="form-group">
                      <label>Date de naissance :<?= $this->Form->input('birthday',['label'=>'']); ?></label>
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


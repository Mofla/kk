<?= $this->Html->link('Accueil',['controller' => 'Pages','action' => '/','prefix' => false]) ?> /
<?= $this->Html->link($this->request->params['controller'],['action' => 'index']) ?> /
<?= $user->firstname.$user->lastname ?>
<div class="page-title">
  <h1><?php echo $user->firstname ?> <?= $user->lastname ?>
    <small><?= $user->role->name ?></small>
  </h1>
</div>
<div class="page-content">
  <div class="container">
    <div class="page-content-inner">
      <div class="profile">
        <div class="tabbable-line tabbable-full-width">
          <ul class="nav nav-tabs">
            <li class="active">
              <a href="#tab_1_1" data-toggle="tab"> Profil </a>
            </li>
            <?php if($autoriser){?>
            <li>
              <a href="#tab_2_2" data-toggle="tab"> Editer mon Profil </a>
            </li>
            <?php }?>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1_1">
              <div class="row">
                <div class="col-md-3">
                  <ul class="list-unstyled profile-nav">
                    <li>
                      <?= $this->Html->image('../uploads/user/'. $user->picture_url,['class' => 'img-responsive pic-bordered'])?>
                    </li>
                  </ul>
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-8 profile-info">
                      <h1 class="font-green sbold uppercase"><?= $user->firstname ?> <?= $user->lastname ?></h1>
                      <ul class="list-inline">
                        <li>
                          <i class="fa fa-map-marker"></i> <?= $user->city ?>
                        </li>
                        <li>
                          <i class="fa fa-birthday-cake"></i> <?= $user->birthday ?>
                        </li>
                        <li>
                          <i class="fa fa-phone"></i> <?= $user->phone ?>
                        </li>
                        <li>
                          <i class="fa fa-mobile"></i> <?= $user->cellphone ?>
                        </li>
                        <li>
                          <i class="fa fa-at"></i> <?= $user->email ?>
                        </li>
                      </ul>
                      <?php if (!empty($user->github_username)): ?>
                        Compte github : <a href="https://github.com/<?= $user->github_username?>"> <?= $user->github_username ?></a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab_2_2">
              <script>
                var url = '../../../admin/utilisateur/editer/<?= $user->id ?>';

                $('#tab_2_2').load(url, function () {
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
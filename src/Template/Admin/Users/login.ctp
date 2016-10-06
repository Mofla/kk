<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="index.html" method="post">
        <div class="logo">
        <?= $this->Html->image('logo.png',['width' => '100%'])?>
        </div>
        <div class="form-title">
            <span class="form-title">Bonjour.</span>
            <span class="form-subtitle">Connectez-vous.</span>
        </div>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Entrer un Nom d'utilisateur et un Mot de passe. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <?= $this->Form->input('username',['class' => 'form-control form-control-solid placeholder-no-fix', 'label' => false , 'placeholder' => 'Nom d\'utilisateur']); ?> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <?= $this->Form->input('password',['class' => 'form-control form-control-solid placeholder-no-fix', 'label' => false , 'placeholder' => 'Mot de passe']); ?></div>
        <div>
            <?= $this->Form->button('Connexion', ['class' => 'btn red btn-block uppercase']); ?>
            <?= $this->Form->end() ?>
        </div>
    </form>
    </div>
    <!-- END LOGIN FORM -->
</body>

</html>
</div>
<div class="row profile-account">
    <div class="col-md-12">
        <div class="tab-content">
            <div id="tab_1-1" class="tab-pane active">
                <?= $this->Form->create($promotion, ['enctype' => 'multipart/form-data']) ?>
                <fieldset>
                    <legend><?= __('Editer mon Profil Public') ?></legend>
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
                            <?= $this->Form->input('cv',['type' => 'file','label' => false]);?>
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
            </div>
        </div>
    </div>
</div>

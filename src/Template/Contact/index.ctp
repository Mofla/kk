<?= $this->Html->css('../assets/pages/css/contact.min.css') ?>

<div class="page-content-inner">

    <div class="c-content-feedback-1 c-option-1">
        <div class="row">
            <div class="col-md-6">
                <div class="c-container bg-green">
                    <div class="c-content-title-1 c-inverse">
                        <h3 class="uppercase">Besoin d'en savoir plus?</h3>
                        <div class="c-line-left"></div>
                        <p class="c-font-lowercase">
                            Visitez notre Foire Aux Questions pour obtenir d'avantages d'informations.</p>
                        <button class="btn grey-cararra font-dark">Plus d'infos</button>
                    </div>
                </div>
                <div class="c-container bg-grey-steel">
                    <div class="c-content-title-1">
                        <h3 class="uppercase">Vous avez une question?</h3>
                        <div class="c-line-left bg-dark"></div>
                        <form action="#">
                            <div class="input-group input-group-lg c-square">
                                <input type="text" class="form-control c-square" placeholder="Poser une question" />
                                <span class="input-group-btn">
                                                                        <button class="btn uppercase" type="button">Ok!</button>
                                                                    </span>
                            </div>
                        </form>
                        <p>Posez vos questions et laissez la communauté Simplon vous aider
                            et complèter la FAQ !</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="c-contact">
                    <div class="c-content-title-1">
                        <h3 class="uppercase">Prendre contact</h3>
                        <div class="c-line-left bg-dark"></div>
                        <p class="c-font-lowercase">Nous sommes à votre disposition pour recevoir toute demande d'information.
                     N'hésitez pas à nous envoyer un courriel à partir du formulaire ci-dessous et nous vous répondrons dès que possible.</p>
                    </div>
                    <?= $this->Form->create(null) ?>
                        <div class="form-group">
                            <input name="name" type="text" placeholder="Votre nom" class="form-control input-md"> </div>
                        <div class="form-group">
                            <input name="email" type="text" placeholder="Votre Email" class="form-control input-md"> </div>
                        <div class="form-group">
                            <input name="phone" type="text" placeholder="Numéro de téléphone" class="form-control input-md"> </div>
                        <div class="form-group">
                            <textarea rows="8" name="message" placeholder="Votre message ici ..." class="form-control input-md"></textarea>
                        </div>
                        <button type="submit" class="btn grey">Envoyer</button>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>


    <div class="c-content-contact-1 c-opt-1">
        <div class="row" data-auto-height=".c-height">
            <div class="col-lg-8 col-md-6 c-desktop"></div>
            <div class="col-lg-4 col-md-6">
                <div class="c-body">
                    <div class="c-section">
                        <h3>Simplon Epinal</h3>
                    </div>
                    <div class="c-section">
                        <div class="c-content-label uppercase bg-blue">Addresse</div>
                        <p>10 Rue Claude Gellée
                            <br/>88000 Épinal, France</p>
                    </div>
                    <div class="c-section">
                        <div class="c-content-label uppercase bg-blue">Téléphone</div>
                        <p>
                             03 29 33 88 88
                            <br/>
                    </div>
                    <div class="c-section">
                        <div class="c-content-label uppercase bg-blue">Réseaux sociaux</div>
                        <br/>
                        <ul class="c-content-iconlist-1 ">
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="gmapbg" class="c-content-contact-1-gmap" style="height: 615px;"></div>
    </div>


</div>

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyD5JoDyuQnaIzvNOAJJQAmAz2IZBedpxzg'); ?>

        <?= $this->Html->script('../assets/global/plugins/gmaps/gmaps.min.js') ?>

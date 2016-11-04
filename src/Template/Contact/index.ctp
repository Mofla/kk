<?php $this->layout = "front" ?>
<?= $this->Html->css('../assets/global/plugins/font-awesome/css/font-awesome.min.css') ?>
        <!--<?= $this->Html->css('../assets/global/plugins/simple-line-icons/simple-line-icons.min.css') ?>--->
        <?= $this->Html->css('../assets/global/plugins/bootstrap/css/bootstrap.min.css') ?>
        <?= $this->Html->css('../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') ?>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <?= $this->Html->css('../assets/global/css/components.min.css') ?>
        <?= $this->Html->css('../assets/global/css/plugins.min.css') ?>
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <?= $this->Html->css('../assets/layouts/layout3/css/layout.min.css') ?>
        <?= $this->Html->css('../assets/layouts/layout3/css/themes/default.min.css') ?>
        <?= $this->Html->css('../assets/layouts/layout3/css/custom.min.css') ?>
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
                            Visitez cette page pour obtenir d'avantages d'informations.</p>
                        <a class="btn grey-cararra font-dark" href="/pages/infos">Plus d'infos</a>
                    </div>
                </div>
                <div class="c-container bg-grey-steel">
                    <div class="c-content-title-1">
                        <h3 class="uppercase">Plus près de chez vous?</h3>
                        <div class="c-line-left bg-dark"></div>

                        <p class="c-font-lowercase">Avec un essaimage favorisé par l’initiative La France S’Engage et la démarche « Grande Ecole du numérique », il y a certainement une formation Simplon.co près de chez vous !</p>
                        <a href="http://simplon.co/ecosysteme/essaimage-simplon-co/" target="_blank">
                        <button class="btn grey-cararra font-dark">Consulter</button>
                        </a>
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
                    <?= $this->Form->create(null, ['type' => 'post']) ?>
                        <div class="form-group">
                            <input name="name" type="text" placeholder="Votre nom" class="form-control input-md" required> </div>
                        <div class="form-group">
                            <input name="email" type="text" placeholder="Votre Email" class="form-control input-md" required> </div>
                        <div class="form-group">
                            <input name="phone" type="text" placeholder="Numéro de téléphone" class="form-control input-md" > </div>
                        <div class="form-group">
                            <textarea rows="8" name="message" placeholder="Votre message ici ..." class="form-control input-md" required></textarea>
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
                        <div class="c-content-label uppercase bg-blue">Adresse</div>
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
                                <a href="https://www.facebook.com/people/Epinal-Simplon/100012209389342" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <div id="gmapbg" class="c-content-contact-1-gmap" style="height: 550px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10642.91808932715!2d6.451002!3d48.173294!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc0633ec5e0ae57e4!2sCCI+-+Chambre+de+commerce+et+d&#39;industrie+des+Vosges!5e0!3m2!1sfr!2sfr!4v1478165972824" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>

    </div>


</div>

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyD5JoDyuQnaIzvNOAJJQAmAz2IZBedpxzg'); ?>

        <?= $this->Html->script('../assets/global/plugins/gmaps/gmaps.min.js') ?>

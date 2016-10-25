<h3><?= __('Wellcom <b>' . $user . '</b> to <b>') ?><?php foreach ($name_rooms as $name_room): ?> <?= $name_room->name ?><?php endforeach; ?><?= '</b>' ?></h3>
<hr>
<?php

foreach ($name_rooms as $name_room):
    foreach ($name_room->users as $user_room):

        if ($user_room->id === $users) {

            $countay_user_room = count($user_room->id) ;
        }

    endforeach;
endforeach;
?>
<div class="row">
    <div class="row_tchat"><?= $this->Html->image('Preloader_3.gif', ['class' => 'lod']) ?></div>
</div>
<div class="countay"></div>
<div class="row">
    <div class="container">
        <?= $this->Form->create($tchat) ?>
        <fieldset>
            <?= $this->Form->input('message', ['type' => 'text', 'class' => 'col-md-11 in', 'label' => false, 'placeholder' => 'Message', 'id' => 'mess']) ?>
            <?= $this->Form->input('room_id', ['type' => 'text', 'class' => 'hidden', 'label' => false, 'id' => 'room','value'=> ''.$id_rooms.'']) ?>
            <div class="col-md-1 btn btn yellow" id="but">Envoyer</div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>
<style>
    hr {
        border-top: 1px solid #000000;
    }

    .lod {
        margin-left: 45%;
    }

    fieldset {
        -webkit-box-shadow: 10px 15px 15px 0px rgba(0, 0, 0, 0.30);
        -moz-box-shadow: 10px 15px 15px 0px rgba(0, 0, 0, 0.30);
        box-shadow: 10px 15px 15px 0px rgba(0, 0, 0, 0.30);
    }

    .error-message {
        display: none;
    }

    .in {
        display: inline-block;
        height: 35px;
        border: none;
    }

    .date {
        font-size: 11px;
        color: black;
    }

    .lui {
        margin-top: 2%;
        left: 10px;
        position: relative;
        width: 180px;
        height: auto;
        padding: 0px;
        background: #0c5eff;
        border-radius: 10% !important;
    }

    .lui:after {
        content: '';
        position: absolute;
        border-style: solid;
        border-width: 15px 15px 15px 0;
        border-color: transparent #0c5eff;
        display: block;
        width: 0;
        z-index: 1;
        left: -12px;
        top: 25px;
    }

    .moi {
        margin-top: 2%;
        left: 83%;
        position: relative;
        width: 180px;
        height: auto;
        padding: 0px;
        background: #00A000;
        border-radius: 10px !important;
    }

    .moi:after {
        content: '';
        position: absolute;
        border-style: solid;
        border-width: 15px 0 15px 15px;
        border-color: transparent #00A000;
        display: block;
        width: 0;
        z-index: 1;
        right: -12px;
        top: 25px;
    }

    p a {
        color: white;
        text-decoration: none;
        text-transform: capitalize;
    }

    .pad {
        padding: 10px;
    }

    hr, p {
        font-size: 11px;
        margin: 20px 0;
        margin-bottom: 0;
        word-wrap: break-word;

    }

    .message {
        font-size: 18px;
        margin: 0 0;
    }
</style>
<script>

    if (<?= $countay_user_room ?> > 0 )
    {
        $('.in').removeAttr('required');
        $(function () {
            $("#but").on('click', function () {

                var blacklist_word_array = ['anal', 'anus', 'cul', 'cul', 'ballsack', 'Connard', 'chienne', 'biatch', 'sanglant', 'pipe', 'pétasse', 'connasse', 'salaud', 'con', 'fils de pute', 'batard'
                    , 'pipe', 'bollock', 'Bollók', 'gaffe', 'nichon', 'salaud', 'clochard', 'bout', 'buttplug', 'clitoris', 'coq', 'nègre', 'merde', 'chatte', 'Zut', 'connard', 'conard', 'ta gueul', 'tagueul'
                    , 'queue', 'godemiché', 'digue', 'pédé', 'feck', 'Feck', 'fellation', 'fellations', 'Tétée', 'Merde', 'fudgepacker', 'fudge packer', 'kk', 'caca', 'fck', 'negro', 'naigro', 'negros', 'naigros'
                    , 'bride', 'fichu', 'God damn', 'enfer', 'homo', 'secousse', 'sperme', 'knobend', 'labia', 'lmao', 'lmfao', 'manchon', 'nègre', 'nigga', 'OMG', 'pénis', 'face de pete', 'putain', 'putin', 'put1n'
                    , 'pisse', 'pute', 'chatte', 'pédé', 'pd', 'scrotum', 'sexe', 'merde', 's hit', 'sh1t', 'salope', 'smegma', 'cran', 'mésange', 'tosser', 'merde', 'chatte', 'vagin'
                    , 'branlette', 'putain', 'wtf', 'anal', 'anus', 'arse', 'ass', 'ballsack', 'bastard', 'bitch', 'biatch', 'bloody', 'blowjob', 'blow job'
                    , 'bollock', 'bollok', 'boner', 'boob', 'bugger', 'bum', 'butt', 'buttplug', 'clitoris', 'cock', 'coon', 'crap', 'cunt', 'damn', 'dick', 'dildo', 'dyke', 'fag'
                    , 'feck', 'fellate', 'fellatio', 'felching', 'fuck', 'f u c k', 'fudgepacker', 'fudge packer', 'flange', 'Goddamn', 'God damn', 'hell', 'homo', 'jerk', 'jizz'
                    , 'knobend', 'knob end', 'labia', 'lmao', 'lmfao', 'muff', 'nigger', 'nigga', 'omg', 'penis', 'piss', 'poop', 'prick', 'pube', 'pussy', 'queer', 'scrotum', 'sex'
                    , 'shit', 's hit', 'sh1t', 'slut', 'smegma', 'spunk', 'tit', 'tosser', 'turd', 'twat', 'vagina', 'wank', 'whore', 'Baltringue', 'Crétin', 'Abruti', 'Connard'
                    , 'Fils De Pute', 'Couillon', 'Tête De Noeud', 'Enfoiré', 'Empaffé', 'Gros Naze', 'Grosse Truie Violette'
                    , 'Tafiole', 'Tarlouze', 'Loboto', 'Mange Merde', 'Suce Boules', 'Enculé', 'Tête De Chibre', 'Bite Molle', 'Face De Cul', 'Sale Pute', 'Pétasse', 'Raclure De Chiotte', 'Pourriture'
                    , 'Tête De Con', 'Con', 'Radasse', 'Pouffiasse', 'Faquin', 'Débile', 'Geudin', 'Crétin Des Alpes', 'Chinois De Paravent', 'Fils De Con', "Fesse D'huitre", 'Pendard', 'Pétassoïde Conassiforme'
                    , 'Couille De Moineau', 'Conchieur', 'Tartignole', 'Foutriquet', 'Décérébré', 'Résidu De Fausse Couche', "Pine D'huitre", 'Pinailleur', 'Connasse', 'Boudin', 'Avorton'
                    , 'Paltoquet', 'Fiente', 'étron', 'Merde Molle', 'Minable'
                    , 'Minus', 'Moins Que Rien', 'Va Nu Pieds', 'Clitosaure De Brontoris', 'Infame Raie De Cul', 'Dugland', 'Baraki', 'Enculeur De Mouches', 'Grosse Merde Puante', 'Pute Borgne', 'Chiure De Pigeon'
                    , 'Petite Merde', 'Gougnafier', 'Merdasse', 'Bachibouzouk', 'Ducon', 'Hurluberlu', 'Salope', 'Zonard', 'Bubon Puant', 'Chien Galeux', 'Ordure Purulente', 'Jobastre', 'Jobard', 'Barjot'
                    , 'Putréfaction', 'Suintance', 'Kroumir', 'Wisigoth', 'Lèche-cul', 'Putain ', 'Zazou', 'Bougre De Conne', 'Yéti Baveux', 'Fion', 'Couille Molle', 'Moudlabite', 'Cinglé', 'Frapadingue', 'Zéro'
                    , 'Pouacre', 'Pouacreux', 'Piètre', 'Peine à Jouir', 'Mal Baisé', 'Microcéphale', 'Enfant De Salauds', 'Face De Pet', 'Grognasse', 'Raclure De Bidet', 'Chien Maudit'
                    , 'Crétin Goîtreux', 'Balai De Chiottes', 'Mérule', 'Gogol', 'Pétochard'
                    , 'Planqué', 'Faignasse', 'Branleur', 'Branlotin', 'Merdophile', 'Nain De Jardin', 'Nunuche', 'Clown', 'Cocu', 'Caribou', 'Saligaud', 'Nounouille', 'Coprophage', 'Cornichon', 'Salaud', 'Salopiaud'
                    , 'Naze', 'Malotru', 'Sodomite', 'Pédale', 'Tantouze', 'Cave', 'Loquedu', 'Fripouille', 'Canaille', 'Maraud', 'Mécréant', "Chien D'infidèle", 'Morue', 'Blaireau', 'Bande Mou', 'Sombre Conne'
                    , 'Psychorigide', 'Gros Con', 'Vieux Con', 'Sombre Crétin', 'Nigaud', 'Catin', 'Andouille', 'Conne', "Scaphandrier D'eau De Vaiselle", 'Sous Merde', 'Fesses Molles', 'Hérétique', 'Corniaud'
                    , 'Vieille Taupe', 'Zigomar', 'Caprinophile', 'Anachorète'];

                var input_message = $("#mess").val();
                var input_message_array = input_message.split(' ');

                for (var a = 0; a < blacklist_word_array.length; a++) {

                    for (var b = 0; b < input_message_array.length; b++) {

                        if (input_message_array[b].toUpperCase() == blacklist_word_array[a].toUpperCase()) {

                            return alert('pas de gros mot !');
                        }
                    }
                }
                $.ajax({
                    url: "<?= $this->Url->build(['controller' => 'Tchats', 'action' => 'add'])?>",
                    data: {
                        message: $("#mess").val(),
                        room_id: $("#room").val()
                    },
                    dataType: 'html',
                    type: 'post'
                });
                tchat = $('.tchat');
                $('.countay').load('/tchat/tchats/counttchat');
                tchat.scrollTop(tchat[0].scrollHeight);
            });
        });
        setInterval(function () {
            $('.countay').load('/tchat/tchats/counttchat');
        }, 500);
        setInterval(function () {

            var countay = $('.countay p');
            var countay_message = $('.countay_message');
            if (countay.attr('data') != countay_message.attr('countay_message')) {


                $('.row_tchat').load('/tchat/tchats/index/<?= $id_rooms ?>');
                $('.in').val('');

            } else if (countay.attr('data') == countay_message.attr('hjh')) {
                return false;
            }
        }, 700);
    } else {
        $('.page-content-inner').load('/tchat/tchats/autorize');
    }
</script>
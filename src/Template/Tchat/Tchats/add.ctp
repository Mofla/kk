<h3><?= __('Wellcom <b>' . $user . '</b> to <b>') ?><?php foreach ($name_rooms as $name_room): ?> <?= $name_room->name ?><?php endforeach; ?><?= '</b>' ?></h3>
<hr>
<?php
$c = 0 ;
foreach ($name_rooms as $name_room):
    foreach ($name_room->users as $user_room):

        if ($user_room->id === $users) {

            $c++ ;
        }

    endforeach;
endforeach;
?>
<div class="row">
    <div class="row_tchat">
        <div class="wrapper">
            <div class="ball-line anim1">
                <div class="line"></div>
                <div class="anchor-ball"></div>
                <div class="ball" id="b1"></div>
            </div>
            <div class="ball-line">
                <div class="line"></div>
                <div class="anchor-ball"></div>
                <div class="ball" id="b2"></div>
            </div>
            <div class="ball-line">
                <div class="line"></div>
                <div class="anchor-ball"></div>
                <div class="ball" id="b3"></div>
            </div>
            <div class="ball-line">
                <div class="line"></div>
                <div class="anchor-ball"></div>
                <div class="ball" id="b4"></div>
            </div>
            <div class="ball-line anim2">
                <div class="line"></div>
                <div class="anchor-ball"></div>
                <div class="ball" id="b5"></div>
            </div>
        </div>
    </div>
</div>
<div class="countay"></div>
<div class="row">
    <div class="container">
        <?= $this->Form->create($tchat) ?>
        <fieldset>
            <?= $this->Form->input('message', ['type' => 'text', 'class' => 'col-md-11 in', 'label' => false, 'placeholder' => 'Message', 'id' => 'mess']) ?>
            <?= $this->Form->input('room_id', ['type' => 'text','class' => 'hidden', 'label' => false, 'id' => 'room','value'=> ''.$id_rooms.'']) ?>
            <div class="col-md-1 btn btn yellow" id="but">Envoyer</div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>
<style>
    .wrapper {
        position: relative;
        top: 50%;
        left: 0;
        right: 0;
        margin: auto;
        margin-top: 8.5%;
        width: 100%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        text-align: center;
    }
    .ball-line {
        position: relative;
        display: inline-block;
        width: 45px;
        height: 200px;
        margin-right: -4px;
        margin-left: -2px;
        -webkit-transform-origin: top center;
        transform-origin: top center;
    }
    .anchor-ball, .line {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        margin: auto;
        background-color: grey;
    }
    .anchor-ball {
        width: 7px;
        height: 7px;
        border-radius: 100%;

    }
    .ball {
        position: absolute;
        top: 170px;
        width: 44px;
        height: 44px;
        margin: auto;
        border-radius: 100%;
    }
    .line {
        width: 3px;
        height: 100%;
    }
    #b1 {
        background-color: #8861A4;
    }
    #b2 {
        background-color: #2495C1;
    }
    #b3 {
        background-color: #48BB6D;
    }
    #b4 {
        background-color: #F1C500;
    }
    #b5 {
        background-color: #F35957;
    }
    .anim1, .anim2 {
        -webkit-animation-duration: 2s;
        animation-duration: 2s;
        -webkit-animation-timing-function: cubic-bezier(0.165, 0.990, 0.680, 0.950);
        animation-timing-function: cubic-bezier(0.165, 0.990, 0.680, 0.950);
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
    }
    .anim1 {
        -webkit-animation-name: first-ball;
        animation-name: first-ball;
    }
    @-webkit-keyframes first-ball {
        0% {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-animation-timing-function: cubic-bezier(0.870, 0.105, 0.920, 0.605);
            animation-timing-function: cubic-bezier(0.870, 0.105, 0.920, 0.605);
        }
        20% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        40% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        60% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        100% {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    }
    @keyframes first-ball {
        0% {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-animation-timing-function: cubic-bezier(0.870, 0.105, 0.920, 0.605);
            animation-timing-function: cubic-bezier(0.870, 0.105, 0.920, 0.605);
        }
        20% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        40% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        60% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        100% {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    }
    .anim2 {
        -webkit-animation-name: last-ball;
        animation-name: last-ball;
    }
    @-webkit-keyframes last-ball {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        20% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        40% {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-animation-timing-function: cubic-bezier(0.870, 0.105, 0.920, 0.605);
            animation-timing-function: cubic-bezier(0.870, 0.105, 0.920, 0.605);
        }
        60% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        100% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
    }
    @keyframes last-ball {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        20% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        40% {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-animation-timing-function: cubic-bezier(0.870, 0.105, 0.920, 0.605);
            animation-timing-function: cubic-bezier(0.870, 0.105, 0.920, 0.605);
        }
        60% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        100% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
    }


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
    if ((<?= $c ?> > 0))
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
                    , 'Paltoquet', 'Fiente', 'étron', 'Merde Molle', 'Minable','sac a merde','sacamerde','merd','tête de ','tete de '
                    , 'Minus', 'Moins Que Rien', 'Va Nu Pieds', 'Clitosaure De Brontoris', 'Infame Raie De Cul', 'Dugland', 'Baraki', 'Enculeur De Mouches', 'Grosse Merde Puante', 'Pute Borgne', 'Chiure De Pigeon'
                    , 'Petite Merde', 'Gougnafier', 'Merdasse', 'Bachibouzouk', 'Ducon', 'Hurluberlu', 'Salope', 'Zonard', 'Bubon Puant', 'Chien Galeux', 'Ordure Purulente', 'Jobastre', 'Jobard', 'Barjot'
                    , 'Putréfaction', 'Suintance', 'Kroumir', 'Wisigoth', 'Lèche-cul', 'Putain ', 'Zazou', 'Bougre De Conne', 'Yéti Baveux', 'Fion', 'Couille Molle', 'Moudlabite', 'Cinglé', 'Frapadingue', 'Zéro'
                    , 'Pouacre', 'Pouacreux', 'Piètre', 'Peine à Jouir', 'Mal Baisé', 'Microcéphale', 'Enfant De Salauds', 'Face De Pet', 'Grognasse', 'Raclure De Bidet', 'Chien Maudit'
                    , 'Crétin Goîtreux', 'Balai De Chiottes', 'Mérule', 'Gogol', 'Pétochard','espèce de ','espece de'
                    , 'Planqué', 'Faignasse', 'Branleur', 'Branlotin', 'Merdophile', 'Nain De Jardin', 'Nunuche', 'Clown', 'Cocu', 'Caribou', 'Saligaud', 'Nounouille', 'Coprophage', 'Cornichon', 'Salaud', 'Salopiaud'
                    , 'Naze', 'Malotru', 'Sodomite', 'Pédale', 'Tantouze', 'Cave', 'Loquedu', 'Fripouille', 'Canaille', 'Maraud', 'Mécréant', "Chien D'infidèle", 'Morue', 'Blaireau', 'Bande Mou', 'Sombre Conne'
                    , 'Psychorigide', 'Gros Con', 'Vieux Con', 'Sombre Crétin', 'Nigaud', 'Catin', 'Andouille', 'Conne', "Scaphandrier D'eau De Vaiselle", 'Sous Merde', 'Fesses Molles', 'Hérétique', 'Corniaud'
                    , 'Vieille Taupe', 'Zigomar', 'Caprinophile', 'Anachorète','pédérasse', 'face de bite', 'tronche de cake', 'tête de hareng', 'face de hareng','merlan frit','merlan frite','salop'];

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
                $('.countay').load('/tchat/tchats/counttchat/<?= $id_rooms ?>');
                tchat.scrollTop(tchat[0].scrollHeight);
            });
        });
        setInterval(function () {
            $('.countay').load('/tchat/tchats/counttchat/<?= $id_rooms ?>');
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
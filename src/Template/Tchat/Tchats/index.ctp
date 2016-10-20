<div class="container">
    <h3><?= __('Wellcom <b>' . $user . '</b> to Tchats') ?></h3>
    <hr>
    <p class="countay_message" countay_message="<?= $count_message ?>"></p>
    <div class="tchat col-md-12">
        <?php $i = 0;
        foreach ($list_message as $tchats): $i++ ?>
            <div class="<?= $i ?> pad" id="<?= $tchats->user_id ?>" date="<?= $tchats->date->toUnixString(); ?>">
                <p class="message"><?= $tchats->message ?></p>
                <p class="users"><?= $tchats->has('user') ? $this->Html->link($tchats->user->username, ['controller' => 'Users', 'action' => 'view', $tchats->user->id, 'prefix'=> false], ['value' => $tchats->user->id, 'class' => 'hh']) : '' ?>
                    <?= $tchats->date ?></p>
            </div>
            <script>

                if ($('.<?= $i ?>').attr('date') < <?= $time_2->toUnixString(); ?>) {

                    $('.<?= $i ?>').addClass('hidden');
                }

                if ($('.<?= $i ?>').attr('id') == <?= $id ?>) {

                    $('.<?= $i ?>').addClass('moi');

                } else if ($('.<?= $i ?>').attr('id') != <?= $id ?>) {

                    $('.<?= $i ?>').addClass('lui');
                }
            </script>
        <?php endforeach; ?>
    </div>
    <style>
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

        .tchat {
            height: 400px;
            overflow: auto;
            text-align: left;
            padding: 1%;
            background-color: #ffffff;
            -webkit-box-shadow: 10px 15px 15px 0px rgba(0, 0, 0, 0.30);
            -moz-box-shadow: 10px 15px 15px 0px rgba(0, 0, 0, 0.30);
            box-shadow: 10px 15px 15px 0px rgba(0, 0, 0, 0.30);
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
        tchat = $('.tchat');
        tchat.scrollTop(tchat[0].scrollHeight);
    </script>
</div>
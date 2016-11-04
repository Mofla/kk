<div class="container">
    <p class="countay_message" countay_message="<?= $count_message ?>"></p>
    <div class="tchat col-md-12">
        <?php $i = 0; foreach ($list_message as $tchats): $i++ ?>
            <section class="<?= $i ?> pad" id="<?= $tchats->user_id ?>" date="<?= $tchats->date->toUnixString(); ?>">
                <p class="message"><?= $tchats->message ?></p>
                <p class="users">
                    <?= $tchats->has('user') ? $this->Html->link($tchats->user->username, ['controller' => 'Users', 'action' => 'view', $tchats->user->id, 'prefix'=> false], ['value' => $tchats->user->id, 'class' => 'user']) : '' ?>
                    <?= $tchats->date->format('Y/m/d H:i') ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'report', $tchats->id], ['confirm' => __('Etes-vous sûr de vouloir Signaler ce message ?'),'class'=>'fa fa-flag report']) ?>
                </p>
            </section>
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
        .users{
            width: 130px;
            display: inline-block;
        }
        .error-message {
            display: none;
        }
        .report {
            color: red;
            margin-top: 0;
            margin-right: 0;
            width: 9px;
            height: 9px;
        }
        .report:hover {
            color: #4f0a0f;
            text-decoration: none;
        }
        .report:focus {
            color: #4f0a0f;
            text-decoration: none;
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
            font-size: 12px;
            margin: 0 0;
        }
    </style>
    <script>
        tchat = $('.tchat');
        tchat.scrollTop(tchat[0].scrollHeight);
    </script>
</div>
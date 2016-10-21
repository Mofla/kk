
<div class="col-md-12">
    <?= $thread->has('forum') ? $this->Html->link($thread->forum->name, ['controller' => 'Forums', 'action' => 'view',
    $thread->forum->id]) : '' ?>
</div>
<div class="col-md-12 voffset2">

<?php $check = 'quotetopic' ; ?>

<div class="right" id="right">
<?php if($subscription) : ?>
    <button id="issub" class="btn btn-danger" role="button" aria-pressed="true"> <i class="fa fa-times"></i> SE DESABONNER DU SUJET</button>
<?php else: ?>
    <button id="sub" class="btn btn-warning " role="button" aria-pressed="true"> <i class="fa fa-thumb-tack"></i> S'ABONNER A CE SUJET</button>
<?php endif ?>

    <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'add' , $thread->id]); ?>"
       class="btn btn-success "  role="button" aria-pressed="true"> <i class="fa fa-comments-o"></i> REPONDRE</a>
</div>

<div class="row"></div>
<div class="table-responsive voffset2">
    <table class="table">
        <thead class="category">
        <tr>
            <th colspan="2" scope="row">
                <div><?= h($thread->subject) ?></div>

            </th>
        </tr>
        <tr class="ssthead">
            <th width="120px" scope="col">Auteur</th>
            <th scope="col">Message</th>
        </tr>
        </thead>
        <tbody>
        <tr class="sscategory">
            <td >
                <div class="username">
                    <?= $thread->has('user') ? $this->Html->link($thread->user->username, 'utilisateur/profil/'.$thread->user->id.'') : '' ?>
                </div>
                <div class="avatardiv">
                    <?= $this->Html->image('../uploads/user/'.$thread->user->picture_url ,['class'=>'avatar']); ?>
                </div>
            </td>
            <td>
                <div class="pull-right"> Message: #1</div>
                <div><?= $thread->text; ?></div>
            </td>
        </tr>


        <tr class="grey">

            <td><?= h($thread->created) ?></td>
            <td>
                <div class="left">MP</div>
                <div class="right">
                    <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'add' , $thread->id, $check]); ?>"
                       class="btn btn-sm blue" role="button" aria-pressed="true"><i class="fa fa-quote-right"></i> CITER</a>
                    <a href="<?= $this->Url->build([ 'controller' => 'Threads', 'action' => 'edit' , $thread->id]); ?>"
                       class="btn btn-sm purple" role="button" aria-pressed="true"><i class="fa fa-pencil"></i> EDITER</a>
                    <?= $this->Form->postLink(__('<i class="fa fa-times"></i>'),[ 'controller' => 'Threads'
                    , 'action' => 'delete' , $thread->id],['escape'=>false , 'class'=>'btn btn-sm btn-danger']); ?>

                </div>


            </td>
        </tr>
        </tbody>
    </table>


    <div class="table-responsive">
        <?php if (!empty($thread->posts)): ?>
        <?php $messagecount = 1 ;?>
        <?php foreach ($thread->posts as $posts): ?>
        <?php $messagecount++ ;?>
        <table class="table mrgtbl">


            <tr class="sscategory">

                <td width="120px" <?php if($posts->files) { echo 'rowspan="2"';} ?> >
                    <div class="username">
                        <?= $thread->has('user') ? $this->Html->link($posts->user->username, 'utilisateur/profil/'.$posts->user->id.'') : '' ?>

                    </div>
                    <div class="avatardiv">
                        <?= $this->Html->image('../uploads/user/'.$posts->user->picture_url ,['class'=>'avatar']); ?>
                    </div>
                </td>
                <td>
                    <div class="pull-right"> Message: #<?= $messagecount ?></div>
                    <div><?= $posts->message; ?></div>
                </td>
            </tr>

            <!--_________________________________________________________________________________pièces jointes-->
            <?php if($posts->files) : ?>
            <tr class="sscategory">
                <td> <u>Fichier Joint :</u> <br>
<!--pour chaque fichier-->
                <?php foreach($posts->files as $files) : ?>
<!--recuperer l'extension-->
                    <?php $extension = explode(".",$files->name); ?>
<!--si fichier texte-->
                    <?php if ($extension[1] == 'txt') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/txt.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

<!--si fichier zip-->
                    <?php elseif  ($extension[1] == 'zip') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/zip.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

<!--si fichier rar-->
                    <?php elseif  ($extension[1] == 'rar') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/rar.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

<!--si fichier log-->
                    <?php elseif  ($extension[1] == 'log') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/log.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

<!--si fichier pdf-->
                    <?php elseif  ($extension[1] == 'pdf') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/pdf.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

<!--si fichier css-->
                    <?php elseif  ($extension[1] == 'css') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/css.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

<!--si fichier php-->
                    <?php elseif  ($extension[1] == 'php') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/php.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

<!--si fichier html-->
                    <?php elseif  ($extension[1] == 'html') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/html.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

<!--si fichier img-->
                    <?php elseif  ($extension[1] == 'png' || $extension[1] == 'jpg' || $extension[1] == 'jpeg' || $extension[1] == 'gif' ) : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads//files/".$files->name, ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

<!--si fichier inconnu-->
                    <?php else : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/default.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>
                    <?php endif ?>
                <?php endforeach ?>
                </td>
            </tr>
            <?php endif ?>


            <tr class="grey">

                <td><?= h($posts->created) ?></td>
                <td>
                    <div class="left">MP</div>
                    <div class="right">
                        <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'add' , $thread->id, $posts->id]); ?>"
                           class="btn btn-sm blue" role="button" aria-pressed="true"><i class="fa fa-quote-right"></i> CITER</a>
                        <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'edit' , $posts->id]); ?>"
                           class="btn btn-sm purple" role="button" aria-pressed="true"><i class="fa fa-pencil"></i> EDITER</a>
                        <?= $this->Form->postLink(__('<i class="fa fa-times"></i>'),[ 'controller' => 'Posts'
                        , 'action' => 'delete' , $posts->id],['escape'=>false , 'class'=>'btn btn-sm btn-danger']); ?>

                    </div>
                </td>
            </tr>
            <!--<tr>-->
            <!--<td><?= h($posts->id) ?></td>-->
            <!--<td><?= h($posts->title) ?></td>-->
            <!--<td><?= h($posts->message) ?></td>-->
            <!--<td><?= h($posts->created) ?></td>-->
            <!--<td><?= h($posts->modified) ?></td>-->
            <!--<td><?= h($posts->user_id) ?></td>-->
            <!--<td><?= h($posts->thread_id) ?></td>-->
            <!--<td class="actions">-->
            <!--<?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>-->
            <!--<?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>-->
            <!--<?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>-->
            <!--</td>-->
            <!--</tr>-->
        </table>
        <?php endforeach; ?>
        <?php endif; ?>

        <div class="right">
            <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'add' , $thread->id]); ?>"
               class="btn btn-success " role="button" aria-pressed="true"> <i class="fa fa-comments-o"></i> REPONDRE</a>
        </div>

    </div>
</div>
</div>
<script>
var id = '<?= $thread->id ?>';
// s'abonner a un sujet
$(document).on('click', '#sub', function () {
    $.ajax({
        type:'post',
        data: 'thread_id=' + id,
        url: '<?= $this->Url->build("forums/subscriptions/add"); ?>',
        success:function(){
            $('#sub').addClass('hidden');
            $('#right').prepend('<button id="issub" class="btn btn-danger" role="button" aria-pressed="true"> <i class="fa fa-times"></i> SE DESABONNER DU SUJET</button>')
        }
    });
});

//se desabonner d'un sujet
$(document).on('click', '#issub', function () {
    $.ajax({
        type:'post',
        data: 'thread_id=' + id,
        url: '<?= $this->Url->build("forums/subscriptions/delete"); ?>',
        success:function(){
            $('#issub').addClass('hidden');
            $('#right').prepend('<button id="sub" class="btn btn-warning " role="button" aria-pressed="true"> <i class="fa fa-thumb-tack"></i> S\'ABONNER A CE SUJET</button>')
        }
    });
});
</script>
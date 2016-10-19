<?= $this->Html->css('../assets/global/plugins/bootstrap-summernote/summernote.css') ?>
        <?= $this->Html->script('../assets/global/plugins/bootstrap-summernote/summernote.min.js') ?>

        <!--echo $this->Form->input('title');-->
            <!--echo $this->Form->input('message');-->
            <!--echo $this->Form->input('user_id', ['options' => $users]);-->
            <!--echo $this->Form->input('thread_id', ['options' => $threads]);-->
            <!--echo $this->Form->input('files._ids', ['options' => $files]);-->

<div class="col-md-12">
<div class="table-responsive">
    <table class="table sscategory">
        <thead class="category">
        <tr>
            <th colspan="2" scope="col"> Poster une nouvelle réponse </th>
        </tr>
        </thead>
        <tbody>
        <?= $this->Form->create($post) ?>
        <fieldset>
            <tr class="hidden">
                <td width="20%" > Titre du sujet </td>
                <td width="80%">   <?= $this->Form->input('title' , ['label' => false , 'class' => 'form-control' ,'value'=>$forumid->subject]); ?> </td>
            </tr>
            <tr>
                <td width="20%"> Votre message </td>
                <td width="80%">
                    <div class="form-body">
                        <textarea class="form-control" id="summernote" name="message" rows="6">
                            <?php if ($pastquote) : ?>

                            <p>&nbsp;</p>
<blockquote>
    <?php if ($pastquote->message) : ?>
 <?= $pastquote->message ?>
    <?php endif ?>
    <?php if ($pastquote->text) : ?>
    <?= $pastquote->text ?>
    <?php endif ?>
</blockquote>


                            <?php endif ?>

                        </textarea>
                    </div>
                </td>
            </tr>
        </fieldset>
        <tr>
            <td colspan="2" class="grey text-center">
                <?= $this->Form->button(__('POSTER LA REPONSE')) ?>
                <?= $this->Form->end() ?>
            </td>
        </tr>
    </table>
</div>
</div>
<script>
$(document).ready(function() {
    $('#summernote').summernote();
});
</script>
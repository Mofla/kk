<?= $this->Html->script('../assets/global/plugins/ckeditor/ckeditor.js') ?>

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
            <tr>
                <td width="20%"> Titre du sujet </td>
                <td width="80%">   <?= $this->Form->input('title' , ['label' => false , 'class' => 'form-control']); ?> </td>
            </tr>
            <tr>
                <td> Votre message </td>
                <td>
                    <div class="form-body">
                        <textarea class="ckeditor form-control" name="message" rows="6"></textarea>
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
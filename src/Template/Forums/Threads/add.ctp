<?= $this->Html->script('../assets/global/plugins/ckeditor/ckeditor.js') ?>

<div class="col-md-12">
    <div class="table-responsive">
        <table class="table sscategory">
            <thead class="category">
            <tr>
                <th colspan="2" scope="col"> Poster un nouveau Sujet </th>
            </tr>
            </thead>
            <tbody>
    <?= $this->Form->create($thread) ?>
    <fieldset>
        <tr>
            <td width="20%"> Titre du sujet </td>
            <td width="80%">   <?= $this->Form->input('subject' , ['label' => false , 'class' => 'form-control']); ?> </td>
        </tr>
        <tr>
            <td> Votre message </td>
            <td>

                    <div class="form-body">
                                <textarea class="ckeditor form-control" name="text" rows="6"></textarea>
                    </div>

                <div class="voffset3 text-center">
                <?= $this->Form->button('Valider',['class' => 'btn btn-success']) ?>
                <?= $this->Form->end() ?>
                </div>

            </td>
        </tr>
    </fieldset>

        </table>
</div>
</div>

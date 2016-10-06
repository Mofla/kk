
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
            <td width="80%">   <?= $this->Form->input('subject' , ['label' => false , 'class' => 'inputwidth']); ?> </td>
        </tr>
        <tr>
            <td> Votre message </td>
            <td>  <?= $this->Form->input('text' , ['label' => false , 'class' => 'inputwidth' ]); ?> </td>
        </tr>
    </fieldset>
    <td>
        <td>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    </td>
    </tr>
        </table>
</div>
</div>

<?= $this->element('Forum/admin-menu') ?>

<div class="col-md-9">
<div class="table-responsive">
<table class="table">
    <thead class="category">
    <tr>
        <th colspan="2"><?= __('Créer une catégorie') ?></th>
    </tr>
    </thead>
    <tbody class="sscategory">
    <?= $this->Form->create($category) ?>
    <tr>
        <td width="20%">Titre</td>
        <td width="80%"><?= $this->Form->input('name' , ['label' => false , 'class' => 'inputwidth']); ?></td>
    </tr>


    <tr>
        <td colspan="2" class="text-center">

            <?= $this->Form->button(__('VALIDER')) ?>
            <?= $this->Form->end() ?>
        </td>
    </tr>

    </tbody>
</table>
</div>
</div>
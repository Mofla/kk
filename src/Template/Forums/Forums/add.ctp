<div class="col-md-3">
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('List Forums'), ['action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Threads'), ['controller' => 'Threads', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Thread'), ['controller' => 'Threads', 'action' => 'add']) ?></li>
        </ul>
    </nav>
</div>
<div class="col-md-9">
<div class="table-responsive">
    <table class="table">
        <thead class="category">
        <tr>
            <th colspan="2"><?= __('Créer un forum') ?></th>
        </tr>
        </thead>
<tbody class="sscategory">
<?= $this->Form->create($forum, ['type' => 'file']) ?>
            <tr>
                <td width="20%">Catégorie</td>
                <td width="80%"><?= $this->Form->input('category_id' , ['options' => $cat , 'label' => false]); ?></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><?= $this->Form->input('name' , ['label' => false , 'class' => 'inputwidth']); ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?= $this->Form->input('description', ['label' => false , 'class' => 'inputwidth']); ?></td>
            </tr>
            <tr>
                <td>Icone</td>
                <td>
                    <input id="file-upload" name="icon" type="file" class="file"
                           multiple="false" data-show-upload="false" data-show-caption="false"
                           data-show-remove="false" accept="image/jpeg,image/png"
                           data-browse-class="btn btn-default"
                           data-browse-label="Parcourir les fichiers">
                </td>
            </tr>
            <tr>
                <td>Désactiver/Cacher</td>
                <td>
                    <input type="checkbox" name="active">

                </td>
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



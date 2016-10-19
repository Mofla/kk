<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
        <?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>
        <?= $this->element('Forum/admin-menu') ?>

<div class="col-md-9">
<div class="table-responsive">
    <table class="table">
        <thead class="category">
        <tr>
            <th colspan="2"><span class="h4">Créer un forum</span></th>
        </tr>
        </thead>
<tbody class="sscategory">
<?= $this->Form->create($forum, ['type' => 'file']) ?>
            <tr>
                <td width="20%">Catégorie</td>
                <td width="80%"><?= $this->Form->input('category_id' , ['options' => $cat , 'label' => false ,'class'=>'form-control']); ?></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><?= $this->Form->input('name' , ['label' => false , 'class' => 'form-control']); ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?= $this->Form->input('description', ['label' => false , 'class' => 'form-control']); ?></td>
            </tr>
            <tr>
                <td>Icone</td>
                <td>



                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 50px; height: 50px;">
                            </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 50px; max-height: 50px;"> </div>
                        <div>
                                                                                <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Selectionner une image </span>
                                                                                    <span class="fileinput-exists"> Modifier </span>
                                                                                    <input type="file" name="icon"> </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Retirer </a>
                        </div>
                    </div>



                </td>
            </tr>
            <tr>
                <td>Désactiver/Cacher</td>
                <td>
                    <input type="checkbox" name="active" class="mt-checkbox mt-checkbox-outline">

                </td>
            </tr>

            <tr>
                <td colspan="2" class="text-center">

        <?= $this->Form->button('VALIDER',['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
                </td>
            </tr>

</tbody>
    </table>
</div>
</div>



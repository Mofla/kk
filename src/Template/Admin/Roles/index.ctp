<div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1">
        <h3 class="text-center">Roles</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td><?= $this->Number->format($role->id) ?></td>
                        <td><?= h($role->name) ?></td>
                        <td><?= h($role->description) ?></td>
                        <td class="actions">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Actions
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                    <li class="dropdown-header"></li>
                                </ul>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                    <li><?= $this->Html->link('Voir',['action' => 'view',$role->id]) ?></li>
                                    <li><?= $this->Html->link('Editer',['action' => 'edit',$role->id]) ?></li>
                                    <li><?= $this->Form->postLink('Supprimer',['action' => 'delete',$role->id],['confirm' => 'Supprimer le role ?']) ?></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>
            </div>
        </div>
    </div>
</div>


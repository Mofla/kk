<div>
  <a class="btn btn-info"
    href="permission/ajouter">
      <i class="glyphicon glyphicon-plus"></i> Nouvelle permission</a>
</div>
<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
  <thead>
    <tr>
      <th scope="col"><?= $this->Paginator->sort('id') ?></th>
      <th scope="col"><?= $this->Paginator->sort('name') ?></th>
      <th scope="col"><?= $this->Paginator->sort('menu') ?></th>
      <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($permissions as $permission): ?>
      <tr class="odd gradeX">
        <td><?= $this->Number->format($permission->id) ?></td>
        <td><?= h($permission->name) ?></td>
        <td><?php if (h($permission->menu)== 1):?>oui <?php else: ?>non <?php endif; ?></td>
        <td>
          <div class="btn-group">
            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
              <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-left" role="menu">
              <i class="glyphicon glyphicon-search"></i><a href="<?= $this->Url->build(['controller' => 'Permissions', 'action' => 'view', $permission->id]); ?>">Voir</a><br><br>
              <i class="glyphicon glyphicon-pencil"></i><a href="<?= $this->Url->build(['controller' => 'Permissions', 'action' => 'edit', $permission->id]); ?>">Editer</a><br><br>
              <i class="glyphicon glyphicon-remove"></i><?= $this->Form->postLink(__('Supprimer'), ['controller'=>'Permissions','action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id)]) ?><br><br>
            </ul>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="paginator">
  <ul class="pagination">
    <?= $this->Paginator->prev('< ' . __('previous')) ?>
    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->next(__('next') . ' >') ?>
  </ul>
  <p><?= $this->Paginator->counter() ?></p>
</div>

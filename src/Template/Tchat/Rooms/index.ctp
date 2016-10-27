<a href="<?= $this->Url->build(['controller' => 'Rooms', 'action' => 'add'])?>" class="btn green"><i class="fa fa-plus" ></i> New Room</a>
<div class="rooms index large-9 medium-8 columns content">
    <h3><?= __('Rooms') ?></h3>
    <table class="table table-striped table-bordered table-checkable order-column dataTable" id="sample_1">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('names') ?></th>
                <th><?= $this->Paginator->sort('Nombres Users') ?></th>
                <th><?= $this->Paginator->sort('Nombres Messages') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= h($room->name) ?></td>
                <td>
                    <?php $a = 0; foreach ($room->users as $users):  ?>

                        <?php $a +=  count($users->id) ?>


                    <?php endforeach; ?>
                    <?= $this->Number->format($a) ?>
                </td>
                <td>
                    <?php $b = 0; foreach ($room->tchats as $tchat):  ?>

                        <?php $b +=  count($tchat->id) ?>


                    <?php endforeach; ?>
                    <?= $this->Number->format($b) ?>
                </td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-left" role="menu">
                            <li><?= $this->Html->link(__('Click Me'), ['controller'=>'Tchats','action' => 'add', $room->id, 'prefix' => 'tchat']) ?></li>
                            <li class="divider"></li>
                            <li><?= $this->Html->link(__('Historyque'), ['controller'=>'Tchats','action' => 'history', $room->id, 'prefix' => 'tchat']) ?></li>
                            <li><?= $this->Html->link(__('Detail'), ['action' => 'view', $room->id]) ?></li>
                            <?php if ($id === $room->creator):?>
                            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $room->id]) ?></li>
                            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $room->id], ['confirm' => __('Etes-vous sûr que vous voulez supprimer le salon  {0} ?', $room->name)]) ?></li>
                       <?php endif;?>
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
</div>

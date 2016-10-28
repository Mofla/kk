<div class="page-content">
    <h3><?= __('Rooms') ?></h3>
    <div class="row">
        <?php foreach ($rooms as $room): ?>
            <a href="<?= $this->Url->build(['controller' => 'Tchats', 'action' => 'add', $room->id, 'prefix' => 'tchat']) ?>" class="btn default yellow-stripe col-md-4">
                <p class="list-group-item list-group-item-warning"><b><?= __('names: ') ?></b><?= h($room->name) ?></p>

                <?php $a = 0;foreach ($room->users as $users): ?>
                    <?php $a += count($users->id) ?>
                <?php endforeach; ?>
                <p class="list-group-item list-group-item-warning"><b><?= __('Nombres Users ') ?></b><span class="badge badge-default" ><?= $this->Number->format($a) ?></span></p>
                <?php $b = 0;foreach ($room->tchats as $tchat): ?>
                    <?php $b += count($tchat->id) ?>
                <?php endforeach; ?>

                <p class="list-group-item list-group-item-warning"><b><?=__('Nombres Messages ') ?></b><span class="badge badge-default" ><?= $this->Number->format($b) ?></span></p>

                <p class="list-group-item list-group-item-warning"><b><?=__('Description: ') ?></b><?= h($room->description) ?></p>
                <br>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    <style>
        .col-md-4 {
            width: 32.35%;
        }
        .default:hover{
            margin: 7px;
            background-color: #e1e5ec;
        }
        .btn{
            margin: 5px;
        }
        .list-group-item-warning {
            color: black;
            background-color: #faeaa9;
        }
        .list-group-item {
            position: relative;
            display: block;
            padding: 10px 15px;
            margin-bottom: -1px;
            background-color: #faeaa9;
            border: 0 solid #c29d0b !important;
            border-bottom: 1px dashed #c29d0b !important;
        }
    </style>
</div>

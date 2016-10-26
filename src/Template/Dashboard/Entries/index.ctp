
            <?php foreach ($entries as $entry): ?>
<div class="row">
    <div class="col-12">
                    <div class="todo-tasklist-item todo-tasklist-item-border">
                        <div class="todo-tasklist-item-text"><?= $entry->content ?>
                        </div>
                        <div class="todo-tasklist-controls pull-left">
                                                                                    <span class="todo-tasklist-date">
                                                                                        <i class="fa fa-calendar"></i><?= $entry->date ?></span>
                            <span class="todo-tasklist-badge badge badge-roundless">Task state</span>
                        </div>
                    </div>
    </div>
</div>
            <?php endforeach; ?>


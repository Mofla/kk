<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Forum'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Threads'), ['controller' => 'Threads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Thread'), ['controller' => 'Threads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="table-responsive">
    <h3><?= __('Forums') ?></h3>

            <?php foreach ($cat as $forum): ?>
    <table class="table">
        <thead class="category">
        <tr>
            <th colspan="2" scope="col"><?= $forum->name ?></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($forum->forums as $section): ?>
            <tr class="sscategory" >
                <td width="80px">icone</td>
                <td> <?= $this->Html->link(__($section->name), ['action' => 'view', $section->id]) ?>
                    <br>
                    <?= $section->description ?></td>
        </tr>

                <!--<td class="actions">-->
                    <!--<?= $this->Html->link(__('View'), ['action' => 'view', $forum->id]) ?>-->
                    <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $forum->id]) ?>-->
                    <!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $forum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id)]) ?>-->
                <!--</td>-->

        <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>


<script>
$('tr').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});
</script>
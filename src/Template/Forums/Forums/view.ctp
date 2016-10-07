<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('NOUVEAU SUJET'), ['controller' => 'Threads', 'action' => 'add',  $forum->id]) ?></li>
    </ul>
</nav>



<div class="table-responsive">
    <?php if (!empty($forum->threads)): ?>
    <table class="table">
        <tr>
            <th scope="col" class="category" colspan="5"><?= h($forum->name) ?></th>
        </tr>
        <tr class="ssthead">
            <th scope="col" >Sujets / Auteur</th>
            <th scope="col" >Réponses</th>
            <th scope="col" >Vues</th>
            <th scope="col" >Derniers messages</th>
            <th scope="col" ></th>
        </tr>
        <?php foreach ($forum->threads as $threads): ?>
        <tr class="sscategory">
            <td width="50%" <?= $this->Html->link(__($threads->subject), ['action' => 'view', $threads->id]) ?>
             <br> par <?= h($threads->user->username) ?></td>
            <td width="10%">0</td>
            <td width="10%" >0</td>
            <td width="25%">le <br> par </br></td>
            <td width="5%" class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Threads', 'action' => 'view', $threads->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Threads', 'action' => 'edit', $threads->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Threads', 'action' => 'delete', $threads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $threads->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>

<script>
$('tr').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});
</script>
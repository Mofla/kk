<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tchats'), ['controller' => 'Tchats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tchat'), ['controller' => 'Tchats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rooms view large-9 medium-8 columns content">
    <h3><?= h($room->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($room->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($room->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tchats') ?></h4>
        <?php if (!empty($room->tchats)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Message') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Room Id') ?></th>
                <th><?= __('Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($room->tchats as $tchats): ?>
            <tr>
                <td><?= h($tchats->id) ?></td>
                <td><?= h($tchats->message) ?></td>
                <td><?= h($tchats->user_id) ?></td>
                <td><?= h($tchats->room_id) ?></td>
                <td><?= h($tchats->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tchats', 'action' => 'view', $tchats->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tchats', 'action' => 'edit', $tchats->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tchats', 'action' => 'delete', $tchats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tchats->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($room->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Zipcode') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Cellphone') ?></th>
                <th><?= __('Emergency Phone') ?></th>
                <th><?= __('Firstname') ?></th>
                <th><?= __('Lastname') ?></th>
                <th><?= __('Birthday') ?></th>
                <th><?= __('Github Username') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Role Id') ?></th>
                <th><?= __('Picture Url') ?></th>
                <th><?= __('Promotion Id') ?></th>
                <th><?= __('Facebook Link') ?></th>
                <th><?= __('Twitter Link') ?></th>
                <th><?= __('Linkedin Link') ?></th>
                <th><?= __('Cv Url') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($room->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->zipcode) ?></td>
                <td><?= h($users->city) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->cellphone) ?></td>
                <td><?= h($users->emergency_phone) ?></td>
                <td><?= h($users->firstname) ?></td>
                <td><?= h($users->lastname) ?></td>
                <td><?= h($users->birthday) ?></td>
                <td><?= h($users->github_username) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td><?= h($users->picture_url) ?></td>
                <td><?= h($users->promotion_id) ?></td>
                <td><?= h($users->facebook_link) ?></td>
                <td><?= h($users->twitter_link) ?></td>
                <td><?= h($users->linkedin_link) ?></td>
                <td><?= h($users->cv_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

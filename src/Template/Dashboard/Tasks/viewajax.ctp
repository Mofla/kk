<div id="taskModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>

                <div class="tasks view large-10 medium-10 columns content">
                    <h3><?= h($task->name) ?></h3>
                    <table class="vertical-table">
                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($task->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('State') ?></th>
                            <td><?= $task->has('state') ? $this->Html->link($task->state->name, ['controller' => 'States', 'action' => 'view', $task->state->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Project') ?></th>
                            <td><?= $task->has('project') ? $this->Html->link($task->project->name, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($task->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Start Date') ?></th>
                            <td><?= h($task->start_date) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('End Date') ?></th>
                            <td><?= h($task->end_date) ?></td>
                        </tr>
                    </table>
                    <div class="row">
                        <h4><?= __('Description') ?></h4>
                        <?= $this->Text->autoParagraph(h($task->description)); ?>
                    </div>
                    <div class="related">
                        <h4><?= __('Related Users') ?></h4>
                        <?php if (!empty($task->users)): ?>
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Promotion') ?></th>
                                    <th scope="col"><?= __('Username') ?></th>
                                    <th scope="col"><?= __('Password') ?></th>
                                    <th scope="col"><?= __('Email') ?></th>
                                    <th scope="col"><?= __('Address') ?></th>
                                    <th scope="col"><?= __('Zipcode') ?></th>
                                    <th scope="col"><?= __('City') ?></th>
                                    <th scope="col"><?= __('Phone') ?></th>
                                    <th scope="col"><?= __('Cellphone') ?></th>
                                    <th scope="col"><?= __('Emergency Phone') ?></th>
                                    <th scope="col"><?= __('Firstname') ?></th>
                                    <th scope="col"><?= __('Lastname') ?></th>
                                    <th scope="col"><?= __('Birthday') ?></th>
                                    <th scope="col"><?= __('Github Username') ?></th>
                                    <th scope="col"><?= __('Created') ?></th>
                                    <th scope="col"><?= __('Modified') ?></th>
                                    <th scope="col"><?= __('Role Id') ?></th>
                                    <th scope="col"><?= __('Picture Url') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($task->users as $users): ?>
                                    <tr>
                                        <td><?= h($users->id) ?></td>
                                        <td><?= h($users->promotion) ?></td>
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

                <!-- <div class="modal-footer">
                     <button class="btn" data-dismiss="modal">Annuler</button>
                 </div>-->
            </div>
        </div>
    </div>
</div>

<div class="portlet box blue">

    <div class="portlet-body">
        <div class="row">
            <div class="col-md-2' col-sm-2 col-xs-2" style="width: 130px;">
                <ul class="nav nav-tabs tabs-left">
                    <li class="">
                        <a href="#tab_6_1" data-toggle="tab" aria-expanded="false"> Projet </a>
                    </li>
                    <li class="">
                        <a href="#tab_6_2" data-toggle="tab" aria-expanded="false"> Apprenant</a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> More
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#tab_6_3" tabindex="-1" data-toggle="tab"> Option 1 </a>
                            </li>
                            <li>
                                <a href="#tab_6_4" tabindex="-1" data-toggle="tab"> Option 2 </a>
                            </li>
                            <li>
                                <a href="#tab_6_3" tabindex="-1" data-toggle="tab"> Option 3 </a>
                            </li>
                            <li>
                                <a href="#tab_6_4" tabindex="-1" data-toggle="tab"> Option 4 </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-10" style="max-width: 300px;">
                <div class="tab-content">
                    <div class="tab-pane active in" id="tab_6_1">
                        <div class="states index large-9 medium-8 columns content">
                            <h3><?= __('States') ?></h3>
                            <table cellpadding="0" cellspacing="0">
                                <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($states as $state): ?>
                                    <tr>
                                        <td><?= $this->Number->format($state->id) ?></td>
                                        <td><?= h($state->name) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $state->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $state->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $state->id], ['confirm' => __('Are you sure you want to delete # {0}?', $state->id)]) ?>
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
                    </div>
                    <div class="tab-pane fade" id="tab_6_2">
                        <div class="row">
                        <div class="portlet-body">
                            <div class="mt-element-list">
                                <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                    <div class="list-head-title-container">
                                        <div class="list-date">Nov 8, 2015</div>
                                        <h3 class="list-title">Simple List</h3>
                                    </div>
                                </div>
                                <div class="mt-list-container list-simple ext-1 group">
                                    <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple" aria-expanded="true">
                                        <div class="list-toggle done uppercase"> Completed
                                            <span class="badge badge-default pull-right bg-white font-green bold">2</span>
                                        </div>
                                    </a>
                                    <div class="panel-collapse collapse in" id="completed-simple" aria-expanded="true">
                                        <ul>
                                            <li class="mt-list-item done">
                                                <div class="list-icon-container">
                                                    <i class="icon-check"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Concept Proof</a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <li class="mt-list-item done">
                                                <div class="list-icon-container">
                                                    <i class="icon-check"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="list-toggle-container" data-toggle="collapse" href="#pending-simple" aria-expanded="true">
                                        <div class="list-toggle uppercase"> Pending
                                            <span class="badge badge-default pull-right bg-white font-dark bold">3</span>
                                        </div>
                                    </a>
                                    <div class="panel-collapse collapse in" id="pending-simple" aria-expanded="true">
                                        <ul>
                                            <li class="mt-list-item">
                                                <div class="list-icon-container">
                                                    <i class="icon-close"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <li class="mt-list-item">
                                                <div class="list-icon-container">
                                                    <i class="icon-close"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <li class="mt-list-item">
                                                <div class="list-icon-container">
                                                    <i class="icon-close"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="mt-element-list">
                                <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                    <div class="list-head-title-container">
                                        <div class="list-date">Nov 8, 2015</div>
                                        <h3 class="list-title">Simple List</h3>
                                    </div>
                                </div>
                                <div class="mt-list-container list-simple ext-1 group">
                                    <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple" aria-expanded="true">
                                        <div class="list-toggle done uppercase"> Completed
                                            <span class="badge badge-default pull-right bg-white font-green bold">2</span>
                                        </div>
                                    </a>
                                    <div class="panel-collapse collapse in" id="completed-simple" aria-expanded="true">
                                        <ul>
                                            <li class="mt-list-item done">
                                                <div class="list-icon-container">
                                                    <i class="icon-check"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Concept Proof</a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <li class="mt-list-item done">
                                                <div class="list-icon-container">
                                                    <i class="icon-check"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="list-toggle-container" data-toggle="collapse" href="#pending-simple" aria-expanded="true">
                                        <div class="list-toggle uppercase"> Pending
                                            <span class="badge badge-default pull-right bg-white font-dark bold">3</span>
                                        </div>
                                    </a>
                                    <div class="panel-collapse collapse in" id="pending-simple" aria-expanded="true">
                                        <ul>
                                            <li class="mt-list-item">
                                                <div class="list-icon-container">
                                                    <i class="icon-close"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <li class="mt-list-item">
                                                <div class="list-icon-container">
                                                    <i class="icon-close"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <li class="mt-list-item">
                                                <div class="list-icon-container">
                                                    <i class="icon-close"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="mt-element-list">
                                <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                    <div class="list-head-title-container">
                                        <div class="list-date">Nov 8, 2015</div>
                                        <h3 class="list-title">Simple List</h3>
                                    </div>
                                </div>
                                <div class="mt-list-container list-simple ext-1 group">
                                    <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple" aria-expanded="true">
                                        <div class="list-toggle done uppercase"> Completed
                                            <span class="badge badge-default pull-right bg-white font-green bold">2</span>
                                        </div>
                                    </a>
                                    <div class="panel-collapse collapse in" id="completed-simple" aria-expanded="true">
                                        <ul>
                                            <li class="mt-list-item done">
                                                <div class="list-icon-container">
                                                    <i class="icon-check"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Concept Proof</a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <li class="mt-list-item done">
                                                <div class="list-icon-container">
                                                    <i class="icon-check"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="list-toggle-container" data-toggle="collapse" href="#pending-simple" aria-expanded="true">
                                        <div class="list-toggle uppercase"> Pending
                                            <span class="badge badge-default pull-right bg-white font-dark bold">3</span>
                                        </div>
                                    </a>
                                    <div class="panel-collapse collapse in" id="pending-simple" aria-expanded="true">
                                        <ul>
                                            <li class="mt-list-item">
                                                <div class="list-icon-container">
                                                    <i class="icon-close"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <li class="mt-list-item">
                                                <div class="list-icon-container">
                                                    <i class="icon-close"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <li class="mt-list-item">
                                                <div class="list-icon-container">
                                                    <i class="icon-close"></i>
                                                </div>
                                                <div class="list-datetime"> 8 Nov </div>
                                                <div class="list-item-content">
                                                    <h3 class="uppercase">
                                                        <a href="javascript:;">Listings Feature</a>
                                                    </h3>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_6_3">
                    </div>
                    <div class="tab-pane fade" id="tab_6_4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


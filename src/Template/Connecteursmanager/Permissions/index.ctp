<div class="breadcrum">
    <?= $this->Html->link($this->request->params['prefix'],'/'.$this->request->params['prefix']) ?> /
    <?= $this->Html->link($this->request->params['controller'],['controller' => $this->request->params['controller'], 'action' => '/']) ?> /
    <?= $this->Html->link($this->request->params['action'],['controller' => $this->request->params['controller'],'action' => $this->request->params['action']]) ?>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            Nom
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($permissions as $permission): ?>
                        <tr>
                            <td><?= $permission->id ?></td>
                            <td><?= $permission->name ?></td>
                            <td><?= $permission->description ?></td>
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
                                        <li class="dropdown-header">Permission</li>
                                        <li><?= $this->Html->link('Editer',['action' => 'edit',$permission->id]) ?></li>
                                        <li><?= $this->Form->postLink('Supprimer',['action' => 'delete',$permission->id],['confirm' => 'Supprimer la permission ?']) ?></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="text-center">
                <?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Ajouter',
                    ['action' => 'add'],
                    ['escape' => false,'class' => 'btn btn-lg btn-info']
                ) ?>
                <?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Gérer les permissions',
                    ['controller' => 'Connectors','action' => 'index'],
                    ['escape' => false,'class' => 'btn btn-lg btn-warning']
                ) ?>
                <?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Définir les roles',
                    ['action' => 'role'],
                    ['escape' => false,'class' => 'btn btn-lg btn-danger']
                ) ?>
                <hr>
                <div class="paginator text-center">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(' >') ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
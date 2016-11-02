<div class="breadcrum">
    <?= $this->Html->link($this->request->params['prefix'],'/'.$this->request->params['prefix']) ?> /
    <?= $this->Html->link($this->request->params['controller'],['controller' => $this->request->params['controller'], 'action' => '/']) ?> /
    <?= $this->Html->link($this->request->params['action'],['controller' => $this->request->params['controller'],'action' => $this->request->params['action']]) ?>
</div>
<div class="row">
    <?= $this->Form->create() ?>
    <div class="">
        <?php foreach ($actions as $module => $controllers): ?>
            <table class="table">
                <thead>
                <tr>
                    <th><?= $module ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($controllers as $controller => $functions): ?>
                    <tr>
                        <td>
                            <?= $controller ?>
                            <ul>
                                <?php foreach ($functions as $key => $value): ?>
                                    <li>

                                        <?php
                                        if(isset($compare[$module][$controller][$key]))
                                        {
                                            $default = $compare[$module][$controller][$key];
                                        }
                                        else
                                        {
                                            $default = 0;
                                        }
                                        echo $this->Form->input('permission_id',['label' => $key,'name' => implode('-',[$module,$controller,$key]),'options' => $permissions,'empty' => [0 => '--'],'default' => $default,'class' => 'form-control']);
                                        ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="panel-heading">
                <?= $this->Form->submit('Valider',['class' => 'btn btn-info']) ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $this->Form->end() ?>
</div>
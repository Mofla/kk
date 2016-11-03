<?= $this->Html->css('permissions.css') ?>

<div class="breadcrum">
    <?= $this->Html->link($this->request->params['prefix'],'/'.$this->request->params['prefix']) ?> /
    <?= $this->Html->link($this->request->params['controller'],['controller' => $this->request->params['controller'], 'action' => '/']) ?> /
    <?= $this->Html->link($this->request->params['action'],['controller' => $this->request->params['controller'],'action' => $this->request->params['action']]) ?>
</div>
<div class="row">
    <?= $this->Form->create() ?>

        <?php foreach ($actions as $module => $controllers): ?>
    <div class="col-xs-12 col-md-6" id="cols">
            <table class="table table-striped">
                <thead class="modules">
                <tr>
                    <th>
                        <span class="h3">
                            <span class="btn-caret-modules"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
                                <?= $module ?></span>
                            <span class="btn-group carets">
                                <span class="btn btn-xs btn-mini btn-caret-all"><span class="caret"></span> Tout afficher</span>
                        </span>
                        </span>
                    </th>
                </tr>
                </thead>
                <tbody class="controllers collapse">
                <?php foreach ($controllers as $controller => $functions): ?>
                    <tr>
                        <td>
                            <span class="btn-caret-controllers"><i class="fa fa-plus-square" aria-hidden="true"></i>
                                <?= $controller ?></span>
                            <div class="actions collapse">
                                <ul class="list-group">
                                    <?php foreach ($functions as $key => $value): ?>
                                        <li class="list-group-item">

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
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </div>
        <?php endforeach; ?>
</div>
    <div class="row text-center">
        <?= $this->Form->submit('Valider',['class' => 'btn btn-lg btn-info']) ?>
    </div>
    <?= $this->Form->end() ?>


<script>
    $(document).ready(function(){
        $('.btn-caret-modules').on('click',function(){
            $(this).closest('.modules').nextAll('.controllers').fadeToggle();
        });
        $('.btn-caret-all').on('click',function(){
            $(this).closest('.modules').nextAll('.controllers').fadeToggle();
            $(this).closest('.modules').nextAll('.controllers').children('tr').children('td').children('.actions').fadeToggle();
        });
        $('.btn-caret-controllers').on('click',function(){
            $(this).next('.actions').slideToggle();
        });
    })

    $('thead').on('click',function(){
     $(this).closest('.col-md-6').toggleClass('col-md-12');
    });
</script>
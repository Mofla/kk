<?= $this->Html->css('permissions.css') ?>

<div class="row">
<?= $this->Form->create(null,['url' => ['action' => 'ddd']]) ?>
    <?php foreach ($permissions as $role => $modules): ?>
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?= $role ?>
                </div>
                <?php foreach ($modules as $module => $controllers): ?>
                    <table class="table">
                        <thead class="modules">
                            <tr>
                                <th>
                                    <span class="btn-caret-modules"> <?= $module ?><span class="caret"></span></span>
                                    <span class="btn-group carets">
                                        <span class="btn btn-xs btn-mini btn-caret-all"><span class="caret"></span> Tout afficher</span>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <?php foreach ($controllers as $controller => $actions): ?>
                        <tbody class="controllers collapse">
                            <tr>
                                <td>
                                    <span class="btn-caret-controllers"> <?= $controller ?><span class="caret"></span></span>
                                    <div class="actions collapse">
                                        <hr>
                                        <ul>
                                            <?php foreach ($actions as $action => $value): ?>
                                                <li>
                                                    <?php $checkbox_name = implode('-',[$module,$controller,$action]) ?>
                                                    <?= $this->Form->checkbox('',['name' => $checkbox_name,'default' => $value['value'],'hiddenField' => false]) ?>
                                                    <?= $action ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <?= $this->Form->button('Changer') ?>
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
</script>
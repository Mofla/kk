<?= $this->Html->css('permissions.css') ?>

<div class="row">
    <?= $this->Form->create(null) ?>
    <!-- colonne des permissions à cocher -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <span class="h4">Permissions</span>
            </div>

            <?php foreach ($permissions as $module => $controllers): ?>
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
                                        <span class="btn-caret-all check-all">Tout cocher</span>
                                        <?php foreach ($actions as $key => $value): ?>
                                            <li class="clear-btn-float">
                                                <?php $checkbox_name = implode('-',[$module,$controller,$value]) ?>
                                                <?= $this->Form->checkbox('',['name' => $checkbox_name,'default' => 0,'hiddenField' => false,'class' => 'checkbox']) ?>
                                                <?= $value ?>
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
    <!-- formulaire pour créer la permission -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <span class="h4">Permissions</span>
            </div>
            <div class="panel-body">
                <?= $this->Form->input('name',['class' => 'form-control']) ?>
                <?= $this->Form->input('description',['class' => 'form-control']) ?>
                Afficher dans le menu : <?= $this->Form->radio('menu',[false => 'Non',true =>'Oui'],['class' => 'form-control']) ?>
            </div>
            <div class="panel-footer text-center">
                <?= $this->Form->button('Valider',['class' => 'btn btn-info']) ?>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
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
        $('.check-all').on('click',function(){
            $(this).closest('div').find(':checkbox').prop('checked',true);
        });
    })
</script>
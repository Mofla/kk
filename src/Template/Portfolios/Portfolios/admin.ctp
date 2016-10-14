<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 col-sm-offset-1 col-md-offset-1 col-lg-offset-2">
        <div class="panel panel-primary table-responsive">
            <div class="panel-heading">
                <span class="h2">
                    <?= __('Portfolios') ?>
                </span>
            </div>
            <table class="table">
                <?php foreach($portfolios as $portfolio): ?>
                    <tr>
                        <td><?= $portfolio->name ?><span class="btn btn-caret"><span class="caret"></span></span>
                            <div class="well collapse">
                                <p><?= $portfolio->description ?></p>
                                <p>Par :
                                    <?php
                                        $users = [];
                                        foreach ($portfolio->users as $user)
                                        {
                                            $users[$user->id] = $this->Html->link($user->firstname . ' ' . $user->lastname,
                                                ['controller' => 'Users', 'action' => 'view',$user->id,'prefix' => false]);
                                        }
                                        echo implode(', ',$users);
                                    ?>
                                </p>
                            </div>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>',
                                ['action' => 'edit',$portfolio->id],
                                ['escape' => false,'class' => 'btn btn-sm btn-info img-circle']
                            ) ?>
                            <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',
                                ['action' => 'delete',$portfolio->id],
                                ['confirm' => __('Are you sure you want to delete #{0}?',$portfolio->name),'escape' => false,'class' => 'btn btn-sm btn-danger img-circle']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.btn-caret').on('click',function(){
            $(this).next().toggle();
        })
    });
</script>
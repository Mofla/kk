<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
        <div class="panel panel-primary table-responsive">
            <div class="panel-heading">
                <span class="h2">
                    <?= __('Portfolios') ?>
                </span>
            </div>
            <table class="table">
                <?php foreach($portfolios as $portfolio): ?>
                    <tr>
                        <td class="btn-caret"><?= $portfolio->name ?><span class="caret"></span>
                            <div class="well collapse">
                                <?= $this->Html->image('../uploads/portfolios/' . $portfolio->picture_url,['style' => 'float:right;max-width:100px;max-height:100px']) ?>
                                <i>
                                    <?php
                                    // Cut the description if too long
                                    $description = mb_substr($portfolio->description,0,100);
                                    echo $description;
                                    echo (strlen($description) < strlen($portfolio->description)) ? '...' : '';
                                    ?>
                                </i>
                                <p>Par :
                                    <?php
                                        $users = [];
                                        foreach ($portfolio->users as $user)
                                        {
                                            $users[$user->id] = $this->Html->link($user->firstname . ' ' . $user->lastname,
                                                ['controller' => 'Users', 'action' => 'view',$user->id,'prefix' => false]);
                                        }
                                        echo nl2br(implode(', ',$users));
                                    ?>
                                </p>
                                <span class="clearfix"></span>
                            </div>
                        </td>
                        <td class="actions" width="20%">
                            <?= $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span>',
                                ['controller' => 'Portfolios','action' => 'voir',$portfolio->id,'prefix' => false],
                                ['escape' => false,'class' => 'btn btn-sm btn-primary']
                            ) ?>
                            <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>',
                                ['action' => 'edit',$portfolio->id],
                                ['escape' => false,'class' => 'btn btn-sm btn-info']
                            ) ?>
                            <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',
                                ['action' => 'delete',$portfolio->id],
                                ['confirm' => __('Are you sure you want to delete #{0}?',$portfolio->name),'escape' => false,'class' => 'btn btn-sm btn-danger']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="panel-footer text-center">
                <?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Ajouter',
                    ['action' => 'add'],
                    ['escape' => false,'class' => 'btn btn-lg btn-info']
                ) ?>

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

<script>
    $(document).ready(function() {
        $('.btn-caret').on('click', function () {
            $(this).find('.well').slideToggle();
        })
    });
</script>
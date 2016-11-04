<?php $this->layout = 'front' ?>
<?= $this->Html->script('../assets/global/plugins/jquery.min.js') ?>
<?= $this->Html->css('portfolio.css') ?>
<?= $this->Html->css('forum-styles.css') ?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-info voffset6">

            <div class="panel-heading text-center">
                <h3 class="h3">Les projets</h3>
            </div>
            <div class="panel-body">

                <div class="row no-gutter">
                    <?php foreach($portfolios as $portfolio): ?>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-no-gutter">
                            <div class="img-portfolio collapse">
                                <?= $this->Html->image('../uploads/portfolios/'.$portfolio->picture_url,['class' => 'img-portfolio-img']) ?>
                                <div class="img-portfolio-description collapse">
                                    <h6 class="h4 text-center"><?= $portfolio->name ?></h6>
                                    <p>
                                        <span class="label">Description :</span><br>
                                        <?php
                                        // Cut the description if too long
                                        $description = mb_substr($portfolio->description,0,100);
                                        echo $description;
                                        echo (strlen($description) < strlen($portfolio->description)) ? '...' : '';
                                        ?>
                                    </p>
                                    <p>
                                        <span class="label">Par :</span>
                                        <?php $users = []; ?>
                                        <?php foreach ($portfolio->users as $user): ?>
                                            <?php
                                            $users[$user->id] = $this->Html->link($user->firstname . ' ' . $user->lastname,
                                                ['controller' => 'Users', 'action' => 'view','prefix'=> 'utilisateur',$user->id],
                                                ['fullBase'=>true]);
                                            ?>
                                        <?php endforeach; ?>
                                        <?php
                                        if(count($users) > 5)
                                        {
                                            $count = count($users) - 5;
                                            echo implode(', ',array_slice($users,0,5)) . ' <i>et ' . $count . ' autres personnes.</i>';
                                        }
                                        else
                                        {
                                            echo implode(', ',$users);
                                        }
                                        ?>
                                    </p>
                                    <span class="bottom-btn">
                            <?= $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span> Voir',[
                                'action' => 'view',$portfolio->id
                            ],[
                                'class' => 'btn btn-xs btn-primary img-rounded',
                                'fullBase' => true,
                                'escape' => false
                            ]) ?>
                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="paginator text-center voffset3">
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
    $(document).ready(function(){
        portfolioImg();
    });

    function portfolioImg()
    {
        // resize images at loading
        var width = $('.img-portfolio').width();
        $('.img-portfolio').innerHeight(width);
        width = $('.img-portfolio').width();
        var height = $('.img-portfolio').height();
        if(width>height)
        {
            $('.img-portfolio>img').css({
                "width":width+"px",
                "height":width+"px",
                "object-fit":"cover"
            });
        }
        else
        {
            $('.img-portfolio>img').css({
                "width":height+"px",
                "height":height+"px",
                "object-fit":"cover"
            });
        }
        // effect on click
        $('.img-portfolio').on("mouseenter mouseleave",function(){
            var div = $(this).find('div');
            $(div).fadeToggle(1);
        });

        // show images
        $('.img-portfolio').show();
    }
</script>
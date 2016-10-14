<?= $this->Html->css('portfolio.css') ?>
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
                        <?php foreach ($portfolio->users as $user): ?>
                            |<?= $this->Html->link($user->firstname . ' ' . $user->lastname,
                                ['controller' => 'Users', 'action' => 'view',$user->id,'prefix'=> false],
                                ['fullBase'=>true]) ?>|
                        <?php endforeach; ?>

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
<div class="paginator text-center">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
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
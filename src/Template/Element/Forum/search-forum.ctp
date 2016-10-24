<div class='col-md-3 pull-right'>

    <div class="col-md-12">

        <div class="input-group" style="text-align:left">

            <?php echo $this->Form->create('Post',array('id' => 'searchs' , 'class' => 'input-group' , 'type' => 'post','url' => array('controller' => 'forums', 'action' => 'search'))); ?>


            <input type="text" class="form-control" name="query" id="search-forum-input" placeholder="rechercher sur le forum">
            <span class="input-group-btn">
                <a href="javascript:;" class="btn green" id="search-forum"><i class="fa fa-search"></i></a>
            </span>

            <?= $this->Form->end() ; ?>

        </div>
    </div>

</div>

<script>
$('#search-forum').click(function () {
    $("#searchs").submit();
});
</script>
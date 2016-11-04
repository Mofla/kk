<?= $this->Html->css('multi-select.css') ?>
<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>
<div class="breadcrum">
    <?= $this->Html->link(ucfirst($this->request->params['prefix']),'/'.$this->request->params['prefix']) ?> /
    <?= $this->Html->link(ucfirst($this->request->params['controller']),['controller' => $this->request->params['controller'], 'action' => '/']) ?> /
    <?= ucfirst($this->request->params['action']) ?>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
        <legend class="text-center">Ajouter des permissions</legend>
        <?= $this->Form->input('role_id',[
            'options' => $role,
            'id' => 'role-list',
            'class' => 'form-control']) ?>

        <div id="box"></div>
    </div>
</div>


<?= $this->Html->script('jquery.multi-select.js') ?>
<script>
    $(document).ready(function(){
        $('#role-list').on('change',function(){
            callAjax();
        });
        callAjax();
    })

    $('#multiselect').multiSelect()
    function callAjax(){
        $.ajax({
            type:"post",
            url:"<?= $this->Url->build(['action' => 'roles']) ?>",
            data:'id='+$('#role-list').val(),
            success: function (data) {
                $('#box').html(data);
            }
        })
    }
</script>
<?= $this->Html->css('multi-select.css') ?>
<?= $this->Html->css('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>
<div class="row">
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
    <?= $this->Form->create($portfolio,['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend>Ajouter un projet</legend>
        <?php
            echo $this->Form->input('name',['class' => 'form-control']);
            echo $this->Form->input('description',['class' => 'form-control']);
            echo $this->Form->input('url',['class' => 'form-control']);
        ?>
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
            <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="picture"> </span>
                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
            </div>
        </div>
    </fieldset>
    <hr>
    <div class="text-center">
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-sm btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
</div>
<?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
<?= $this->Html->script('jquery.datetimepicker.full.min.js') ?>
<?= $this->Html->css('jquery.datetimepicker.css') ?>
<?= $this->Html->script('jquery.multi-select.js') ?>
<script>
    $(document).ready(function(){
        var start = $('#start').value();
        var end = $('#end').value();
        $('#start').value(start.replace('/','-'));
        $('#end').value(start.replace('/','-'));
    });
    $('#multiselect').multiSelect();
</script>
<script>


    //datetimepicker on date fields
    //todo: fix startdate
    $('#start').datetimepicker({
        timepicker:false,
        format: "Y-m-d"
    });

    $('#end').datetimepicker({
        timepicker:false,
        format: "Y-m-d"
    });

</script>

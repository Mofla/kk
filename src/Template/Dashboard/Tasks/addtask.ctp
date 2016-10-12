<?= $this->Html->css('../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css') ?>
<?= $this->Html->css('../assets/global/plugins/jquery-multi-select/css/multi-select.css') ?>
<?= $this->Html->css('../assets/global/plugins/select2/css/select2.min.css') ?>
<?= $this->Html->css('../assets/global/plugins/select2/css/select2-bootstrap.min.css') ?>

<div id="taskModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="tasks form large-9 medium-8 columns content">
                    <?= $this->Form->create($task) ?>
                    <fieldset>
                        <legend><?= __('Ajouter une tâche') ?></legend>
                        <div class="form-group">
                        <?php
                        echo $this->Form->input('name', ['class' => 'form-control']);
                        echo $this->Form->input('description', ['class' => 'form-control']);
                        echo $this->Form->input('start_date', ['type' => 'text', 'id' => 'start', 'class' => 'form-control']);
                        echo $this->Form->input('end_date', ['type' => 'text', 'id' => 'end', 'class' => 'form-control']);
                        echo $this->Form->input('users._ids', ['options' => $users, 'class' => 'multi-select']);
                        ?>
                        </div>
                    </fieldset>
                    <?= $this->Form->button(__('Ajouter')) ?>
                    <?= $this->Form->end() ?>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
    <?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
    <?= $this->Html->script('jquery.datetimepicker.full.min.js') ?>
    <?= $this->Html->css('jquery.datetimepicker.css') ?>



    <?= $this->Html->script('../assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js') ?>
    <?= $this->Html->script('../assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js') ?>
    <?= $this->Html->script('../assets/pages/scripts/components-multi-select.js') ?>
    <?= $this->Html->script('../assets/global/plugins/select2/js/select2.full.min.js') ?>


    <script>
        $('.multi-select').multiSelect();


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
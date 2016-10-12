<div id="taskModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter une tâche à ce projet</h3>
                <div class="tasks form large-9 medium-8 columns content">
                    <?= $this->Form->create($task) ?>
                    <fieldset>
                        <legend><?= __('Add Task') ?></legend>
                        <?php
                        echo $this->Form->input('name');
                        echo $this->Form->input('description');
                        echo $this->Form->input('state_id', ['options' => $states]);
                        echo $this->Form->input('start_date', ['type' => 'text', 'id' => 'start']);
                        echo $this->Form->input('end_date', ['type' => 'text', 'id' => 'end']);
                        echo $this->Form->input('users._ids', ['options' => $users]);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
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

    <script>


        //datetimepicker on date fields
        //todo: fix startdate
        $('#start').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss"
        });

        $('#end').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss"
        });

    </script>
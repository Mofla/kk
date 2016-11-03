<h1>Welcom To History</h1>
<hr>
<?= $this->Form->create($date = NULL) ?>
<div class="row">
    <div class="container">
        <div class="form-group col-md-4">
            <label class="label-control">Date de Debut : </label>
            <?= $this->Form->input('datedebut', ['type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'datepickers1']); ?>
        </div>
        <div class="form-group col-md-4">
            <label class="label-control">Date de Fin : </label>
            <?= $this->Form->input('datefin', ['type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'datepickers2']); ?>
        </div>
    </div>
</div>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
<?= $this->Html->script('../build/jquery.datetimepicker.full.min.js') ?>
<?= $this->Html->css('../css/jquery.datetimepicker.css') ?>
<hr>
<div class="datedebut" datedebut="<?= $date_debut ?>"></div>
<div class="datefin" datefin="<?= $date_fin ?>"></div>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Message</th>
        <th>Users</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($list_message as $tchats): ?>
        <?php if (empty($empty )): ?>
        <tr class="list <?= $tchats->id ?>" report="<?= $tchats->report ?>">
            <td><?= $tchats->message ?></td>
            <td><?= $tchats->has('user') ? $this->Html->link($tchats->user->username, ['controller' => 'Users', 'action' => 'view', $tchats->user->id, 'prefix' => false], ['value' => $tchats->user->id]) : '' ?></td>
            <td><?= $tchats->date->format('Y/d/m H:i') ?></td>
        </tr>
            <script>
                report = $('.<?= $tchats->id ?>');

                if (  report.attr('report') > 0){
                    report.css('background-color','yellow');
                }

                if (  report.attr('report') >= 2){
                    report.css('background-color','orange');
                }

                if (  report.attr('report') >= 3){
                    report.css('background-color','red');
                }
            </script>
            <?php endif; ?>
    <?php endforeach; ?>
    <?='<tr><td>'.$empty.'</td><td></td><td></td></tr>'?>
    </tbody>
</table>

<script>
    date_debut = $('.datedebut').attr('datedebut');
    date_fin = $('.datefin').attr('datefin');

    if (date_debut === '') {
        date_debut = new Date()
    }

    if (date_fin === '') {
        date_fin = new Date()
    }
    $('#datepickers1').datetimepicker({
        format: 'Y-m-d H:i:s',
        inline: true,
        startDate: date_debut
    });
    $('#datepickers2').datetimepicker({
        format: 'Y-m-d H:i:s',
        inline: true,
        startDate: date_fin
    });
</script>


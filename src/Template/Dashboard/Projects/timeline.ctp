<div id="visualization"></div>


<?= $this->Html->script('../js/jquery.js') ?>
<?= $this->Html->css('../assets/vis/vis.css') ?>
<?= $this->Html->script('../assets/vis/vis.js') ?>
<?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


<?= $this->Html->css('sweetalert.css') ?>
<?= $this->Html->script('sweetalert.min.js') ?>




<style type="text/css">

    p {
        max-width: 700px;
    }

    .vis-item.red {
        color: white;
        background-color: #3598DC;
        border-color: darkblue;
    }

    .vis-item.orange {
        color: black;
        background-color: orange;
        border-color: orangered;
    }

    .vis-item.green {
        color: black;
        background-color: green;
        border-color: darkolivegreen;
    }

</style>

<script type="text/javascript">

    var container = document.getElementById('visualization');

    var min = new Date(2016, 3, 1); // 1 april
    var max = new Date(2020, 3, 30, 23, 59, 59); // 30 april
    var items = new vis.DataSet([



        <?php foreach ($project->tasks as $task): ?>
        <?php if ($task->state->name !== 'done'): ?>

        {
            id: <?= $task->id ?>,
            content: '<?= h($task->name) ?>',
            start: '<?= h($task->start_date) ?>',
            end: '<?= h($task->end_date) ?>',
            <?php if ($task->state->name == "todo"): ?>
            className: 'red'
            <?php endif; ?>
            <?php if ($task->state->name == "doing"): ?>
            className: 'orange'
            <?php endif; ?>

        },
        <?php endif; ?>
        <?php endforeach; ?>
    ]);
    var options = {
        editable: true,

        onMove: function (item, callback) {
            var title = 'Voulez-vous vraiment changer les dates de cette tâche \n' +
                'début: ' + item.start + '\n' +
                'fin: ' + item.end + '?';

            prettyConfirm('Changer les dates', title, function (ok) {
                if (ok) {
                    callback(item); // send back item as confirmation (can be changed)
                }
                else {
                    callback(null); // cancel editing item
                }
            });
        },

        onMoving: function (item, callback) {
            if (item.start < min) item.start = min;
            if (item.start > max) item.start = max;
            if (item.end > max) item.end = max;

            callback(item); // send back the (possibly) changed item
        },

        onRemove: function (item, callback) {
            prettyConfirm('Supprimer la tâche', 'Voulez-vous vraiment supprimer la tâche ' + item.content + '?', function (ok) {
                if (ok) {
                    callback(item); // confirm deletion
                }
                else {
                    callback(null); // cancel deletion
                }
            });
        }
    };

    var timeline = new vis.Timeline(container, items, options);

    items.on('*', function (event, properties) {
        logEvent(event, properties);
    });


    /*Saves edits to tasks from timeline*/
    function logEvent(event, properties) {

        var eventType = JSON.stringify(event);

        var start = JSON.stringify(properties.data[0].start).split('T');
        var end = JSON.stringify(properties.data[0].end).split('T');
        var datAjax = {
            start_date: start[0].substring(1),
            end_date: end[0].substring(1)
        };

        $.ajax({
            type: "POST",
            data: datAjax,
            url: '<?= $this->Url->build(["controller" => "Tasks", "action" => "editation"]); ?>' + '/' + properties.data[0].id
        });
    }

    function prettyConfirm(title, text, callback) {
        swal({
            title: title,
            text: text,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55"
        }, callback);
    }

    function prettyPrompt(title, text, inputValue, callback) {
        swal({
            title: title,
            text: text,
            type: 'input',
            showCancelButton: true,
            inputValue: inputValue
        }, callback);
    }

</script>


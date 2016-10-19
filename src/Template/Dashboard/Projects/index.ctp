<div class="task-modal-base">
    <div class="task-modal-cont"></div>
</div>

<?= $this->Html->script('../js/jquery.js') ?>

<?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


<div class="container-fluid">
    <button class="btn btn-default" id="project-add">Ajouter un projet</button>
    <br>
    <div class="row">
        <?php foreach ($projects as $project): ?>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $this->Html->link($project->name, ['action' => 'view', $project->id]) ?></h3>
                    </div>
                    <div class="panel-body"><?= $project->description ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Timeline des projets</h3>
            </div>
            <div class="panel-body">
                <div id="visualization"></div>
            </div>
        </div>


    </div>

</div>
<?= $this->Html->css('../assets/vis/vis.css') ?>
<?= $this->Html->script('../assets/vis/vis.js') ?>

<script type="text/javascript">
    // DOM element where the Timeline will be attached
    var container = document.getElementById('visualization');

    // Create a DataSet (allows two way data-binding)
    var items = new vis.DataSet([
        <?php foreach ($projects as $project): ?>
        {
            id: <?= $project->id ?>,
            content: '<?= $project->name?>',
            start: '<?= $project->start_date?>',
            end: '<?= $project->end_date?>'
        },
        <?php endforeach; ?>
    ]);

    // Configuration for the Timeline
    var options = {};

    // Create a Timeline
    var timeline = new vis.Timeline(container, items, options);
</script>

<script>


    //project add modal
    $('#project-add').on('click', function (event) {
        event.preventDefault();

        var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'add']); ?>';


        $('.task-modal-cont').load(url, function (result) {
            $('#taskModal').modal({show: true});
        });
    });


</script>




<?= $this->Html->script('../js/jquery.js') ?>

<?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


<div class="task-modal-base">
    <div class="task-modal-cont"></div>
</div>

<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-1">
        <ul class="nav nav-tabs-right">
            <li>
                <button class="btn btn-info btn-lg" id="add-task"><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </li>
            <br>
            <br>
            <br>
            <li>
                <button class="btn btn-default btn-lg" href="#tab_1" data-toggle="tab" id="btn_1"><span
                        class="glyphicon glyphicon-list" aria-hidden="true"></span>
                </button>
            </li>
            <li>
                <button class="btn btn-default btn-lg" href="#tab_2" data-toggle="tab" id="btn_2"><span
                        class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                </button>
            </li>
            <li>
                <button class="btn btn-default btn-lg" href="#tab_3" data-toggle="tab" id="btn_3"><span
                        class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span>
                </button>
            </li>
        </ul>
    </div>
    <div class="col-md-11 col-sm-11 col-xs-11">

            <div class="tab-content">
                <div class="tab-pane active" id="tab_1"></div>
                <div class="tab-pane" id="tab_2"></div>
                <div class="tab-pane" id="tab_3"></div>
            </div>

    </div>
</div>

<script>
    //gestion of the different views

    //load todolist
    function load1() {
        var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'liste', $project->id]); ?>';
        $('#tab_1').load(url);
    }
    //loads at document ready
    $(function () {
        load1();
    });
    // on click events
    $('#btn_1').on('click', function () {
       load1();
    });
    $('#btn_2').on('click', function () {
        var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'timeline', $project->id]); ?>';
        $('#tab_2').load(url);
    });
    $('#btn_3').on('click', function () {
        var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'graph', $project->id]); ?>';
        $('#tab_3').load(url);
    });




    //task add modal
    $('#add-task').on('click', function (event) {
        event.preventDefault();
        var id = $(this).attr('id').split('-');

        var url = '<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'addtask']); ?>' + '/' + <?= $project->id ?>;


        $('.task-modal-cont').load(url, function (result) {
            $('#taskModal').modal({show: true});
        });
    });

    //task edit modal
    $(document).on('click', '.edittask', function (event) {
        event.preventDefault();
        var id = $(this).attr('id').split('-');

        var url = '<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'edittask']); ?>' + '/' + <?= $project->id ?>;


        $('.task-modal-cont').load(url, function (result) {
            $('#taskModal').modal({show: true});
        });
    });




</script>
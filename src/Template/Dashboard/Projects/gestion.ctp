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
                <button class="btn btn-lg blue-chambray add-btn" id="add-task"><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                <button class="btn btn-info btn-lg blue-chambray add-btn" id="add-file" style="display: none"><span
                        class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
                </button>
                <button class="btn btn-info btn-lg blue-chambray add-btn" id="add-entry" style="display: none"><span
                        class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
            </li>
            <br>
            <br>
            <br>
            <li>
                <button class="btn blue btn-lg active" href="#tab_1" data-toggle="tab" id="btn_1"><span
                        class="glyphicon glyphicon-list" aria-hidden="true"></span>
                </button>
            </li>
            <li>
                <button class="btn blue btn-lg" href="#tab_2" data-toggle="tab" id="btn_2"><span
                        class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                </button>
            </li>
            <li>
                <button class="btn blue btn-lg" href="#tab_3" data-toggle="tab" id="btn_3"><span
                        class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span>
                </button>
            </li>
            <li>
                <button class="btn blue btn-lg" href="#tab_4" data-toggle="tab" id="btn_4"><span
                        class="glyphicon glyphicon-file" aria-hidden="true"></span>
                </button>
            </li>
            <li>
                <button class="btn blue btn-lg" href="#tab_5" data-toggle="tab" id="btn_5"><span
                        class="glyphicon glyphicon-book" aria-hidden="true"></span>
                </button>
            </li>
        </ul>
    </div>
    <div class="col-md-11 col-sm-11 col-xs-11">

            <div class="tab-content">
                <div class="tab-pane active" id="tab_1"></div>
                <div class="tab-pane" id="tab_2"></div>
                <div class="tab-pane" id="tab_3"></div>
                <div class="tab-pane" id="tab_4"></div>
                <div class="tab-pane" id="tab_5"></div>
            </div>
    </div>
</div>

<script>

    //active links
    var buttonsNav = $('#btn_1,#btn_2,#btn_3,#btn_4,#btn_5');

    buttonsNav.on('click', function () {
        buttonsNav.removeClass('active');
        $(this).addClass('active');
    });

    //gestion of the different views


    //switch buttons
    function showHideButton(btn) {
        $('.add-btn').hide();
        switch (btn) {
            case 'task':
                $('#add-task').show();
                break;
            case 'file':
                $('#add-file').show();
                break;
            case 'entry':
                $('#add-entry').show();
                break;
        }
    }


    //load todolist
    function load1() {
        var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'liste', $project->id]); ?>';
        $('#tab_1').load(url);
    }
    function load2() {
        var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'timeline', $project->id]); ?>';
        $('#tab_2').load(url);
    }
    function load3() {
        var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'graph', $project->id]); ?>';
        $('#tab_3').load(url);
    }
    function load4() {
        var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'medias', $project->id]); ?>';
        $('#tab_4').load(url);
    }
    function load5() {
        var url = '<?= $this->Url->build(['controller' => 'Diaries', 'action' => 'view', $diary->id]); ?>';
        $('#tab_5').load(url);
    }


    //loads at document ready
    //manages tabs after redirecting
    $(function () {
        var url = window.location.href.split('#');

        switch (url[1]) {
            case 'tab_2':
                $('#btn_2').trigger('click');
                break;
            case 'tab_3':
                $('#btn_3').trigger('click');
                break;
            case 'tab_4':
                $('#btn_4').trigger('click');
                break;
            case 'tab_5':
                $('#btn_5').trigger('click');
                break;
            default:
                load1();
                break;
        }
    });


    // on click events
    $('#btn_1').on('click', function () {
       showHideButton('task');
       load1();
    });
    $('#btn_2').on('click', function () {
        showHideButton('task');
       load2();
    });
    $('#btn_3').on('click', function () {
        showHideButton('task');
        load3();
    });
    $('#btn_4').on('click', function () {
        showHideButton('file');
        load4();
    });
    $('#btn_5').on('click', function () {
        showHideButton('entry');
        load5();
    });




    //task add modal
    $('#add-task').on('click', function (event) {
        event.preventDefault();

        var url = '<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'addtask']); ?>' + '/' + <?= $project->id ?>;

        $('.task-modal-cont').load(url, function (result) {
            $('#taskModal').modal({show: true});
        });
    });

    //task edit modal
    $(document).on('click', '.edittask', function (event) {
        event.preventDefault();

        var id = $(this).attr('id').split('-');

        var url = '<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'edittask']); ?>' + '/' + id[1];


        $('.task-modal-cont').load(url, function (result) {
            $('#taskModal').modal({show: true});
        });
    });

    //task view modal
    $(document).on('click', '.view-task', function (event) {
        event.preventDefault();

        var id = $(this).attr('id').split('-');

        var url = '<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'viewajax']); ?>' + '/' + id[1];


        $('.task-modal-cont').load(url, function (result) {
            $('#taskModal').modal({show: true});
        });
    });


    //task add entry
    $('#add-entry').on('click', function (event) {

        var url = '<?= $this->Url->build(['controller' => 'Entries', 'action' => 'add']); ?>' + '/' + <?= $diary['id'] ?>;


        $('.task-modal-cont').load(url, function (result) {
            $('#taskModal').modal({show: true});
        });
    });



</script>
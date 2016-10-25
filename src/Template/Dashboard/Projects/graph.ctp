<button type="button" id="btn-UD" class="btn btn-default"><span class="glyphicon glyphicon-chevron-down"></span> </button>
<button type="button" id="btn-DU" value="Down-Up" class="btn btn-default"><span class="glyphicon glyphicon-chevron-up"></span> </button>
<button type="button" id="btn-LR" value="Left-Right" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span> </button>
<button type="button" id="btn-RL" value="Right-Left" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> </button>
<input type="hidden" id='direction' value="UD">
<select id="layout" class="form-control">
    <option value="hubsize-true">Vue hiérarchique</option>
    <option value="directed-false">Vue en cercle</option>
</select>


<div id="network-popUp">
    <span id="operation">node</span> <br>
    <table style="margin:auto;">
        <tr>
            <td>id</td>
            <td><input id="node-id" value="new value"/></td>
        </tr>
        <tr>
            <td>label</td>
            <td><input id="node-label" value="new value"/></td>
        </tr>
    </table>
    <input type="button" value="save" id="saveButton"/>
    <input type="button" value="cancel" id="cancelButton"/>
</div>
<br/>
<div class="nodes" id="mynetwork"></div>




<?= $this->Html->script('../js/jquery.js') ?>
<?= $this->Html->css('../assets/vis/vis.css') ?>
<?= $this->Html->script('../assets/vis/vis.js') ?>
<?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


<?= $this->Html->css('sweetalert.css') ?>
<?= $this->Html->script('sweetalert.min.js') ?>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<style type="text/css">
    #mynetwork {
        position: relative;
        width: 100%;
        height: 600px;
        border: 1px solid lightgray;
    }

    table.legend_table {
        font-size: 11px;
        border-width: 1px;
        border-color: #d3d3d3;
        border-style: solid;
    }

    table.legend_table, td {
        border-width: 1px;
        border-color: #d3d3d3;
        border-style: solid;
        padding: 2px;
    }

    div.table_content {
        width: 80px;
        text-align: center;
    }

    div.table_description {
        width: 100px;
    }

    #operation {
        font-size: 28px;
    }

    #network-popUp {
        display: none;
        position: absolute;
        top: 350px;
        left: 170px;
        z-index: 299;
        width: 250px;
        height: 120px;
        background-color: #f9f9f9;
        border-style: solid;
        border-width: 3px;
        border-color: #5394ed;
        padding: 10px;
        text-align: center;
    }
</style>


<!--node graph views-->

<script type="text/javascript">
    var directionInput = document.getElementById("direction");
    var btnUD = document.getElementById("btn-UD");
    btnUD.onclick = function () {
        directionInput.value = "UD";
        draw();
    };
    var btnDU = document.getElementById("btn-DU");
    btnDU.onclick = function () {
        directionInput.value = "DU";
        draw();
    };
    var btnLR = document.getElementById("btn-LR");
    btnLR.onclick = function () {
        directionInput.value = "LR";
        draw();
    };
    var btnRL = document.getElementById("btn-RL");
    btnRL.onclick = function () {
        directionInput.value = "RL";
        draw();
    };


    var dropdown = document.getElementById("layout");
    dropdown.onchange = function () {
        var opt = dropdown.value.split('-');
        layoutMethod = opt[0];
        if (opt[1] == 'false') {
            layoutBool = false
        } else (layoutBool = true);
        draw();
    };

    var layoutMethod = "hubsize";
    var layoutBool = true;

    //may be useful someday
    function cleanPonctuation(data) {
        return data.replace(/'/g, "\\'");
    }
    //may be useful someday
    function breakLine(data) {
        return '"' + [data.slice(0, 15), '\\n', data.slice(15)].join('') +'"';
    }



    function draw() {

        var directionInput = document.getElementById("direction").value;


        // create an array with nodes
        var nodes = new vis.DataSet([
            {
                id: 'end',
                size: 10,
                label: "Fin du projet",
                shape: 'box',
                font: {'face': 'monospace', 'align': 'left', 'color': 'white'},
                color: 'blue'
            },
            <?php foreach ($project->tasks as $task): ?>


            {
                id: <?= $task->id ?>,
                size: 10,
                label: "<?= $task->name ?>",
                font: {'face': 'monospace', 'align': 'left'},
                <?php if ($task->state->name == 'todo'): ?>
                group: 'todo',
                color: 'lightSkyBlue'
                <?php endif; ?>
                <?php if ($task->state->name == 'doing'): ?>
                group: 'doing',
                color: 'orange'
                <?php endif; ?>
                <?php if ($task->state->name == 'done'): ?>
                group: 'done',
                color: 'green'
                <?php endif; ?>
            },
            <?php endforeach; ?>

        ]);

        // create an array with edges
        var edges = new vis.DataSet([
            <?php foreach ($endPoints as $endPoint) : ?>

            {from: <?= $endPoint->id ?>, to: 'end'},
            <?php endforeach; ?>

            <?php foreach ($project->from_to_tasks as $fromto) : ?>
            {from: <?= $fromto->from_id ?>, to: <?= $fromto->to_id ?>},
            <?php endforeach; ?>



        ]);
        var data = {
            nodes: nodes,
            edges: edges
        };

        // create a network
        var container = document.getElementById('mynetwork');

        var options = {
            groups: {
                todo: {
                    shape: 'icon',
                    icon: {
                        face: 'FontAwesome',
                        code: '\uf073',
                        size: 50,
                        color: 'lightSkyBlue'
                    }
                },
                doing: {
                    shape: 'icon',
                    icon: {
                        face: 'FontAwesome',
                        code: '\uf0ad',
                        size: 50,
                        color: 'orange'
                    }
                },
                done: {
                    shape: 'icon',
                    icon: {
                        face: 'FontAwesome',
                        code: '\uf058',
                        size: 50,
                        color: 'green'
                    }
                },
                focus: {
                    "physics": {
                        "minVelocity": 0.75,
                        hierarchicalRepulsion: {
                            nodeDistance: 500
                        }
                    }
                }
            },
            "edges": {
                "arrows": {
                    "to": {
                        "enabled": true
                    }
                },
                "smooth": {
                    "type": "cubicBezier",
                    "forceDirection": "none",
                    "roundness": 0.6
                }
            },

            "interaction": {
                "hover": true,
                "navigationButtons": true
            },
            "physics": {
                "minVelocity": 0.75,
                hierarchicalRepulsion: {
                    nodeDistance: 200
                }
            },
            layout: {
                hierarchical: {
                    enabled: layoutBool,
                    sortMethod: layoutMethod,
                    levelSeparation: 200,
                    direction: directionInput
                }
            },

            manipulation: {
                addNode: function (data, callback) {
                    // filling in the popup DOM elements
                    document.getElementById('operation').innerHTML = "Add Node";
                    document.getElementById('node-id').value = data.id;
                    document.getElementById('node-label').value = data.label;
                    document.getElementById('saveButton').onclick = saveData.bind(this, data, callback);
                    document.getElementById('cancelButton').onclick = clearPopUp.bind();
                    document.getElementById('network-popUp').style.display = 'block';
                },
                editNode: function (data, callback) {
                    // filling in the popup DOM elements
                    document.getElementById('operation').innerHTML = "Edit Node";
                    document.getElementById('node-id').value = data.id;
                    document.getElementById('node-label').value = data.label;
                    document.getElementById('saveButton').onclick = saveData.bind(this, data, callback);
                    document.getElementById('cancelButton').onclick = cancelEdit.bind(this, callback);
                    document.getElementById('network-popUp').style.display = 'block';
                },
                addEdge: function (data, callback) {
                    if (data.from == data.to) {
                        var r = confirm("Do you want to connect the node to itself?");
                        if (r == true) {
                            callback(data);
                        }
                    }
                    else {
                        var datAjax = {
                            project_id: <?= $project->id ?>,
                            from_id: data.from,
                            to_id: data.to
                        };
                        var ajax = $.ajax({
                            type: "POST",
                            data: datAjax,
                            url: '<?= $this->Url->build(["controller" => "FromToTasks", "action" => "add"]); ?>'
                        });

                        callback(data);
                    }
                },
                deleteEdge: function (data, callback) {

                    //gets the id of the deleted edge and gets connected nodes ids before deleting them
                    var keyD = data.edges[0];
                    var array = $.map(edges._data, function (value, index) {
                        return [value];
                    });

                    for (var i = 0; i < array.length; i++) {
                        if (array[i].id == keyD) {
                            var datAjax = {
                                project_id: <?= $project->id ?>,
                                from_id: array[i].from,
                                to_id: array[i].to
                            };
                            var ajax = $.ajax({
                                type: "POST",
                                data: datAjax,
                                url: '<?= $this->Url->build(["controller" => "FromToTasks", "action" => "deleteajax"]); ?>'
                            });
                        }
                    }
                    callback(data);
                }
            }
        };
        network = new vis.Network(container, data, options);


        // add event listeners


        network.on("doubleClick", function (params) {

            var id = params.nodes[0];

            var url = '<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'viewajax']); ?>' + '/' + id;

            $('.task-modal-cont').load(url, function (result) {
                $('#taskModal').modal({show: true});
            });
        });
    }

    function clearPopUp() {
        document.getElementById('saveButton').onclick = null;
        document.getElementById('cancelButton').onclick = null;
        document.getElementById('network-popUp').style.display = 'none';
    }

    function cancelEdit(callback) {
        clearPopUp();
        callback(null);
    }

    function saveData(data, callback) {
        data.id = document.getElementById('node-id').value;
        data.label = document.getElementById('node-label').value;
        clearPopUp();
        callback(data);
    }

    draw();
</script>

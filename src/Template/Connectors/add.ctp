<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Connectors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="connectors form large-9 medium-8 columns content">
    <?= $this->Form->create($connector) ?>
    <fieldset>
        <legend><?= __('Créer une permission') ?></legend>


    <select name="controller" required="required" id="controller">
<?php foreach ($getcontrol as $controller) : ?>
        <option value="<?= $controller ?>"><?= $controller ?></option>
    <?php endforeach ?>
    </select>

    <?php
            echo $this->Form->input('function',['type' => 'select', 'empty' => 'Aucun Contrôleur selectionné']);
            echo $this->Form->input('permission_id', ['options' => $permissions]);
 ?>
</div>
        ?>
    </fieldset>
    <?= $this->Form->button(__('VALIDER')) ?>
    <?= $this->Form->end() ?>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

<script>
// champ select dynamique
$('#controller').change(function(){
    getcontrol();
});
function getcontrol(){
    $.ajax({
        type: 'POST',
        url: '<?= $this->Url->build(["controller" => "Connectors","action" => "ajaxgetfunctionlist"]); ?>',
        data  : "id="+$('#controller').find('option:selected').text(),
        success: function (data) {
            $('#function').html(data);
        }
    });
}
</script>

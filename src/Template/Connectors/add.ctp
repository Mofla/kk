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
        <?php
            echo $this->Form->input('controller', ['options' => $getcontrol]);
            echo $this->Form->input('function',['type' => 'select']);
            echo $this->Form->input('permission_id', ['options' => $permissions]);
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

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <?= $this->element('Forum/admin-menu') ?>

<div class="col-md-9 voffset3 pull-right">
<div class="table-responsive">

    <?php foreach($cat as $forum): ?>

    <table class="table" id="<?= $forum->id ?>">
        <thead>
        <tr>
            <th class="category" colspan="2"><span class="h4"><?= $forum->name ?></span></th>
        </tr>
        </thead>
        <tbody class="sscategory">

        <?php foreach ($forum->forums as $section): ?>

        <tr class="test" data-order="<?= $section->sort ?>" id="<?= $section->id ?>">
            <td width="80%" class="name">
                <?= $section->name ?>
            </td>
            <td width="20%" class="option">
                <?= $this->Form->button('<i class="fa fa-pencil" aria-hidden="true"></i> EDITER', ['type' =>
                'button','class' => 'btn purple btn-sm cedit-bt', 'id' => 'edit-bt']); ?>
                <?= $this->Form->postLink(__('<i class="fa fa-times" aria-hidden="true"></i>'),
                ['controller' => 'Forums','action' => 'deleteforum', $section->id], ['class' => 'btn btn-danger btn-sm',
                'escape'=> false , 'confirm' => __('Etes-vous sûr de vouloir supprimer la catégorie : {0}?',
                $section->name)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php endforeach; ?>

</div>

</div>

<script>

// edition d'un forum
$(document).on('click', '#edit-bt', function () {
    var origin = $.trim($(this).closest('tr').find('.name').html());
    $(this).closest('tr').find('.name').html('<input type="text" value="' + origin + '" id="e-val" class="edit-mod">');
    $(this).closest('tr').find('.option').html
    ('<button id="btok" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button><button class="btn dark btn-sm" id="cancel"><i class="fa fa-times" aria-hidden="true"></i> ANNULER</button>');


    $(document).on('click', '#cancel', function () {
        var vle = $('#e-val').val();
        $(this).closest('tr').find('.name').html(vle);
        $(this).closest('tr').find('.option').html
        ('<button id="edit-bt" class="btn purple btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> EDITER</button> <button class="btn btn-danger btn-sm" id="cancel"><i class="fa fa-times" aria-hidden="true"></i></button>');
    });

    $(document).on('click', '#btok', function () {
        var id = $(this).closest('tr').attr('id');
        var title = $('#e-val').val();
        var send = 'id=' + id + '&title=' + title;
        $.ajax({
            type: 'post',
            url: '<?= $this->Url->build(["controller" => "Forums","action" => "ajaxeditforum"]); ?>',
            data: send
        });
        $('#btok').addClass("hidden");
        $(this).closest('tr').find('.name').html(title);
        $(this).closest('tr').find('.option').html
        ('<button id="edit-bt" class="btn purple btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> EDITER</button> <button class="btn btn-danger btn-sm" id="cancel"><i class="fa fa-times" aria-hidden="true"></i></button>');
    });
});
</script>


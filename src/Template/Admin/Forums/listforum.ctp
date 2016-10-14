<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <?= $this->element('Forum/admin-menu') ?>

<div class="col-md-9 voffset3 pull-right">
<div class="table-responsive">

    <?php foreach($cat as $forum): ?>

    <table class="table" id="<?= $forum->id ?>">
        <thead>
        <tr>
            <th class="category" colspan="2"><?= $forum->name ?></th>
        </tr>
        </thead>
        <tbody class="sscategory curs">

        <?php foreach ($forum->forums as $section): ?>

        <tr class="test" data-order="<?= $section->sort ?>" id="<?= $section->id ?>">
            <td width="70%" class="name">
                <?= $section->name ?>
            </td>
            <td width="30%" class="option">
                <?= $this->Form->button('<i class="fa fa-pencil" aria-hidden="true"></i> EDITER', ['type' =>
                'button','class' => 'btn btn-warning btn-sm cedit-bt', 'id' => 'edit-bt']); ?>
                <?= $this->Form->postLink(__('<i class="fa fa-trash-o" aria-hidden="true"></i> SUPPRIMER'),
                ['controller' => 'Forums','action' => 'deletecategory', $section->id], ['class' => 'btn btn-danger btn-sm',
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
// si l'ordre est modifié alors on modifie les entrées via ajax
function fixWidthHelper(e, ui) {
    ui.children().each(function () {
        $(this).width($(this).width());
    });
    return ui;
}
var id = [];
$('tbody').sortable({
    helper: fixWidthHelper,
    update: function () {
        id.length = 0;
        $('.sortab tr').each(function () {
            id.push(this.id);
        });
        id.shift();
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build("admin/forums/saveordercategory"); ?>',
            data: 'id=' + id,
            success: function (html) {
                $('#test').text(html);
            }
        });
    }
});

// affiche les forums dans l'ordre indiqué dans la bdd
var $tbody = $('.sortab tbody');
$tbody.find('tr').sort(function (a, b) {
    var tda = $(a).attr('data-order');
    var tdb = $(b).attr('data-order');
    return tda > tdb ? 1
            : tda < tdb ? -1
            : 0;
}).appendTo($tbody);

// edition d'un forum
$(document).on('click', '#edit-bt', function () {
    var origin = $.trim($(this).closest('tr').find('.name').html());
    $(this).closest('tr').find('.name').html('<input type="text" value="' + origin + '" id="e-val" class="edit-mod">');
    $(this).closest('tr').find('.option').html
    ('<button id="btok" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i> VALIDER</button><button class="btn dark btn-sm" id="cancel"><i class="fa fa-times" aria-hidden="true"></i> ANNULER</button>');


    $(document).on('click', '#cancel', function () {
        var vle = $('#e-val').val();
        $(this).closest('tr').find('.name').html(vle);
        $(this).closest('tr').find('.option').html
        ('<button id="edit-bt" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> EDITER</button> <button class="btn btn-danger btn-sm" id="cancel"><i class="fa fa-trash-o" aria-hidden="true"></i> SUPPRIMER</button>');
    });

    $(document).on('click', '#btok', function () {
        var id = $(this).closest('tr').attr('id');
        var title = $('#e-val').val();
        var send = 'id=' + id + '&title=' + title;
        $.ajax({
            type: 'post',
            url: '<?= $this->Url->build(["controller" => "Forums","action" => "ajaxeditcategory"]); ?>',
            data: send
        });
        $('#btok').addClass("hidden");
        $(this).closest('tr').find('.name').html(title);
        $(this).closest('tr').find('.option').html
        ('<button id="edit-bt" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> EDITER</button> <button class="btn btn-danger btn-sm" id="cancel"><i class="fa fa-trash-o" aria-hidden="true"></i> SUPPRIMER</button>');
    });
});
</script>


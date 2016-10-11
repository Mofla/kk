<script   src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"   integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="   crossorigin="anonymous"></script>
<?= $this->element('Forum/admin-menu') ?>

<div class="col-md-9">
    <div class="table-responsive">
        <table class="table sortab">
            <thead class="category">
            <tr>
                <th colspan="2"><?= __('Liste des catégories') ?></th>
            </tr>
            </thead>
            <tbody class="sscategory">
            <?php foreach($categories as $cat): ?>
            <tr data-order="<?= $cat->sort ?>" id="<?= $cat->sort ?>">
                <td><?= $cat->name ?></td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div id="test"></div>

<script>


    var order = [];
        $('tbody').sortable({
            update: function( ) {
                order.length = 0;
                $('.sortab tr').each(function() {
                    order.push(this.id);
                });
                order.shift();
                $.ajax({
                    type: 'POST',
                    url: '<?= $this->Url->build("Forums/saveordercategory"); ?>',
                    data: 'id=' + order,
                    success: function (html) {
                        $('#test').text(html);
                    }
                });
            }
        });

        var $tbody = $('.sortab tbody');
        $tbody.find('tr').sort(function(a, b) {
            var tda = $(a).attr('data-order');
            var tdb = $(b).attr('data-order');
            return tda > tdb ? 1
                    : tda < tdb ? -1
                    : 0;
        }).appendTo($tbody);


</script>


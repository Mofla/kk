<?php foreach ($project->tasks as $task): ?>
<?= $task->name ?><br>
<?php endforeach; ?>




<style>
    .ui-state-highlight {
        height: 3em;
        line-height: 1.2em;
    }
</style>
<script>

    //sortable stuff
    $("#colum-1, #colum-2, #colum-3").sortable({

        connectWith: ".colum",
        handle: ".portlet-header",
        cancel: ".portlet-toggle",
        placeholder: "ui-state-highlight",
        receive: function (event, ui) {
            //gets taks id and column id aka state id
            var elemID = ui.item.attr('id').split('-');
            var newPos = $(this).attr('id').split('-');

            //populates data for ajax post
            var data = {
                state_id: parseInt(newPos[1])
            };
            //ajax post
            $.ajax({
                type: "POST",
                data: data,
                url: '<?= $this->Url->build(["controller" => "Tasks", "action" => "editation"]); ?>' + '/' + elemID[1]
            });
        }
    });


    $(".portlet-toggle").on("click", function () {
        var icon = $(this);
        icon.toggleClass("ui-icon-minusthick ui-icon-plusthick");
        icon.closest(".portlet").find(".portlet-content").toggle();
    });
</script>

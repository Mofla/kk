<?= $this->Html->css('permissions.css') ?>

<div class="row">

    <?php foreach ($roles as $role): ?>
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading role">
                    <?= $role->name ?>
                </div>
                <div>
                    <?php foreach ($permissions as $modules => $controllers ): ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th><?= $modules ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($controllers as $controller=> $files ): ?>
                                <tr>
                                    <td><?= $controller ?>
                                    <ul class="list-group">
                                    <?php foreach ($files as $file => $action): ?>
                                        <li class="list-group-item">
                                            <?= $action ?>
                                            <?= $this->Html->checkbox() ?>
                                        </li>
                                    <?php endforeach; ?>
                                    </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<script>

</script>
<div id="taskModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="tasks form large-9 medium-8 columns content">
                    <?= $this->Form->create($entry) ?>
                    <fieldset>
                        <legend>Ajouter une entrée au journal de bord</legend>
                        <div class="form-group">
                            <?php
                            echo $this->Form->hidden('diary_id', ['value' => $id]);
                            echo $this->Form->input('content', ['class' => 'form-control', 'label' => 'Contenu de l\'entrée']);
                            ?>
                        </div>
                    </fieldset>
                    <?= $this->Form->button(__('Ajouter l\'entrée'), ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->end() ?>

                </div>
                <!--<div class="modal-footer">
                    <button class="btn" data-dismiss="modal">Annuler</button>
                </div>-->
            </div>
        </div>
    </div>
</div>

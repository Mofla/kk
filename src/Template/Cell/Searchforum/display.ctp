<div class='col-md-3'>
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    <?= $this->Form->input('nom', ['label' => false , 'placeholder'=>'recherche']);  ?>
                </div>
            </div>


            <?=   $this->Form->submit('Rechercher', ['class' => 'btn btn-success center-block']) ;
            $this->Form->end() ;
            ?>
</div>
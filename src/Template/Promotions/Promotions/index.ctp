<div class="promotions index large-9 medium-8 columns content">
    <h2 class="text-center" style="font-weight: 900; font-size: 40px"><?= __('Promotions Simplon') ?></h2>
            <?php foreach ($promotions as $promotion): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div style="border: 1px solid black">
                        <div class="portlet-body">
                            <div class="mt-element-overlay">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mt-overlay-2">
                                            <img src="../../uploads/promotion/<?=$promotion->picture_url ?>" />
                                            <div class="mt-overlay">
                                                <h2><?= h($promotion->name) ?></h2>
                                                <a href="<?= $this->Url->build(['action' => 'view', $promotion->id]); ?>"
                                                   class="mt-info btn green">Détails</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-center" style="font-weight: 900"><?= $promotion->year?></h3>
                </div>
            <?php endforeach; ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

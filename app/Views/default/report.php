<?php $this->layout('layout', ['title' => 'Rapports']) ?>
<!-- style="height: 500px; overflow: overlay;" -->
<?php $this->start('main_content') ?>
<div class="container">
    <h2>Rapports d'attaques.</h2>
    <br>
    <div class="col-md-4" id="reportList" style="height: 500px; overflow: overlay;">
        <?php if (empty($reports)): ?>
            <div class="row report-preview">
                <p class="report-name">Aucun rapports</p>
            </div><br>
        <?php endif; ?>
        <?php foreach ($reports as $key => $report): ?>
            <div id="report_preview_<?=$report['id']?>" class="row report-preview <?=!($report['seen'])?"bg-warning":""?>" style="margin-right: 20px; margin-bottom: 20px;">
                <p class="report-name"><?=$report['name']?></p>
                <p class="report-date"><?=$report['report_date']?></p>
                <button type="button" id="btn<?=$report['id']?>" class="btn btn-xs btn-default btn-report" name="button">Voir le rapport</button>

                <button type="button" id="dlt<?=$report['id']?>" class="btn btn-xs btn-danger btn-delete" name="button">Supprimer le rapport</button>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="col-md-8">
        <div id="displayed-report">

        </div>

        <?php foreach ($reports as $key => $report): ?>
            <div id="report_<?=$report['id']?>" class="row report hide">
                <h3 class="report-name"><?=$report['name']?></h3>
                <p class="report-date"><?=$report['report_date']?></p>
                <p class="report-content"><?=$report['report']?></p>
            </div><br>
        <?php endforeach; ?>
    </div>
</div>
    <?php //var_dump($reports); ?>

<?php $this->stop('main_content') ?>

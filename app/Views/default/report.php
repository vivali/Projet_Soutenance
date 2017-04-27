<?php $this->layout('layout', ['title' => 'Rapports']) ?>
<!-- style="height: 500px; overflow: overlay;" -->
<?php $this->start('main_content') ?>
<div class="container">
    <h2>Rapports d'attaques.</h2>
    <br>
    <div class="col-md-3" id="reportList" style="height: 500px; overflow: overlay;">
        <?php foreach ($reports as $key => $report): ?>
            <div class="row report-preview <?=!($report['seen'])?"bg-warning":""?>">
                <p class="report-name"><?=$report['name']?></p>
                <p class="report-date"><?=$report['report_date']?></p>
            </div><br>
        <?php endforeach; ?>
    </div>

    <div class="col-md-9">
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

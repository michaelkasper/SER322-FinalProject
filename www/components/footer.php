<div class="container" style="background: #F5F5F5; padding: 20px; margin-top: 30px ">
    <div class="row" style="padding: 4px; border-bottom: 1px solid #ccc ">
        <div class="col-1"></div>
        <div class="col-9">SQL</div>
        <div class="col-2">Runtime</div>
    </div>

    <?php $i = 0 ?>
    <?php foreach ($db->getQueries() as $query): ?>
        <?php $i++ ?>
        <div class="row" style="padding: 4px; border-bottom: 1px solid #ccc ">
            <div class="col-1">
                <b><?= $i ?></b>
            </div>
            <div class="col-9">
                <?= $query[0]; ?>
            </div>
            <div class="col-2">
                <?= round($query[1],6) ?> μs
            </div>
        </div>

    <?php endforeach; ?>
</div>


<br/>
<br/>

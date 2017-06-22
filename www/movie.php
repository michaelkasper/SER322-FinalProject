<?php include('../src/movieController.php'); ?>
<html>
<?php include('components/styles.php') ?>
<body>
<div class="container">
    <?php include('components/header.php') ?>

    <div class="jumbotron">
        <div class="float-right text-right">
            <h3><span class="badge badge-default large"><?= $movieResult['MPAA_RATING'] ?></span></h3>

            <div class="rating-block">
                Rate:
                <?php for ($i = 1 ;$i <= 5 ;$i++): ?>
                    <button onclick="window.location = '?u=<?= $_GET['u'] ?>&m=<?= $movieResult['ID'] ?>&r=<?= $i ?>'" type="button" class="btn <?= ($movieResult['RATING'] * 1 >= $i ? 'btn-warning' : 'btn-default btn-grey') ?> btn-sm rounded-circle"></button>
                <?php endfor ; ?>
            </div>
        </div>
        <h1 class="display-3">
            <?= $movieResult['NAME'] ?>
        </h1>

        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Release Date</label>
            <div class="col-10">
                <input class="form-control" type="text" value="<?= $movieResult['RELEASE_DATE'] ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Plot</label>
            <div class="col-10">
                <textarea class="form-control" readonly><?= $movieResult['PLOT_SUMMARY'] ?></textarea>
            </div>
        </div>

        <br/>
        <br/>
        <h4>Cast</h4>
        <hr/>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($professionals as $professional): ?>
                    <tr>
                        <td><?= $professional['FIRST_NAME'] ?> <?= $professional['LAST_NAME'] ?></td>
                        <td><?= $professional['ROLE'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

</body>
</html>
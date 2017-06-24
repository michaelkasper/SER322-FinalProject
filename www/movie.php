<?php include('../src/movieController.php'); ?>
<html>
<?php include('components/styles.php') ?>
<body>
<div class="container">
    <?php include('components/header.php') ?>
    <ul class="nav nav-pills float-right">
        <li class="nav-item">
            <a class="nav-link" href="movies.php?<?= buildQueryString([], ['m', 'r']) ?>">Back</a>
        </li>
    </ul>

    <div class="jumbotron">

        <div class="container">
            <div class="row">
                <div class="col-9">
                    <h1 class="display-5">
                        <?= $movieResult['NAME'] ?>
                    </h1>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Release Date</label>
                        <div class="col-10">
                            <input class="form-control" type="text" value="<?= $movieResult['RELEASE_DATE'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Runtime</label>
                        <div class="col-10">
                            <input class="form-control" type="text" value="<?= $movieResult['RUNTIME'] * 1 ?> min" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Genres</label>
                        <div class="col-10">
                            <input class="form-control" type="text" value="<?= $movieResult['GENRES'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Plot</label>
                        <div class="col-10">
                            <textarea class="form-control" readonly rows="5"><?= $movieResult['PLOT_SUMMARY'] ?></textarea>
                        </div>
                    </div>

                </div>
                <div class="col-3" style="text-align: right">
                    <img src="posters/<?= $movieResult['POSTER'] ?>.jpg" width="200px" style="padding-bottom: 10px"/>

                    <h3><span class="badge badge-default large"><?= $movieResult['MPAA_RATING'] ?></span></h3>
                    <div class="rating-block">
                        Rate:
                        <?php for ($i = 1 ;$i <= 5 ;$i++): ?>
                            <button onclick="window.location = '?<?= buildQueryString([
                                'm' => $movieResult['ID'], 'r' => $i
                            ]) ?>'" type="button" class="btn <?= ($movieResult['RATING'] * 1 >= $i ? 'btn-warning' : 'btn-default btn-grey') ?> btn-sm rounded-circle"></button>
                        <?php endfor ; ?>
                    </div>
                </div>
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
                        <td>
                            <a href="professional.php?<?= buildQueryString(['p' => $professional['ID']]) ?>"><?= $professional['FIRST_NAME'] ?> <?= $professional['LAST_NAME'] ?></a>
                        </td>
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
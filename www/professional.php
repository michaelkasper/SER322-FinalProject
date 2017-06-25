<?php include('../src/professionalController.php'); ?>
<html>
<?php include('components/styles.php') ?>
<body>
<div class="container">
    <?php include('components/header.php') ?>

    <ul class="nav nav-pills float-right">
        <li class="nav-item">
            <a class="nav-link" href="professionals.php?<?= buildQueryString([], ['p', 'm', 'r']) ?>">Back</a>
        </li>
    </ul>

    <div class="jumbotron">
        <h1 class="display-3">
            <?= $professional['NAME'] ?>
        </h1>

        <br/>
        <br/>
        <h4>Movies</h4>
        <hr/>
        <div class="table-responsive">
            <table class="table table-striped no-top">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Role</th>
                    <th>Rating</th>
                    <th>ReleaseDate</th>
                    <th>Rating</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($movieResults as $movieResult): ?>
                    <tr>
                        <td>
                            <a href="movie.php?<?= buildQueryString(['m' => $movieResult['ID']]) ?>"><?= $movieResult['NAME'] ?></a>
                        </td>
                        <td><?= $movieResult['ROLE'] ?></td>
                        <td><?= $movieResult['MPAA_RATING'] ?></td>
                        <td><?= $movieResult['RELEASE_DATE'] ?></td>
                        <td>
                            <div class="rating-block" style="white-space: nowrap;">
                                <?php for ($i = 1 ;$i <= 5 ;$i++): ?>
                                    <button onclick="window.location='?<?= buildQueryString([
                                        'm' => $movieResult['ID'], 'r' => $i
                                    ]) ?>'" type="button" class="btn <?= ($movieResult['RATING'] * 1 >= $i ? 'btn-warning' : 'btn-default btn-grey') ?> btn-sm rounded-circle"></button>
                                <?php endfor ; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include('components/footer.php') ?>

</body>
</html>
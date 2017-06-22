<?php  include('../src/moviesController.php');?>
<html>
<?php include('components/styles.php') ?>
<body>
<div class="container">
    <?php include('components/header.php') ?>

    <?php if (count($genres) > 0): ?>
        <div class="container">
            <nav class="nav nav-pills">
                <span class="nav-link">Sort By Genre:</span>
                <?php foreach ($genres as $genre): ?>
                    <a class="nav-link <?= ($_GET['g'] == $genre['ID'] ? 'active' : '') ?>" href="?u=<?= $_GET['u'] ?>&g=<?= $genre['ID'] ?>"><?= $genre['NAME'] ?></a>
                <?php endforeach; ?>
                <a class="nav-link" href="?u=<?= $_GET['u'] ?>">(clear)</a>
            </nav>
        </div>
        <br/>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Rating</th>
                <th>ReleaseDate</th>
                <th>Rating</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($movieResults as $movieResult): ?>
                <tr>
                    <td>
                        <a href="movie.php?u=<?= $_GET['u'] ?>&m=<?= $movieResult['ID'] ?>"><?= $movieResult['NAME'] ?></a>
                    </td>
                    <td><?= $movieResult['MPAA_RATING'] ?></td>
                    <td><?= $movieResult['RELEASE_DATE'] ?></td>
                    <td>
                        <div class="rating-block">
                            <?php for ($i = 1 ;$i <= 5 ;$i++): ?>
                                <button onclick="window.location = '?u=<?= $_GET['u'] ?>&g=<?= $_GET['g'] ?>&m=<?= $movieResult['ID'] ?>&r=<?= $i ?>'" type="button" class="btn <?= ($movieResult['RATING'] * 1 >= $i ? 'btn-warning' : 'btn-default btn-grey') ?> btn-sm rounded-circle"></button>
                            <?php endfor ; ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
<?php include('../src/moviesController.php'); ?>
<html>
<?php include('components/styles.php') ?>
<body>
<div class="container">
    <?php include('components/header.php') ?>

    <form action="?<?= buildQueryString([], ['movieText']) ?>" method="GET">
        <div class="input-group">
            <div class="input-group-addon">Search</div>
            <input type="text" class="form-control" name="movieText" value="<?= $_GET['movieText'] ?>">
        </div>
        <button type="submit" class="btn btn-primary float-right">Search</button>
        <a class="btn btn-default float-right" href="?<?= buildQueryString([], ['movieText']) ?>">Clear</a>

        <?= buildHiddenInputs([], ['movieText', 'r', 'm']); ?>
    </form>


    <div class="table-responsive">
	<div class="dropdown">
	  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Sort by Genre 
	  </button>
	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	        <a class="dropdown-item" <?= (!isset($_GET['g']) ? 'active' : '') ?>" href="?<?= buildQueryString([], ['g']) ?>">All</a>
		<?php foreach ($genres as $genre): ?>
			<a class="dropdown-item" <?= ($_GET['g'] == $genre['ID'] ? 'active' : '') ?>" href="?<?= buildQueryString(['g' => $genre['ID']]) ?>"><?= $genre['NAME'] ?></a>
		<?php endforeach; ?>

	  </div>
	</div>


        <table class="table table-striped no-top">
            <thead>
            <tr>
                <th>Title</th>
                <th>Rating</th>
                <th>Runtime</th>
                <th>Genres</th>
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
                    <td><?= $movieResult['MPAA_RATING'] ?></td>
                    <td><?= $movieResult['RUNTIME']*1 ?> min</td>
                    <td><?= $movieResult['GENRES'] ?></td>
                    <td><?= $movieResult['RELEASE_DATE'] ?></td>
                    <td>
                        <div class="rating-block" style="white-space: nowrap">
                            <?php for ($i = 1 ;$i <= 5 ;$i++): ?>
                                <button onclick="window.location = '?<?= buildQueryString([
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

</body>
</html>

<br/>
<div class="header clearfix">
    <?php if ($config['showNav']): ?>
        <ul class="nav nav-pills float-right">
            <li class="nav-item">
                <a class="nav-link active" href="/SER322-FinalProject-master/SER322-FinalProject-master/www/index.php">Logout</a>
            </li>
        </ul>
    <?php endif; ?>
    <h3 class="text-muted">SER 322: Final Project (Team 5)</h3>
    <br/>
    <?php if ($config['showNav']): ?>


        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?= $config['moviesActive'] ? 'active' : ''; ?>" href="/SER322-FinalProject-master/SER322-FinalProject-master/www/movies.php?<?= buildQueryString([], [
                    'm', 'p', 'r'
                ]) ?>">Movies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $config['professionalsActive'] ? 'active' : ''; ?>" href="/SER322-FinalProject-master/SER322-FinalProject-master/www/professionals.php?<?= buildQueryString([], [
                    'm', 'p', 'r'
                ]) ?>">Professionals</a>
            </li>
        </ul>
    <?php endif; ?>
</div>


<br/>
<br/>

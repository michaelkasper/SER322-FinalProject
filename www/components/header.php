<br/>
<div class="header clearfix">
    <?php if ($config['showBack'] || $config['showLogout']): ?>
        <nav>
            <ul class="nav nav-pills float-right">
                <?php if ($config['showBack']): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="movies.php?u=<?= $_GET['u'] ?>">Back</a>
                    </li>
                <?php endif; ?>
                <?php if ($config['showLogout']): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php endif; ?>
    <h3 class="text-muted">SER 322: Final Project (Team 5)</h3>
</div>
<br/>
<br/>
<br/>
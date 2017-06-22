<?php include('../src/indexController.php'); ?>
<html>
<?php include('components/styles.php') ?>
<body>
<div class="container">
    <?php include('components/header.php') ?>

    <div class="jumbotron">
        <h1 class="display-3">Login</h1>
        <p class="lead">
            <select id="login">
                <option value="">-- Select User --</option>
                <?php foreach ($results as $user): ?>
                    <option value="<?= $user['ID'] ?>">
                        <?= $user['FIRST_NAME'] ?> <?= $user['LAST_NAME'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
    </div>
</div>

<script>
    $(function () {
        $('#login').change(function () {
            if ($(this).val() != '') {
                window.location = 'movies.php?u=' + $(this).val();
            }
        });
    });
</script>
</body>
</html>
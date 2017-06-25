<?php include('../src/professionalsController.php'); ?>
<html>
<?php include('components/styles.php') ?>
<body>
<div class="container">
    <?php include('components/header.php') ?>


    <form action="?" class="form-inline" method="GET">
        <div class="input-group">
            <div class="input-group-addon">First Name</div>
            <input type="text" class="form-control" name="firstName" value="<?= $_GET['firstName'] ?>">
        </div>
        &nbsp;
        <div class="input-group">
            <div class="input-group-addon">Last Name</div>
            <input type="text" class="form-control" name="lastName" value="<?= $_GET['lastName'] ?>">
        </div>
        &nbsp;
        <button type="submit" class="btn btn-primary">Search</button>
        &nbsp;
        <a class="btn btn-default" href="?<?= buildQueryString([], ['firstName', 'lastName']) ?>">Clear</a>
        <?= buildHiddenInputs([], ['firstName', 'lastName']); ?>
    </form>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Roles</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($professionals as $professional): ?>
                <tr>
                    <td>
                        <a href="professional.php?<?= buildQueryString(['p' => $professional['ID']]) ?>"><?= $professional['NAME'] ?></a>
                    </td>
                    <td><?= $professional['ROLES'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('components/footer.php') ?>

</body>
</html>

<?php
include_once('db.php');

if (!isset($db)) {
    $db = new db();
}

if (
    isset($_GET['r'], $_GET['m'], $_GET['u'])
    && is_numeric($_GET['r'])
    && is_numeric($_GET['m'])
    && is_numeric($_GET['u'])
) {
    $db->insert("
            INSERT INTO RATING (`MOVIE_ID`, `USER_ID`, `RATING`) 
            VALUES ('{$db->escape($_GET['m'])}','{$db->escape($_GET['u'])}','{$db->escape($_GET['r'])}')
            ON duplicate KEY UPDATE `RATING` = values(RATING);
            ", true);
}

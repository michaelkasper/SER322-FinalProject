<?php
include_once('db.php');

if (!isset($_GET['u']) || !is_numeric($_GET['u'])) {
    // return, no user id
    header('location: /');
    exit();
}

$db = new db();

if (!isset($_GET['m']) || !is_numeric($_GET['m'])) {
    // return, bad id
    header('location: movies.php?u=' . $_GET['u']);
    exit();
}

include('updateRating.php');

// no genre selected
$movieResults = $db->query("
    SELECT 
      m.`ID`, 
      m.`NAME`, 
      m.`RELEASE_DATE`, 
      m.`ID`, 
      m.`PLOT_SUMMARY`,
      m.`MPAA_RATING`,
      r.`RATING` 
    FROM MOVIE m 
    LEFT JOIN RATING r ON r.`MOVIE_ID` = m.`ID` AND r.`USER_ID` ='{$db->escape($_GET['u'])}'
    WHERE m.`ID`='{$db->escape($_GET['m'])}'
    LIMIT 1
    ");

if (count($movieResults) < 1) {
    // return, bad id
    header('location: movies.php?u=' . $_GET['u']);
    exit();
}
$movieResult = $movieResults[0];

$professionals = $db->query("
    SELECT 
      p.`FIRST_NAME`,
      p.`LAST_NAME`,
      m.`ROLE`
    FROM PROFESSIONAL p
    JOIN IN_MOVIE m ON p.ID = m.PROFESSIONAL_ID AND m.MOVIE_ID = '{$db->escape($_GET['m'])}'
    ORDER BY m.ROLE_PRIORITY ASC
    ");

$config = [
    'showLogout' => true,
    'showBack'   => true
];
<?php
include_once('db.php');
$db      = new db();
$results = $db->query('
    SELECT 
      u.`ID`,
      u.`FIRST_NAME`,
      u.`LAST_NAME`
    FROM USER u
    ');

$config = [
    'showLogout' => false,
    'showBack'   => false
];
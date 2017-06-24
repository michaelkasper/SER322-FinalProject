<?php
include_once('abstractController.php');

$results = $db->query('
    SELECT 
      u.`ID`,
      u.`FIRST_NAME`,
      u.`LAST_NAME`
    FROM USER u
    ');

$config = [
    'showNav'             => false,
    'moviesActive'        => false,
    'professionalsActive' => false,
];
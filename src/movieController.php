<?php
include_once('abstractController.php');
include('updateRating.php');

// no genre selected
$movieResults = $db->query("
    SELECT 
      m.`ID`, 
      m.`NAME`, 
      m.`RELEASE_DATE`, 
      m.`PLOT_SUMMARY`,
      m.`MPAA_RATING`,
      m.`RUNTIME`,
      m.`POSTER`,
      r.`RATING`,
      GROUP_CONCAT(DISTINCT g.`NAME`) as GENRES 
    FROM MOVIE m 
    LEFT JOIN RATING r ON r.`MOVIE_ID` = m.`ID` AND r.`USER_ID` ='{$db->escape($_GET['u'])}'
    LEFT JOIN IN_GENRE in_g ON in_g.`MOVIE_ID` = m.`ID`
    LEFT JOIN GENRE g ON in_g.`GENRE_ID` = g.`ID`
    WHERE m.`ID`='{$db->escape($_GET['m'])}'
    GROUP BY g.`NAME`
    LIMIT 1
    ");

if (count($movieResults) < 1) {
    // return, bad id
    header('location: movies.php?' . buildQueryString([],['m',['r']]));
    exit();
}
$movieResult = $movieResults[0];

$professionals = $db->query("
    SELECT 
      p.`ID`,
      p.`FIRST_NAME`,
      p.`LAST_NAME`,
      m.`ROLE`
    FROM PROFESSIONAL p
    JOIN IN_MOVIE m ON p.ID = m.PROFESSIONAL_ID AND m.MOVIE_ID = '{$db->escape($_GET['m'])}'
    ORDER BY m.ROLE_PRIORITY ASC
    ");

$config = [
    'showNav'             => true,
    'moviesActive'        => true,
    'professionalsActive' => false,
];
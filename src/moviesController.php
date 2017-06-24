<?php
include_once('abstractController.php');
include('updateRating.php');

// Would prefer to build query as string, but broke
// out into individuals queries to help with
// readability for instructor
if (isset($_GET['g'], $_GET['movieText']) && is_numeric($_GET['g']) && $_GET['movieText'] != '') {
    // filter on genre and name
    $movieResults = $db->query("
SELECT 
  m.`ID`, 
  m.`NAME`, 
  m.`RELEASE_DATE`, 
  m.`MPAA_RATING`, 
  m.`RUNTIME`,
  r.`RATING`,
  g.`NAME` as GENRES
FROM MOVIE m 
LEFT JOIN RATING r ON r.`MOVIE_ID` = m.`ID` AND r.`USER_ID` ='{$db->escape($_GET['u'])}'
JOIN IN_GENRE in_g ON in_g.`MOVIE_ID` = m.`ID` AND in_g.`GENRE_ID` = '{$db->escape($_GET['g'])}'
JOIN GENRE g ON in_g.`GENRE_ID` = g.`ID`
Where m.NAME LIKE '{$db->escape($_GET['movieText'])}%'
ORDER BY m.`NAME` ASC
");
} else if (isset($_GET['g']) && is_numeric($_GET['g'])) {
    // filter on genre only
    $movieResults = $db->query("
SELECT 
  m.`ID`, 
  m.`NAME`, 
  m.`RELEASE_DATE`, 
  m.`MPAA_RATING`, 
  m.`RUNTIME`,
  r.`RATING`,
  g.`NAME` as GENRES
FROM MOVIE m 
LEFT JOIN RATING r ON r.`MOVIE_ID` = m.`ID` AND r.`USER_ID` ='{$db->escape($_GET['u'])}'
JOIN IN_GENRE in_g ON in_g.`MOVIE_ID` = m.`ID` AND in_g.`GENRE_ID` = '{$db->escape($_GET['g'])}'
JOIN GENRE g ON in_g.`GENRE_ID` = g.`ID`
ORDER BY m.`NAME` ASC
");
} else if (isset($_GET['movieText']) && $_GET['movieText'] != '') {
    // filter on name only
    $movieResults = $db->query("
SELECT 
  m.`ID`, 
  m.`NAME`, 
  m.`RELEASE_DATE`, 
  m.`MPAA_RATING`, 
  m.`RUNTIME`,
  r.`RATING`,
  GROUP_CONCAT(DISTINCT g.`NAME`) as GENRES 
FROM MOVIE m 
LEFT JOIN RATING r ON r.`MOVIE_ID` = m.`ID` AND r.`USER_ID` ='{$db->escape($_GET['u'])}'
LEFT JOIN IN_GENRE in_g ON in_g.`MOVIE_ID` = m.`ID`
LEFT JOIN GENRE g ON in_g.`GENRE_ID` = g.`ID`
Where m.NAME LIKE '{$db->escape($_GET['movieText'])}%'
GROUP BY m.`ID`
ORDER BY m.`NAME` ASC
");
} else {
    // dont filter at all
    $movieResults = $db->query("
SELECT 
  m.`ID`, 
  m.`NAME`, 
  m.`RELEASE_DATE`, 
  m.`MPAA_RATING`, 
  m.`RUNTIME`,
  r.`RATING`,
  GROUP_CONCAT(DISTINCT g.`NAME`) as GENRES 
FROM MOVIE m 
LEFT JOIN RATING r ON r.`MOVIE_ID` = m.`ID` AND r.`USER_ID` ='{$db->escape($_GET['u'])}'
LEFT JOIN IN_GENRE in_g ON in_g.`MOVIE_ID` = m.`ID`
LEFT JOIN GENRE g ON in_g.`GENRE_ID` = g.`ID`
GROUP BY m.`ID`
ORDER BY m.`NAME` ASC
");
}

// Get all genres
$genres = $db->query('
    SELECT 
      g.`ID`, 
      g.`NAME`
    FROM GENRE g 
    ORDER BY g.`NAME` ASC
    ');

$config = [
    'showNav'             => true,
    'moviesActive'        => true,
    'professionalsActive' => false,
];


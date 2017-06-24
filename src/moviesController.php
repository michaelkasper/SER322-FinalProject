<?php
include_once('db.php');

if (!isset($_GET['u']) || !is_numeric($_GET['u'])) {
    // return, no user id
    header('location: /');
    exit();
}

$db = new db();

include('updateRating.php');

if (!isset($_GET['g']) || !is_numeric($_GET['g'])) {
    // no genre selected, show all
    $movieResults = $db->query("
        SELECT 
          m.`ID`, 
          m.`NAME`, 
          m.`RELEASE_DATE`, 
          m.`MPAA_RATING`, 
          r.`RATING` 
        FROM MOVIE m 
        LEFT JOIN RATING r ON r.`MOVIE_ID` = m.`ID` AND r.`USER_ID` ='{$db->escape($_GET['u'])}'
        ORDER BY m.`NAME` ASC
        ");
} else {
    // filter by genre
    $movieResults = $db->query("
        SELECT 
          m.`ID`, 
          m.`NAME`, 
          m.`RELEASE_DATE`, 
          m.`MPAA_RATING`,
          r.`RATING`
        FROM MOVIE m 
        JOIN IN_GENRE g ON g.`MOVIE_ID` = m.`ID` AND g.`GENRE_ID` = '{$db->escape($_GET['g'])}'
        LEFT JOIN RATING r ON r.`MOVIE_ID` = m.`ID` AND r.`USER_ID` ='{$db->escape($_GET['u'])}'
        ORDER BY m.`NAME` ASC
        ");
}

//select movie that user entered in the movieText textbox
if(isset($_GET['movieText'])) {
	$movieResults = $db->query("
	SELECT 
	m.`ID`, 
          m.`NAME`, 
          m.`RELEASE_DATE`, 
		  m.`MPAA_RATING`,
          m.`ID`, 
          r.`RATING`
        FROM MOVIE m 
		WHERE 
		m.`NAME` = '{$db->escape($_GET['movieText'])}'
	");
}

//select movies that user entered in the firstName and lastName textbox
if(isset($_GET['firstName']) && isset($_GET['lastName'])) {
	$movieResults = $db->query("
	SELECT 
	m.`ID`, 
          m.`NAME`, 
          m.`RELEASE_DATE`, 
		  m.`MPAA_RATING`,
          m.`ID`, 
          r.`RATING`
        FROM MOVIE m, in_movie im, professional p
		WHERE 
		p.`FIRST_NAME` = '{$db->escape($_GET['firstName'])}' AND p.`LAST_NAME` = '{$db->escape($_GET['lastName'])}' AND p.`ID` = im.`PROFESSIONAL_ID AND m.`ID` = im.`MOVIE_ID`
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
    'showLogout' => true,
    'showBack'   => false
];

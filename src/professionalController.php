<?php
include_once('abstractController.php');
include('updateRating.php');

$professionals = $db->query("
SELECT 
  p.`FIRST_NAME`, 
  p.`LAST_NAME`, 
  CONCAT(p.`FIRST_NAME`, ' ', p.`LAST_NAME`) as NAME,
  GROUP_CONCAT(DISTINCT m.`Role`) as Roles 
FROM PROFESSIONAL p 
LEFT JOIN IN_MOVIE m ON m.`PROFESSIONAL_ID` = p.`ID`
WHERE p.`ID` = '{$db->escape($_GET['p'])}'
GROUP BY p.`ID`
ORDER BY p.`FIRST_NAME`, p.`LAST_NAME` ASC
LIMIT 1
");

if (count($professionals) < 1) {
    // return, bad id
    header('location: professionals.php?' . buildQueryString([], ['p']));
    exit();
}
$professional = $professionals[0];

// no genre selected
$movieResults = $db->query("
    SELECT 
      m.`ID`, 
      m.`NAME`, 
      m.`RELEASE_DATE`, 
      m.`PLOT_SUMMARY`,
      m.`MPAA_RATING`,
      r.`RATING`,
      in_m.`ROLE`
    FROM MOVIE m 
    LEFT JOIN RATING r ON r.`MOVIE_ID` = m.`ID` AND r.`USER_ID` ='{$db->escape($_GET['u'])}'
    JOIN IN_MOVIE in_m ON m.`ID` = in_m.`MOVIE_ID` AND in_m.`PROFESSIONAL_ID` ='{$db->escape($_GET['p'])}'
    ");


$config = [
    'showNav'             => true,
    'moviesActive'        => false,
    'professionalsActive' => true,
];

<?php
include_once('abstractController.php');

// Would prefer to build query as string, but broke
// out into individuals queries to help with
// readability for instructor
if (isset($_GET['firstName'], $_GET['lastName']) && $_GET['firstName'] != '' && $_GET['lastName'] != '') {
    // filter on first and last name
    $professionals = $db->query("
SELECT 
  p.`ID`,
  p.`FIRST_NAME`, 
  p.`LAST_NAME`, 
  CONCAT(p.`FIRST_NAME`, ' ', p.`LAST_NAME`) as NAME,
  GROUP_CONCAT(DISTINCT m.`Role`) as ROLES 
FROM PROFESSIONAL p 
LEFT JOIN IN_MOVIE m ON m.`PROFESSIONAL_ID` = p.`ID`
WHERE p.`FIRST_NAME` LIKE '{$db->escape($_GET['firstName'])}%' AND p.`LAST_NAME` LIKE '{$db->escape($_GET['lastName'])}%'
GROUP BY p.`ID`
ORDER BY p.`FIRST_NAME`, p.`LAST_NAME` ASC
");
} else if (isset($_GET['firstName']) && $_GET['firstName'] != '') {
    // filter on first name only
    $professionals = $db->query("
SELECT 
  p.`ID`,
  p.`FIRST_NAME`, 
  p.`LAST_NAME`, 
  CONCAT(p.`FIRST_NAME`, ' ', p.`LAST_NAME`) as NAME,
  GROUP_CONCAT(DISTINCT m.`Role`) as ROLES 
FROM PROFESSIONAL p 
LEFT JOIN IN_MOVIE m ON m.`PROFESSIONAL_ID` = p.`ID`
WHERE p.`FIRST_NAME` LIKE '{$db->escape($_GET['firstName'])}%'
GROUP BY p.`ID`
ORDER BY p.`FIRST_NAME`, p.`LAST_NAME` ASC
");
} else if (isset($_GET['lastName']) && $_GET['lastName'] != '') {
    // filter on last name only
    $professionals = $db->query("
SELECT 
  p.`ID`,
  p.`FIRST_NAME`, 
  p.`LAST_NAME`, 
  CONCAT(p.`FIRST_NAME`, ' ', p.`LAST_NAME`) as NAME,
  GROUP_CONCAT(DISTINCT m.`Role`) as ROLES 
FROM PROFESSIONAL p 
LEFT JOIN IN_MOVIE m ON m.`PROFESSIONAL_ID` = p.`ID`
WHERE p.`LAST_NAME LIKE` '{$db->escape($_GET['lastName'])}%'
GROUP BY p.`ID`
ORDER BY p.`FIRST_NAME`, p.`LAST_NAME` ASC
");
} else {
    // dont filter at all
    $professionals = $db->query("
SELECT 
  p.`ID`,
  p.`FIRST_NAME`, 
  p.`LAST_NAME`, 
  CONCAT(p.`FIRST_NAME`, ' ', p.`LAST_NAME`) as NAME,
  GROUP_CONCAT(DISTINCT m.`Role`) as ROLES 
FROM PROFESSIONAL p 
LEFT JOIN IN_MOVIE m ON m.`PROFESSIONAL_ID` = p.`ID`
GROUP BY p.`ID`
ORDER BY p.`FIRST_NAME`, p.`LAST_NAME` ASC
");
}

$config = [
    'showNav'             => true,
    'moviesActive'        => false,
    'professionalsActive' => true,
];

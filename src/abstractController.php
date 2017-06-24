<?php

if (basename($_SERVER['PHP_SELF'], '.php') != 'index' && (!isset($_GET['u']) || !is_numeric($_GET['u']))) {
    // return, no user id
    header('location: /');
    exit();
}

include_once('db.php');
$db = new db();

function mergeAndClean(array $newValues = [], array $removeValues = [])
{
    $parameters = array_merge($_GET, $newValues);
    foreach ($removeValues as $val) {
        unset($parameters[$val]);
    }
    return $parameters;
}

function buildQueryString(array $newValues = [], array $removeValues = [])
{
    return http_build_query(mergeAndClean($newValues, $removeValues));
}

function buildHiddenInputs(array $newValues = [], array $removeValues = [])
{
    $return = '';
    foreach (mergeAndClean($newValues, $removeValues) as $key => $content) {
        $return .= "<input type='hidden' name='$key' value='$content'/>";
    }
    return $return;
}
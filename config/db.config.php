<?php
if (file_exists(stream_resolve_include_path('db.config.local.php'))) {
    return include('db.config.local.php');
}
return [
    'DB_USER'     => 'root',
    'DB_PASSWORD' => '',
    'DB_HOST'     => 'localhost',
    'DB_NAME'     => 'TEAM05_MOVIES'
];
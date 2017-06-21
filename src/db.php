<?php

class db
{
    private $dbc;

    public function __construct()
    {
        $config = include __DIR__ . '/../config/db.config.php';
        $this->dbc = @mysqli_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PASSWORD'], $config['DB_NAME'])
        OR die('Could not connect to MySQL ' . mysqli_connect_error());
    }

    public function query($query, $ignoreErrors = false)
    {
        $response = @mysqli_query($this->dbc, $query);
        if ($response) {
            $select = [];
            while ($row = mysqli_fetch_assoc($response)) {
                $select[] = $row;
            }
            return $select;
        } else if(!$ignoreErrors) {
            echo mysqli_error($this->dbc);
            exit;
        }
        return [];
    }

    public function escape($string)
    {
        return mysqli_real_escape_string($this->dbc, $string);
    }

    public function __destruct()
    {
        mysqli_close($this->dbc);
    }
}
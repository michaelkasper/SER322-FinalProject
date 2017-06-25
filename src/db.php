<?php

class db
{
    private $dbc;
    private $queries = [];

    public function __construct()
    {
        $config = include __DIR__ . '/../config/db.config.php';
        $this->dbc = @mysqli_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PASSWORD'], $config['DB_NAME'])
        OR die('Could not connect to MySQL ' . mysqli_connect_error());
    }

    public function insert($query, $ignoreErrors = false)
    {

        $start           = microtime();
        $response        = @mysqli_query($this->dbc, $query);
        $end             = microtime();
        $this->queries[] = [$query, $end - $start];
        if ($response) {
            return $response;
        } else if (!$ignoreErrors) {
            echo 'QUERY: ' . $query . '/r';
            echo mysqli_error($this->dbc);
            exit;
        }
        return false;
    }

    public function query($query, $ignoreErrors = false)
    {
        $start           = microtime();
        $response        = @mysqli_query($this->dbc, $query);
        $end             = microtime();
        $this->queries[] = [$query, $end - $start];

        if ($response) {
            $select = [];
            while ($row = mysqli_fetch_assoc($response)) {
                $select[] = $row;
            }
            return $select;
        } else if (!$ignoreErrors) {
            echo mysqli_error($this->dbc);
            exit;
        }
        return [];
    }

    public function getQueries()
    {
        return $this->queries;
    }

    public function getInsertId()
    {
        return mysqli_insert_id($this->dbc);
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
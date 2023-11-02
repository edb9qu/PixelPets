<?php
class Database {
    private $dbConnector;

    /**
     * Reads configuration from the Config class above
     */
    public function __construct() {
        $env = parse_ini_file('.env');
        $db = [
            "host" => $env["HOST"],
            "port" => $env["PORT"],
            "user" => $env["USER"],
            "pass" => $env["PASSWORD"],
            "database" => $env["DATABASE"]
        ];

        $host = $db["host"];
        $user = $db["user"];
        $database = $db["database"];
        $password = $db["pass"];
        $port = $db["port"];

        $this->dbConnector = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");
    }

    public function query($query, ...$params) {
        // Use safe querying
        $res = pg_query_params($this->dbConnector, $query, $params);

        // If there was an error, print it out
        if ($res === false) {
            echo pg_last_error($this->dbConnector);
            return false;
        }

        // Return an array of associative arrays (the rows
        // in the database)
        return pg_fetch_all($res);
    }
}

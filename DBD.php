<?php
class DBC {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "web";

        $this->connection = new mysqli($host, $username, $password, $database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
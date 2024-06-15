<?php

namespace src;

use PDO;
use PDOException;

class Database
{
    private $connection;

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $sth = $this->connection->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}

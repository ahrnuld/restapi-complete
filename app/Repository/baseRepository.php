<?php
namespace Repository;
use PDO;
use PDOException;

class baseRepository
{
    protected PDO $connection;
    function __construct()
    {
        include('dbConf.php');
        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
            //$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}
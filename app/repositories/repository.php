<?php
namespace Repositories;

use PDO;
use PDOException;

class Repository {

    protected $connection;

    function __construct() {

        require __DIR__ . '/../dbconfig.php';

        try {
            $this->connection = new PDO("$type:host=$servername;dbname=$database", $username, $password);
                
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }       
}
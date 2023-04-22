<?php
namespace  Repository;
use Model\Product;
use PDO;
use Repository\baseRepository;
require_once __DIR__."/baseRepository.php";
require_once __DIR__."/../Model/Product.php";

class ProductRepository extends baseRepository
{
  function getAll()
  {
    require_once('../Model/Product.php');
    $stmt = $this->connection->prepare("SELECT * FROM Product");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\\Product');
    $result = $stmt->fetchAll();
    return $result;

  }

  public function getByID($id)
  {
    require_once('../Model/Product.php');
    $stmt = $this->connection->prepare("SELECT * FROM Product WHERE id=:id ");
    $stmt ->bindValue(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\\Product');
    $result = $stmt->fetch();
    return $result;
  }
}
<?php
namespace Service;
use Repository\AppointmentRepository;
use Repository\ProductRepository;
require_once("../Repository/ProductRepository.php");
class ProductService
{
    private $productRepository;

    function __construct()
    {
        $this->productRepository = new ProductRepository();
    }
  public function getAll()
  {
    $products = $this->productRepository->getAll();
    return $products;
  }

  public function getByID($id){

    $product = $this->productRepository->getById($id);
    return $product;
  }

}
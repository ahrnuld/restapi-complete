<?php
namespace Controllers;
use Exception;
use Service\ProductService;
require_once __DIR__."/../Service/ProductService.php";

class ProductController extends BaseController
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new ProductService();
    }

    public function getAll()
    {
        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $products = $this->service->getAll();

        $this->respond($products);
    }

    public function getById($id)
    {
        /*$token = $this->checkForJwt();
        if (!$token) {
            return;
        }*/
        $product = $this->service->getByID($id);


        if (!$product) {
            $this->respondWithError(404, "Product not found");
            return;
        }

        $this->respond($product);
    }

    public function addNewProduct()
    {
        $token = $this->checkForJwt();
        if (!$token) {
            return;
        }
        $data = $this->createObjectFromPostedJson("Models\\Product");
        $product = $this->service->insert($data);
        $this->respond($product);
    }
//TODO DELETE OR CHANGE THIS ONE BEFORE SUBMITTING IT
    public function getLawAreas(){
//        $token = $this->checkForJwt();
//        if (!$token) {
//            return;
//        }
        $lawAreas = $this->service->getLawAreas();
        $this->respond($lawAreas);
    }
}
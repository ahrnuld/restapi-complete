<?php
namespace Controller;
use Service\AdminService;
use Model\User;
require_once("BaseController.php");
require_once ("../Service/AdminService.php");
class AdminController extends BaseController
{
    private $adminService;

    public function __construct() {

        $this->adminService = new AdminService();
    }

    public function registerNewUser(){
        $token = $this->checkForJwt();
        if (!$token) {
            return;
        }
        $user = $this->createObjectFromPostedJson("Models\\User");
        $this->adminService->registerNewUser($user);
        $this->respond($user);

    }
}
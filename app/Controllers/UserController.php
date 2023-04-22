<?php
namespace Controllers;
use Exception;
use Services\UserService;
use \Firebase\JWT\JWT;
require_once __DIR__."../Service/UserService.php";

class UserController extends BaseController
{
    private $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function getAllUsers()
    {
        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $users = $this->userService->getAllUsers();

        $this->respond($users);
    }
    public function getUserByID($id){
        /*$token = $this->checkForJwt();
        if (!$token) {
            return;
        }*/
        $user = $this->userService->getByID($id);


        if (!$user) {
            $this->respondWithError(404, "User not found");
            return;
        }

        $this->respond($user);
    }



}
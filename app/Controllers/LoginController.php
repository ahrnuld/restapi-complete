<?php
namespace Controllers;
use Exception;
use Services\UserService;
use \Firebase\JWT\JWT;

require_once("../Service/UserService.php");
class LoginController extends BaseController
{
    public function login() {

        // read user data from request body
        $postedUser = $this->createObjectFromPostedJson("Models\\User");

        // get user from db
        $user = $this->service->checkUsernamePassword($postedUser->username, $postedUser->password);

        // if the method returned false, the username and/or password were incorrect
        if(!$user) {
            $this->respondWithError(401, "Invalid login");
            return;
        }
    }
    public function processLoginRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->displayLoginPage();
        } else {
            $this->validateLogin($_POST['username'], $_POST['password']);
        }
    }

    public function validateLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $userService = new UserService();
        $user = $userService->validateLogin($username, $password);

        if ($user != null) {
            $_SESSION['user'] = $user;
            header("location: /ManagementMainPage");
        } else {
            $_SESSION['LoginError'] = "Username or password incorrect!";
            $this->displayLoginPage();
        }
    }
}
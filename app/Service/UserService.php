<?php
namespace Service;
use Repository\UserRepository;
require_once("../Repository/UserRepository.php");
class UserService
{
    public function getAll()
    {
        require_once("../Repository/UserRepository.php");
        $repository = new UserRepository;
        $users = $repository->getAll();
        return $users;
    }
    public function validateLogin( $username, $password)
    {
        require_once("../Repository/UserRepository.php");
        $repository = new UserRepository;
        return $repository->verifyLogin($username, $password);
    }

    public function getByID($id)
    {
        require_once("../Repository/UserRepository.php");
        $repository = new UserRepository;
        $user = $repository->getById($id);
        return $user;
    }

}
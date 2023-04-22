<?php
namespace Services;
use Repository\AdminRepository;
require_once ("../Repository/AdminRepository.php");
class AdminService
{

    public function createUser($user)
    {

        $adminRepository = new AdminRepository();
       $user =  $adminRepository->createUser($user);
        return $user;
    }


}
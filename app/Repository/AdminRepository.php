<?php
namespace Repository;
use Model\User;
use PDO;
use PDOException;
use Repositories\baseRepository;
include_once('baseRepository.php');
class AdminRepository extends  baseRepository
{

    public function createUser($user)
    {

        require_once("../Model/User.php");

        $stmt = $this->connection->prepare("INSERT INTO User
            (password, username, firstname, lastname)
            VALUES
            (:password, :username, :firstname, :lastname)");

        $hashPassword = password_hash($user->password, PASSWORD_DEFAULT);

        $stmt->bindParam(':password', $hashPassword);
        $stmt->bindParam(':username', $user->username);
        $stmt->bindParam(':firstname', $user->firstname);
        $stmt->bindParam(':lastname', $user->lastname);
        $result=$stmt->execute();
        return  $result;
    }

}
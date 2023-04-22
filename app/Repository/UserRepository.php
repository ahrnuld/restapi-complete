<?php
namespace  Repository;
use Model\User;
use PDO;
use Repository\baseRepository;
require_once("../Model/User.php");
include_once('baseRepository.php');
class UserRepository extends baseRepository
{

    function getAll()
    {
        $stmt = $this->connection->prepare("SELECT * FROM User");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\\User');
        $result = $stmt->fetchAll();
        return $result;

    }

    public function verifyLogin($username, $password)
    {
        session_start();

        $stmt = $this->connection->prepare("select * from User where username=:username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\\User');
        $user = $stmt->fetch();

        if ($user == null) {
            return null;
        }
        $isPasswordCorrect = password_verify($password, $user->password);
        if($isPasswordCorrect){
            return $user;
        } else {
            return null;

        }
    }


    public function getByID($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM User WHERE id=$id ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\\User');
        $result = $stmt->fetch();
        return $result;

    }
}
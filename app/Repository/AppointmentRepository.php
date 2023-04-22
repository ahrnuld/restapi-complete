<?php
namespace Repository;
use Model\Appointment;
use PDO;
use PDOException;
use Repositories\baseRepository;

require_once("../model/appointment.php");
include_once('baseRepository.php');
class AppointmentRepository extends baseRepository
{
    function getAllAppointments()
    {
        $stmt = $this->connection->prepare("SELECT * FROM Appointment ORDER BY dateOfAppointment ASC, startingTime ASC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\\Appointment');
        $results = $stmt->fetchAll();
        foreach($results as $result){
            require_once("UserRepository.php");
            require_once ("../Model/User.php");
            require_once ("../Model/Product.php");
            require_once ("ProductRepository.php");

            $userRepository = new UserRepository();
            $user = $userRepository->getByID( $result->employeeId);
            $productRepository = new ProductRepository();
            $product = $productRepository->getByID($result->productID);
            $result->productName = $product->productName;
            $result->duration = $product->duration;
            $result->userFirstname= $user->firstname;
        }
        return $results;

    }


    public function deleteAppointment($id)
    {

        $stmt = $this->connection->prepare("Delete  FROM Appointment  WHERE id=:id");
        $stmt ->bindValue(':id', $id );
        $stmt->execute();
    }

    public function updateAppointment($appointment)
    {
        $stmt = $this->connection->prepare("UPDATE Appointment SET startingTime=:startingTime, customerName=:customerName, email=:email, dateOfAppointment=:dateOfAppointment, employeeId=:employeeId, productID=:productID WHERE id=:id ");
        $stmt->bindParam(':id', $appointment->id);
        $stmt->bindParam(':startingTime', $appointment->startingTime);
        $stmt->bindParam(':customerName', $appointment->customerName);
        $stmt->bindParam(':email', $appointment->email);
        $stmt->bindParam(':dateOfAppointment', $appointment->dateOfAppointment);
        $stmt->bindParam(':employeeId', $appointment->employeeId);
        $stmt->bindParam(':productID', $appointment->productID);
        $stmt->execute();
    }
    public function bookAppointment(Appointment $appointment)
    {
            $stmt = $this->connection->prepare("INSERT INTO Appointment
            (startingTime, customerName, email, dateOfAppointment, employeeId, productID)
            VALUES
            (:startingTime, :customerName, :email, :dateOfAppointment, :employeeId, :productID)");

            $stmt->bindParam(':startingTime', $appointment->startingTime);
            $stmt->bindParam(':customerName', $appointment->customerName);
            $stmt->bindParam(':email', $appointment->email);
            $stmt->bindParam(':dateOfAppointment', $appointment->dateOfAppointment);
            $stmt->bindParam(':employeeId', $appointment->employeeId);
            $stmt->bindParam(':productID', $appointment->productID);
            return $stmt->execute();
    }
    public function getByID($id){

        $stmt = $this->connection->prepare("SELECT * FROM Appointment WHERE id=:id ");
        $stmt ->bindValue(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\\Appointment');
        $result = $stmt->fetch();
        return $result;

    }
}
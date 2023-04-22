<?php
namespace Services;
use Repository\AppointmentRepository;
require_once("../Repository/AppointmentRepository.php");
class AppointmentService
{
    private $appointmentRepository;

    function __construct()
    {
        $this->appointmentRepository = new AppointmentRepository();
    }
    public function getAllAppointments()
    {
        $appointments = $this->appointmentRepository->getAllAppointments();
        return $appointments;
    }

    public function deleteAppointment($id)
    {
        require_once("../Repository/AppointmentRepository.php");

        $this->appointmentRepository->deleteAppointment($id);

    }
    public function getAppointmentByID($id){

        $this->appointmentRepository->editAppointment($id);
    }
    public function updateAppointment($appointment){
        $this->appointmentRepository->updateAppointment($appointment);
    }

    public function bookAppointment(Appointment $appointment)
    {
        return $this->appointmentRepository->bookAppointment($appointment);
    }
    public function getById($id){
        return $this->appointmentRepository->getByID($id);

    }
}
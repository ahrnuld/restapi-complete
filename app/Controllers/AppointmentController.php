<?php

namespace Controllers;
use Exception;
use Services\AppointmentService;
require_once("../Service/AppointmentService.php");

class AppointmentController extends BaseController
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new AppointmentService();
    }

    public function getAll()
    {
        /*$token = $this->checkForJwt();
        if (!$token)
            return;*/

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $appointments = $this->service->getAll($offset, $limit);

        $this->respond($appointments);
    }

    public function getById($id)
    {
        $token = $this->checkForJwt();
        /*if (!$token) {
            return;
        }*/
        $appointment = $this->service->getById($id);


        if (!$appointment) {
            $this->respondWithError(404, "Appointment not found");
            return;
        }

        $this->respond($appointment);
    }

    public function addNewAppointment()
    {
        $data = $this->createObjectFromPostedJson("Models\\Appointment");

        $appointment = $this->service->insert($data);

        $this->respond($appointment);

    }
/*AppointmentController@getAll');
$router->get('/appointments/(\d+)', 'AppointmentController@getById');
$router->post('/appointments', 'AppointmentController@addNewAppointment');
*/
    public function updateAppointment()
    {
        $token = $this->checkForJwt();
        /*if (!$token) {
            return;
        }*/
        $postedJason = $this->createObjectFromPostedJson("Models\\Appointment");

        $appointment = $this->service->updateAppointment($postedJason, $id);

        $this->respond($appointment);
    }
    public function deleteAppointment($id)
    {
        $token = $this->checkForJwt();
        if (!$token) {
            return;
        }
        $appointment = $this->service->delete($id);

        $this->respond($appointment);
    }

}
<?php
namespace Controllers;
use Service\SendUsAMessageService;
require_once("BaseController.php");
require_once("../Service/SendUsAMessageService.php");

class ContactUsController extends BaseController
{
    private $sendUsAMessageService;

    public function __construct()
    {
        $this->sendUsAMessageService = new SendUsAMessageService();
    }

    public function storeMessage($message)
    {
        $token = $this->checkForJwt();
        if (!$token) {
            return;
        }
        $postedData = $this->createObjectFromPostedJson("Models\\ContactUs");
        $message = $this->sendUsAMessageService->storeMessage($postedData);
        $this->respond($message);
    }


}
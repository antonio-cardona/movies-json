<?php

require_once 'lib/Controller.php';
require_once 'lib/Validation.php';

class ErrorController extends Controller
{
    /**
     * @param string $errorCode
     * @param string $info
     * @return void
     */
    public function indexAction(string $errorCode, string $info = ''): void
    {
        switch ($errorCode) {
            case Validation::ERROR_WRONG_CONTROLLER:
                $this->view->message = "E R R O R:<br>The path '" . $info . "' doesn't exist.";
                break;
            case Validation::ERROR_INCOMPLETE_DATA:
                $this->view->message = Validation::ERROR_INCOMPLETE_DATA;
                break;
        }

        $this->view->render('views/error/index.phtml');
    }
}
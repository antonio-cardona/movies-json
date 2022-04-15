<?php
require_once 'lib/Controller.php';

class HalloController extends Controller
{
    /**
     * @param int $id
     * @return void
     */
    public function indexAction(int $id = 0): void
    {
        $this->view->message = "Hallo! Fucking good (param:".$id.")";
        $this->view->render('views/hallo/index.phtml');
    }
}
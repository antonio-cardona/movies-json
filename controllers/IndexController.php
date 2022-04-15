<?php

require_once 'lib/Controller.php';

class IndexController extends Controller
{
    /**
     * @param string $param
     * @return void
     */
    public function indexAction(string $param = ''): void
    {
        $this->view->message = "Hello World from index Controller -> " . $param;
        $this->view->render('views/index/index.phtml');
    }
}
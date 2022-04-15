<?php

require_once 'lib/View.php';

class Controller
{
    public View $view;

    public function __construct()
    {
        $this->view = new View();
    }
}
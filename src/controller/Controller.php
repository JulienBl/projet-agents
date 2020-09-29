<?php

namespace App\src\controller;

use App\config\Request;
use App\src\constraint\Validation;
use App\src\DAO\UserDAO;
use App\src\DAO\MissionDAO;
use App\src\model\View;

abstract class Controller{
    
    protected $userDAO;
    protected $missionDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;

    public function __construct()    {
        
        $this->userDAO = new UserDAO();
        $this->missionDAO = new MissionDAO();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}
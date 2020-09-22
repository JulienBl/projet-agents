<?php

namespace App\config;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use Exception;

class Router
{
    private $frontController;
    private $backController;
    private $errorController;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');
        
        try{
            if(isset($route))
            {
                if($route === 'register'){
                    $this->frontController->register($this->request->getPost());
                }
                elseif($route === 'meteo'){
                    $this->frontController->meteo($this->request->getPost());
                }
                elseif($route === 'accueil_agents' || $route === ''){
                    $this->frontController->accueil_agents($this->request->getPost());
                }
                elseif($route === 'choix_mission'){
                    $this->frontController->choix_mission($this->request->getPost());
                }
                elseif($route === 'mission'){
                    $this->frontController->mission($this->request->getPost());
                }
                elseif($route === 'mission'){
                    $this->frontController->mission($this->request->getGet()->get('missionId'));
                }
                /*elseif($route === 'editMission'){
                    $this->backController->editMission($this->request->getPost(), $this->request->getGet()->get('missionId'));
                } */              
                elseif($route === 'profile'){
                    $this->backController->profile();
                }
                elseif($route === 'updatePassword'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif($route === 'logout'){
                    $this->backController->logout();
                }
                elseif($route === 'deleteAccount'){
                    $this->backController->deleteAccount();
                }
                elseif($route === 'deleteUser'){
                    $this->backController->deleteUser($this->request->getGet()->get('userId'));
                }
                elseif($route === 'administration'){
                    $this->backController->administration();
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }
}
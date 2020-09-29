<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        return $this->view->render('home');
    } 






    public function mission()
    {        
        $missions = $this->missionDAO->getMissions();               
        return $this->view->render('choix_mission', [
            'missions' => $missions            
        ]);
    }
    public function choix_mission($missionId)
    {
        $mission = $this->missionDAO->getMission($missionId);        
        return $this->view->render('choix_mission', [
            'mission' => $mission,            
        ]);
    }






    
   

    public function register(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if($this->userDAO->checkUser($post)) {
                $errors['pseudo'] = $this->userDAO->checkUser($post);
            }
            if(!$errors) {
                $this->userDAO->register($post);
                $this->session->set('register', 'Agent, vous êtes bien enregistré !');
                header('Location: index.php');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        return $this->view->render('register');
    }
    public function accueil_agents(Parameter $post)
    {
        
        return $this->view->render('accueil_agents');
    }    

    public function meteo(Parameter $post)
    {
        
        return $this->view->render('meteo');
    }
    public function soon(Parameter $post)
    {
        
        return $this->view->render('soon');
    }

    public function demande_mission(Parameter $post)
    {
        
        return $this->view->render('demande_mission');
    }
    

    public function login(Parameter $post)
    {
        if($post->get('submit')) {
            $result = $this->userDAO->login($post);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir Agent');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('pseudo', $post->get('pseudo'));
                header('Location: index.php');
            }
            else {
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
            }
        }
        return $this->view->render('login');
    }    
}
<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        return $this->view->render('home');
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
                $this->session->set('register', 'Votre inscription a bien été effectuée');
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

    public function choix_mission(Parameter $post)
    {
        $mission = $this->missionDAO->getMission($missionId);        
        return $this->view->render('choix_mission', [
            'mission' => $mission,            
        ]);
    }

    public function meteo(Parameter $post)
    {
        
        return $this->view->render('meteo');
    }


    public function mission(Parameter $post)
    {
        if($post->get('submit')) {
            $result = $this->userDAO->login($post);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir Agents');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('pseudo', $post->get('pseudo'));
                header('Location: index.php');
            }
            else {
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->view->render('mission', [
                    'post'=> $post
                ]);
            }
        }
        
        return $this->view->render('mission');
    }
    
    

    public function missionChoix($missionId)
    {
        $mission = $this->missionDAO->getMission($missionId);
       
    }
}
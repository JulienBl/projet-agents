<?php

namespace App\src\controller;

use App\config\Parameter;
use ReflectionParameter;

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
   
    public function choix_mission(Parameter $post)        {


           if( $post->get('missionId')){
                  $mission = $this->missionDAO->getMission($post->get('missionId')); //Récupération depuis form                

           }else{
                 $mission = $this->missionDAO->getMission($this->session->get('missionId')); //Sinn récupération via l'url                 
           }
           $this->session->set('missionId', $mission->getId()); //pour ecraser la mission en cour pour définir la mission en cour
        
                 
        
        if($post->get('code')){          
           

            if($mission->getCode() === $post->get('code')){                

                $missionSuivante = $this->missionDAO->getMissionParIdPrecedente($mission->getId());

                if($missionSuivante->getId() == null){
                    $this->session->set('valid_code', 'Bravo Agent, je suis fière de vous, votre mission est un succès ;)');

                }else{
                    $this->session->set('missionId', $missionSuivante->getId());
                    $this->session->set('valid_code', 'Bravo Agent, je suis fière de vous, mais votre mission continue : voir la mission <a class="a-animation" href="index.php?route=choix_mission">'. htmlspecialchars($missionSuivante->getTitre()). '</a>');
                }


            }else{
                $this->session->set('error_code', 'Voyon Agent, nous ne voulons pas d\'erreur ici! Reprenez vous!');
            }
        }

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
    public function soon()
    {
        
        return $this->view->render('soon');
    }

    public function demande_mission()
    {        
        $missions = $this->missionDAO->getMissionCommencement();               
        return $this->view->render('demande_mission', [
            'missions' => $missions,            
        ]);
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
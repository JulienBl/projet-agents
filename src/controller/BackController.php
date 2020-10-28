<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    private function checkLoggedIn()
    {
        if(!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: index.php?route=demande_mission');
        } else {
            return true;
        }
    }

    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if(!($this->session->get('role') === 'admin')) {
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            header('Location: index.php?route=profile');
        } else {
            return true;
        }
    }

    public function administration()
    {
        if($this->checkAdmin()) {     
            $missions = $this->missionDAO->getMissions();       
            $users = $this->userDAO->getUsers();

            return $this->view->render('administration', [
                'missions' => $missions,                
                'users' => $users
            ]);   
        }
    }  
   

    public function profile()
    {
        if($this->checkLoggedIn()) {
            return $this->view->render('profile');
        }
    }

    public function updatePassword(Parameter $post)
    {
        if($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
                $this->session->set('update_password', 'Le mot de passe a été mis à jour');
                header('Location: index.php?route=profile');
            }
            return $this->view->render('update_password');
        }
    }

    public function logout()
    {
        if($this->checkLoggedIn())
        {
            $this->logoutOrDelete('logout');    
        }
    }

    public function deleteAccount()
    {
        if($this->checkLoggedIn())
        {
            $this->userDAO->deleteAccount($this->session->get('pseudo'));
            $this->logoutOrDelete('delete_account');   
        }
    }

    public function deleteUser($userId)
    {
        if($this->checkAdmin()) {
            $this->userDAO->deleteUser($userId);
            $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
            header('Location: index.php?route=administration');
        }
    }

    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if($param === 'logout') {
            $this->session->set($param, 'À bientôt');
        } else {
            $this->session->set($param, 'Votre compte a bien été supprimé');
        }
        header('Location: index.php');
    }
    



    public function addMission(Parameter $post)
    {
        if($this->checkAdmin()) {
            if ($post->get('submit')) {
               
                $errors = $this->validation->validate($post, 'Mission');
                 
                if (!$errors) {
                    if($post->get("id_mission_precedente") == "")
                        $post->set("id_mission_precedente", null);

                    $this->missionDAO->addMission($post, $this->session->get('id'));
                    $this->session->set('add_mission', 'La nouvelle mission a bien été ajouté');
                    header('Location: index.php?route=administration');
                }
                return $this->view->render('add_mission', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('add_mission');
        }
    }

    public function editMission(Parameter $post, $missionId)
    {
        if($this->checkAdmin()) {
            $mission = $this->missionDAO->getMission($missionId);
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Mission');
                if (!$errors) {
                    if($post->get("id_mission_precedente") == "")
                        $post->set("id_mission_precedente", null);

                    $this->missionDAO->editMission($post, $missionId, $this->session->get('id'));
                    $this->session->set('edit_mission', 'La mission a bien été modifié');
                    //header('Location: index.php?route=administration');
                }
                return $this->view->render('edit_mission', [
                    'post' => $post,
                    'errors' => $errors
                ]);

            }
            $post->set('id', $mission->getId());
            $post->set('titre', $mission->getTitre());
            $post->set('objectif', $mission->getObjectif());
            $post->set('code', $mission->getCode());
            $post->set('id_mission_precedente', $mission->getId_mission_precedente());

            return $this->view->render('edit_mission', [
                'post' => $post
            ]);
        }
    }

    public function deleteMission($missionId)
    {
        if($this->checkAdmin()) {
            $this->missionDAO->deleteMission($missionId);
            $this->session->set('delete_mission', 'La mission a bien été supprimé');
            header('Location: index.php?route=administration');
        }
    }
    






}
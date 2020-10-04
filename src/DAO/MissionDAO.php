<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Mission;

class MissionDAO extends DAO
{
    private function buildObject($row)
    {
        $mission = new mission();
        $mission->setId($row['id']);
        $mission->settitre($row['titre']);

        if(isset($row['objectif']) == true){
            $mission->setobjectif($row['objectif']);
        }
        if(isset($row['code']) == true){
            $mission->setcode($row['code']);
        }
        if(isset($row['temps']) == true){
            $mission->settemps($row['temps']);
        }
        if(isset($row['id_mission_precedente']) == true){
            $mission->setId_mission_precedente($row['id_mission_precedente']);
        }
              
        return $mission;
    }

    public function getMissions()
    {
        $sql = 'SELECT mission.id, mission.titre, mission.objectif, mission.code, mission.temps, mission.id_mission_precedente FROM mission  ORDER BY mission.id DESC';
        $result = $this->createQuery($sql);
        $missions = [];
        foreach ($result as $row){
            $missionId = $row['id'];
            $missions[$missionId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $missions;
    }

    public function getMission($missionId)
    {
        $sql = 'SELECT mission.id, mission.titre, mission.objectif, mission.code, mission.temps, mission.id_mission_precedente FROM mission  WHERE mission.id = ?';
        $result = $this->createQuery($sql, [$missionId]);
        $mission = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($mission);
    }


    public function getMissionParIdPrecedente($missionIdPrecedente)
    {
        $sql = 'SELECT mission.id, mission.titre, mission.objectif, mission.code FROM mission  WHERE mission.id_mission_precedente = ?';
        $result = $this->createQuery($sql, [$missionIdPrecedente]);
        $mission = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($mission);
    }
    
    public function getMissionCommencement()
    {
        $sql = 'SELECT mission.id, mission.titre FROM mission  WHERE mission.id_mission_precedente is null';
        $result = $this->createQuery($sql);
        $missions = [];
        foreach ($result as $row){
            $missionId = $row['id'];
            $missions[$missionId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $missions;
    }
    
    
    public function addMission(Parameter $post)
    {
        $sql = 'INSERT INTO mission (titre, objectif, code, temps, id_mission_precedente) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('title')]);
    }

    public function editMission(Parameter $post, $missionId)
    {
        $sql = 'UPDATE mission SET titre=:titre, objectif=:objectif, code=:code, temps=:temps, id_mission_precedente=:id_mission_precedente WHERE id=:missionId';
        $this->createQuery($sql, [
            'titre' => $post->get('title'),
            'objectif' => $post->get('objectif'),
            'code' => $post->get('code'),
            'temps' => $post->get('temps'),
            'id_mission_precedente' => $post->get('id_mission_precedente'),            
            'missionId' => $missionId
        ]);
    }

    public function deleteMission($missionId)
    {   
        $sql = 'DELETE FROM mission WHERE id = ?';
        $this->createQuery($sql, [$missionId]);
    }




}
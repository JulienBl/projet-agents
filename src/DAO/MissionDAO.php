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
              
        return $mission;
    }

    public function getMissions()
    {
        $sql = 'SELECT mission.id, mission.titre, mission.objectif, mission.code FROM mission  ORDER BY mission.id DESC';
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
        $sql = 'SELECT mission.id, mission.titre, mission.objectif, mission.code FROM mission  WHERE mission.id = ?';
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
}
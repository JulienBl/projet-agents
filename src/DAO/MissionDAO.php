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
        $mission->setobjectif($row['objectif']);      
        return $mission;
    }

    public function getMissions()
    {
        $sql = 'SELECT mission.id, mission.titre, mission.objectif, user.pseudo FROM mission INNER JOIN user ON mission.user_id = user.id ORDER BY mission.id DESC';
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
        $sql = 'SELECT mission.id, mission.titre, mission.objectif, user.pseudo FROM mission INNER JOIN user ON mission.user_id = user.id WHERE mission.id = ?';
        $result = $this->createQuery($sql, [$missionId]);
        $mission = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($mission);
    }   
}
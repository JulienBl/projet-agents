<?php

namespace App\src\model;

class Mission
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $objectif;
    
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $temps;

    /**
     * @var int
     */
    private $id_mission_precedente;

     /**
     * @var mediumblob
     */
    private $image;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    /**
     * @param string $objectif
     */
    public function setObjectif($objectif)
    {
        $this->objectif = $objectif;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    
    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
    
    
 /**
     * @return string
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * @param string $temps
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;
    }


    /**
     * @return int
     */
    public function getId_mission_precedente()
    {
        return $this->id_mission_precedente;
    }

    /**
     * @param int $id_mission_precedente
     */
    public function setId_mission_precedente($id_mission_precedente)
    {
        $this->id_mission_precedente = $id_mission_precedente;
    }


    /**
     * @return mediumblob
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mediumblob $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}
<?php
namespace date;
class Event {

    private $id;

    private $nom;

    private $description;

    private $debut;

    private $fin;


    public function getId():int
    {
      return $this->id;
    }

    public function getNom():string
    {
      return $this->nom;
    }

    public function getDescription():string
    {
      return $this->description;
    }

    public function getDebut():\DateTime
    {
      return new \DateTime($this->debut);
    }

    public function getFin():\DateTime
    {
      return new \DateTime($this->fin);
    }



}





 ?>

<?php
namespace App\date;
class Event{

    private $id;

    private $creator;

    private $name;

    private$description;

    private $start;

    private $end;

    private $group;





    public function getId():int
    {
      return $this->id;
    }

    public function getCreator()
    {
      return $this->creator;
    }

    public function getGroup()
    {
      return $this->group;
    }

    public function getName():string
    {
      return $this->name;
    }

    public function getDescription():string
    {
      return $this->description;
    }

    public function getStart():\DateTime
    {
      return new \DateTime($this->start);
    }

    public function getEnd():\DateTime
    {
      return new \DateTime($this->end);
    }




    public function setCreator($creator)
    {
      $this->creator = $creator;
    }

    public function setName(string $name)
    {
     $this->name = $name;
    }

    public function setDescription($description)
    {
     $this->description = $description;
    }

    public function setStart(string $start)
    {
     $this->start = $start;
    }

    public function setEnd(string $end)
    {
     $this->end = $end;
    }

    public function setGroup($group)
    {
     $this->group = $group;
    }

}





 ?>

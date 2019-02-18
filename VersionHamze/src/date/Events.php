<?php
  namespace App\date;

  class Events{

    private $bdd;

    public function __construct($bdd)
    {
      $this->bdd = $bdd;
    }

    /* récupérer les evenements entre deux dats*/
    public function getEvents ($start, $end):array{

      $sql = "SELECT * FROM evenement WHERE debut BETWEEN '{$start-> format('Y-m-d 00:00:00')}'
              AND '{$end-> format('Y-m-d 23:59:59')}'";

      $statements = $this->bdd->query($sql);
      $resultats = $statements->fetchALL();

      return $resultats;
    }

    /* récupérer les evenements entre deux dats indexé par jour*/
    public function getEventsByDay ($start, $end):array{

      $events= $this->getEvents($start,$end);
      $days=[];

      foreach($events as $event) {
        $date = explode(' ', $event['debut'])[0];
        if (!isset($days[$date])) {
          $days[$date] = [$event];
        }else{
          $days[$date][]= $event;
        }

      }
        return $days;


    }

    /* récupérer un evenement */
    public function find($id):array{
        $res= $this->bdd->query("SELECT * FROM evenement WHERE id = $id LIMIT 1")->fetch();
        if ($res === false){
          throw new \Exception('Aucun résultat n\'a été trouvé');
        }
        return $res;
    }
  }
?>

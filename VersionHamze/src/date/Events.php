<?php
  namespace App\date;



  class Events{

    private $bdd;

    public function __construct(\PDO $bdd)
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
        }
        else
        {
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
    /* créer un evenement*/
    public function create(Event $event) {
      $sql = $this->bdd->prepare('INSERT INTO evenement (createur, nom, description, debut, fin, idGroupe)
                          VALUES(?, ?, ?, ?, ?, ?)');
      $result = $sql->execute([
        $event->getCreator(),
        $event->getName(),
        $event->getDescription(),
        $event->getStart()->format('Y-m-d H:i:s'),
        $event->getEnd()->format('Y-m-d H:i:s'),
        $event->getGroup(),
      ]);
      //var_dump($sql->errorInfo());
      return $result;
    }

    /*public function create($creator, $name, $description, $debut, $fin, $group) {
      $sql ='INSERT INTO evenement (`createur`,`nom`, `description`, `debut`, `fin`, `idGroupe`)
                          VALUES ($creator, $name, $description, $debut, $fin, $group)';

      $statements = $this->bdd->query($sql);
      return $statements;
    }*/

    public function getUser ():array{

      $sql = "SELECT * FROM user WHERE debut BETWEEN '{$start-> format('Y-m-d 00:00:00')}'
              AND '{$end-> format('Y-m-d 23:59:59')}'";

      $statements = $this->bdd->query($sql);
      $resultats = $statements->fetchALL();

      return $resultats;
    }

    public function selectAllUser(){
      $sql ="SELECT * FROM user WHERE 1";

      return mysqli_query($bdd, $sql);

    }


  }


?>

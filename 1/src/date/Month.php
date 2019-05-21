<?php


namespace App\date;
class Month{
	public $days =['Lundi', 'Mardi', 'Mercredi','Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
	private $months =['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet',
						'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
	public $month;
	public $year;




	public function __construct(?int $month = null,?int $year= null)
	{
		if ($month === null || $month<1 || $month >12){
			$month = intval(date('m'));
		}
		if ($year === null){
			$year = intval(date('Y'));
		}
		if ($month <1 || $month > 12){
			throw new \Exception(" le mois  $month n'est pas valide");
		}
		if ($year <1970){
			throw new \Exception("annee n'est pas valide");
		}
		$this->month = $month;
		$this->year  = $year;

	}

	/* renvoie le mois en toute lettre*/
	public function toString(){
	return $this->months[$this->month-1 ].' '.$this->year;
	}

	/* renvoie le premier jour du mois */
	public function getFirstDay(){
		return new \DateTime("{$this->year}-{$this->month}-01");
	}

 	/*renvoie le nombre de semaine dans un mois*/
	public function getWeeks(){
		/*le premier jour d'un mois*/
		$start = $this->getFirstDay();
		/* le dernier jour d'un mois*/
		$end =(clone $start)->modify('+1 month -1 day');
		/*le nombre de semaine d'un mois*/
		$weeks =intval($end->format('W')) - intval($start->format('W')) +1;
		if ($weeks < 0){
			$weeks = intval($end->format('W'));
		}
		return $weeks;
	}

	/* une fonction qui vérifie si le jour est dans le mois courant*/
	public function chekDay($date){
		return $this->getFirstDay()->format('Y-m')=== $date->format('Y-m');
	}

	/*renvoie le mois suivant*/
	public function nextMonth(){
		$month = $this->month + 1;
		$year = $this->year;
		if ($month>12){
			$month = 1;
			$year += 1;
		}
		return new Month($month, $year);
	}

	/*renvoie le mois précedent*/
	public function previousMonth(){
			$month = $this->month - 1;
			$year = $this->year;
			if ($month < 1){
				$month = 12;
				$year -= 1;
			}
			return new Month($month, $year);
		}
}

<?php
namespace App\date;

class EventValidator{
  private $data;
  protected $errors = [];

  public function validates(array $data) {
    $this->errors = [];
    $this->data = $data;
  }

  public function validate(string $field, string $method, ...$parametres){
    if(!isset($this->data[$field]))
    {
      $this->errors[$field] = "Le champs $field n'est pas rempli";
    }
    else
    {
      call_user_func([$this, $method], $field, ...$parametres);
    }
  }

  public function minLength(string $field, int $length){
    if(mb_strlen($field)< $length){
      $this->errors[$field] = "Le champs doit avoir plus de $length caractères";
    }
  }

  public function valid (array $data){
    validates($data);
    $this->validate('name','minLength', 30);
    return $this->errors;
  }


}
?>

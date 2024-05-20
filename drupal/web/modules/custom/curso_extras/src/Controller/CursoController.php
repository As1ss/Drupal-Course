<?php



namespace Drupal\curso_extras\Controller;

class CursoController {

  public function hello(){
    return [
      "#theme"=>"curso_controller",
      "#text"=>"Hello World",
      "#usuario"=>"Jhon Doe"
    ];
  }

}

<?php



namespace Drupal\curso_config\Controller;

use Drupal\Core\Controller\ControllerBase;

class ConfigController extends ControllerBase{

  public function home(){

    $config = $this->config("curso_config.nuestra_configuracion");

    dump($config,"Nuestra config");

    return ["#markup"=>"Pagina del controlador del modulo curso_config"];
  }
}

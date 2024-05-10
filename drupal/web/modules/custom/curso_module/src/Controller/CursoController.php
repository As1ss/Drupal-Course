<?php

namespace Drupal\curso_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\Response;

class CursoController extends ControllerBase
{

  // public function home($pagina)
  // {
  //   return [
  //     "#markup" => "La página es $pagina"
  //   ];
  // }

  public function home(NodeInterface $node){

    return [
      "#markup"=> "La etiqueda del nodo es ". $node->label()
    ];
  }

}




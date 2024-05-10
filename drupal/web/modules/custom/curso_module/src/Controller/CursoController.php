<?php

namespace Drupal\curso_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\Response;

class CursoController extends ControllerBase
{

  public function home(NodeInterface $node)
  {
    return [
          "#theme" => "curso-plantilla",
          "#etiqueta" => $node->label(),
          "#tipo" => $node->bundle()
        ];
  }



  // public function home(NodeInterface $node){

  //   return [
  //     "#theme"=> "Tema: curso-plantilla",
  //     "#etiqueta"=> "Etiqueta: Esta es la etiqueta",
  //     "#tipo"=> "Tipo: Página básica"
  //   ];
  // }

}




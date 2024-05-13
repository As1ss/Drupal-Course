<?php

namespace Drupal\curso_module\Controller;

use Drupal\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\curso_module\services\Repetir;
use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as DependencyInjectionContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class CursoController extends ControllerBase
{
  private Repetir $repetir;

  public function __construct(Repetir $repetir)
  {
    $this->repetir = $repetir;
  }

  public static function create(DependencyInjectionContainerInterface $container)
  {
    return new static (
      $container->get("curso_module.repetir")
      // $container->get("core.entity_type.manager")
    );
  }


  public function home(NodeInterface $node)
  {

    // $this->entityTypeManager()->

    $resultado = $this->repetir->repetir("curso ",5);


    return [
          "#theme" => "curso_plantilla",
          "#etiqueta" => $node->label(),
          "#tipo" => $resultado,
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




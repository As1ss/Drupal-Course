<?php

namespace Drupal\curso_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class EntityController extends ControllerBase{



  public function __construct(EntityTypeManagerInterface $entityTypeManager)
  {
    $this->entityTypeManager = $entityTypeManager;
  }


  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get("entity_type.manager")
    );
  }

  public function entityLoad(){

   $user =  $this->entityTypeManager()->getStorage("user")->load(1);

   $node = $this->entityTypeManager()->getStorage("node")->load(14);

   $nodes = $this->entityTypeManager->getStorage("node")->loadMultiple([15, 16, 17]);


   dpm($user, "Usuario");
   dpm($node, "Nodo");
    dpm($nodes, "Nodos");

    return ["#markup"=>"Página de entidades"];
  }

}

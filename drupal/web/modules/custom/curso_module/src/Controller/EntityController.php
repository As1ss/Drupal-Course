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
   $users = $this->entityTypeManager()->getStorage("user")->loadMultiple([1, 2, 3]);

   $node = $this->entityTypeManager()->getStorage("node")->load(14);

   $nodes = $this->entityTypeManager->getStorage("node")->loadMultiple([15, 16, 17]);


   dpm($user, "Usuario");
   dpm($users, "Usuarios");
   dpm($node, "Nodo");
   dpm($nodes, "Nodos");

    return ["#markup"=>"Ruta de carga de entidades"];
  }
  public function entityCreate() {

  /*  $values = [
      "title"=> "Nodo de prueba",
      "type" => "page"
    ];

    $node = $this->entityTypeManager->getStorage("node")->create($values);
    $node->save();
    dpm($node, "Nodo creado");*/

   /* $values = [
      "name"=> "Usuario de prueba",
      "mail" => "usuario@prueba.com ",
      "pass" => "12345",
      "status" => 1
    ];

    $user = $this->entityTypeManager->getStorage("user")->create($values);
    $user->save();
    dpm($user, "Usuario creado");*/

    $values = [
      "name"=> "Taxonomia de prueba",
      "vid" => "tags"
    ];
    $taxonomy = $this->entityTypeManager->getStorage("taxonomy_term")->create($values);
    $taxonomy->save();
    dpm($taxonomy, "Taxonomia creada");



    return ["#markup"=>"Ruta de creación de entidades"];
  }

}

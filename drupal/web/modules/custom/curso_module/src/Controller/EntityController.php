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
      "vid" => "tags",
    ];
    $taxonomy = $this->entityTypeManager->getStorage("taxonomy_term")->create($values);
    $taxonomy->save();
    dpm($taxonomy, "Taxonomia creada");



    return ["#markup"=>"Ruta de creación de entidades"];
  }

  public function entityEdit () {

   /* $values = [
      "title"=> "Articulo de prueba",
      "type" => "article"
    ];

    $node = $this->entityTypeManager->getStorage("node")->create($values);
    $node->save();

    dpm($node, "Nodo creado (Articulo)");

    $node = $this->entityTypeManager->getStorage("node")->load(20);



    $campo = $node->get("body")->value;
    $node->set("body", "En la encrucijada entre la tecnología y la medicina, la inteligencia artificial (IA) está emergiendo como una fuerza transformadora que está redefiniendo la forma en que diagnosticamos, tratamos y gestionamos las enfermedades. Desde algoritmos de aprendizaje profundo hasta sistemas de diagnóstico asistido por IA, las innovaciones en este campo están abriendo nuevas fronteras y desafiando las normas establecidas.");
    $node->save();

   $campo = $node->set("field_texto","Texto de prueba en field_texto");
    $node->save();
    dpm($campo, "Campo");/

    $taxonomies = $this->entityTypeManager->getStorage("taxonomy_term")->loadMultiple();

   dpm($taxonomies, "Taxonomias");

   $node->get("field_tags")->appendItem($taxonomies[1]);
      $node->get("field_tags")->appendItem($taxonomies[2]);
      $node->save();

    //Eliminar un item del nodo
    $node->get("field_tags")->removeItem(0);
   */




    return ["#markup" =>  "Ruta de edición de entidades"];
  }

}

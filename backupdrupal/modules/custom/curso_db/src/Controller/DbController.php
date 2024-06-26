<?php

namespace Drupal\curso_db\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DbController extends ControllerBase
{

  /**
   * @var Connection
   */
  private $db;

  public function __construct(Connection $database)
  {
    $this->db = $database;
  }

  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('database')
    );
  }



  public function queryEstatica()
  {

    // $this->db->query(
    //  "INSERT INTO {curso_db} (name, value, nid) VALUES (:name, :value ,:nid)",
    //  [
    //   ":name" => "Jusepe",
    //   ":value" => "Esta en una pizzeria",
    //   ":nid" => 1
    //  ]
    // );

    // $this->db->query(
    //   "INSERT INTO {curso_db} (name, value) VALUES (:name, :value)",
    //   [
    //    ":name" => "Ana",
    //    ":value" => "Ana está en la piscina",
    //   ]
    //  );

    //  $this->db->query(
    //   "INSERT INTO {curso_db} (name, value) VALUES (:name, :value)",
    //   [
    //    ":name" => "María",
    //    ":value" => "María se ha ido a la montaña",
    //   ]
    //  );


    $result = $this->db->query(
      "SELECT * from {curso_db}"
    );

    $personas = $result->fetchAll();

    foreach ($personas as $person) {
      dump($person->name, "name");
    }



    return ['#markup' => 'Consultas a base de datos estaticas.'];
  }



  public function selectDinamico()
  {


    $query = $this->db->select("curso_db", "c");



    $query->fields("c");

    $query->orderBy("name", "DESC");
    $query->join("node", "n", "c.nid = n.nid");
    $query->fields("n",["type"]);



    $nid = TRUE;
    if ($nid) {
      $query->isNotNull("nid");
    } else {
      $query->condition("name", "Maria");
    }

    $result = $query->execute();
    dump($result->fetchAll(), "Resultado query dinamica");

    return ['#markup' => 'Consultas a base de datos select dinamico.'];
  }

  public function insertDinamico()
  {

    $values = [
      "name" => "Margarita",
      "value" => "Margarita se fue al campo"
    ];

    $this->db->insert("curso_db")->fields($values)->execute();


    return ['#markup' => 'Consultas a base de datos insert dinamico.'];
  }

  public function updateDinamico()
  {

    $values = [
      "name" => "Juanita",
      "value" => "Juanita se fue al campo"
    ];

    $this->db->update("curso_db")->fields($values)->condition("name","Margarita")->execute();

    return ['#markup' => 'Consultas a base de datos update dinamico.'];
  }

  public function deleteDinamico()
  {
    $this->db->delete("curso_db")->condition("name","Juanita")->execute();


    return ['#markup' => 'Consultas a base de datos delete dinamico.'];
  }

  public function mergeDinamico()
  {
    // $values = [
    //   "name" => "Margarita",
    //   "value" => "Margarita se fue al campo, con el update del merge"
    // ];

    // $name = "Margarita";

    // $this->db->merge("curso_db")
    // ->key("name",$name)
    // ->fields($values)
    // ->execute();


    $values_insert= [
      "name" => "Jesus",
      "value" => "Jesus esta en el mar"
    ];

    $values_update= [
      "name" => "Jesus",
      "value" => "Jesus esta en el mar, con un update especial del merge"
    ];

    $name = "Jesus";

    $this->db->merge("curso_db")
    ->key("name",$name)
    ->insertFields($values_insert)
    ->updateFields($values_update)
    ->execute();



    return ['#markup' => 'Consultas a base de datos con merge.'];
  }
}

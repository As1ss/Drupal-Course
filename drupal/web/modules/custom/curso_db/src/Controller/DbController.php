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

  public function queryEstatica() {
    return ['#markup' => 'Consultas a base de datos estaticas.'];
  }

  public function selectDinamico() {
    return ['#markup' => 'Consultas a base de datos select dinamico.'];
  }

  public function insertDinamico() {
    return ['#markup' => 'Consultas a base de datos insert dinamico.'];
  }

  public function updateDinamico() {
    return ['#markup' => 'Consultas a base de datos update dinamico.'];
  }

  public function deleteDinamico() {
    return ['#markup' => 'Consultas a base de datos delete dinamico.'];
  }

  public function mergeDinamico() {
    return ['#markup' => 'Consultas a base de datos con merge.'];
  }
}

<?php

namespace Drupal\curso_module\services;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Messenger\MessengerInterface;

class Repetir {

  private MessengerInterface $messenger;
  private EntityTypeManagerInterface $entityTypeManager;

  public function __construct(MessengerInterface $messenger, EntityTypeManagerInterface $entityTypeManager)
  {
    $this->messenger = $messenger;
    $this->entityTypeManager = $entityTypeManager;
  }


  public function repetir($palabra, $cantidad = 3){

    $this->messenger->addError("Esto es un error del servicio repetir");

    return str_repeat($palabra, $cantidad);
  }
}

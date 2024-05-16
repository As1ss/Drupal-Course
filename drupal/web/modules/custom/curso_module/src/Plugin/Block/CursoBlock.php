<?php

namespace Drupal\curso_module\Plugin\Block;


use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *   id = "curso_module_curso_block",
 *   admin_label = @Translation("Curso Block"),
 *   category = @Translation("Curso Module")
 * )
 *
 *
 */
class CursoBlock extends BlockBase {

  public function build(): array {

   return [
     "#theme" => "curso_plantilla",
     "#etiqueta" => "Etiqueta del block",
     "#tipo" => "Mi tipo de block",
   ];
  }

}

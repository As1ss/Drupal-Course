<?php

namespace Drupal\curso_module\Plugin\Block;


use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

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
     "#etiqueta" => isset($this->configuration["etiqueta"]) ? $this->configuration["etiqueta"] : "",
     "#tipo" => isset($this->configuration["tipo"])? $this->configuration["tipo"] : "",
   ];
  }

  public function defaultConfiguration() {
    return [
      "etiqueta" => "Mi Etiqueta por defecto",
      "tipo" => "Mi tipo por defecto",
    ];
  }

  public function access(AccountInterface $account, $return_as_object = FALSE) {
    //return AccessResult::allowedIfHasPermission($account, 'curso permiso limitado');

    if ($account->hasPermission("curso permiso limitado")) {
      //return TRUE;
      return AccessResult::allowed();
    }
    else {
     // return FALSE;
      return AccessResult::forbidden("No tienes permisos para ver este bloque");
    }
  }

  public function blockForm($form, FormStateInterface $form_state) {

    $form["etiqueta"] = [
      '#type' => 'textfield',
      '#title' => $this->t("Tag"),
      '#default_value' => isset($this->configuration["etiqueta"]) ? $this->configuration["etiqueta"] : "",
    ];

    $form["tipo"] = [
      '#type' => 'textfield',
      '#title' => $this->t("Type"),
      '#default_value' => isset($this->configuration["tipo"])? $this->configuration["tipo"] : "",
    ];

    return $form;
  }

  public function blockValidate($form, FormStateInterface $form_state) {

    parent::blockValidate($form,$form_state);
  }

  public function blockSubmit($form, FormStateInterface $form_state) {

   parent::blockSubmit($form,$form_state);
  }

}

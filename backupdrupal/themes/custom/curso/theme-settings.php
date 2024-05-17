<?php

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function curso_form_system_theme_settings_alter(&$form, \Drupal\Core\Form\FormStateInterface $form_state, $form_id = NULL) {

  if(isset($form_id)) {
    return;
  }

  $form["curso_texto"] = [
    "#type" => "textfield",
    "#title" => t("Texto de prueba para curso"),
    "#default_value" => theme_get_setting("curso_texto"),
  ];
  $form["curso_check"] = [
    "#type" => "checkbox",
    "#title" => t("Checkbox de prueba para curso"),
    "#default_value" => theme_get_setting("curso_check"),
  ];


}


<?php

namespace Drupal\curso_module\Form;

use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\curso_module\services\Repetir;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CursoForm extends FormBase {

  private Repetir $repetir;
  private EntityTypeManagerInterface $entityManager;

  public function __construct(Repetir $repetir, EntityTypeManagerInterface $entityManager)
  {
    $this->repetir = $repetir;
    $this->entityManager = $entityManager;
  }

  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get("curso_module.repetir"),
      $container->get("entity_type.manager")
    );
  }


   /**
   * Returns a unique string identifying the form.
   *
   * The returned ID should be a unique string that can be a valid PHP function
   * name, since it's used in hook implementation names such as
   * hook_form_FORM_ID_alter().
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId(){
    return "curso_module_curso_form";
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state){

    $form["checkbox"] = [
      '#type' => 'checkbox',
      '#title' => 'Nuestro Checkbox',
      "#required" => TRUE,
    ];


    $form["title"] = [
      '#type' => 'textfield',
      '#title' => $this->t("Title"),
      '#default_value' => "Valor por defecto",
      '#size' => 60,
      '#maxlength' => 128,
      '#required' => TRUE,
      "#attributes" => [
        "class" => [
          "Clase_1",
          "Clase_2"
        ]
        ],
    ];

    $form['referencia'] = [
      '#type' => 'entity_autocomplete',
      '#target_type' => 'node',
      '#tags' => TRUE,
      // '#default_value' => $node,
      // '#selection_handler' => 'default',
      // '#selection_settings' => [
      //   'target_bundles' => ['article', 'page'],
      //  ],
      // '#autocreate' => [
      //   'bundle' => 'article',
      //   'uid' => <a valid user ID>,
      //  ],
     ];


    $form['phone'] = [
      '#type' => 'tel',
      '#title' => "Teléfono",
      "#required" => TRUE,
  ];

  $form['actions']['submit'] = [
    '#type' => 'submit',
    '#value' => "Enviar",
  ];


    return $form;
  }

  /**
   * Form validation handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function validateForm(array &$form, FormStateInterface $form_state){

    if(strlen($form_state->getValue("phone"))<4){
      $form_state->setErrorByName("phone","El campo tiene que contener mínimo 4 caracteres");
    }

  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state){

    $values = $form_state->getValues();
    $phone = $form_state->getValue("phone");



    dump($values,"values");

    if (isset($values["title"])) {
      $this->messenger()->addStatus("El campo title contenia el texto: " . $values["title"]);
    }
    if (isset($values["phone"])) {
      $this->messenger()->addStatus("El campo phone contenia el numero: " . $phone);
    }
    if (isset($values["checkbox"])) {
      $this->messenger()->addStatus("El campo checkbox contenia el texto: " . $values["checkbox"]);
    }

  }



}

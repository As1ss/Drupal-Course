<?php

namespace Drupal\curso_config\Form;


use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Config\TypedConfigManagerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\curso_module\services\Repetir;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CursoConfigForm extends ConfigFormBase
{

  /** @var Repetir */
  private Repetir $repetir;


  public function __construct(ConfigFactoryInterface $config_factory,Repetir $repetir) {
    parent::__construct($config_factory);
    $this->repetir = $repetir;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('config.factory'),
      $container->get('curso_module.repetir')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames()
  {
    return [
      "curso_config.nuestra_configuracion"
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return "curso_config_nuestro_form";
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {

    $config = $this->config("curso_config.nuestra_configuracion");


    $form["name"] = [
      "#type" => "textfield",
      "#title" => "Name",
      "#default_value" => $config->get("name")
    ];

    $form["label"] = [
      "#type" => "textfield",
      "#title" => "Label",
      "#default_value" => $config->get("label")
    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {

    parent::submitForm($form, $form_state);


    $config = $this->config("curso_config.nuestra_configuracion");

    $config->set("name", $form_state->getValue("name"));
    $config->set("label", $form_state->getValue("label"));
    $config->save();
  }
}

<?php

namespace Drupal\curso_module\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\curso_module\services\Repetir;
use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Session\AccountProxyInterface;

class CursoController extends ControllerBase
{
  private Repetir $repetir;

  /**
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  private AccountProxyInterface $accountProxy;

  public function __construct(Repetir $repetir, ConfigFactoryInterface $configFactory, AccountProxyInterface $accountProxy)
  {
    $this->repetir = $repetir;
    $this->configFactory = $configFactory;
    $this->accountProxy = $accountProxy;
  }

  public static function create(ContainerInterface $container)
  {
    return new static (
      $container->get("curso_module.repetir"),
      $container->get("config.factory"),
      $container->get("current_user")

    );
  }


  public function home(NodeInterface $node)
  {

    // $this->entityTypeManager()->

    $resultado = $this->repetir->repetir("curso ",5);


    return [
          "#theme" => "curso_plantilla",
          "#etiqueta" => $node->label(),
          "#tipo" => $resultado,
        ];
  }
public function formController() {
  if (!$this->accountProxy->hasPermission("curso permiso limitado")) {
    return ["#markup" => "No tienes permisos para acceder al form"];
  }
  $form = $this->formBuilder()->getForm("\Drupal\curso_module\Form\CursoForm");

  $texto = "Rodrigo";
  $markup = ["#markup" => $this->t("This is the page of the @form", ["@form" => $texto]),];

  $build = [
    $markup,
    $form,
  ];

  return $build;
}


public function configController(){


  $config  = $this->config("system.site");


  dump($config,"config");
  dump($config->get("name"));


  $configEditable = $this->configFactory->getEditable("system.site");
  dump($configEditable,"Configuración mutable");

  $configEditable->set("slogan","Slogan editadao en código");
  $configEditable->save();


  return ["#markup"=> "Ruta de configuracion"];
}



  // public function home(NodeInterface $node){

  //   return [
  //     "#theme"=> "Tema: curso-plantilla",
  //     "#etiqueta"=> "Etiqueta: Esta es la etiqueta",
  //     "#tipo"=> "Tipo: Página básica"
  //   ];
  // }

}




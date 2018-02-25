<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\hello_world\World\WorldGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController extends ControllerBase {

  private $worldGenerator;

  public function __construct(WorldGenerator $worldGenerator) {
    $this->worldGenerator = $worldGenerator;
  }

  public function hello_world() {
    $hello_world = $this->worldGenerator->getHelloWorld();

    return new Response($hello_world);
  }

  public static function create(ContainerInterface $container) {
    $worldGenerator = $container->get('hello_world.world_generator');

    return new static($worldGenerator);
  }

}
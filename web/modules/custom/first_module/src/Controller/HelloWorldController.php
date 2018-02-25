<?php

namespace Drupal\first_module\Controller;

use Symfony\Component\HttpFoundation\Response;

class HelloWorldController {

  public function hello_world() {
    return new Response('Hello World');
  }
}
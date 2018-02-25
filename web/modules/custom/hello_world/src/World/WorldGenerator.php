<?php

namespace Drupal\hello_world\World;

use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;

class WorldGenerator {

  private $keyValueFactory;

  public function __construct(KeyValueFactoryInterface $keyValueFactory) {
    $this->keyValueFactory = $keyValueFactory;
  }

  public function getHelloWorld() {

    $key = 'hello_world';
    $store = $this->keyValueFactory->get('world');

    if ($store->has($key)) {
      return $store->get($key);
    }

    sleep(2);
    $string = 'Hello World';
    $store->set($key, $string);

    return $string;
  }

}
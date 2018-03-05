<?php

namespace Drupal\hello_world\World;

use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;

class WorldGenerator {

  private $keyValueFactory;
  private $useCache;

  public function __construct(KeyValueFactoryInterface $keyValueFactory, $useCache) {
    $this->keyValueFactory = $keyValueFactory;
    $this->useCache = $useCache;
  }

  public function getHelloWorld() {
    // Cache example.
    $key = 'hello_world';
    $store = $this->keyValueFactory->get('world');

    if ($this->useCache && $store->has($key)) {
      return $store->get($key);
    }

    sleep(2);

    $string = 'Hello World';
    if ($this->useCache){
      $store->set($key, $string);
    }

    return $string;
  }

}
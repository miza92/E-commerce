<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.JTx4eZ9' shared service.

return $this->privates['.service_locator.JTx4eZ9'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'pictureProduit' => ['privates', '.errored..service_locator.JTx4eZ9.App\\Entity\\PictureProduit', NULL, 'Cannot autowire service ".service_locator.JTx4eZ9": it references class "App\\Entity\\PictureProduit" but no such service exists.'],
], [
    'pictureProduit' => 'App\\Entity\\PictureProduit',
]);

<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'lexik_jwt_authentication.jwt_manager' shared service.

include_once $this->targetDirs[3].'/vendor/lexik/jwt-authentication-bundle/Services/JWTManagerInterface.php';
include_once $this->targetDirs[3].'/vendor/lexik/jwt-authentication-bundle/Services/JWTTokenManagerInterface.php';
include_once $this->targetDirs[3].'/vendor/lexik/jwt-authentication-bundle/Services/JWTManager.php';

$this->services['lexik_jwt_authentication.jwt_manager'] = $instance = new \Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager(($this->services['lexik_jwt_authentication.encoder'] ?? $this->load('getLexikJwtAuthentication_EncoderService.php')), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), 'email');

$instance->setUserIdentityField('email');

return $instance;

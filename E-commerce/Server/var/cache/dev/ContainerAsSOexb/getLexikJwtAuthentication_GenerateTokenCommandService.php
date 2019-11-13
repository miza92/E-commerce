<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'lexik_jwt_authentication.generate_token_command' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/console/Command/Command.php';
include_once $this->targetDirs[3].'/vendor/lexik/jwt-authentication-bundle/Command/GenerateTokenCommand.php';

$this->services['lexik_jwt_authentication.generate_token_command'] = $instance = new \Lexik\Bundle\JWTAuthenticationBundle\Command\GenerateTokenCommand(($this->services['lexik_jwt_authentication.jwt_manager'] ?? $this->load('getLexikJwtAuthentication_JwtManagerService.php')), new RewindableGenerator(function () {
    yield 0 => ($this->privates['security.user.provider.concrete.entity_provider'] ?? $this->load('getSecurity_User_Provider_Concrete_EntityProviderService.php'));
}, 1));

$instance->setName('lexik:jwt:generate-token');

return $instance;

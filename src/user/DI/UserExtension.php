<?php

namespace Thunbolt\User\DI;

use Nette\DI\CompilerExtension;

class UserExtension extends CompilerExtension {

	/** @var array */
	public $defaults = [
		'repository' => 'Entity\User'
	];

	public function loadConfiguration() {
		$config = $this->validateConfig($this->defaults);
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('authenticator'))
			->setClass('Thunbolt\User\Authenticator', ['@Kdyby\Doctrine\EntityManager', $config['repository']]);
	}

	public function beforeCompile() {
		$builder = $this->getContainerBuilder();
		$config = $this->validateConfig($this->defaults);

		$builder->getDefinition('security.userStorage')
			->setFactory('Thunbolt\User\UserStorage')
			->addSetup('setRepository', [$config['repository']]);

		$builder->getDefinition('user')
			->setClass('WebChemistry\User\User')
			->setFactory('Thunbolt\User\User')
			->addSetup('setAuthenticator', [$this->prefix('@authenticator')]);
	}

}

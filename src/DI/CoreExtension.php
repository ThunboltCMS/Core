<?php

namespace Thunbolt\DI;

use Nette\DI\CompilerExtension;
use Thunbolt\User\Authenticator;

class CoreExtension extends CompilerExtension {

	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();

		if (class_exists(Authenticator::class) && !$builder->hasDefinition('user.authenticator')) {
			$builder->addDefinition('user.authenticator')
				->setClass(Authenticator::class, ['Entity\User']);
		}
	}

}

<?php

namespace Thunbolt;

use Nette\DI\CompilerExtension;
use Thunbolt\Components\Flashes;
use Thunbolt\Components\IFlashes;
use Thunbolt\Forms\FormCase;
use Thunbolt\Translation\Translation;

class CoreExtension extends CompilerExtension {

	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('translation'))
			->setClass(Translation::class)
			->addTag('run');

		$builder->addDefinition($this->prefix('formCase'))
			->setClass(FormCase::class);

		$builder->addDefinition($this->prefix('flashes'))
			->setClass(IFlashes::class)
			->setFactory(Flashes::class);
	}

}

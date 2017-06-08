<?php

declare(strict_types=1);

namespace Thunbolt;

use Nette\DI\CompilerExtension;
use Thunbolt\Components\Flashes;
use Thunbolt\Components\IFlashes;

class CoreExtension extends CompilerExtension {

	public function loadConfiguration(): void {
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('flashes'))
			->setClass(IFlashes::class)
			->setFactory(Flashes::class);
	}

}

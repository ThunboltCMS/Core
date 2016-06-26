<?php

namespace Thunbol\DI;

use Nette\DI\CompilerExtension;
use Nette\DI\Extensions\ExtensionsExtension;
use Nette\DI\Statement;

class SoftExtensionsExtension extends ExtensionsExtension {

	public function loadConfiguration() {
		$extensions = $this->compiler->getExtensions();
		$prepare = [];
		foreach ($this->getConfig() as $name => $class) {
			if (isset($extensions[$name])) {
				continue;
			}
			if ($class === FALSE) {
				if (isset($prepare[$name])) {
					unset($prepare[$name]);
				}
				continue;
			}
			if ($class instanceof Statement) {
				if (class_exists($class->getEntity())) {
					$rc = new \ReflectionClass($class->getEntity());
					$prepare[$name] = $rc->newInstanceArgs($class->arguments);
				}
			} else {
				if (class_exists($class)) {
					$prepare[$name] = new $class;
				}
			}
		}

		foreach ($prepare as $name => $class) {
			$this->compiler->addExtension($name, $class);
		}
	}

}

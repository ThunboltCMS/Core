<?php

namespace Entity;

use Nette\Utils\ObjectMixin;

class Container {

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function __get($name) {
		return ObjectMixin::get($this, $name);
	}

}

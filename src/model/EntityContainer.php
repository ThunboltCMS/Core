<?php

namespace Thunbolt\Model;

use Nette\Utils\ObjectMixin;

class EntityContainer {

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function __get($name) {
		return ObjectMixin::get($this, $name);
	}

}

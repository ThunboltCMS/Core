<?php

namespace Model;

use Nette\Utils\ObjectMixin;

/** @deprecated */
class_alias('Model\EntityContainer', 'Entity\Container');

class EntityContainer {

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function __get($name) {
		return ObjectMixin::get($this, $name);
	}

}

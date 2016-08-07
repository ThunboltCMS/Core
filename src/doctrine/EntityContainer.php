<?php

namespace Model;

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

/** @deprecated */
class_alias(EntityContainer::class, 'Entity\Container');

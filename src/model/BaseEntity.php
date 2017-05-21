<?php

declare(strict_types=1);

namespace Thunbolt\Model;

use Nette\Utils\ObjectMixin;

abstract class BaseEntity {

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function __get(string $name) {
		return ObjectMixin::get($this, $name);
	}

}

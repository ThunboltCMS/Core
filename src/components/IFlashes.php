<?php

declare(strict_types=1);

namespace Thunbolt\Components;

interface IFlashes {

	public function flashMessage(string $message, string $type = 'success'): \stdClass;

}

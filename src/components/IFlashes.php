<?php

namespace Thunbolt\Components;

interface IFlashes {

	/**
	 * @param string $message
	 * @param string $type
	 * @return \stdClass
	 */
	public function flashMessage($message, $type = 'success');

}

<?php

namespace Thunbolt\Components;

use Nette\Application\Application;

class Flashes implements IFlashes {

	/** @var Application */
	private $application;

	/**
	 * @param Application $application
	 */
	public function __construct(Application $application) {
		$this->application = $application;
	}

	/**
	 * @param string $message
	 * @param string $type
	 * @return \stdClass
	 */
	public function flashMessage($message, $type = 'success') {
		return $this->application->getPresenter()->flashMessage($message, $type);
	}

}

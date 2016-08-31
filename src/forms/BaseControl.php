<?php

namespace Thunbolt\Forms;

use Kdyby\Doctrine\EntityManager;
use Thunbolt\Components\Flashes;
use WebChemistry\Forms\Control;

abstract class BaseControl extends Control {

	/** @var EntityManager */
	protected $em;

	/** @var Flashes */
	private $flashes;

	public function __construct(FormCase $formCase) {
		parent::__construct($formCase->getFactory());

		$this->flashes = $formCase->getFlashes();
		$this->em = $formCase->getEntityManager();
	}

	/**
	 * @param string $message
	 * @param string $type
	 * @return \stdClass
	 */
	public function flashMessage($message, $type = 'success') {
		return $this->flashes->flashMessage($message, $type);
	}

}

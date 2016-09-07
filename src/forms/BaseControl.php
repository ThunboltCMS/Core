<?php

namespace Thunbolt\Forms;

use Kdyby\Doctrine\EntityManager;
use Thunbolt\Components\IFlashes;
use WebChemistry\Forms\Control;

abstract class BaseControl extends Control {

	/** @var EntityManager */
	protected $em;

	/** @var IFlashes */
	private $flashes;

	public function __construct(FormArgs $formArgs) {
		parent::__construct($formArgs->getFactory());

		$this->flashes = $formArgs->getFlashes();
		$this->em = $formArgs->getEntityManager();
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

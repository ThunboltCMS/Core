<?php

namespace Thunbolt\Forms;

use Kdyby\Doctrine\EntityManager;
use WebChemistry\Forms\Control;

class BaseControl extends Control {

	/** @var EntityManager */
	protected $em;

	public function __construct(FormCase $formCase) {
		parent::__construct($formCase->getFactory());

		$this->em = $formCase->getEntityManager();
	}

	/**
	 * @param string $message
	 * @param string $type
	 * @return \stdClass
	 */
	public function flashMessage($message, $type = 'success') {
		return parent::flashMessage($message, $type);
	}

}

<?php

declare(strict_types=1);

namespace Thunbolt\Forms;

use Kdyby\Doctrine\EntityManager;
use Thunbolt\Components\IFlashes;
use WebChemistry\Forms\Control;

abstract class BaseForm extends Control {

	/** @var EntityManager */
	protected $em;

	/** @var IFlashes */
	private $flashes;

	public function __construct(FormArgs $formArgs) {
		parent::__construct($formArgs->getFactory());

		$this->flashes = $formArgs->getFlashes();
		$this->em = $formArgs->getEntityManager();
	}

	public function flashMessage(string $message, string $type = 'success'): \stdClass {
		return $this->flashes->flashMessage($message, $type);
	}

}

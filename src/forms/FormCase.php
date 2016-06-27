<?php

namespace Thunbolt\Forms;

use Kdyby\Doctrine\EntityManager;
use Thunbolt\Components\Flashes;
use WebChemistry\Forms\Factory\IFormContainer;

class FormCase {

	/** @var IFormContainer */
	private $container;

	/** @var EntityManager */
	private $entityManager;

	/** @var Flashes */
	private $flashes;

	/**
	 * @param IFormContainer $container
	 * @param EntityManager $entityManager
	 */
	public function __construct(IFormContainer $container, EntityManager $entityManager, Flashes $flashes) {
		$this->container = $container;
		$this->entityManager = $entityManager;
		$this->flashes = $flashes;
	}

	/**
	 * @return Flashes
	 */
	public function getFlashes() {
		return $this->flashes;
	}

	/**
	 * @return IFormContainer
	 */
	public function getFactory() {
		return $this->container;
	}

	/**
	 * @return EntityManager
	 */
	public function getEntityManager() {
		return $this->entityManager;
	}

}

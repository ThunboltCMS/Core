<?php

namespace Thunbolt\Forms;

use Kdyby\Doctrine\EntityManager;
use Thunbolt\Components\IFlashes;
use WebChemistry\Forms\Factory\IFormFactory;

class FormArgs {

	/** @var IFormFactory */
	private $container;

	/** @var EntityManager */
	private $entityManager;

	/** @var IFlashes */
	private $flashes;

	/**
	 * @param IFormFactory $container
	 * @param EntityManager $entityManager
	 */
	public function __construct(IFormFactory $container, EntityManager $entityManager, IFlashes $flashes) {
		$this->container = $container;
		$this->entityManager = $entityManager;
		$this->flashes = $flashes;
	}

	/**
	 * @return IFlashes
	 */
	public function getFlashes() {
		return $this->flashes;
	}

	/**
	 * @return IFormFactory
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

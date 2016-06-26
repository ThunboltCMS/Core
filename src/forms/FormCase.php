<?php

namespace Thunbolt\Forms;

use Kdyby\Doctrine\EntityManager;
use WebChemistry\Forms\Factory\IFormContainer;

class FormCase {

	/** @var IFormContainer */
	private $container;

	/** @var EntityManager */
	private $entityManager;

	/**
	 * @param IFormContainer $container
	 * @param EntityManager $entityManager
	 */
	public function __construct(IFormContainer $container, EntityManager $entityManager) {
		$this->container = $container;
		$this->entityManager = $entityManager;
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

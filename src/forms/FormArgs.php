<?php

declare(strict_types=1);

namespace Thunbolt\Forms;

use Kdyby\Doctrine\EntityManager;
use Thunbolt\Components\IFlashes;
use WebChemistry\Forms\Factory\IFormFactory;

/**
 * @internal
 */
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

	public function getFlashes(): IFlashes {
		return $this->flashes;
	}

	public function getFactory(): IFormFactory {
		return $this->container;
	}

	public function getEntityManager(): EntityManager {
		return $this->entityManager;
	}

}

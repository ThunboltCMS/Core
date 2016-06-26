<?php

namespace Repository;

use Kdyby\Doctrine\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class Container extends EntityRepository {

	/** @var \WebChemistry\Forms\Doctrine */
	protected $_converter;

	public function __construct($em, ClassMetadata $class) {
		parent::__construct($em, $class);

		$this->_converter = new \WebChemistry\Forms\Doctrine($em);
	}

}

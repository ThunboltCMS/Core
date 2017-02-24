<?php

namespace Thunbolt\Model;

use Kdyby\Doctrine\EntityRepository;
use WebChemistry\Forms\Doctrine\TBaseRepository;
use WebChemistry\Forms\Doctrine;
use WebChemistry\Forms\Doctrine\Settings;

abstract class BaseRepository extends EntityRepository {

	/** @var Doctrine */
	private $converter;

	/**
	 * @throws \Exception
	 * @return Doctrine
	 */
	protected function getConverter() {
		if (!$this->converter) {
			if (!class_exists(Doctrine::class)) {
				throw new \Exception(Doctrine::class . ' class not exists.');
			}
			$this->converter = new Doctrine($this->_em);
		}

		return $this->converter;
	}

	/**
	 * @param array $values
	 * @param Settings $settings
	 * @param string $defaultEntity
	 * @return object
	 */
	protected function convertToEntity(array $values, $defaultEntity = NULL, Settings $settings = NULL) {
		return $this->getConverter()->toEntity($defaultEntity ?: $this->getEntityName(), $values, $settings);
	}

	/**
	 * @param object $entity
	 * @param Settings $settings
	 * @return array
	 */
	protected function convertToArray($entity, Settings $settings = NULL) {
		return $this->getConverter()->toArray($entity, $settings);
	}

}

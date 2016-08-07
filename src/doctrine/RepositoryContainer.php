<?php

namespace Model;

use Kdyby\Doctrine\EntityRepository;
use WebChemistry\Forms\Doctrine\TBaseRepository;

class RepositoryContainer extends EntityRepository {

	use TBaseRepository;

}

/** @deprecated */
class_alias(RepositoryContainer::class, 'Repository\Container');

<?php

namespace Model;

use Kdyby\Doctrine\EntityRepository;
use WebChemistry\Forms\Doctrine\TBaseRepository;

/** @deprecated */
class_alias('Model\RepositoryContainer', 'Repository\Container');

class RepositoryContainer extends EntityRepository {

	use TBaseRepository;

}

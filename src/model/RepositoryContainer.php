<?php

namespace Thunbolt\Model;

use Kdyby\Doctrine\EntityRepository;
use WebChemistry\Forms\Doctrine\TBaseRepository;

class RepositoryContainer extends EntityRepository {

	use TBaseRepository;

}

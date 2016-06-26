<?php

namespace Thunbolt\User;

use Kdyby\Doctrine\EntityManager;
use Nette\Security\IAuthenticator;
use Nette\Security;
use Thunbolt\User\Interfaces\IRepository;

class Authenticator implements IAuthenticator {

	/** @var EntityManager */
	private $em;

	/** @var string */
	private $repository;

	/**
	 * @param EntityManager $em
	 * @param string $repository
	 */
	public function __construct(EntityManager $em, $repository) {
		$this->em = $em;
		$this->repository = $repository;
	}

	/**
	 * Performs an authentication.
	 *
	 * @param array $credentials
	 * @return Security\Identity
	 * @throws \Exception
	 * @throws Security\AuthenticationException
	 */
	public function authenticate(array $credentials) {
		list($email, $password) = $credentials;

		$repository = $this->em->getRepository($this->repository);
		if (!$repository instanceof IRepository) {
			throw new \Exception('Repository must be instace of WebChemistry\User\Interfaces\IRepository');
		}

		$row = $repository->login($email);

		if (!$row) {
			throw new Security\AuthenticationException('core.user.notExists', self::IDENTITY_NOT_FOUND);
		} elseif (!Security\Passwords::verify($password, $row->getPassword())) {
			throw new Security\AuthenticationException('core.user.wrongPassword', self::INVALID_CREDENTIAL);
		} elseif (Security\Passwords::needsRehash($row->getPassword())) {
			$row->setPassword($password);
			$this->em->merge($row);
			$this->em->flush();
		}

		return new Identity($row->getId(), $row);
	}

}

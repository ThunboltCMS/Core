<?php

namespace Thunbolt\Routing;

use Nette;
use	Nette\Application\Routers\Route;
use Nette\Utils\Strings;
use WebChemistry\Routing\IRouter;
use WebChemistry\Routing\RouteManager;

class Router implements IRouter {

	/**
	 * @param RouteManager $routeManager
	 */
	public function createRouter(RouteManager $routeManager) {
		$routeManager->addStyle('name');
		$routeManager->setStyleProperty('name', Route::FILTER_OUT, function($url) {
			return Strings::webalize($url);
		});
		$routeManager->setStyleProperty('name', Route::FILTER_IN, function($url) {
			return Strings::webalize($url);
		});

		// Front
		$front = $routeManager->getModule('Front');
		$front[] = new Route('<presenter>[/<action>][/<id [0-9]+>[-<name [0-9a-zA-Z\-]+>]]', [
			'presenter' => 'Homepage',
			'action' => 'default'
		]);

	}

}

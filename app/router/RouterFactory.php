<?php

use Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList();
		$router[] = new Route('index.php', 'Homepage:default', Route::ONE_WAY);
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		
		$router[] = new Route('admin/<presenter>/<action>[/<id>]', array(
				'module' => 'Admin',
				'presenter' => 'Base',
				'action' => 'default',
			));
			/*$router[] = new Route('byty/<presenter>/<action>[/<id>]', array(
				'module' => 'Byty',
				'presenter' => 'Homepage',
				'action' => 'default',
			)); */
		return $router;
	}

}

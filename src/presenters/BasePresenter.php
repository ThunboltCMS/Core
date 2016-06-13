<?php

namespace Thunbolt\Presenters;

use Thunbolt\Application\Presenter;

abstract class BasePresenter extends Presenter {

	protected function beforeRender() {
		parent::beforeRender();

		if ($this->isAjax()) {
			$this->redrawControl('flashes');
		}
	}

}

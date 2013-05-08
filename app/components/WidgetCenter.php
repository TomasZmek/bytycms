<?php

namespace Byty;
use Nette;

class WidgetCenter extends Nette\Application\UI\Control
{
	private $selected;
	
	public function __construct(Nette\Database\Table\Selection $selected)
	{
		parent::__construct();
		$this->selected = $selected;
	}
	
	public function render()
	{
		$this->template->setFile(__DIR__.'\WidgetCenter.latte');
		$this->template->pages = $this->selected;
		$this->template->render();
	}
}
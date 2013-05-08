<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
	private $newsRepository;
	private $pagesRepository;
	protected function startup()
	{
		parent::startup();
		$this->newsRepository = $this->context->newsRepository;
		$this->pagesRepository = $this->context->pagesRepository;
	}
	public function renderDefault()
	{
		$this->template->news = $this->newsRepository->getAllNews();
		
	}
	public function createComponentWidgetLeft()
	{
		return new Byty\WidgetLeft($this->pagesRepository->getPagesLeft());
	}
	
	public function createComponentWidgetCenter()
	{
		return new Byty\WidgetCenter($this->pagesRepository->getPagesCenter());
	}
	
}

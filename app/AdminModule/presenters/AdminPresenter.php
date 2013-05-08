<?php
use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;
/**
 * Homepage presenter.
 */
class AdminPresenter extends BasePresenter
{
	  /** @persistent */
    public $backlink;


    /**
     * Login form factory
     * @return Nette\Application\UI\Form
     */
	protected function createComponentLoginForm()
    {
        $form = new Form;
        $form->addText('name', 'Name:')
            ->addRule(Form::FILLED, 'Enter login');
        $form->addPassword('password', 'Password:')
            ->addRule(Form::FILLED, 'Enter password');
        $form->addSubmit('send', 'Log in');

        $form->onSuccess[] = $this->processLoginForm;
        return $form;
    }


    /**
     * Process login form and login user
     * @param Nette\Application\UI\Form
     */
    public function processLoginForm(Form $form)
    {
        $values = $form->getValues(TRUE);
        try {
            $this->user->login($values['name'], $values['password']);
            $this->restoreRequest($this->backlink);
            $this->redirect('Admin:default');

        } catch (AuthenticationException $e) {
            $form->addError($e->getMessage());
        }
    }
	
	public function handleLogOut()
 	{
    	$this->getUser()->logout();
  		$this->redirect('Admin:auth');
 	}
}

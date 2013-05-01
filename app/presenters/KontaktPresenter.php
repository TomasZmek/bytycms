<?php
/**
 * Kontakt
 */
 use Nette\Application\UI\Form;
 use Nette\Mail\Message;
 class KontaktPresenter extends BasePresenter
 {
 	// Kontaktni formular
 	protected function createComponentContactForm()
	{
		$form = new Form;
		$form->addText('name', 'Jméno:')
			->addRule(Form::FILLED, 'Zadejte jméno');
		$form->addText('email', 'E-mail:')
			->addRule(Form::FILLED, 'Zadejte e-mail')
			->addRule(Form::EMAIL, 'Email nemá správný formát');
		$form->addText('phone', 'Telefon:')
			->addRule(Form::FILLED, 'Zadejte své telefonní číslo');
		$form->addTextarea('message', 'Zpráva')
			->addRule(Form::FILLED, 'Zadejte zprávu');
		$form->addSubmit('send', 'Odeslat');
		
		$form->onSuccess[] = $this->processContactForm;
		
		return $form;
	}
	
	public function processContactForm(Form $form)
	{
		$values = $form->getValues(TRUE);
		
		$message = new Message;
		$message->addTo('perteus@gmail.com')
				->setFrom($values['email'])
				->setSubject('Zpráva z kontaktního formuláře - Pronájem bytů');
				
		$template = $this->createTemplate();
		$template->setFile(__DIR__.'/../templates/Kontakt/email.latte');
		$template->title = 'Zpráva z kontaktního formuláře - Pronájem bytů';
		$template->values = $values;
		
		$message	->setHtmlBody($template)
				->send();
				
				$this->FlashMessage('Zpráva byla odeslána');
				$this->redirect('this');				
	}
 }

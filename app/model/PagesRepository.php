<?php
namespace Byty;
use Nette;
class PagesRepository
{
	private $database;

	public function __construct(Nette\Database\Connection $database) {
		$this->database = $database;
	}
	public function getAllPages() {  //všechny stránky
		return $this->database->table('pages');
	}
	// Vytažení z databáze ty stránky, co jsou určeny pro widget left, center, right. Pokud je 0 nebude
	// stranka určena pro widget.
	public function getPagesLeft()
	{
		return $this->database->table('pages')->where('x=?',1);
	}
	public function getPagesCenter()
	{
		return $this->database->table('pages')->where('x=?',2);
	}
	public function getPagesRight()
	{
		return $this->database->table('pages')->where('x=?',3);
	}
	// nová stránka
	public function newPages($title, $body, $x) {
		$data = array(
			'title' => $title,
			'body' => $body,
			'x'=> $x,
			'date' => new \DateTime(),
		);
	
	// ulozit stranku
	$news = $this->database->table('pages')->insert($data);
	}
	
}
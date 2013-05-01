<?php
namespace Byty;
use Nette;
class PagesRepository
{
	private $database;

	public function __construct(Nette\Database\Connection $database) {
		$this->database = $database;
	}
	public function getAllPages() {
		return $this->database->table('pages');
	}
	
	public function getPagesLeft()
	{
		return $this->database->table('pages')->where('x=?',1);
	}
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
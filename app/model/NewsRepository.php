<?php
namespace Byty;
use Nette;
class NewsRepository
{
	private $database;

	public function __construct(Nette\Database\Connection $database) {
		$this->database = $database;
	}
	public function getAllNews() {
		return $this->database->table('news')->order('date DESC');
	}
	public function newNews($title, $body) {
		$data = array(
			'title' => $title,
			'body' => $body,
			'date' => new \DateTime(),
		);
	
	// ulozit novinku
	$news = $this->database->table('news')->insert($data);
	}
	
}

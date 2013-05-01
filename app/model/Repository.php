<?php
namespace Byty;
use Nette;

abstract class Repository extends Nette\Object
{
	
	protected $connection;
	public function __construct(Nette\Database\Connection $db)
	{
		$this->connection = $db;
	}
	
	/*protected function getTable()
	{
		preg_match('#(\w+)Repositorz$#', get_class($this), $m);
		return $this->connection->table(lcfirst($m[1]));
	}
	
	public function getAll()
	{
		return $this->getTable();
	}*/
}
<?php



class GuestMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GuestMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('guest');
		$tMap->setPhpName('Guest');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('guest_SEQ');

		$tMap->addForeignKey('ETIME_ID', 'EtimeId', 'int', CreoleTypes::INTEGER, 'etime', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
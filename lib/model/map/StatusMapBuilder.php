<?php



class StatusMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.StatusMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('status');
		$tMap->setPhpName('Status');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('status_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 16);

	} 
} 
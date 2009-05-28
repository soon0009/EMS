<?php



class AudienceMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AudienceMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('audience');
		$tMap->setPhpName('Audience');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('audience_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 
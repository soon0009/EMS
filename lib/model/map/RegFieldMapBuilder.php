<?php



class RegFieldMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RegFieldMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('reg_field');
		$tMap->setPhpName('RegField');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('reg_field_SEQ');

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('LABEL', 'Label', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
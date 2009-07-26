<?php



class PersonTypeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PersonTypeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('person_type');
		$tMap->setPhpName('PersonType');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('person_type_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 100);

	} 
} 
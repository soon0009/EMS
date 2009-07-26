<?php



class EtimePeopleMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EtimePeopleMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('etime_people');
		$tMap->setPhpName('EtimePeople');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('etime_people_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ETIME_ID', 'EtimeId', 'int', CreoleTypes::INTEGER, 'etime', 'ID', true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PHONE', 'Phone', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addForeignKey('PERSON_TYPE_ID', 'PersonTypeId', 'int', CreoleTypes::INTEGER, 'person_type', 'ID', false, null);

	} 
} 
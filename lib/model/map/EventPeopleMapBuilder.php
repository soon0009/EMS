<?php



class EventPeopleMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EventPeopleMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('event_people');
		$tMap->setPhpName('EventPeople');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('event_people_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('EVENT_ID', 'EventId', 'int', CreoleTypes::INTEGER, 'event', 'ID', true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PHONE', 'Phone', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addForeignKey('PERSON_TYPE_ID', 'PersonTypeId', 'int', CreoleTypes::INTEGER, 'person_type', 'ID', false, null);

	} 
} 
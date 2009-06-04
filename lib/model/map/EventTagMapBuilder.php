<?php



class EventTagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EventTagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('event_tag');
		$tMap->setPhpName('EventTag');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('EVENT_ID', 'EventId', 'int' , CreoleTypes::INTEGER, 'event', 'ID', true, null);

		$tMap->addForeignPrimaryKey('TAG_ID', 'TagId', 'int' , CreoleTypes::INTEGER, 'tag', 'ID', true, null);

	} 
} 
<?php



class EtimeRsvpMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EtimeRsvpMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('etime_rsvp_key');
		$tMap->setPhpName('EtimeRsvp');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ETIME_ID', 'EtimeId', 'int' , CreoleTypes::INTEGER, 'etime', 'ID', true, null);

		$tMap->addForeignPrimaryKey('RSVP_ID', 'RsvpId', 'int' , CreoleTypes::INTEGER, 'rsvp', 'ID', true, null);

	} 
} 
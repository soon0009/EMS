<?php



class EtimeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EtimeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('etime');
		$tMap->setPhpName('Etime');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('etime_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('EVENT_ID', 'EventId', 'int', CreoleTypes::INTEGER, 'event', 'ID', true, null);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('START_DATE', 'StartDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('END_DATE', 'EndDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('START_TIME', 'StartTime', 'int', CreoleTypes::TIME, false, null);

		$tMap->addColumn('END_TIME', 'EndTime', 'int', CreoleTypes::TIME, false, null);

		$tMap->addColumn('ALL_DAY', 'AllDay', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('NOTES', 'Notes', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CAPACITY', 'Capacity', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('HAS_FEE', 'HasFee', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('ORGANISER', 'Organiser', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('INTERESTED_PARTIES', 'InterestedParties', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
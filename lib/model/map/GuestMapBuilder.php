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

		$tMap->addColumn('ATTENDING', 'Attending', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('REG_DATE', 'RegDate', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('EXTRA_INFO', 'ExtraInfo', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
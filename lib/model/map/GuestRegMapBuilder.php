<?php



class GuestRegMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GuestRegMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('guest_reg');
		$tMap->setPhpName('GuestReg');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('GUEST_ID', 'GuestId', 'int' , CreoleTypes::INTEGER, 'guest', 'ID', true, null);

		$tMap->addForeignPrimaryKey('REG_FIELD_ID', 'RegFieldId', 'int' , CreoleTypes::INTEGER, 'reg_field', 'ID', true, null);

		$tMap->addColumn('VALUE', 'Value', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} 
} 
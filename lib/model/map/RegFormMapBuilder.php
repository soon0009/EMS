<?php



class RegFormMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RegFormMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('reg_form');
		$tMap->setPhpName('RegForm');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('EVENT_ID', 'EventId', 'int' , CreoleTypes::INTEGER, 'event', 'ID', true, null);

		$tMap->addForeignPrimaryKey('REG_FIELD_ID', 'RegFieldId', 'int' , CreoleTypes::INTEGER, 'reg_field', 'ID', true, null);

		$tMap->addColumn('FIELD_ORDER', 'FieldOrder', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 
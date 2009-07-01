<?php



class AdditionalGuestMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AdditionalGuestMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('additional_guest');
		$tMap->setPhpName('AdditionalGuest');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('PARENT_GUEST_ID', 'ParentGuestId', 'int' , CreoleTypes::INTEGER, 'guest', 'ID', true, null);

		$tMap->addForeignPrimaryKey('CHILD_GUEST_ID', 'ChildGuestId', 'int' , CreoleTypes::INTEGER, 'guest', 'ID', true, null);

	} 
} 
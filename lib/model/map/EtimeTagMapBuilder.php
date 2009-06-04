<?php



class EtimeTagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EtimeTagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('etime_tag');
		$tMap->setPhpName('EtimeTag');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ETIME_ID', 'EtimeId', 'int' , CreoleTypes::INTEGER, 'etime', 'ID', true, null);

		$tMap->addForeignPrimaryKey('TAG_ID', 'TagId', 'int' , CreoleTypes::INTEGER, 'tag', 'ID', true, null);

	} 
} 
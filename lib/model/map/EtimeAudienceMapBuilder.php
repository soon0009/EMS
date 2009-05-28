<?php



class EtimeAudienceMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EtimeAudienceMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('etime_audience_key');
		$tMap->setPhpName('EtimeAudience');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ETIME_ID', 'EtimeId', 'int' , CreoleTypes::INTEGER, 'etime', 'ID', true, null);

		$tMap->addForeignPrimaryKey('AUDIENCE_ID', 'AudienceId', 'int' , CreoleTypes::INTEGER, 'audience', 'ID', true, null);

	} 
} 
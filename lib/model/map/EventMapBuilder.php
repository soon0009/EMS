<?php



class EventMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EventMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('event');
		$tMap->setPhpName('Event');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('event_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('SLUG', 'Slug', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addForeignKey('STATUS_ID', 'StatusId', 'int', CreoleTypes::INTEGER, 'status', 'ID', false, null);

		$tMap->addForeignKey('CATEGORY_ID', 'CategoryId', 'int', CreoleTypes::INTEGER, 'category', 'ID', false, null);

		$tMap->addColumn('PUBLISHED', 'Published', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('MEDIA_POTENTIAL', 'MediaPotential', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('NOTES', 'Notes', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('IMAGE_URL', 'ImageUrl', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ORGANISER', 'Organiser', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('INTERESTED_PARTIES', 'InterestedParties', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
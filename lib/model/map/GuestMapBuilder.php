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

		$tMap->addColumn('PAID', 'Paid', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('REG_DATE', 'RegDate', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('EXTRA_INFO', 'ExtraInfo', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FIRSTNAME', 'Firstname', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LASTNAME', 'Lastname', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PREFERRED_NAME', 'PreferredName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PHONE', 'Phone', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MOBILE', 'Mobile', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PRIMARY_ADDRESS_LINE_1', 'PrimaryAddressLine1', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PRIMARY_ADDRESS_LINE_2', 'PrimaryAddressLine2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PRIMARY_ADDRESS_LINE_3', 'PrimaryAddressLine3', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PRIMARY_ADDRESS_CITY', 'PrimaryAddressCity', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PRIMARY_ADDRESS_POSTCODE', 'PrimaryAddressPostcode', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PRIMARY_ADDRESS_STATE', 'PrimaryAddressState', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PRIMARY_ADDRESS_COUNTRY', 'PrimaryAddressCountry', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SECONDARY_ADDRESS_LINE_1', 'SecondaryAddressLine1', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SECONDARY_ADDRESS_LINE_2', 'SecondaryAddressLine2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SECONDARY_ADDRESS_LINE_3', 'SecondaryAddressLine3', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SECONDARY_ADDRESS_CITY', 'SecondaryAddressCity', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SECONDARY_ADDRESS_POSTCODE', 'SecondaryAddressPostcode', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SECONDARY_ADDRESS_STATE', 'SecondaryAddressState', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SECONDARY_ADDRESS_COUNTRY', 'SecondaryAddressCountry', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SPECIAL_REQ', 'SpecialReq', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('POSITION', 'Position', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PRESENTER', 'Presenter', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SRN', 'Srn', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FAN', 'Fan', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('AOU', 'Aou', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
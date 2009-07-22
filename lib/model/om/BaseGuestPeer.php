<?php


abstract class BaseGuestPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'guest';

	
	const CLASS_DEFAULT = 'lib.model.Guest';

	
	const NUM_COLUMNS = 35;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ETIME_ID = 'guest.ETIME_ID';

	
	const ATTENDING = 'guest.ATTENDING';

	
	const PAID = 'guest.PAID';

	
	const REG_DATE = 'guest.REG_DATE';

	
	const EXTRA_INFO = 'guest.EXTRA_INFO';

	
	const CREATED_AT = 'guest.CREATED_AT';

	
	const UPDATED_AT = 'guest.UPDATED_AT';

	
	const TITLE = 'guest.TITLE';

	
	const FIRSTNAME = 'guest.FIRSTNAME';

	
	const LASTNAME = 'guest.LASTNAME';

	
	const PREFERRED_NAME = 'guest.PREFERRED_NAME';

	
	const EMAIL = 'guest.EMAIL';

	
	const PHONE = 'guest.PHONE';

	
	const MOBILE = 'guest.MOBILE';

	
	const PRIMARY_ADDRESS_LINE_1 = 'guest.PRIMARY_ADDRESS_LINE_1';

	
	const PRIMARY_ADDRESS_LINE_2 = 'guest.PRIMARY_ADDRESS_LINE_2';

	
	const PRIMARY_ADDRESS_LINE_3 = 'guest.PRIMARY_ADDRESS_LINE_3';

	
	const PRIMARY_ADDRESS_CITY = 'guest.PRIMARY_ADDRESS_CITY';

	
	const PRIMARY_ADDRESS_POSTCODE = 'guest.PRIMARY_ADDRESS_POSTCODE';

	
	const PRIMARY_ADDRESS_STATE = 'guest.PRIMARY_ADDRESS_STATE';

	
	const PRIMARY_ADDRESS_COUNTRY = 'guest.PRIMARY_ADDRESS_COUNTRY';

	
	const SECONDARY_ADDRESS_LINE_1 = 'guest.SECONDARY_ADDRESS_LINE_1';

	
	const SECONDARY_ADDRESS_LINE_2 = 'guest.SECONDARY_ADDRESS_LINE_2';

	
	const SECONDARY_ADDRESS_LINE_3 = 'guest.SECONDARY_ADDRESS_LINE_3';

	
	const SECONDARY_ADDRESS_CITY = 'guest.SECONDARY_ADDRESS_CITY';

	
	const SECONDARY_ADDRESS_POSTCODE = 'guest.SECONDARY_ADDRESS_POSTCODE';

	
	const SECONDARY_ADDRESS_STATE = 'guest.SECONDARY_ADDRESS_STATE';

	
	const SECONDARY_ADDRESS_COUNTRY = 'guest.SECONDARY_ADDRESS_COUNTRY';

	
	const SPECIAL_REQ = 'guest.SPECIAL_REQ';

	
	const POSITION = 'guest.POSITION';

	
	const COMPANY = 'guest.COMPANY';

	
	const SRN = 'guest.SRN';

	
	const FAN = 'guest.FAN';

	
	const AOU = 'guest.AOU';

	
	const ID = 'guest.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('EtimeId', 'Attending', 'Paid', 'RegDate', 'ExtraInfo', 'CreatedAt', 'UpdatedAt', 'Title', 'Firstname', 'Lastname', 'PreferredName', 'Email', 'Phone', 'Mobile', 'PrimaryAddressLine1', 'PrimaryAddressLine2', 'PrimaryAddressLine3', 'PrimaryAddressCity', 'PrimaryAddressPostcode', 'PrimaryAddressState', 'PrimaryAddressCountry', 'SecondaryAddressLine1', 'SecondaryAddressLine2', 'SecondaryAddressLine3', 'SecondaryAddressCity', 'SecondaryAddressPostcode', 'SecondaryAddressState', 'SecondaryAddressCountry', 'SpecialReq', 'Position', 'Company', 'Srn', 'Fan', 'Aou', 'Id', ),
		BasePeer::TYPE_COLNAME => array (GuestPeer::ETIME_ID, GuestPeer::ATTENDING, GuestPeer::PAID, GuestPeer::REG_DATE, GuestPeer::EXTRA_INFO, GuestPeer::CREATED_AT, GuestPeer::UPDATED_AT, GuestPeer::TITLE, GuestPeer::FIRSTNAME, GuestPeer::LASTNAME, GuestPeer::PREFERRED_NAME, GuestPeer::EMAIL, GuestPeer::PHONE, GuestPeer::MOBILE, GuestPeer::PRIMARY_ADDRESS_LINE_1, GuestPeer::PRIMARY_ADDRESS_LINE_2, GuestPeer::PRIMARY_ADDRESS_LINE_3, GuestPeer::PRIMARY_ADDRESS_CITY, GuestPeer::PRIMARY_ADDRESS_POSTCODE, GuestPeer::PRIMARY_ADDRESS_STATE, GuestPeer::PRIMARY_ADDRESS_COUNTRY, GuestPeer::SECONDARY_ADDRESS_LINE_1, GuestPeer::SECONDARY_ADDRESS_LINE_2, GuestPeer::SECONDARY_ADDRESS_LINE_3, GuestPeer::SECONDARY_ADDRESS_CITY, GuestPeer::SECONDARY_ADDRESS_POSTCODE, GuestPeer::SECONDARY_ADDRESS_STATE, GuestPeer::SECONDARY_ADDRESS_COUNTRY, GuestPeer::SPECIAL_REQ, GuestPeer::POSITION, GuestPeer::COMPANY, GuestPeer::SRN, GuestPeer::FAN, GuestPeer::AOU, GuestPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('etime_id', 'attending', 'paid', 'reg_date', 'extra_info', 'created_at', 'updated_at', 'title', 'firstname', 'lastname', 'preferred_name', 'email', 'phone', 'mobile', 'primary_address_line_1', 'primary_address_line_2', 'primary_address_line_3', 'primary_address_city', 'primary_address_postcode', 'primary_address_state', 'primary_address_country', 'secondary_address_line_1', 'secondary_address_line_2', 'secondary_address_line_3', 'secondary_address_city', 'secondary_address_postcode', 'secondary_address_state', 'secondary_address_country', 'special_req', 'position', 'company', 'srn', 'fan', 'aou', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('EtimeId' => 0, 'Attending' => 1, 'Paid' => 2, 'RegDate' => 3, 'ExtraInfo' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, 'Title' => 7, 'Firstname' => 8, 'Lastname' => 9, 'PreferredName' => 10, 'Email' => 11, 'Phone' => 12, 'Mobile' => 13, 'PrimaryAddressLine1' => 14, 'PrimaryAddressLine2' => 15, 'PrimaryAddressLine3' => 16, 'PrimaryAddressCity' => 17, 'PrimaryAddressPostcode' => 18, 'PrimaryAddressState' => 19, 'PrimaryAddressCountry' => 20, 'SecondaryAddressLine1' => 21, 'SecondaryAddressLine2' => 22, 'SecondaryAddressLine3' => 23, 'SecondaryAddressCity' => 24, 'SecondaryAddressPostcode' => 25, 'SecondaryAddressState' => 26, 'SecondaryAddressCountry' => 27, 'SpecialReq' => 28, 'Position' => 29, 'Company' => 30, 'Srn' => 31, 'Fan' => 32, 'Aou' => 33, 'Id' => 34, ),
		BasePeer::TYPE_COLNAME => array (GuestPeer::ETIME_ID => 0, GuestPeer::ATTENDING => 1, GuestPeer::PAID => 2, GuestPeer::REG_DATE => 3, GuestPeer::EXTRA_INFO => 4, GuestPeer::CREATED_AT => 5, GuestPeer::UPDATED_AT => 6, GuestPeer::TITLE => 7, GuestPeer::FIRSTNAME => 8, GuestPeer::LASTNAME => 9, GuestPeer::PREFERRED_NAME => 10, GuestPeer::EMAIL => 11, GuestPeer::PHONE => 12, GuestPeer::MOBILE => 13, GuestPeer::PRIMARY_ADDRESS_LINE_1 => 14, GuestPeer::PRIMARY_ADDRESS_LINE_2 => 15, GuestPeer::PRIMARY_ADDRESS_LINE_3 => 16, GuestPeer::PRIMARY_ADDRESS_CITY => 17, GuestPeer::PRIMARY_ADDRESS_POSTCODE => 18, GuestPeer::PRIMARY_ADDRESS_STATE => 19, GuestPeer::PRIMARY_ADDRESS_COUNTRY => 20, GuestPeer::SECONDARY_ADDRESS_LINE_1 => 21, GuestPeer::SECONDARY_ADDRESS_LINE_2 => 22, GuestPeer::SECONDARY_ADDRESS_LINE_3 => 23, GuestPeer::SECONDARY_ADDRESS_CITY => 24, GuestPeer::SECONDARY_ADDRESS_POSTCODE => 25, GuestPeer::SECONDARY_ADDRESS_STATE => 26, GuestPeer::SECONDARY_ADDRESS_COUNTRY => 27, GuestPeer::SPECIAL_REQ => 28, GuestPeer::POSITION => 29, GuestPeer::COMPANY => 30, GuestPeer::SRN => 31, GuestPeer::FAN => 32, GuestPeer::AOU => 33, GuestPeer::ID => 34, ),
		BasePeer::TYPE_FIELDNAME => array ('etime_id' => 0, 'attending' => 1, 'paid' => 2, 'reg_date' => 3, 'extra_info' => 4, 'created_at' => 5, 'updated_at' => 6, 'title' => 7, 'firstname' => 8, 'lastname' => 9, 'preferred_name' => 10, 'email' => 11, 'phone' => 12, 'mobile' => 13, 'primary_address_line_1' => 14, 'primary_address_line_2' => 15, 'primary_address_line_3' => 16, 'primary_address_city' => 17, 'primary_address_postcode' => 18, 'primary_address_state' => 19, 'primary_address_country' => 20, 'secondary_address_line_1' => 21, 'secondary_address_line_2' => 22, 'secondary_address_line_3' => 23, 'secondary_address_city' => 24, 'secondary_address_postcode' => 25, 'secondary_address_state' => 26, 'secondary_address_country' => 27, 'special_req' => 28, 'position' => 29, 'company' => 30, 'srn' => 31, 'fan' => 32, 'aou' => 33, 'id' => 34, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GuestMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GuestMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GuestPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(GuestPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GuestPeer::ETIME_ID);

		$criteria->addSelectColumn(GuestPeer::ATTENDING);

		$criteria->addSelectColumn(GuestPeer::PAID);

		$criteria->addSelectColumn(GuestPeer::REG_DATE);

		$criteria->addSelectColumn(GuestPeer::EXTRA_INFO);

		$criteria->addSelectColumn(GuestPeer::CREATED_AT);

		$criteria->addSelectColumn(GuestPeer::UPDATED_AT);

		$criteria->addSelectColumn(GuestPeer::TITLE);

		$criteria->addSelectColumn(GuestPeer::FIRSTNAME);

		$criteria->addSelectColumn(GuestPeer::LASTNAME);

		$criteria->addSelectColumn(GuestPeer::PREFERRED_NAME);

		$criteria->addSelectColumn(GuestPeer::EMAIL);

		$criteria->addSelectColumn(GuestPeer::PHONE);

		$criteria->addSelectColumn(GuestPeer::MOBILE);

		$criteria->addSelectColumn(GuestPeer::PRIMARY_ADDRESS_LINE_1);

		$criteria->addSelectColumn(GuestPeer::PRIMARY_ADDRESS_LINE_2);

		$criteria->addSelectColumn(GuestPeer::PRIMARY_ADDRESS_LINE_3);

		$criteria->addSelectColumn(GuestPeer::PRIMARY_ADDRESS_CITY);

		$criteria->addSelectColumn(GuestPeer::PRIMARY_ADDRESS_POSTCODE);

		$criteria->addSelectColumn(GuestPeer::PRIMARY_ADDRESS_STATE);

		$criteria->addSelectColumn(GuestPeer::PRIMARY_ADDRESS_COUNTRY);

		$criteria->addSelectColumn(GuestPeer::SECONDARY_ADDRESS_LINE_1);

		$criteria->addSelectColumn(GuestPeer::SECONDARY_ADDRESS_LINE_2);

		$criteria->addSelectColumn(GuestPeer::SECONDARY_ADDRESS_LINE_3);

		$criteria->addSelectColumn(GuestPeer::SECONDARY_ADDRESS_CITY);

		$criteria->addSelectColumn(GuestPeer::SECONDARY_ADDRESS_POSTCODE);

		$criteria->addSelectColumn(GuestPeer::SECONDARY_ADDRESS_STATE);

		$criteria->addSelectColumn(GuestPeer::SECONDARY_ADDRESS_COUNTRY);

		$criteria->addSelectColumn(GuestPeer::SPECIAL_REQ);

		$criteria->addSelectColumn(GuestPeer::POSITION);

		$criteria->addSelectColumn(GuestPeer::COMPANY);

		$criteria->addSelectColumn(GuestPeer::SRN);

		$criteria->addSelectColumn(GuestPeer::FAN);

		$criteria->addSelectColumn(GuestPeer::AOU);

		$criteria->addSelectColumn(GuestPeer::ID);

	}

	const COUNT = 'COUNT(guest.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT guest.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GuestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GuestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GuestPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = GuestPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GuestPeer::populateObjects(GuestPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GuestPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GuestPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinEtime(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GuestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GuestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(GuestPeer::ETIME_ID, EtimePeer::ID);

		$rs = GuestPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinEtime(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		GuestPeer::addSelectColumns($c);
		$startcol = (GuestPeer::NUM_COLUMNS - GuestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EtimePeer::addSelectColumns($c);

		$c->addJoin(GuestPeer::ETIME_ID, EtimePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = GuestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EtimePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEtime(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addGuest($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initGuests();
				$obj2->addGuest($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GuestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GuestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(GuestPeer::ETIME_ID, EtimePeer::ID);

		$rs = GuestPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		GuestPeer::addSelectColumns($c);
		$startcol2 = (GuestPeer::NUM_COLUMNS - GuestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EtimePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EtimePeer::NUM_COLUMNS;

		$c->addJoin(GuestPeer::ETIME_ID, EtimePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = GuestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = EtimePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEtime(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addGuest($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initGuests();
				$obj2->addGuest($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return GuestPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GuestPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(GuestPeer::ID);
			$selectCriteria->add(GuestPeer::ID, $criteria->remove(GuestPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(GuestPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(GuestPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Guest) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GuestPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Guest $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GuestPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GuestPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(GuestPeer::DATABASE_NAME, GuestPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = GuestPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GuestPeer::DATABASE_NAME);

		$criteria->add(GuestPeer::ID, $pk);


		$v = GuestPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(GuestPeer::ID, $pks, Criteria::IN);
			$objs = GuestPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGuestPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GuestMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GuestMapBuilder');
}

<?php


abstract class BaseEtimePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'etime';

	
	const CLASS_DEFAULT = 'lib.model.Etime';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'etime.ID';

	
	const EVENT_ID = 'etime.EVENT_ID';

	
	const TITLE = 'etime.TITLE';

	
	const START_DATE = 'etime.START_DATE';

	
	const END_DATE = 'etime.END_DATE';

	
	const ALL_DAY = 'etime.ALL_DAY';

	
	const LOCATION = 'etime.LOCATION';

	
	const DESCRIPTION = 'etime.DESCRIPTION';

	
	const NOTES = 'etime.NOTES';

	
	const CAPACITY = 'etime.CAPACITY';

	
	const HAS_FEE = 'etime.HAS_FEE';

	
	const AUDIO_VISUAL_SUPPORT = 'etime.AUDIO_VISUAL_SUPPORT';

	
	const ORGANISER = 'etime.ORGANISER';

	
	const INTERESTED_PARTIES = 'etime.INTERESTED_PARTIES';

	
	const UPDATED_AT = 'etime.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EventId', 'Title', 'StartDate', 'EndDate', 'AllDay', 'Location', 'Description', 'Notes', 'Capacity', 'HasFee', 'AudioVisualSupport', 'Organiser', 'InterestedParties', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (EtimePeer::ID, EtimePeer::EVENT_ID, EtimePeer::TITLE, EtimePeer::START_DATE, EtimePeer::END_DATE, EtimePeer::ALL_DAY, EtimePeer::LOCATION, EtimePeer::DESCRIPTION, EtimePeer::NOTES, EtimePeer::CAPACITY, EtimePeer::HAS_FEE, EtimePeer::AUDIO_VISUAL_SUPPORT, EtimePeer::ORGANISER, EtimePeer::INTERESTED_PARTIES, EtimePeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'event_id', 'title', 'start_date', 'end_date', 'all_day', 'location', 'description', 'notes', 'capacity', 'has_fee', 'audio_visual_support', 'organiser', 'interested_parties', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EventId' => 1, 'Title' => 2, 'StartDate' => 3, 'EndDate' => 4, 'AllDay' => 5, 'Location' => 6, 'Description' => 7, 'Notes' => 8, 'Capacity' => 9, 'HasFee' => 10, 'AudioVisualSupport' => 11, 'Organiser' => 12, 'InterestedParties' => 13, 'UpdatedAt' => 14, ),
		BasePeer::TYPE_COLNAME => array (EtimePeer::ID => 0, EtimePeer::EVENT_ID => 1, EtimePeer::TITLE => 2, EtimePeer::START_DATE => 3, EtimePeer::END_DATE => 4, EtimePeer::ALL_DAY => 5, EtimePeer::LOCATION => 6, EtimePeer::DESCRIPTION => 7, EtimePeer::NOTES => 8, EtimePeer::CAPACITY => 9, EtimePeer::HAS_FEE => 10, EtimePeer::AUDIO_VISUAL_SUPPORT => 11, EtimePeer::ORGANISER => 12, EtimePeer::INTERESTED_PARTIES => 13, EtimePeer::UPDATED_AT => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'event_id' => 1, 'title' => 2, 'start_date' => 3, 'end_date' => 4, 'all_day' => 5, 'location' => 6, 'description' => 7, 'notes' => 8, 'capacity' => 9, 'has_fee' => 10, 'audio_visual_support' => 11, 'organiser' => 12, 'interested_parties' => 13, 'updated_at' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EtimeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EtimeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EtimePeer::getTableMap();
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
		return str_replace(EtimePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EtimePeer::ID);

		$criteria->addSelectColumn(EtimePeer::EVENT_ID);

		$criteria->addSelectColumn(EtimePeer::TITLE);

		$criteria->addSelectColumn(EtimePeer::START_DATE);

		$criteria->addSelectColumn(EtimePeer::END_DATE);

		$criteria->addSelectColumn(EtimePeer::ALL_DAY);

		$criteria->addSelectColumn(EtimePeer::LOCATION);

		$criteria->addSelectColumn(EtimePeer::DESCRIPTION);

		$criteria->addSelectColumn(EtimePeer::NOTES);

		$criteria->addSelectColumn(EtimePeer::CAPACITY);

		$criteria->addSelectColumn(EtimePeer::HAS_FEE);

		$criteria->addSelectColumn(EtimePeer::AUDIO_VISUAL_SUPPORT);

		$criteria->addSelectColumn(EtimePeer::ORGANISER);

		$criteria->addSelectColumn(EtimePeer::INTERESTED_PARTIES);

		$criteria->addSelectColumn(EtimePeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(etime.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT etime.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EtimePeer::doSelectRS($criteria, $con);
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
		$objects = EtimePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EtimePeer::populateObjects(EtimePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EtimePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EtimePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinEvent(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimePeer::EVENT_ID, EventPeer::ID);

		$rs = EtimePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinEvent(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EtimePeer::addSelectColumns($c);
		$startcol = (EtimePeer::NUM_COLUMNS - EtimePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EventPeer::addSelectColumns($c);

		$c->addJoin(EtimePeer::EVENT_ID, EventPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EventPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEvent(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEtime($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEtimes();
				$obj2->addEtime($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimePeer::EVENT_ID, EventPeer::ID);

		$rs = EtimePeer::doSelectRS($criteria, $con);
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

		EtimePeer::addSelectColumns($c);
		$startcol2 = (EtimePeer::NUM_COLUMNS - EtimePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EventPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EventPeer::NUM_COLUMNS;

		$c->addJoin(EtimePeer::EVENT_ID, EventPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = EventPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEvent(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEtime($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initEtimes();
				$obj2->addEtime($obj1);
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
		return EtimePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EtimePeer::ID); 

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
			$comparison = $criteria->getComparison(EtimePeer::ID);
			$selectCriteria->add(EtimePeer::ID, $criteria->remove(EtimePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EtimePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EtimePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Etime) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EtimePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Etime $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EtimePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EtimePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EtimePeer::DATABASE_NAME, EtimePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EtimePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EtimePeer::DATABASE_NAME);

		$criteria->add(EtimePeer::ID, $pk);


		$v = EtimePeer::doSelect($criteria, $con);

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
			$criteria->add(EtimePeer::ID, $pks, Criteria::IN);
			$objs = EtimePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEtimePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EtimeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EtimeMapBuilder');
}

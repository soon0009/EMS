<?php


abstract class BaseAdditionalGuestPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'additional_guest';

	
	const CLASS_DEFAULT = 'lib.model.AdditionalGuest';

	
	const NUM_COLUMNS = 2;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PARENT_GUEST_ID = 'additional_guest.PARENT_GUEST_ID';

	
	const CHILD_GUEST_ID = 'additional_guest.CHILD_GUEST_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ParentGuestId', 'ChildGuestId', ),
		BasePeer::TYPE_COLNAME => array (AdditionalGuestPeer::PARENT_GUEST_ID, AdditionalGuestPeer::CHILD_GUEST_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('parent_guest_id', 'child_guest_id', ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ParentGuestId' => 0, 'ChildGuestId' => 1, ),
		BasePeer::TYPE_COLNAME => array (AdditionalGuestPeer::PARENT_GUEST_ID => 0, AdditionalGuestPeer::CHILD_GUEST_ID => 1, ),
		BasePeer::TYPE_FIELDNAME => array ('parent_guest_id' => 0, 'child_guest_id' => 1, ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AdditionalGuestMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AdditionalGuestMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AdditionalGuestPeer::getTableMap();
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
		return str_replace(AdditionalGuestPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AdditionalGuestPeer::PARENT_GUEST_ID);

		$criteria->addSelectColumn(AdditionalGuestPeer::CHILD_GUEST_ID);

	}

	const COUNT = 'COUNT(additional_guest.PARENT_GUEST_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT additional_guest.PARENT_GUEST_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AdditionalGuestPeer::doSelectRS($criteria, $con);
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
		$objects = AdditionalGuestPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AdditionalGuestPeer::populateObjects(AdditionalGuestPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AdditionalGuestPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AdditionalGuestPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinGuestRelatedByParentGuestId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AdditionalGuestPeer::PARENT_GUEST_ID, GuestPeer::ID);

		$rs = AdditionalGuestPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinGuestRelatedByChildGuestId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AdditionalGuestPeer::CHILD_GUEST_ID, GuestPeer::ID);

		$rs = AdditionalGuestPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinGuestRelatedByParentGuestId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AdditionalGuestPeer::addSelectColumns($c);
		$startcol = (AdditionalGuestPeer::NUM_COLUMNS - AdditionalGuestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		GuestPeer::addSelectColumns($c);

		$c->addJoin(AdditionalGuestPeer::PARENT_GUEST_ID, GuestPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AdditionalGuestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = GuestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getGuestRelatedByParentGuestId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAdditionalGuestRelatedByParentGuestId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAdditionalGuestsRelatedByParentGuestId();
				$obj2->addAdditionalGuestRelatedByParentGuestId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinGuestRelatedByChildGuestId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AdditionalGuestPeer::addSelectColumns($c);
		$startcol = (AdditionalGuestPeer::NUM_COLUMNS - AdditionalGuestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		GuestPeer::addSelectColumns($c);

		$c->addJoin(AdditionalGuestPeer::CHILD_GUEST_ID, GuestPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AdditionalGuestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = GuestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getGuestRelatedByChildGuestId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAdditionalGuestRelatedByChildGuestId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAdditionalGuestsRelatedByChildGuestId();
				$obj2->addAdditionalGuestRelatedByChildGuestId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AdditionalGuestPeer::PARENT_GUEST_ID, GuestPeer::ID);

		$criteria->addJoin(AdditionalGuestPeer::CHILD_GUEST_ID, GuestPeer::ID);

		$rs = AdditionalGuestPeer::doSelectRS($criteria, $con);
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

		AdditionalGuestPeer::addSelectColumns($c);
		$startcol2 = (AdditionalGuestPeer::NUM_COLUMNS - AdditionalGuestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		GuestPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + GuestPeer::NUM_COLUMNS;

		GuestPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + GuestPeer::NUM_COLUMNS;

		$c->addJoin(AdditionalGuestPeer::PARENT_GUEST_ID, GuestPeer::ID);

		$c->addJoin(AdditionalGuestPeer::CHILD_GUEST_ID, GuestPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AdditionalGuestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = GuestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getGuestRelatedByParentGuestId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAdditionalGuestRelatedByParentGuestId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAdditionalGuestsRelatedByParentGuestId();
				$obj2->addAdditionalGuestRelatedByParentGuestId($obj1);
			}


					
			$omClass = GuestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getGuestRelatedByChildGuestId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAdditionalGuestRelatedByChildGuestId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAdditionalGuestsRelatedByChildGuestId();
				$obj3->addAdditionalGuestRelatedByChildGuestId($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptGuestRelatedByParentGuestId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AdditionalGuestPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptGuestRelatedByChildGuestId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AdditionalGuestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AdditionalGuestPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptGuestRelatedByParentGuestId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AdditionalGuestPeer::addSelectColumns($c);
		$startcol2 = (AdditionalGuestPeer::NUM_COLUMNS - AdditionalGuestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AdditionalGuestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptGuestRelatedByChildGuestId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AdditionalGuestPeer::addSelectColumns($c);
		$startcol2 = (AdditionalGuestPeer::NUM_COLUMNS - AdditionalGuestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AdditionalGuestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

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
		return AdditionalGuestPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(AdditionalGuestPeer::PARENT_GUEST_ID);
			$selectCriteria->add(AdditionalGuestPeer::PARENT_GUEST_ID, $criteria->remove(AdditionalGuestPeer::PARENT_GUEST_ID), $comparison);

			$comparison = $criteria->getComparison(AdditionalGuestPeer::CHILD_GUEST_ID);
			$selectCriteria->add(AdditionalGuestPeer::CHILD_GUEST_ID, $criteria->remove(AdditionalGuestPeer::CHILD_GUEST_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AdditionalGuestPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AdditionalGuestPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AdditionalGuest) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
												if(count($values) == count($values, COUNT_RECURSIVE))
			{
								$values = array($values);
			}
			$vals = array();
			foreach($values as $value)
			{

				$vals[0][] = $value[0];
				$vals[1][] = $value[1];
			}

			$criteria->add(AdditionalGuestPeer::PARENT_GUEST_ID, $vals[0], Criteria::IN);
			$criteria->add(AdditionalGuestPeer::CHILD_GUEST_ID, $vals[1], Criteria::IN);
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

	
	public static function doValidate(AdditionalGuest $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AdditionalGuestPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AdditionalGuestPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AdditionalGuestPeer::DATABASE_NAME, AdditionalGuestPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AdditionalGuestPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $parent_guest_id, $child_guest_id, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(AdditionalGuestPeer::PARENT_GUEST_ID, $parent_guest_id);
		$criteria->add(AdditionalGuestPeer::CHILD_GUEST_ID, $child_guest_id);
		$v = AdditionalGuestPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseAdditionalGuestPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AdditionalGuestMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AdditionalGuestMapBuilder');
}

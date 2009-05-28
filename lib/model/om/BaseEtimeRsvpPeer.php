<?php


abstract class BaseEtimeRsvpPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'etime_rsvp_key';

	
	const CLASS_DEFAULT = 'lib.model.EtimeRsvp';

	
	const NUM_COLUMNS = 2;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ETIME_ID = 'etime_rsvp_key.ETIME_ID';

	
	const RSVP_ID = 'etime_rsvp_key.RSVP_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('EtimeId', 'RsvpId', ),
		BasePeer::TYPE_COLNAME => array (EtimeRsvpPeer::ETIME_ID, EtimeRsvpPeer::RSVP_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('etime_id', 'rsvp_id', ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('EtimeId' => 0, 'RsvpId' => 1, ),
		BasePeer::TYPE_COLNAME => array (EtimeRsvpPeer::ETIME_ID => 0, EtimeRsvpPeer::RSVP_ID => 1, ),
		BasePeer::TYPE_FIELDNAME => array ('etime_id' => 0, 'rsvp_id' => 1, ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EtimeRsvpMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EtimeRsvpMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EtimeRsvpPeer::getTableMap();
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
		return str_replace(EtimeRsvpPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EtimeRsvpPeer::ETIME_ID);

		$criteria->addSelectColumn(EtimeRsvpPeer::RSVP_ID);

	}

	const COUNT = 'COUNT(etime_rsvp_key.ETIME_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT etime_rsvp_key.ETIME_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EtimeRsvpPeer::doSelectRS($criteria, $con);
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
		$objects = EtimeRsvpPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EtimeRsvpPeer::populateObjects(EtimeRsvpPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EtimeRsvpPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EtimeRsvpPeer::getOMClass();
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
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimeRsvpPeer::ETIME_ID, EtimePeer::ID);

		$rs = EtimeRsvpPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinRsvp(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimeRsvpPeer::RSVP_ID, RsvpPeer::ID);

		$rs = EtimeRsvpPeer::doSelectRS($criteria, $con);
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

		EtimeRsvpPeer::addSelectColumns($c);
		$startcol = (EtimeRsvpPeer::NUM_COLUMNS - EtimeRsvpPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EtimePeer::addSelectColumns($c);

		$c->addJoin(EtimeRsvpPeer::ETIME_ID, EtimePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimeRsvpPeer::getOMClass();

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
										$temp_obj2->addEtimeRsvp($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEtimeRsvps();
				$obj2->addEtimeRsvp($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinRsvp(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EtimeRsvpPeer::addSelectColumns($c);
		$startcol = (EtimeRsvpPeer::NUM_COLUMNS - EtimeRsvpPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		RsvpPeer::addSelectColumns($c);

		$c->addJoin(EtimeRsvpPeer::RSVP_ID, RsvpPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimeRsvpPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RsvpPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getRsvp(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEtimeRsvp($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEtimeRsvps();
				$obj2->addEtimeRsvp($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimeRsvpPeer::ETIME_ID, EtimePeer::ID);

		$criteria->addJoin(EtimeRsvpPeer::RSVP_ID, RsvpPeer::ID);

		$rs = EtimeRsvpPeer::doSelectRS($criteria, $con);
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

		EtimeRsvpPeer::addSelectColumns($c);
		$startcol2 = (EtimeRsvpPeer::NUM_COLUMNS - EtimeRsvpPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EtimePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EtimePeer::NUM_COLUMNS;

		RsvpPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + RsvpPeer::NUM_COLUMNS;

		$c->addJoin(EtimeRsvpPeer::ETIME_ID, EtimePeer::ID);

		$c->addJoin(EtimeRsvpPeer::RSVP_ID, RsvpPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimeRsvpPeer::getOMClass();


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
					$temp_obj2->addEtimeRsvp($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initEtimeRsvps();
				$obj2->addEtimeRsvp($obj1);
			}


					
			$omClass = RsvpPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getRsvp(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEtimeRsvp($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initEtimeRsvps();
				$obj3->addEtimeRsvp($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptEtime(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimeRsvpPeer::RSVP_ID, RsvpPeer::ID);

		$rs = EtimeRsvpPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptRsvp(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimeRsvpPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimeRsvpPeer::ETIME_ID, EtimePeer::ID);

		$rs = EtimeRsvpPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptEtime(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EtimeRsvpPeer::addSelectColumns($c);
		$startcol2 = (EtimeRsvpPeer::NUM_COLUMNS - EtimeRsvpPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		RsvpPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + RsvpPeer::NUM_COLUMNS;

		$c->addJoin(EtimeRsvpPeer::RSVP_ID, RsvpPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimeRsvpPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RsvpPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getRsvp(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEtimeRsvp($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEtimeRsvps();
				$obj2->addEtimeRsvp($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptRsvp(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EtimeRsvpPeer::addSelectColumns($c);
		$startcol2 = (EtimeRsvpPeer::NUM_COLUMNS - EtimeRsvpPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EtimePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EtimePeer::NUM_COLUMNS;

		$c->addJoin(EtimeRsvpPeer::ETIME_ID, EtimePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimeRsvpPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EtimePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEtime(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEtimeRsvp($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEtimeRsvps();
				$obj2->addEtimeRsvp($obj1);
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
		return EtimeRsvpPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(EtimeRsvpPeer::ETIME_ID);
			$selectCriteria->add(EtimeRsvpPeer::ETIME_ID, $criteria->remove(EtimeRsvpPeer::ETIME_ID), $comparison);

			$comparison = $criteria->getComparison(EtimeRsvpPeer::RSVP_ID);
			$selectCriteria->add(EtimeRsvpPeer::RSVP_ID, $criteria->remove(EtimeRsvpPeer::RSVP_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EtimeRsvpPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EtimeRsvpPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof EtimeRsvp) {

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

			$criteria->add(EtimeRsvpPeer::ETIME_ID, $vals[0], Criteria::IN);
			$criteria->add(EtimeRsvpPeer::RSVP_ID, $vals[1], Criteria::IN);
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

	
	public static function doValidate(EtimeRsvp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EtimeRsvpPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EtimeRsvpPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EtimeRsvpPeer::DATABASE_NAME, EtimeRsvpPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EtimeRsvpPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $etime_id, $rsvp_id, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(EtimeRsvpPeer::ETIME_ID, $etime_id);
		$criteria->add(EtimeRsvpPeer::RSVP_ID, $rsvp_id);
		$v = EtimeRsvpPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseEtimeRsvpPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EtimeRsvpMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EtimeRsvpMapBuilder');
}

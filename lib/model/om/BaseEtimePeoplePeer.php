<?php


abstract class BaseEtimePeoplePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'etime_people';

	
	const CLASS_DEFAULT = 'lib.model.EtimePeople';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'etime_people.ID';

	
	const ETIME_ID = 'etime_people.ETIME_ID';

	
	const NAME = 'etime_people.NAME';

	
	const EMAIL = 'etime_people.EMAIL';

	
	const PHONE = 'etime_people.PHONE';

	
	const PERSON_TYPE_ID = 'etime_people.PERSON_TYPE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EtimeId', 'Name', 'Email', 'Phone', 'PersonTypeId', ),
		BasePeer::TYPE_COLNAME => array (EtimePeoplePeer::ID, EtimePeoplePeer::ETIME_ID, EtimePeoplePeer::NAME, EtimePeoplePeer::EMAIL, EtimePeoplePeer::PHONE, EtimePeoplePeer::PERSON_TYPE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'etime_id', 'name', 'email', 'phone', 'person_type_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EtimeId' => 1, 'Name' => 2, 'Email' => 3, 'Phone' => 4, 'PersonTypeId' => 5, ),
		BasePeer::TYPE_COLNAME => array (EtimePeoplePeer::ID => 0, EtimePeoplePeer::ETIME_ID => 1, EtimePeoplePeer::NAME => 2, EtimePeoplePeer::EMAIL => 3, EtimePeoplePeer::PHONE => 4, EtimePeoplePeer::PERSON_TYPE_ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'etime_id' => 1, 'name' => 2, 'email' => 3, 'phone' => 4, 'person_type_id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EtimePeopleMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EtimePeopleMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EtimePeoplePeer::getTableMap();
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
		return str_replace(EtimePeoplePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EtimePeoplePeer::ID);

		$criteria->addSelectColumn(EtimePeoplePeer::ETIME_ID);

		$criteria->addSelectColumn(EtimePeoplePeer::NAME);

		$criteria->addSelectColumn(EtimePeoplePeer::EMAIL);

		$criteria->addSelectColumn(EtimePeoplePeer::PHONE);

		$criteria->addSelectColumn(EtimePeoplePeer::PERSON_TYPE_ID);

	}

	const COUNT = 'COUNT(etime_people.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT etime_people.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EtimePeoplePeer::doSelectRS($criteria, $con);
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
		$objects = EtimePeoplePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EtimePeoplePeer::populateObjects(EtimePeoplePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EtimePeoplePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EtimePeoplePeer::getOMClass();
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
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimePeoplePeer::ETIME_ID, EtimePeer::ID);

		$rs = EtimePeoplePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinPersonType(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimePeoplePeer::PERSON_TYPE_ID, PersonTypePeer::ID);

		$rs = EtimePeoplePeer::doSelectRS($criteria, $con);
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

		EtimePeoplePeer::addSelectColumns($c);
		$startcol = (EtimePeoplePeer::NUM_COLUMNS - EtimePeoplePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EtimePeer::addSelectColumns($c);

		$c->addJoin(EtimePeoplePeer::ETIME_ID, EtimePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimePeoplePeer::getOMClass();

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
										$temp_obj2->addEtimePeople($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEtimePeoples();
				$obj2->addEtimePeople($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinPersonType(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EtimePeoplePeer::addSelectColumns($c);
		$startcol = (EtimePeoplePeer::NUM_COLUMNS - EtimePeoplePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PersonTypePeer::addSelectColumns($c);

		$c->addJoin(EtimePeoplePeer::PERSON_TYPE_ID, PersonTypePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimePeoplePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PersonTypePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPersonType(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEtimePeople($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEtimePeoples();
				$obj2->addEtimePeople($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimePeoplePeer::ETIME_ID, EtimePeer::ID);

		$criteria->addJoin(EtimePeoplePeer::PERSON_TYPE_ID, PersonTypePeer::ID);

		$rs = EtimePeoplePeer::doSelectRS($criteria, $con);
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

		EtimePeoplePeer::addSelectColumns($c);
		$startcol2 = (EtimePeoplePeer::NUM_COLUMNS - EtimePeoplePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EtimePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EtimePeer::NUM_COLUMNS;

		PersonTypePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + PersonTypePeer::NUM_COLUMNS;

		$c->addJoin(EtimePeoplePeer::ETIME_ID, EtimePeer::ID);

		$c->addJoin(EtimePeoplePeer::PERSON_TYPE_ID, PersonTypePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimePeoplePeer::getOMClass();


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
					$temp_obj2->addEtimePeople($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initEtimePeoples();
				$obj2->addEtimePeople($obj1);
			}


					
			$omClass = PersonTypePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getPersonType(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEtimePeople($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initEtimePeoples();
				$obj3->addEtimePeople($obj1);
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
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimePeoplePeer::PERSON_TYPE_ID, PersonTypePeer::ID);

		$rs = EtimePeoplePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptPersonType(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtimePeoplePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtimePeoplePeer::ETIME_ID, EtimePeer::ID);

		$rs = EtimePeoplePeer::doSelectRS($criteria, $con);
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

		EtimePeoplePeer::addSelectColumns($c);
		$startcol2 = (EtimePeoplePeer::NUM_COLUMNS - EtimePeoplePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PersonTypePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PersonTypePeer::NUM_COLUMNS;

		$c->addJoin(EtimePeoplePeer::PERSON_TYPE_ID, PersonTypePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimePeoplePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PersonTypePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getPersonType(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEtimePeople($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEtimePeoples();
				$obj2->addEtimePeople($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptPersonType(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EtimePeoplePeer::addSelectColumns($c);
		$startcol2 = (EtimePeoplePeer::NUM_COLUMNS - EtimePeoplePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EtimePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EtimePeer::NUM_COLUMNS;

		$c->addJoin(EtimePeoplePeer::ETIME_ID, EtimePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtimePeoplePeer::getOMClass();

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
					$temp_obj2->addEtimePeople($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEtimePeoples();
				$obj2->addEtimePeople($obj1);
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
		return EtimePeoplePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EtimePeoplePeer::ID); 

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
			$comparison = $criteria->getComparison(EtimePeoplePeer::ID);
			$selectCriteria->add(EtimePeoplePeer::ID, $criteria->remove(EtimePeoplePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EtimePeoplePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EtimePeoplePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof EtimePeople) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EtimePeoplePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(EtimePeople $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EtimePeoplePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EtimePeoplePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EtimePeoplePeer::DATABASE_NAME, EtimePeoplePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EtimePeoplePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EtimePeoplePeer::DATABASE_NAME);

		$criteria->add(EtimePeoplePeer::ID, $pk);


		$v = EtimePeoplePeer::doSelect($criteria, $con);

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
			$criteria->add(EtimePeoplePeer::ID, $pks, Criteria::IN);
			$objs = EtimePeoplePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEtimePeoplePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EtimePeopleMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EtimePeopleMapBuilder');
}

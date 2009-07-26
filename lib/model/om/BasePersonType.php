<?php


abstract class BasePersonType extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;

	
	protected $collEventPeoples;

	
	protected $lastEventPeopleCriteria = null;

	
	protected $collEtimePeoples;

	
	protected $lastEtimePeopleCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PersonTypePeer::ID;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = PersonTypePeer::NAME;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PersonType object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PersonTypePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PersonTypePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PersonTypePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PersonTypePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PersonTypePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEventPeoples !== null) {
				foreach($this->collEventPeoples as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEtimePeoples !== null) {
				foreach($this->collEtimePeoples as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = PersonTypePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEventPeoples !== null) {
					foreach($this->collEventPeoples as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEtimePeoples !== null) {
					foreach($this->collEtimePeoples as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PersonTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PersonTypePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PersonTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PersonTypePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PersonTypePeer::DATABASE_NAME);

		if ($this->isColumnModified(PersonTypePeer::ID)) $criteria->add(PersonTypePeer::ID, $this->id);
		if ($this->isColumnModified(PersonTypePeer::NAME)) $criteria->add(PersonTypePeer::NAME, $this->name);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PersonTypePeer::DATABASE_NAME);

		$criteria->add(PersonTypePeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getEventPeoples() as $relObj) {
				$copyObj->addEventPeople($relObj->copy($deepCopy));
			}

			foreach($this->getEtimePeoples() as $relObj) {
				$copyObj->addEtimePeople($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PersonTypePeer();
		}
		return self::$peer;
	}

	
	public function initEventPeoples()
	{
		if ($this->collEventPeoples === null) {
			$this->collEventPeoples = array();
		}
	}

	
	public function getEventPeoples($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeoplePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventPeoples === null) {
			if ($this->isNew()) {
			   $this->collEventPeoples = array();
			} else {

				$criteria->add(EventPeoplePeer::PERSON_TYPE_ID, $this->getId());

				EventPeoplePeer::addSelectColumns($criteria);
				$this->collEventPeoples = EventPeoplePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EventPeoplePeer::PERSON_TYPE_ID, $this->getId());

				EventPeoplePeer::addSelectColumns($criteria);
				if (!isset($this->lastEventPeopleCriteria) || !$this->lastEventPeopleCriteria->equals($criteria)) {
					$this->collEventPeoples = EventPeoplePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEventPeopleCriteria = $criteria;
		return $this->collEventPeoples;
	}

	
	public function countEventPeoples($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeoplePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EventPeoplePeer::PERSON_TYPE_ID, $this->getId());

		return EventPeoplePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEventPeople(EventPeople $l)
	{
		$this->collEventPeoples[] = $l;
		$l->setPersonType($this);
	}


	
	public function getEventPeoplesJoinEvent($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeoplePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventPeoples === null) {
			if ($this->isNew()) {
				$this->collEventPeoples = array();
			} else {

				$criteria->add(EventPeoplePeer::PERSON_TYPE_ID, $this->getId());

				$this->collEventPeoples = EventPeoplePeer::doSelectJoinEvent($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeoplePeer::PERSON_TYPE_ID, $this->getId());

			if (!isset($this->lastEventPeopleCriteria) || !$this->lastEventPeopleCriteria->equals($criteria)) {
				$this->collEventPeoples = EventPeoplePeer::doSelectJoinEvent($criteria, $con);
			}
		}
		$this->lastEventPeopleCriteria = $criteria;

		return $this->collEventPeoples;
	}

	
	public function initEtimePeoples()
	{
		if ($this->collEtimePeoples === null) {
			$this->collEtimePeoples = array();
		}
	}

	
	public function getEtimePeoples($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEtimePeoplePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEtimePeoples === null) {
			if ($this->isNew()) {
			   $this->collEtimePeoples = array();
			} else {

				$criteria->add(EtimePeoplePeer::PERSON_TYPE_ID, $this->getId());

				EtimePeoplePeer::addSelectColumns($criteria);
				$this->collEtimePeoples = EtimePeoplePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EtimePeoplePeer::PERSON_TYPE_ID, $this->getId());

				EtimePeoplePeer::addSelectColumns($criteria);
				if (!isset($this->lastEtimePeopleCriteria) || !$this->lastEtimePeopleCriteria->equals($criteria)) {
					$this->collEtimePeoples = EtimePeoplePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEtimePeopleCriteria = $criteria;
		return $this->collEtimePeoples;
	}

	
	public function countEtimePeoples($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEtimePeoplePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EtimePeoplePeer::PERSON_TYPE_ID, $this->getId());

		return EtimePeoplePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEtimePeople(EtimePeople $l)
	{
		$this->collEtimePeoples[] = $l;
		$l->setPersonType($this);
	}


	
	public function getEtimePeoplesJoinEtime($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEtimePeoplePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEtimePeoples === null) {
			if ($this->isNew()) {
				$this->collEtimePeoples = array();
			} else {

				$criteria->add(EtimePeoplePeer::PERSON_TYPE_ID, $this->getId());

				$this->collEtimePeoples = EtimePeoplePeer::doSelectJoinEtime($criteria, $con);
			}
		} else {
									
			$criteria->add(EtimePeoplePeer::PERSON_TYPE_ID, $this->getId());

			if (!isset($this->lastEtimePeopleCriteria) || !$this->lastEtimePeopleCriteria->equals($criteria)) {
				$this->collEtimePeoples = EtimePeoplePeer::doSelectJoinEtime($criteria, $con);
			}
		}
		$this->lastEtimePeopleCriteria = $criteria;

		return $this->collEtimePeoples;
	}

} 
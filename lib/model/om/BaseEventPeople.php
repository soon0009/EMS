<?php


abstract class BaseEventPeople extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $event_id;


	
	protected $name;


	
	protected $email;


	
	protected $phone;


	
	protected $person_type_id;

	
	protected $aEvent;

	
	protected $aPersonType;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getEventId()
	{

		return $this->event_id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getPhone()
	{

		return $this->phone;
	}

	
	public function getPersonTypeId()
	{

		return $this->person_type_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EventPeoplePeer::ID;
		}

	} 
	
	public function setEventId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->event_id !== $v) {
			$this->event_id = $v;
			$this->modifiedColumns[] = EventPeoplePeer::EVENT_ID;
		}

		if ($this->aEvent !== null && $this->aEvent->getId() !== $v) {
			$this->aEvent = null;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = EventPeoplePeer::NAME;
		}

	} 
	
	public function setEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = EventPeoplePeer::EMAIL;
		}

	} 
	
	public function setPhone($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = EventPeoplePeer::PHONE;
		}

	} 
	
	public function setPersonTypeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->person_type_id !== $v) {
			$this->person_type_id = $v;
			$this->modifiedColumns[] = EventPeoplePeer::PERSON_TYPE_ID;
		}

		if ($this->aPersonType !== null && $this->aPersonType->getId() !== $v) {
			$this->aPersonType = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->event_id = $rs->getInt($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->email = $rs->getString($startcol + 3);

			$this->phone = $rs->getString($startcol + 4);

			$this->person_type_id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EventPeople object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EventPeoplePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EventPeoplePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EventPeoplePeer::DATABASE_NAME);
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


												
			if ($this->aEvent !== null) {
				if ($this->aEvent->isModified()) {
					$affectedRows += $this->aEvent->save($con);
				}
				$this->setEvent($this->aEvent);
			}

			if ($this->aPersonType !== null) {
				if ($this->aPersonType->isModified()) {
					$affectedRows += $this->aPersonType->save($con);
				}
				$this->setPersonType($this->aPersonType);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EventPeoplePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EventPeoplePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aEvent !== null) {
				if (!$this->aEvent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEvent->getValidationFailures());
				}
			}

			if ($this->aPersonType !== null) {
				if (!$this->aPersonType->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPersonType->getValidationFailures());
				}
			}


			if (($retval = EventPeoplePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EventPeoplePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getEventId();
				break;
			case 2:
				return $this->getName();
				break;
			case 3:
				return $this->getEmail();
				break;
			case 4:
				return $this->getPhone();
				break;
			case 5:
				return $this->getPersonTypeId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EventPeoplePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEventId(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getEmail(),
			$keys[4] => $this->getPhone(),
			$keys[5] => $this->getPersonTypeId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EventPeoplePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setEventId($value);
				break;
			case 2:
				$this->setName($value);
				break;
			case 3:
				$this->setEmail($value);
				break;
			case 4:
				$this->setPhone($value);
				break;
			case 5:
				$this->setPersonTypeId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EventPeoplePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEventId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEmail($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPhone($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPersonTypeId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EventPeoplePeer::DATABASE_NAME);

		if ($this->isColumnModified(EventPeoplePeer::ID)) $criteria->add(EventPeoplePeer::ID, $this->id);
		if ($this->isColumnModified(EventPeoplePeer::EVENT_ID)) $criteria->add(EventPeoplePeer::EVENT_ID, $this->event_id);
		if ($this->isColumnModified(EventPeoplePeer::NAME)) $criteria->add(EventPeoplePeer::NAME, $this->name);
		if ($this->isColumnModified(EventPeoplePeer::EMAIL)) $criteria->add(EventPeoplePeer::EMAIL, $this->email);
		if ($this->isColumnModified(EventPeoplePeer::PHONE)) $criteria->add(EventPeoplePeer::PHONE, $this->phone);
		if ($this->isColumnModified(EventPeoplePeer::PERSON_TYPE_ID)) $criteria->add(EventPeoplePeer::PERSON_TYPE_ID, $this->person_type_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EventPeoplePeer::DATABASE_NAME);

		$criteria->add(EventPeoplePeer::ID, $this->id);

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

		$copyObj->setEventId($this->event_id);

		$copyObj->setName($this->name);

		$copyObj->setEmail($this->email);

		$copyObj->setPhone($this->phone);

		$copyObj->setPersonTypeId($this->person_type_id);


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
			self::$peer = new EventPeoplePeer();
		}
		return self::$peer;
	}

	
	public function setEvent($v)
	{


		if ($v === null) {
			$this->setEventId(NULL);
		} else {
			$this->setEventId($v->getId());
		}


		$this->aEvent = $v;
	}


	
	public function getEvent($con = null)
	{
		if ($this->aEvent === null && ($this->event_id !== null)) {
						include_once 'lib/model/om/BaseEventPeer.php';

			$this->aEvent = EventPeer::retrieveByPK($this->event_id, $con);

			
		}
		return $this->aEvent;
	}

	
	public function setPersonType($v)
	{


		if ($v === null) {
			$this->setPersonTypeId(NULL);
		} else {
			$this->setPersonTypeId($v->getId());
		}


		$this->aPersonType = $v;
	}


	
	public function getPersonType($con = null)
	{
		if ($this->aPersonType === null && ($this->person_type_id !== null)) {
						include_once 'lib/model/om/BasePersonTypePeer.php';

			$this->aPersonType = PersonTypePeer::retrieveByPK($this->person_type_id, $con);

			
		}
		return $this->aPersonType;
	}

} 
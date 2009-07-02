<?php


abstract class BaseRegForm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $event_id;


	
	protected $reg_field_id;


	
	protected $required_field = false;


	
	protected $field_order;

	
	protected $aEvent;

	
	protected $aRegField;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getEventId()
	{

		return $this->event_id;
	}

	
	public function getRegFieldId()
	{

		return $this->reg_field_id;
	}

	
	public function getRequiredField()
	{

		return $this->required_field;
	}

	
	public function getFieldOrder()
	{

		return $this->field_order;
	}

	
	public function setEventId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->event_id !== $v) {
			$this->event_id = $v;
			$this->modifiedColumns[] = RegFormPeer::EVENT_ID;
		}

		if ($this->aEvent !== null && $this->aEvent->getId() !== $v) {
			$this->aEvent = null;
		}

	} 
	
	public function setRegFieldId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->reg_field_id !== $v) {
			$this->reg_field_id = $v;
			$this->modifiedColumns[] = RegFormPeer::REG_FIELD_ID;
		}

		if ($this->aRegField !== null && $this->aRegField->getId() !== $v) {
			$this->aRegField = null;
		}

	} 
	
	public function setRequiredField($v)
	{

		if ($this->required_field !== $v || $v === false) {
			$this->required_field = $v;
			$this->modifiedColumns[] = RegFormPeer::REQUIRED_FIELD;
		}

	} 
	
	public function setFieldOrder($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->field_order !== $v) {
			$this->field_order = $v;
			$this->modifiedColumns[] = RegFormPeer::FIELD_ORDER;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->event_id = $rs->getInt($startcol + 0);

			$this->reg_field_id = $rs->getInt($startcol + 1);

			$this->required_field = $rs->getBoolean($startcol + 2);

			$this->field_order = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RegForm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RegFormPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RegFormPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RegFormPeer::DATABASE_NAME);
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

			if ($this->aRegField !== null) {
				if ($this->aRegField->isModified()) {
					$affectedRows += $this->aRegField->save($con);
				}
				$this->setRegField($this->aRegField);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RegFormPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += RegFormPeer::doUpdate($this, $con);
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

			if ($this->aRegField !== null) {
				if (!$this->aRegField->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRegField->getValidationFailures());
				}
			}


			if (($retval = RegFormPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RegFormPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getEventId();
				break;
			case 1:
				return $this->getRegFieldId();
				break;
			case 2:
				return $this->getRequiredField();
				break;
			case 3:
				return $this->getFieldOrder();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RegFormPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEventId(),
			$keys[1] => $this->getRegFieldId(),
			$keys[2] => $this->getRequiredField(),
			$keys[3] => $this->getFieldOrder(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RegFormPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setEventId($value);
				break;
			case 1:
				$this->setRegFieldId($value);
				break;
			case 2:
				$this->setRequiredField($value);
				break;
			case 3:
				$this->setFieldOrder($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RegFormPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEventId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRegFieldId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRequiredField($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFieldOrder($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RegFormPeer::DATABASE_NAME);

		if ($this->isColumnModified(RegFormPeer::EVENT_ID)) $criteria->add(RegFormPeer::EVENT_ID, $this->event_id);
		if ($this->isColumnModified(RegFormPeer::REG_FIELD_ID)) $criteria->add(RegFormPeer::REG_FIELD_ID, $this->reg_field_id);
		if ($this->isColumnModified(RegFormPeer::REQUIRED_FIELD)) $criteria->add(RegFormPeer::REQUIRED_FIELD, $this->required_field);
		if ($this->isColumnModified(RegFormPeer::FIELD_ORDER)) $criteria->add(RegFormPeer::FIELD_ORDER, $this->field_order);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RegFormPeer::DATABASE_NAME);

		$criteria->add(RegFormPeer::EVENT_ID, $this->event_id);
		$criteria->add(RegFormPeer::REG_FIELD_ID, $this->reg_field_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getEventId();

		$pks[1] = $this->getRegFieldId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setEventId($keys[0]);

		$this->setRegFieldId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setRequiredField($this->required_field);

		$copyObj->setFieldOrder($this->field_order);


		$copyObj->setNew(true);

		$copyObj->setEventId(NULL); 
		$copyObj->setRegFieldId(NULL); 
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
			self::$peer = new RegFormPeer();
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

	
	public function setRegField($v)
	{


		if ($v === null) {
			$this->setRegFieldId(NULL);
		} else {
			$this->setRegFieldId($v->getId());
		}


		$this->aRegField = $v;
	}


	
	public function getRegField($con = null)
	{
		if ($this->aRegField === null && ($this->reg_field_id !== null)) {
						include_once 'lib/model/om/BaseRegFieldPeer.php';

			$this->aRegField = RegFieldPeer::retrieveByPK($this->reg_field_id, $con);

			
		}
		return $this->aRegField;
	}

} 
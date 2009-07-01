<?php


abstract class BaseGuestReg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $guest_id;


	
	protected $reg_field_id;


	
	protected $value;

	
	protected $aGuest;

	
	protected $aRegField;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getGuestId()
	{

		return $this->guest_id;
	}

	
	public function getRegFieldId()
	{

		return $this->reg_field_id;
	}

	
	public function getValue()
	{

		return $this->value;
	}

	
	public function setGuestId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->guest_id !== $v) {
			$this->guest_id = $v;
			$this->modifiedColumns[] = GuestRegPeer::GUEST_ID;
		}

		if ($this->aGuest !== null && $this->aGuest->getId() !== $v) {
			$this->aGuest = null;
		}

	} 
	
	public function setRegFieldId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->reg_field_id !== $v) {
			$this->reg_field_id = $v;
			$this->modifiedColumns[] = GuestRegPeer::REG_FIELD_ID;
		}

		if ($this->aRegField !== null && $this->aRegField->getId() !== $v) {
			$this->aRegField = null;
		}

	} 
	
	public function setValue($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->value !== $v) {
			$this->value = $v;
			$this->modifiedColumns[] = GuestRegPeer::VALUE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->guest_id = $rs->getInt($startcol + 0);

			$this->reg_field_id = $rs->getInt($startcol + 1);

			$this->value = $rs->getString($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GuestReg object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GuestRegPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GuestRegPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GuestRegPeer::DATABASE_NAME);
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


												
			if ($this->aGuest !== null) {
				if ($this->aGuest->isModified()) {
					$affectedRows += $this->aGuest->save($con);
				}
				$this->setGuest($this->aGuest);
			}

			if ($this->aRegField !== null) {
				if ($this->aRegField->isModified()) {
					$affectedRows += $this->aRegField->save($con);
				}
				$this->setRegField($this->aRegField);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GuestRegPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += GuestRegPeer::doUpdate($this, $con);
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


												
			if ($this->aGuest !== null) {
				if (!$this->aGuest->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGuest->getValidationFailures());
				}
			}

			if ($this->aRegField !== null) {
				if (!$this->aRegField->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRegField->getValidationFailures());
				}
			}


			if (($retval = GuestRegPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GuestRegPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getGuestId();
				break;
			case 1:
				return $this->getRegFieldId();
				break;
			case 2:
				return $this->getValue();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GuestRegPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getGuestId(),
			$keys[1] => $this->getRegFieldId(),
			$keys[2] => $this->getValue(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GuestRegPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setGuestId($value);
				break;
			case 1:
				$this->setRegFieldId($value);
				break;
			case 2:
				$this->setValue($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GuestRegPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setGuestId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRegFieldId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setValue($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GuestRegPeer::DATABASE_NAME);

		if ($this->isColumnModified(GuestRegPeer::GUEST_ID)) $criteria->add(GuestRegPeer::GUEST_ID, $this->guest_id);
		if ($this->isColumnModified(GuestRegPeer::REG_FIELD_ID)) $criteria->add(GuestRegPeer::REG_FIELD_ID, $this->reg_field_id);
		if ($this->isColumnModified(GuestRegPeer::VALUE)) $criteria->add(GuestRegPeer::VALUE, $this->value);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GuestRegPeer::DATABASE_NAME);

		$criteria->add(GuestRegPeer::GUEST_ID, $this->guest_id);
		$criteria->add(GuestRegPeer::REG_FIELD_ID, $this->reg_field_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getGuestId();

		$pks[1] = $this->getRegFieldId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setGuestId($keys[0]);

		$this->setRegFieldId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setValue($this->value);


		$copyObj->setNew(true);

		$copyObj->setGuestId(NULL); 
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
			self::$peer = new GuestRegPeer();
		}
		return self::$peer;
	}

	
	public function setGuest($v)
	{


		if ($v === null) {
			$this->setGuestId(NULL);
		} else {
			$this->setGuestId($v->getId());
		}


		$this->aGuest = $v;
	}


	
	public function getGuest($con = null)
	{
		if ($this->aGuest === null && ($this->guest_id !== null)) {
						include_once 'lib/model/om/BaseGuestPeer.php';

			$this->aGuest = GuestPeer::retrieveByPK($this->guest_id, $con);

			
		}
		return $this->aGuest;
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
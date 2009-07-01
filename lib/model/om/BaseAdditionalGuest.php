<?php


abstract class BaseAdditionalGuest extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $parent_guest_id;


	
	protected $child_guest_id;

	
	protected $aGuestRelatedByParentGuestId;

	
	protected $aGuestRelatedByChildGuestId;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getParentGuestId()
	{

		return $this->parent_guest_id;
	}

	
	public function getChildGuestId()
	{

		return $this->child_guest_id;
	}

	
	public function setParentGuestId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->parent_guest_id !== $v) {
			$this->parent_guest_id = $v;
			$this->modifiedColumns[] = AdditionalGuestPeer::PARENT_GUEST_ID;
		}

		if ($this->aGuestRelatedByParentGuestId !== null && $this->aGuestRelatedByParentGuestId->getId() !== $v) {
			$this->aGuestRelatedByParentGuestId = null;
		}

	} 
	
	public function setChildGuestId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->child_guest_id !== $v) {
			$this->child_guest_id = $v;
			$this->modifiedColumns[] = AdditionalGuestPeer::CHILD_GUEST_ID;
		}

		if ($this->aGuestRelatedByChildGuestId !== null && $this->aGuestRelatedByChildGuestId->getId() !== $v) {
			$this->aGuestRelatedByChildGuestId = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->parent_guest_id = $rs->getInt($startcol + 0);

			$this->child_guest_id = $rs->getInt($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AdditionalGuest object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AdditionalGuestPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AdditionalGuestPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AdditionalGuestPeer::DATABASE_NAME);
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


												
			if ($this->aGuestRelatedByParentGuestId !== null) {
				if ($this->aGuestRelatedByParentGuestId->isModified()) {
					$affectedRows += $this->aGuestRelatedByParentGuestId->save($con);
				}
				$this->setGuestRelatedByParentGuestId($this->aGuestRelatedByParentGuestId);
			}

			if ($this->aGuestRelatedByChildGuestId !== null) {
				if ($this->aGuestRelatedByChildGuestId->isModified()) {
					$affectedRows += $this->aGuestRelatedByChildGuestId->save($con);
				}
				$this->setGuestRelatedByChildGuestId($this->aGuestRelatedByChildGuestId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AdditionalGuestPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += AdditionalGuestPeer::doUpdate($this, $con);
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


												
			if ($this->aGuestRelatedByParentGuestId !== null) {
				if (!$this->aGuestRelatedByParentGuestId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGuestRelatedByParentGuestId->getValidationFailures());
				}
			}

			if ($this->aGuestRelatedByChildGuestId !== null) {
				if (!$this->aGuestRelatedByChildGuestId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGuestRelatedByChildGuestId->getValidationFailures());
				}
			}


			if (($retval = AdditionalGuestPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AdditionalGuestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getParentGuestId();
				break;
			case 1:
				return $this->getChildGuestId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AdditionalGuestPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getParentGuestId(),
			$keys[1] => $this->getChildGuestId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AdditionalGuestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setParentGuestId($value);
				break;
			case 1:
				$this->setChildGuestId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AdditionalGuestPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setParentGuestId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setChildGuestId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AdditionalGuestPeer::DATABASE_NAME);

		if ($this->isColumnModified(AdditionalGuestPeer::PARENT_GUEST_ID)) $criteria->add(AdditionalGuestPeer::PARENT_GUEST_ID, $this->parent_guest_id);
		if ($this->isColumnModified(AdditionalGuestPeer::CHILD_GUEST_ID)) $criteria->add(AdditionalGuestPeer::CHILD_GUEST_ID, $this->child_guest_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AdditionalGuestPeer::DATABASE_NAME);

		$criteria->add(AdditionalGuestPeer::PARENT_GUEST_ID, $this->parent_guest_id);
		$criteria->add(AdditionalGuestPeer::CHILD_GUEST_ID, $this->child_guest_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getParentGuestId();

		$pks[1] = $this->getChildGuestId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setParentGuestId($keys[0]);

		$this->setChildGuestId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{


		$copyObj->setNew(true);

		$copyObj->setParentGuestId(NULL); 
		$copyObj->setChildGuestId(NULL); 
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
			self::$peer = new AdditionalGuestPeer();
		}
		return self::$peer;
	}

	
	public function setGuestRelatedByParentGuestId($v)
	{


		if ($v === null) {
			$this->setParentGuestId(NULL);
		} else {
			$this->setParentGuestId($v->getId());
		}


		$this->aGuestRelatedByParentGuestId = $v;
	}


	
	public function getGuestRelatedByParentGuestId($con = null)
	{
		if ($this->aGuestRelatedByParentGuestId === null && ($this->parent_guest_id !== null)) {
						include_once 'lib/model/om/BaseGuestPeer.php';

			$this->aGuestRelatedByParentGuestId = GuestPeer::retrieveByPK($this->parent_guest_id, $con);

			
		}
		return $this->aGuestRelatedByParentGuestId;
	}

	
	public function setGuestRelatedByChildGuestId($v)
	{


		if ($v === null) {
			$this->setChildGuestId(NULL);
		} else {
			$this->setChildGuestId($v->getId());
		}


		$this->aGuestRelatedByChildGuestId = $v;
	}


	
	public function getGuestRelatedByChildGuestId($con = null)
	{
		if ($this->aGuestRelatedByChildGuestId === null && ($this->child_guest_id !== null)) {
						include_once 'lib/model/om/BaseGuestPeer.php';

			$this->aGuestRelatedByChildGuestId = GuestPeer::retrieveByPK($this->child_guest_id, $con);

			
		}
		return $this->aGuestRelatedByChildGuestId;
	}

} 
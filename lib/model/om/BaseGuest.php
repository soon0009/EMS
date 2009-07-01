<?php


abstract class BaseGuest extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $etime_id;


	
	protected $id;

	
	protected $aEtime;

	
	protected $collGuestRegs;

	
	protected $lastGuestRegCriteria = null;

	
	protected $collAdditionalGuestsRelatedByParentGuestId;

	
	protected $lastAdditionalGuestRelatedByParentGuestIdCriteria = null;

	
	protected $collAdditionalGuestsRelatedByChildGuestId;

	
	protected $lastAdditionalGuestRelatedByChildGuestIdCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getEtimeId()
	{

		return $this->etime_id;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setEtimeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->etime_id !== $v) {
			$this->etime_id = $v;
			$this->modifiedColumns[] = GuestPeer::ETIME_ID;
		}

		if ($this->aEtime !== null && $this->aEtime->getId() !== $v) {
			$this->aEtime = null;
		}

	} 
	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GuestPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->etime_id = $rs->getInt($startcol + 0);

			$this->id = $rs->getInt($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Guest object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GuestPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GuestPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GuestPeer::DATABASE_NAME);
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


												
			if ($this->aEtime !== null) {
				if ($this->aEtime->isModified()) {
					$affectedRows += $this->aEtime->save($con);
				}
				$this->setEtime($this->aEtime);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GuestPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GuestPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collGuestRegs !== null) {
				foreach($this->collGuestRegs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAdditionalGuestsRelatedByParentGuestId !== null) {
				foreach($this->collAdditionalGuestsRelatedByParentGuestId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAdditionalGuestsRelatedByChildGuestId !== null) {
				foreach($this->collAdditionalGuestsRelatedByChildGuestId as $referrerFK) {
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


												
			if ($this->aEtime !== null) {
				if (!$this->aEtime->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEtime->getValidationFailures());
				}
			}


			if (($retval = GuestPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collGuestRegs !== null) {
					foreach($this->collGuestRegs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAdditionalGuestsRelatedByParentGuestId !== null) {
					foreach($this->collAdditionalGuestsRelatedByParentGuestId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAdditionalGuestsRelatedByChildGuestId !== null) {
					foreach($this->collAdditionalGuestsRelatedByChildGuestId as $referrerFK) {
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
		$pos = GuestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getEtimeId();
				break;
			case 1:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GuestPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEtimeId(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GuestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setEtimeId($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GuestPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEtimeId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GuestPeer::DATABASE_NAME);

		if ($this->isColumnModified(GuestPeer::ETIME_ID)) $criteria->add(GuestPeer::ETIME_ID, $this->etime_id);
		if ($this->isColumnModified(GuestPeer::ID)) $criteria->add(GuestPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GuestPeer::DATABASE_NAME);

		$criteria->add(GuestPeer::ID, $this->id);

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

		$copyObj->setEtimeId($this->etime_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getGuestRegs() as $relObj) {
				$copyObj->addGuestReg($relObj->copy($deepCopy));
			}

			foreach($this->getAdditionalGuestsRelatedByParentGuestId() as $relObj) {
				$copyObj->addAdditionalGuestRelatedByParentGuestId($relObj->copy($deepCopy));
			}

			foreach($this->getAdditionalGuestsRelatedByChildGuestId() as $relObj) {
				$copyObj->addAdditionalGuestRelatedByChildGuestId($relObj->copy($deepCopy));
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
			self::$peer = new GuestPeer();
		}
		return self::$peer;
	}

	
	public function setEtime($v)
	{


		if ($v === null) {
			$this->setEtimeId(NULL);
		} else {
			$this->setEtimeId($v->getId());
		}


		$this->aEtime = $v;
	}


	
	public function getEtime($con = null)
	{
		if ($this->aEtime === null && ($this->etime_id !== null)) {
						include_once 'lib/model/om/BaseEtimePeer.php';

			$this->aEtime = EtimePeer::retrieveByPK($this->etime_id, $con);

			
		}
		return $this->aEtime;
	}

	
	public function initGuestRegs()
	{
		if ($this->collGuestRegs === null) {
			$this->collGuestRegs = array();
		}
	}

	
	public function getGuestRegs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGuestRegPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGuestRegs === null) {
			if ($this->isNew()) {
			   $this->collGuestRegs = array();
			} else {

				$criteria->add(GuestRegPeer::GUEST_ID, $this->getId());

				GuestRegPeer::addSelectColumns($criteria);
				$this->collGuestRegs = GuestRegPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GuestRegPeer::GUEST_ID, $this->getId());

				GuestRegPeer::addSelectColumns($criteria);
				if (!isset($this->lastGuestRegCriteria) || !$this->lastGuestRegCriteria->equals($criteria)) {
					$this->collGuestRegs = GuestRegPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGuestRegCriteria = $criteria;
		return $this->collGuestRegs;
	}

	
	public function countGuestRegs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGuestRegPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GuestRegPeer::GUEST_ID, $this->getId());

		return GuestRegPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGuestReg(GuestReg $l)
	{
		$this->collGuestRegs[] = $l;
		$l->setGuest($this);
	}


	
	public function getGuestRegsJoinRegField($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGuestRegPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGuestRegs === null) {
			if ($this->isNew()) {
				$this->collGuestRegs = array();
			} else {

				$criteria->add(GuestRegPeer::GUEST_ID, $this->getId());

				$this->collGuestRegs = GuestRegPeer::doSelectJoinRegField($criteria, $con);
			}
		} else {
									
			$criteria->add(GuestRegPeer::GUEST_ID, $this->getId());

			if (!isset($this->lastGuestRegCriteria) || !$this->lastGuestRegCriteria->equals($criteria)) {
				$this->collGuestRegs = GuestRegPeer::doSelectJoinRegField($criteria, $con);
			}
		}
		$this->lastGuestRegCriteria = $criteria;

		return $this->collGuestRegs;
	}

	
	public function initAdditionalGuestsRelatedByParentGuestId()
	{
		if ($this->collAdditionalGuestsRelatedByParentGuestId === null) {
			$this->collAdditionalGuestsRelatedByParentGuestId = array();
		}
	}

	
	public function getAdditionalGuestsRelatedByParentGuestId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAdditionalGuestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAdditionalGuestsRelatedByParentGuestId === null) {
			if ($this->isNew()) {
			   $this->collAdditionalGuestsRelatedByParentGuestId = array();
			} else {

				$criteria->add(AdditionalGuestPeer::PARENT_GUEST_ID, $this->getId());

				AdditionalGuestPeer::addSelectColumns($criteria);
				$this->collAdditionalGuestsRelatedByParentGuestId = AdditionalGuestPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AdditionalGuestPeer::PARENT_GUEST_ID, $this->getId());

				AdditionalGuestPeer::addSelectColumns($criteria);
				if (!isset($this->lastAdditionalGuestRelatedByParentGuestIdCriteria) || !$this->lastAdditionalGuestRelatedByParentGuestIdCriteria->equals($criteria)) {
					$this->collAdditionalGuestsRelatedByParentGuestId = AdditionalGuestPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAdditionalGuestRelatedByParentGuestIdCriteria = $criteria;
		return $this->collAdditionalGuestsRelatedByParentGuestId;
	}

	
	public function countAdditionalGuestsRelatedByParentGuestId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAdditionalGuestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AdditionalGuestPeer::PARENT_GUEST_ID, $this->getId());

		return AdditionalGuestPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAdditionalGuestRelatedByParentGuestId(AdditionalGuest $l)
	{
		$this->collAdditionalGuestsRelatedByParentGuestId[] = $l;
		$l->setGuestRelatedByParentGuestId($this);
	}

	
	public function initAdditionalGuestsRelatedByChildGuestId()
	{
		if ($this->collAdditionalGuestsRelatedByChildGuestId === null) {
			$this->collAdditionalGuestsRelatedByChildGuestId = array();
		}
	}

	
	public function getAdditionalGuestsRelatedByChildGuestId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAdditionalGuestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAdditionalGuestsRelatedByChildGuestId === null) {
			if ($this->isNew()) {
			   $this->collAdditionalGuestsRelatedByChildGuestId = array();
			} else {

				$criteria->add(AdditionalGuestPeer::CHILD_GUEST_ID, $this->getId());

				AdditionalGuestPeer::addSelectColumns($criteria);
				$this->collAdditionalGuestsRelatedByChildGuestId = AdditionalGuestPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AdditionalGuestPeer::CHILD_GUEST_ID, $this->getId());

				AdditionalGuestPeer::addSelectColumns($criteria);
				if (!isset($this->lastAdditionalGuestRelatedByChildGuestIdCriteria) || !$this->lastAdditionalGuestRelatedByChildGuestIdCriteria->equals($criteria)) {
					$this->collAdditionalGuestsRelatedByChildGuestId = AdditionalGuestPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAdditionalGuestRelatedByChildGuestIdCriteria = $criteria;
		return $this->collAdditionalGuestsRelatedByChildGuestId;
	}

	
	public function countAdditionalGuestsRelatedByChildGuestId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAdditionalGuestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AdditionalGuestPeer::CHILD_GUEST_ID, $this->getId());

		return AdditionalGuestPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAdditionalGuestRelatedByChildGuestId(AdditionalGuest $l)
	{
		$this->collAdditionalGuestsRelatedByChildGuestId[] = $l;
		$l->setGuestRelatedByChildGuestId($this);
	}

} 
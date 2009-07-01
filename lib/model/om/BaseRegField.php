<?php


abstract class BaseRegField extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $name;


	
	protected $label;


	
	protected $type;


	
	protected $id;

	
	protected $collRegForms;

	
	protected $lastRegFormCriteria = null;

	
	protected $collGuestRegs;

	
	protected $lastGuestRegCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getLabel()
	{

		return $this->label;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = RegFieldPeer::NAME;
		}

	} 
	
	public function setLabel($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->label !== $v) {
			$this->label = $v;
			$this->modifiedColumns[] = RegFieldPeer::LABEL;
		}

	} 
	
	public function setType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = RegFieldPeer::TYPE;
		}

	} 
	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RegFieldPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->name = $rs->getString($startcol + 0);

			$this->label = $rs->getString($startcol + 1);

			$this->type = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RegField object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RegFieldPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RegFieldPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RegFieldPeer::DATABASE_NAME);
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
					$pk = RegFieldPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RegFieldPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRegForms !== null) {
				foreach($this->collRegForms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGuestRegs !== null) {
				foreach($this->collGuestRegs as $referrerFK) {
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


			if (($retval = RegFieldPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRegForms !== null) {
					foreach($this->collRegForms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGuestRegs !== null) {
					foreach($this->collGuestRegs as $referrerFK) {
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
		$pos = RegFieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getName();
				break;
			case 1:
				return $this->getLabel();
				break;
			case 2:
				return $this->getType();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RegFieldPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getName(),
			$keys[1] => $this->getLabel(),
			$keys[2] => $this->getType(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RegFieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setName($value);
				break;
			case 1:
				$this->setLabel($value);
				break;
			case 2:
				$this->setType($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RegFieldPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setName($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLabel($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RegFieldPeer::DATABASE_NAME);

		if ($this->isColumnModified(RegFieldPeer::NAME)) $criteria->add(RegFieldPeer::NAME, $this->name);
		if ($this->isColumnModified(RegFieldPeer::LABEL)) $criteria->add(RegFieldPeer::LABEL, $this->label);
		if ($this->isColumnModified(RegFieldPeer::TYPE)) $criteria->add(RegFieldPeer::TYPE, $this->type);
		if ($this->isColumnModified(RegFieldPeer::ID)) $criteria->add(RegFieldPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RegFieldPeer::DATABASE_NAME);

		$criteria->add(RegFieldPeer::ID, $this->id);

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

		$copyObj->setLabel($this->label);

		$copyObj->setType($this->type);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRegForms() as $relObj) {
				$copyObj->addRegForm($relObj->copy($deepCopy));
			}

			foreach($this->getGuestRegs() as $relObj) {
				$copyObj->addGuestReg($relObj->copy($deepCopy));
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
			self::$peer = new RegFieldPeer();
		}
		return self::$peer;
	}

	
	public function initRegForms()
	{
		if ($this->collRegForms === null) {
			$this->collRegForms = array();
		}
	}

	
	public function getRegForms($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRegFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRegForms === null) {
			if ($this->isNew()) {
			   $this->collRegForms = array();
			} else {

				$criteria->add(RegFormPeer::REG_FIELD_ID, $this->getId());

				RegFormPeer::addSelectColumns($criteria);
				$this->collRegForms = RegFormPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RegFormPeer::REG_FIELD_ID, $this->getId());

				RegFormPeer::addSelectColumns($criteria);
				if (!isset($this->lastRegFormCriteria) || !$this->lastRegFormCriteria->equals($criteria)) {
					$this->collRegForms = RegFormPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRegFormCriteria = $criteria;
		return $this->collRegForms;
	}

	
	public function countRegForms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRegFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RegFormPeer::REG_FIELD_ID, $this->getId());

		return RegFormPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRegForm(RegForm $l)
	{
		$this->collRegForms[] = $l;
		$l->setRegField($this);
	}


	
	public function getRegFormsJoinEvent($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRegFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRegForms === null) {
			if ($this->isNew()) {
				$this->collRegForms = array();
			} else {

				$criteria->add(RegFormPeer::REG_FIELD_ID, $this->getId());

				$this->collRegForms = RegFormPeer::doSelectJoinEvent($criteria, $con);
			}
		} else {
									
			$criteria->add(RegFormPeer::REG_FIELD_ID, $this->getId());

			if (!isset($this->lastRegFormCriteria) || !$this->lastRegFormCriteria->equals($criteria)) {
				$this->collRegForms = RegFormPeer::doSelectJoinEvent($criteria, $con);
			}
		}
		$this->lastRegFormCriteria = $criteria;

		return $this->collRegForms;
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

				$criteria->add(GuestRegPeer::REG_FIELD_ID, $this->getId());

				GuestRegPeer::addSelectColumns($criteria);
				$this->collGuestRegs = GuestRegPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GuestRegPeer::REG_FIELD_ID, $this->getId());

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

		$criteria->add(GuestRegPeer::REG_FIELD_ID, $this->getId());

		return GuestRegPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGuestReg(GuestReg $l)
	{
		$this->collGuestRegs[] = $l;
		$l->setRegField($this);
	}


	
	public function getGuestRegsJoinGuest($criteria = null, $con = null)
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

				$criteria->add(GuestRegPeer::REG_FIELD_ID, $this->getId());

				$this->collGuestRegs = GuestRegPeer::doSelectJoinGuest($criteria, $con);
			}
		} else {
									
			$criteria->add(GuestRegPeer::REG_FIELD_ID, $this->getId());

			if (!isset($this->lastGuestRegCriteria) || !$this->lastGuestRegCriteria->equals($criteria)) {
				$this->collGuestRegs = GuestRegPeer::doSelectJoinGuest($criteria, $con);
			}
		}
		$this->lastGuestRegCriteria = $criteria;

		return $this->collGuestRegs;
	}

} 
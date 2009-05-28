<?php


abstract class BaseAudience extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;

	
	protected $collEtimeAudiences;

	
	protected $lastEtimeAudienceCriteria = null;

	
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
			$this->modifiedColumns[] = AudiencePeer::ID;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AudiencePeer::NAME;
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
			throw new PropelException("Error populating Audience object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AudiencePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AudiencePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AudiencePeer::DATABASE_NAME);
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
					$pk = AudiencePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AudiencePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEtimeAudiences !== null) {
				foreach($this->collEtimeAudiences as $referrerFK) {
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


			if (($retval = AudiencePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEtimeAudiences !== null) {
					foreach($this->collEtimeAudiences as $referrerFK) {
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
		$pos = AudiencePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = AudiencePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AudiencePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = AudiencePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AudiencePeer::DATABASE_NAME);

		if ($this->isColumnModified(AudiencePeer::ID)) $criteria->add(AudiencePeer::ID, $this->id);
		if ($this->isColumnModified(AudiencePeer::NAME)) $criteria->add(AudiencePeer::NAME, $this->name);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AudiencePeer::DATABASE_NAME);

		$criteria->add(AudiencePeer::ID, $this->id);

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

			foreach($this->getEtimeAudiences() as $relObj) {
				$copyObj->addEtimeAudience($relObj->copy($deepCopy));
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
			self::$peer = new AudiencePeer();
		}
		return self::$peer;
	}

	
	public function initEtimeAudiences()
	{
		if ($this->collEtimeAudiences === null) {
			$this->collEtimeAudiences = array();
		}
	}

	
	public function getEtimeAudiences($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEtimeAudiencePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEtimeAudiences === null) {
			if ($this->isNew()) {
			   $this->collEtimeAudiences = array();
			} else {

				$criteria->add(EtimeAudiencePeer::AUDIENCE_ID, $this->getId());

				EtimeAudiencePeer::addSelectColumns($criteria);
				$this->collEtimeAudiences = EtimeAudiencePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EtimeAudiencePeer::AUDIENCE_ID, $this->getId());

				EtimeAudiencePeer::addSelectColumns($criteria);
				if (!isset($this->lastEtimeAudienceCriteria) || !$this->lastEtimeAudienceCriteria->equals($criteria)) {
					$this->collEtimeAudiences = EtimeAudiencePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEtimeAudienceCriteria = $criteria;
		return $this->collEtimeAudiences;
	}

	
	public function countEtimeAudiences($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEtimeAudiencePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EtimeAudiencePeer::AUDIENCE_ID, $this->getId());

		return EtimeAudiencePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEtimeAudience(EtimeAudience $l)
	{
		$this->collEtimeAudiences[] = $l;
		$l->setAudience($this);
	}


	
	public function getEtimeAudiencesJoinEtime($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEtimeAudiencePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEtimeAudiences === null) {
			if ($this->isNew()) {
				$this->collEtimeAudiences = array();
			} else {

				$criteria->add(EtimeAudiencePeer::AUDIENCE_ID, $this->getId());

				$this->collEtimeAudiences = EtimeAudiencePeer::doSelectJoinEtime($criteria, $con);
			}
		} else {
									
			$criteria->add(EtimeAudiencePeer::AUDIENCE_ID, $this->getId());

			if (!isset($this->lastEtimeAudienceCriteria) || !$this->lastEtimeAudienceCriteria->equals($criteria)) {
				$this->collEtimeAudiences = EtimeAudiencePeer::doSelectJoinEtime($criteria, $con);
			}
		}
		$this->lastEtimeAudienceCriteria = $criteria;

		return $this->collEtimeAudiences;
	}

} 
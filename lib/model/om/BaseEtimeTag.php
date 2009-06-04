<?php


abstract class BaseEtimeTag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $etime_id;


	
	protected $tag_id;

	
	protected $aEtime;

	
	protected $aTag;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getEtimeId()
	{

		return $this->etime_id;
	}

	
	public function getTagId()
	{

		return $this->tag_id;
	}

	
	public function setEtimeId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->etime_id !== $v) {
			$this->etime_id = $v;
			$this->modifiedColumns[] = EtimeTagPeer::ETIME_ID;
		}

		if ($this->aEtime !== null && $this->aEtime->getId() !== $v) {
			$this->aEtime = null;
		}

	} 
	
	public function setTagId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tag_id !== $v) {
			$this->tag_id = $v;
			$this->modifiedColumns[] = EtimeTagPeer::TAG_ID;
		}

		if ($this->aTag !== null && $this->aTag->getId() !== $v) {
			$this->aTag = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->etime_id = $rs->getInt($startcol + 0);

			$this->tag_id = $rs->getInt($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EtimeTag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EtimeTagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EtimeTagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EtimeTagPeer::DATABASE_NAME);
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

			if ($this->aTag !== null) {
				if ($this->aTag->isModified()) {
					$affectedRows += $this->aTag->save($con);
				}
				$this->setTag($this->aTag);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EtimeTagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += EtimeTagPeer::doUpdate($this, $con);
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


												
			if ($this->aEtime !== null) {
				if (!$this->aEtime->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEtime->getValidationFailures());
				}
			}

			if ($this->aTag !== null) {
				if (!$this->aTag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTag->getValidationFailures());
				}
			}


			if (($retval = EtimeTagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EtimeTagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getEtimeId();
				break;
			case 1:
				return $this->getTagId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EtimeTagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEtimeId(),
			$keys[1] => $this->getTagId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EtimeTagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setEtimeId($value);
				break;
			case 1:
				$this->setTagId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EtimeTagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEtimeId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTagId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EtimeTagPeer::DATABASE_NAME);

		if ($this->isColumnModified(EtimeTagPeer::ETIME_ID)) $criteria->add(EtimeTagPeer::ETIME_ID, $this->etime_id);
		if ($this->isColumnModified(EtimeTagPeer::TAG_ID)) $criteria->add(EtimeTagPeer::TAG_ID, $this->tag_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EtimeTagPeer::DATABASE_NAME);

		$criteria->add(EtimeTagPeer::ETIME_ID, $this->etime_id);
		$criteria->add(EtimeTagPeer::TAG_ID, $this->tag_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getEtimeId();

		$pks[1] = $this->getTagId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setEtimeId($keys[0]);

		$this->setTagId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{


		$copyObj->setNew(true);

		$copyObj->setEtimeId(NULL); 
		$copyObj->setTagId(NULL); 
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
			self::$peer = new EtimeTagPeer();
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

	
	public function setTag($v)
	{


		if ($v === null) {
			$this->setTagId(NULL);
		} else {
			$this->setTagId($v->getId());
		}


		$this->aTag = $v;
	}


	
	public function getTag($con = null)
	{
		if ($this->aTag === null && ($this->tag_id !== null)) {
						include_once 'lib/model/om/BaseTagPeer.php';

			$this->aTag = TagPeer::retrieveByPK($this->tag_id, $con);

			
		}
		return $this->aTag;
	}

} 
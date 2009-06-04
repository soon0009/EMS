<?php


abstract class BaseEventTag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $event_id;


	
	protected $tag_id;

	
	protected $aEvent;

	
	protected $aTag;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getEventId()
	{

		return $this->event_id;
	}

	
	public function getTagId()
	{

		return $this->tag_id;
	}

	
	public function setEventId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->event_id !== $v) {
			$this->event_id = $v;
			$this->modifiedColumns[] = EventTagPeer::EVENT_ID;
		}

		if ($this->aEvent !== null && $this->aEvent->getId() !== $v) {
			$this->aEvent = null;
		}

	} 
	
	public function setTagId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tag_id !== $v) {
			$this->tag_id = $v;
			$this->modifiedColumns[] = EventTagPeer::TAG_ID;
		}

		if ($this->aTag !== null && $this->aTag->getId() !== $v) {
			$this->aTag = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->event_id = $rs->getInt($startcol + 0);

			$this->tag_id = $rs->getInt($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EventTag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EventTagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EventTagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EventTagPeer::DATABASE_NAME);
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

			if ($this->aTag !== null) {
				if ($this->aTag->isModified()) {
					$affectedRows += $this->aTag->save($con);
				}
				$this->setTag($this->aTag);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EventTagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += EventTagPeer::doUpdate($this, $con);
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

			if ($this->aTag !== null) {
				if (!$this->aTag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTag->getValidationFailures());
				}
			}


			if (($retval = EventTagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EventTagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getEventId();
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
		$keys = EventTagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEventId(),
			$keys[1] => $this->getTagId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EventTagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setEventId($value);
				break;
			case 1:
				$this->setTagId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EventTagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEventId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTagId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EventTagPeer::DATABASE_NAME);

		if ($this->isColumnModified(EventTagPeer::EVENT_ID)) $criteria->add(EventTagPeer::EVENT_ID, $this->event_id);
		if ($this->isColumnModified(EventTagPeer::TAG_ID)) $criteria->add(EventTagPeer::TAG_ID, $this->tag_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EventTagPeer::DATABASE_NAME);

		$criteria->add(EventTagPeer::EVENT_ID, $this->event_id);
		$criteria->add(EventTagPeer::TAG_ID, $this->tag_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getEventId();

		$pks[1] = $this->getTagId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setEventId($keys[0]);

		$this->setTagId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{


		$copyObj->setNew(true);

		$copyObj->setEventId(NULL); 
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
			self::$peer = new EventTagPeer();
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
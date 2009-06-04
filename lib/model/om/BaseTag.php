<?php


abstract class BaseTag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $tag;


	
	protected $normalized_tag;


	
	protected $created_at;

	
	protected $collEventTags;

	
	protected $lastEventTagCriteria = null;

	
	protected $collEtimeTags;

	
	protected $lastEtimeTagCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTag()
	{

		return $this->tag;
	}

	
	public function getNormalizedTag()
	{

		return $this->normalized_tag;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TagPeer::ID;
		}

	} 
	
	public function setTag($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tag !== $v) {
			$this->tag = $v;
			$this->modifiedColumns[] = TagPeer::TAG;
		}

	} 
	
	public function setNormalizedTag($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->normalized_tag !== $v) {
			$this->normalized_tag = $v;
			$this->modifiedColumns[] = TagPeer::NORMALIZED_TAG;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = TagPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->tag = $rs->getString($startcol + 1);

			$this->normalized_tag = $rs->getString($startcol + 2);

			$this->created_at = $rs->getTimestamp($startcol + 3, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TagPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(TagPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TagPeer::DATABASE_NAME);
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
					$pk = TagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEventTags !== null) {
				foreach($this->collEventTags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEtimeTags !== null) {
				foreach($this->collEtimeTags as $referrerFK) {
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


			if (($retval = TagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEventTags !== null) {
					foreach($this->collEventTags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEtimeTags !== null) {
					foreach($this->collEtimeTags as $referrerFK) {
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
		$pos = TagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTag();
				break;
			case 2:
				return $this->getNormalizedTag();
				break;
			case 3:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTag(),
			$keys[2] => $this->getNormalizedTag(),
			$keys[3] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTag($value);
				break;
			case 2:
				$this->setNormalizedTag($value);
				break;
			case 3:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNormalizedTag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TagPeer::DATABASE_NAME);

		if ($this->isColumnModified(TagPeer::ID)) $criteria->add(TagPeer::ID, $this->id);
		if ($this->isColumnModified(TagPeer::TAG)) $criteria->add(TagPeer::TAG, $this->tag);
		if ($this->isColumnModified(TagPeer::NORMALIZED_TAG)) $criteria->add(TagPeer::NORMALIZED_TAG, $this->normalized_tag);
		if ($this->isColumnModified(TagPeer::CREATED_AT)) $criteria->add(TagPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TagPeer::DATABASE_NAME);

		$criteria->add(TagPeer::ID, $this->id);

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

		$copyObj->setTag($this->tag);

		$copyObj->setNormalizedTag($this->normalized_tag);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getEventTags() as $relObj) {
				$copyObj->addEventTag($relObj->copy($deepCopy));
			}

			foreach($this->getEtimeTags() as $relObj) {
				$copyObj->addEtimeTag($relObj->copy($deepCopy));
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
			self::$peer = new TagPeer();
		}
		return self::$peer;
	}

	
	public function initEventTags()
	{
		if ($this->collEventTags === null) {
			$this->collEventTags = array();
		}
	}

	
	public function getEventTags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventTags === null) {
			if ($this->isNew()) {
			   $this->collEventTags = array();
			} else {

				$criteria->add(EventTagPeer::TAG_ID, $this->getId());

				EventTagPeer::addSelectColumns($criteria);
				$this->collEventTags = EventTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EventTagPeer::TAG_ID, $this->getId());

				EventTagPeer::addSelectColumns($criteria);
				if (!isset($this->lastEventTagCriteria) || !$this->lastEventTagCriteria->equals($criteria)) {
					$this->collEventTags = EventTagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEventTagCriteria = $criteria;
		return $this->collEventTags;
	}

	
	public function countEventTags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEventTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EventTagPeer::TAG_ID, $this->getId());

		return EventTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEventTag(EventTag $l)
	{
		$this->collEventTags[] = $l;
		$l->setTag($this);
	}


	
	public function getEventTagsJoinEvent($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventTags === null) {
			if ($this->isNew()) {
				$this->collEventTags = array();
			} else {

				$criteria->add(EventTagPeer::TAG_ID, $this->getId());

				$this->collEventTags = EventTagPeer::doSelectJoinEvent($criteria, $con);
			}
		} else {
									
			$criteria->add(EventTagPeer::TAG_ID, $this->getId());

			if (!isset($this->lastEventTagCriteria) || !$this->lastEventTagCriteria->equals($criteria)) {
				$this->collEventTags = EventTagPeer::doSelectJoinEvent($criteria, $con);
			}
		}
		$this->lastEventTagCriteria = $criteria;

		return $this->collEventTags;
	}

	
	public function initEtimeTags()
	{
		if ($this->collEtimeTags === null) {
			$this->collEtimeTags = array();
		}
	}

	
	public function getEtimeTags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEtimeTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEtimeTags === null) {
			if ($this->isNew()) {
			   $this->collEtimeTags = array();
			} else {

				$criteria->add(EtimeTagPeer::TAG_ID, $this->getId());

				EtimeTagPeer::addSelectColumns($criteria);
				$this->collEtimeTags = EtimeTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EtimeTagPeer::TAG_ID, $this->getId());

				EtimeTagPeer::addSelectColumns($criteria);
				if (!isset($this->lastEtimeTagCriteria) || !$this->lastEtimeTagCriteria->equals($criteria)) {
					$this->collEtimeTags = EtimeTagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEtimeTagCriteria = $criteria;
		return $this->collEtimeTags;
	}

	
	public function countEtimeTags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEtimeTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EtimeTagPeer::TAG_ID, $this->getId());

		return EtimeTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEtimeTag(EtimeTag $l)
	{
		$this->collEtimeTags[] = $l;
		$l->setTag($this);
	}


	
	public function getEtimeTagsJoinEtime($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEtimeTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEtimeTags === null) {
			if ($this->isNew()) {
				$this->collEtimeTags = array();
			} else {

				$criteria->add(EtimeTagPeer::TAG_ID, $this->getId());

				$this->collEtimeTags = EtimeTagPeer::doSelectJoinEtime($criteria, $con);
			}
		} else {
									
			$criteria->add(EtimeTagPeer::TAG_ID, $this->getId());

			if (!isset($this->lastEtimeTagCriteria) || !$this->lastEtimeTagCriteria->equals($criteria)) {
				$this->collEtimeTags = EtimeTagPeer::doSelectJoinEtime($criteria, $con);
			}
		}
		$this->lastEtimeTagCriteria = $criteria;

		return $this->collEtimeTags;
	}

} 
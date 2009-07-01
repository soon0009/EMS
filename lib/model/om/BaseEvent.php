<?php


abstract class BaseEvent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $title;


	
	protected $slug;


	
	protected $status_id;


	
	protected $category_id;


	
	protected $published = false;


	
	protected $media_potential = false;


	
	protected $description;


	
	protected $notes;


	
	protected $image_url;


	
	protected $organiser;


	
	protected $interested_parties;


	
	protected $updated_at;

	
	protected $aStatus;

	
	protected $aCategory;

	
	protected $collEtimes;

	
	protected $lastEtimeCriteria = null;

	
	protected $collEventTags;

	
	protected $lastEventTagCriteria = null;

	
	protected $collRegForms;

	
	protected $lastRegFormCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getSlug()
	{

		return $this->slug;
	}

	
	public function getStatusId()
	{

		return $this->status_id;
	}

	
	public function getCategoryId()
	{

		return $this->category_id;
	}

	
	public function getPublished()
	{

		return $this->published;
	}

	
	public function getMediaPotential()
	{

		return $this->media_potential;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getNotes()
	{

		return $this->notes;
	}

	
	public function getImageUrl()
	{

		return $this->image_url;
	}

	
	public function getOrganiser()
	{

		return $this->organiser;
	}

	
	public function getInterestedParties()
	{

		return $this->interested_parties;
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
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
			$this->modifiedColumns[] = EventPeer::ID;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = EventPeer::TITLE;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = EventPeer::SLUG;
		}

	} 
	
	public function setStatusId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status_id !== $v) {
			$this->status_id = $v;
			$this->modifiedColumns[] = EventPeer::STATUS_ID;
		}

		if ($this->aStatus !== null && $this->aStatus->getId() !== $v) {
			$this->aStatus = null;
		}

	} 
	
	public function setCategoryId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->category_id !== $v) {
			$this->category_id = $v;
			$this->modifiedColumns[] = EventPeer::CATEGORY_ID;
		}

		if ($this->aCategory !== null && $this->aCategory->getId() !== $v) {
			$this->aCategory = null;
		}

	} 
	
	public function setPublished($v)
	{

		if ($this->published !== $v || $v === false) {
			$this->published = $v;
			$this->modifiedColumns[] = EventPeer::PUBLISHED;
		}

	} 
	
	public function setMediaPotential($v)
	{

		if ($this->media_potential !== $v || $v === false) {
			$this->media_potential = $v;
			$this->modifiedColumns[] = EventPeer::MEDIA_POTENTIAL;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = EventPeer::DESCRIPTION;
		}

	} 
	
	public function setNotes($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notes !== $v) {
			$this->notes = $v;
			$this->modifiedColumns[] = EventPeer::NOTES;
		}

	} 
	
	public function setImageUrl($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->image_url !== $v) {
			$this->image_url = $v;
			$this->modifiedColumns[] = EventPeer::IMAGE_URL;
		}

	} 
	
	public function setOrganiser($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->organiser !== $v) {
			$this->organiser = $v;
			$this->modifiedColumns[] = EventPeer::ORGANISER;
		}

	} 
	
	public function setInterestedParties($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->interested_parties !== $v) {
			$this->interested_parties = $v;
			$this->modifiedColumns[] = EventPeer::INTERESTED_PARTIES;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = EventPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->title = $rs->getString($startcol + 1);

			$this->slug = $rs->getString($startcol + 2);

			$this->status_id = $rs->getInt($startcol + 3);

			$this->category_id = $rs->getInt($startcol + 4);

			$this->published = $rs->getBoolean($startcol + 5);

			$this->media_potential = $rs->getBoolean($startcol + 6);

			$this->description = $rs->getString($startcol + 7);

			$this->notes = $rs->getString($startcol + 8);

			$this->image_url = $rs->getString($startcol + 9);

			$this->organiser = $rs->getString($startcol + 10);

			$this->interested_parties = $rs->getString($startcol + 11);

			$this->updated_at = $rs->getTimestamp($startcol + 12, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Event object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EventPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isModified() && !$this->isColumnModified(EventPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME);
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


												
			if ($this->aStatus !== null) {
				if ($this->aStatus->isModified()) {
					$affectedRows += $this->aStatus->save($con);
				}
				$this->setStatus($this->aStatus);
			}

			if ($this->aCategory !== null) {
				if ($this->aCategory->isModified()) {
					$affectedRows += $this->aCategory->save($con);
				}
				$this->setCategory($this->aCategory);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EventPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EventPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEtimes !== null) {
				foreach($this->collEtimes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEventTags !== null) {
				foreach($this->collEventTags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRegForms !== null) {
				foreach($this->collRegForms as $referrerFK) {
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


												
			if ($this->aStatus !== null) {
				if (!$this->aStatus->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aStatus->getValidationFailures());
				}
			}

			if ($this->aCategory !== null) {
				if (!$this->aCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategory->getValidationFailures());
				}
			}


			if (($retval = EventPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEtimes !== null) {
					foreach($this->collEtimes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEventTags !== null) {
					foreach($this->collEventTags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRegForms !== null) {
					foreach($this->collRegForms as $referrerFK) {
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
		$pos = EventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTitle();
				break;
			case 2:
				return $this->getSlug();
				break;
			case 3:
				return $this->getStatusId();
				break;
			case 4:
				return $this->getCategoryId();
				break;
			case 5:
				return $this->getPublished();
				break;
			case 6:
				return $this->getMediaPotential();
				break;
			case 7:
				return $this->getDescription();
				break;
			case 8:
				return $this->getNotes();
				break;
			case 9:
				return $this->getImageUrl();
				break;
			case 10:
				return $this->getOrganiser();
				break;
			case 11:
				return $this->getInterestedParties();
				break;
			case 12:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EventPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitle(),
			$keys[2] => $this->getSlug(),
			$keys[3] => $this->getStatusId(),
			$keys[4] => $this->getCategoryId(),
			$keys[5] => $this->getPublished(),
			$keys[6] => $this->getMediaPotential(),
			$keys[7] => $this->getDescription(),
			$keys[8] => $this->getNotes(),
			$keys[9] => $this->getImageUrl(),
			$keys[10] => $this->getOrganiser(),
			$keys[11] => $this->getInterestedParties(),
			$keys[12] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTitle($value);
				break;
			case 2:
				$this->setSlug($value);
				break;
			case 3:
				$this->setStatusId($value);
				break;
			case 4:
				$this->setCategoryId($value);
				break;
			case 5:
				$this->setPublished($value);
				break;
			case 6:
				$this->setMediaPotential($value);
				break;
			case 7:
				$this->setDescription($value);
				break;
			case 8:
				$this->setNotes($value);
				break;
			case 9:
				$this->setImageUrl($value);
				break;
			case 10:
				$this->setOrganiser($value);
				break;
			case 11:
				$this->setInterestedParties($value);
				break;
			case 12:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EventPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSlug($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatusId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCategoryId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPublished($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMediaPotential($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDescription($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNotes($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setImageUrl($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setOrganiser($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setInterestedParties($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedAt($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EventPeer::DATABASE_NAME);

		if ($this->isColumnModified(EventPeer::ID)) $criteria->add(EventPeer::ID, $this->id);
		if ($this->isColumnModified(EventPeer::TITLE)) $criteria->add(EventPeer::TITLE, $this->title);
		if ($this->isColumnModified(EventPeer::SLUG)) $criteria->add(EventPeer::SLUG, $this->slug);
		if ($this->isColumnModified(EventPeer::STATUS_ID)) $criteria->add(EventPeer::STATUS_ID, $this->status_id);
		if ($this->isColumnModified(EventPeer::CATEGORY_ID)) $criteria->add(EventPeer::CATEGORY_ID, $this->category_id);
		if ($this->isColumnModified(EventPeer::PUBLISHED)) $criteria->add(EventPeer::PUBLISHED, $this->published);
		if ($this->isColumnModified(EventPeer::MEDIA_POTENTIAL)) $criteria->add(EventPeer::MEDIA_POTENTIAL, $this->media_potential);
		if ($this->isColumnModified(EventPeer::DESCRIPTION)) $criteria->add(EventPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(EventPeer::NOTES)) $criteria->add(EventPeer::NOTES, $this->notes);
		if ($this->isColumnModified(EventPeer::IMAGE_URL)) $criteria->add(EventPeer::IMAGE_URL, $this->image_url);
		if ($this->isColumnModified(EventPeer::ORGANISER)) $criteria->add(EventPeer::ORGANISER, $this->organiser);
		if ($this->isColumnModified(EventPeer::INTERESTED_PARTIES)) $criteria->add(EventPeer::INTERESTED_PARTIES, $this->interested_parties);
		if ($this->isColumnModified(EventPeer::UPDATED_AT)) $criteria->add(EventPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EventPeer::DATABASE_NAME);

		$criteria->add(EventPeer::ID, $this->id);

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

		$copyObj->setTitle($this->title);

		$copyObj->setSlug($this->slug);

		$copyObj->setStatusId($this->status_id);

		$copyObj->setCategoryId($this->category_id);

		$copyObj->setPublished($this->published);

		$copyObj->setMediaPotential($this->media_potential);

		$copyObj->setDescription($this->description);

		$copyObj->setNotes($this->notes);

		$copyObj->setImageUrl($this->image_url);

		$copyObj->setOrganiser($this->organiser);

		$copyObj->setInterestedParties($this->interested_parties);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getEtimes() as $relObj) {
				$copyObj->addEtime($relObj->copy($deepCopy));
			}

			foreach($this->getEventTags() as $relObj) {
				$copyObj->addEventTag($relObj->copy($deepCopy));
			}

			foreach($this->getRegForms() as $relObj) {
				$copyObj->addRegForm($relObj->copy($deepCopy));
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
			self::$peer = new EventPeer();
		}
		return self::$peer;
	}

	
	public function setStatus($v)
	{


		if ($v === null) {
			$this->setStatusId(NULL);
		} else {
			$this->setStatusId($v->getId());
		}


		$this->aStatus = $v;
	}


	
	public function getStatus($con = null)
	{
		if ($this->aStatus === null && ($this->status_id !== null)) {
						include_once 'lib/model/om/BaseStatusPeer.php';

			$this->aStatus = StatusPeer::retrieveByPK($this->status_id, $con);

			
		}
		return $this->aStatus;
	}

	
	public function setCategory($v)
	{


		if ($v === null) {
			$this->setCategoryId(NULL);
		} else {
			$this->setCategoryId($v->getId());
		}


		$this->aCategory = $v;
	}


	
	public function getCategory($con = null)
	{
		if ($this->aCategory === null && ($this->category_id !== null)) {
						include_once 'lib/model/om/BaseCategoryPeer.php';

			$this->aCategory = CategoryPeer::retrieveByPK($this->category_id, $con);

			
		}
		return $this->aCategory;
	}

	
	public function initEtimes()
	{
		if ($this->collEtimes === null) {
			$this->collEtimes = array();
		}
	}

	
	public function getEtimes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEtimePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEtimes === null) {
			if ($this->isNew()) {
			   $this->collEtimes = array();
			} else {

				$criteria->add(EtimePeer::EVENT_ID, $this->getId());

				EtimePeer::addSelectColumns($criteria);
				$this->collEtimes = EtimePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EtimePeer::EVENT_ID, $this->getId());

				EtimePeer::addSelectColumns($criteria);
				if (!isset($this->lastEtimeCriteria) || !$this->lastEtimeCriteria->equals($criteria)) {
					$this->collEtimes = EtimePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEtimeCriteria = $criteria;
		return $this->collEtimes;
	}

	
	public function countEtimes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEtimePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EtimePeer::EVENT_ID, $this->getId());

		return EtimePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEtime(Etime $l)
	{
		$this->collEtimes[] = $l;
		$l->setEvent($this);
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

				$criteria->add(EventTagPeer::EVENT_ID, $this->getId());

				EventTagPeer::addSelectColumns($criteria);
				$this->collEventTags = EventTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EventTagPeer::EVENT_ID, $this->getId());

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

		$criteria->add(EventTagPeer::EVENT_ID, $this->getId());

		return EventTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEventTag(EventTag $l)
	{
		$this->collEventTags[] = $l;
		$l->setEvent($this);
	}


	
	public function getEventTagsJoinTag($criteria = null, $con = null)
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

				$criteria->add(EventTagPeer::EVENT_ID, $this->getId());

				$this->collEventTags = EventTagPeer::doSelectJoinTag($criteria, $con);
			}
		} else {
									
			$criteria->add(EventTagPeer::EVENT_ID, $this->getId());

			if (!isset($this->lastEventTagCriteria) || !$this->lastEventTagCriteria->equals($criteria)) {
				$this->collEventTags = EventTagPeer::doSelectJoinTag($criteria, $con);
			}
		}
		$this->lastEventTagCriteria = $criteria;

		return $this->collEventTags;
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

				$criteria->add(RegFormPeer::EVENT_ID, $this->getId());

				RegFormPeer::addSelectColumns($criteria);
				$this->collRegForms = RegFormPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RegFormPeer::EVENT_ID, $this->getId());

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

		$criteria->add(RegFormPeer::EVENT_ID, $this->getId());

		return RegFormPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRegForm(RegForm $l)
	{
		$this->collRegForms[] = $l;
		$l->setEvent($this);
	}


	
	public function getRegFormsJoinRegField($criteria = null, $con = null)
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

				$criteria->add(RegFormPeer::EVENT_ID, $this->getId());

				$this->collRegForms = RegFormPeer::doSelectJoinRegField($criteria, $con);
			}
		} else {
									
			$criteria->add(RegFormPeer::EVENT_ID, $this->getId());

			if (!isset($this->lastRegFormCriteria) || !$this->lastRegFormCriteria->equals($criteria)) {
				$this->collRegForms = RegFormPeer::doSelectJoinRegField($criteria, $con);
			}
		}
		$this->lastRegFormCriteria = $criteria;

		return $this->collRegForms;
	}

} 
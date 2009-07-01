<?php


abstract class BaseEtime extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $event_id;


	
	protected $title;


	
	protected $start_date;


	
	protected $end_date;


	
	protected $all_day = false;


	
	protected $location;


	
	protected $description;


	
	protected $notes;


	
	protected $capacity;


	
	protected $has_fee = false;


	
	protected $audio_visual_support = false;


	
	protected $organiser;


	
	protected $interested_parties;


	
	protected $updated_at;

	
	protected $aEvent;

	
	protected $collEtimeAudiences;

	
	protected $lastEtimeAudienceCriteria = null;

	
	protected $collEtimeRsvps;

	
	protected $lastEtimeRsvpCriteria = null;

	
	protected $collEtimeTags;

	
	protected $lastEtimeTagCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getEventId()
	{

		return $this->event_id;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getStartDate($format = 'Y-m-d H:i:s')
	{

		if ($this->start_date === null || $this->start_date === '') {
			return null;
		} elseif (!is_int($this->start_date)) {
						$ts = strtotime($this->start_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [start_date] as date/time value: " . var_export($this->start_date, true));
			}
		} else {
			$ts = $this->start_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getEndDate($format = 'Y-m-d H:i:s')
	{

		if ($this->end_date === null || $this->end_date === '') {
			return null;
		} elseif (!is_int($this->end_date)) {
						$ts = strtotime($this->end_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [end_date] as date/time value: " . var_export($this->end_date, true));
			}
		} else {
			$ts = $this->end_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAllDay()
	{

		return $this->all_day;
	}

	
	public function getLocation()
	{

		return $this->location;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getNotes()
	{

		return $this->notes;
	}

	
	public function getCapacity()
	{

		return $this->capacity;
	}

	
	public function getHasFee()
	{

		return $this->has_fee;
	}

	
	public function getAudioVisualSupport()
	{

		return $this->audio_visual_support;
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
			$this->modifiedColumns[] = EtimePeer::ID;
		}

	} 
	
	public function setEventId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->event_id !== $v) {
			$this->event_id = $v;
			$this->modifiedColumns[] = EtimePeer::EVENT_ID;
		}

		if ($this->aEvent !== null && $this->aEvent->getId() !== $v) {
			$this->aEvent = null;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = EtimePeer::TITLE;
		}

	} 
	
	public function setStartDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [start_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->start_date !== $ts) {
			$this->start_date = $ts;
			$this->modifiedColumns[] = EtimePeer::START_DATE;
		}

	} 
	
	public function setEndDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [end_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->end_date !== $ts) {
			$this->end_date = $ts;
			$this->modifiedColumns[] = EtimePeer::END_DATE;
		}

	} 
	
	public function setAllDay($v)
	{

		if ($this->all_day !== $v || $v === false) {
			$this->all_day = $v;
			$this->modifiedColumns[] = EtimePeer::ALL_DAY;
		}

	} 
	
	public function setLocation($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->location !== $v) {
			$this->location = $v;
			$this->modifiedColumns[] = EtimePeer::LOCATION;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = EtimePeer::DESCRIPTION;
		}

	} 
	
	public function setNotes($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notes !== $v) {
			$this->notes = $v;
			$this->modifiedColumns[] = EtimePeer::NOTES;
		}

	} 
	
	public function setCapacity($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->capacity !== $v) {
			$this->capacity = $v;
			$this->modifiedColumns[] = EtimePeer::CAPACITY;
		}

	} 
	
	public function setHasFee($v)
	{

		if ($this->has_fee !== $v || $v === false) {
			$this->has_fee = $v;
			$this->modifiedColumns[] = EtimePeer::HAS_FEE;
		}

	} 
	
	public function setAudioVisualSupport($v)
	{

		if ($this->audio_visual_support !== $v || $v === false) {
			$this->audio_visual_support = $v;
			$this->modifiedColumns[] = EtimePeer::AUDIO_VISUAL_SUPPORT;
		}

	} 
	
	public function setOrganiser($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->organiser !== $v) {
			$this->organiser = $v;
			$this->modifiedColumns[] = EtimePeer::ORGANISER;
		}

	} 
	
	public function setInterestedParties($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->interested_parties !== $v) {
			$this->interested_parties = $v;
			$this->modifiedColumns[] = EtimePeer::INTERESTED_PARTIES;
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
			$this->modifiedColumns[] = EtimePeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->event_id = $rs->getInt($startcol + 1);

			$this->title = $rs->getString($startcol + 2);

			$this->start_date = $rs->getTimestamp($startcol + 3, null);

			$this->end_date = $rs->getTimestamp($startcol + 4, null);

			$this->all_day = $rs->getBoolean($startcol + 5);

			$this->location = $rs->getString($startcol + 6);

			$this->description = $rs->getString($startcol + 7);

			$this->notes = $rs->getString($startcol + 8);

			$this->capacity = $rs->getInt($startcol + 9);

			$this->has_fee = $rs->getBoolean($startcol + 10);

			$this->audio_visual_support = $rs->getBoolean($startcol + 11);

			$this->organiser = $rs->getString($startcol + 12);

			$this->interested_parties = $rs->getString($startcol + 13);

			$this->updated_at = $rs->getTimestamp($startcol + 14, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Etime object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EtimePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EtimePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isModified() && !$this->isColumnModified(EtimePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EtimePeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EtimePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EtimePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEtimeAudiences !== null) {
				foreach($this->collEtimeAudiences as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEtimeRsvps !== null) {
				foreach($this->collEtimeRsvps as $referrerFK) {
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


												
			if ($this->aEvent !== null) {
				if (!$this->aEvent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEvent->getValidationFailures());
				}
			}


			if (($retval = EtimePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEtimeAudiences !== null) {
					foreach($this->collEtimeAudiences as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEtimeRsvps !== null) {
					foreach($this->collEtimeRsvps as $referrerFK) {
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
		$pos = EtimePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getEventId();
				break;
			case 2:
				return $this->getTitle();
				break;
			case 3:
				return $this->getStartDate();
				break;
			case 4:
				return $this->getEndDate();
				break;
			case 5:
				return $this->getAllDay();
				break;
			case 6:
				return $this->getLocation();
				break;
			case 7:
				return $this->getDescription();
				break;
			case 8:
				return $this->getNotes();
				break;
			case 9:
				return $this->getCapacity();
				break;
			case 10:
				return $this->getHasFee();
				break;
			case 11:
				return $this->getAudioVisualSupport();
				break;
			case 12:
				return $this->getOrganiser();
				break;
			case 13:
				return $this->getInterestedParties();
				break;
			case 14:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EtimePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEventId(),
			$keys[2] => $this->getTitle(),
			$keys[3] => $this->getStartDate(),
			$keys[4] => $this->getEndDate(),
			$keys[5] => $this->getAllDay(),
			$keys[6] => $this->getLocation(),
			$keys[7] => $this->getDescription(),
			$keys[8] => $this->getNotes(),
			$keys[9] => $this->getCapacity(),
			$keys[10] => $this->getHasFee(),
			$keys[11] => $this->getAudioVisualSupport(),
			$keys[12] => $this->getOrganiser(),
			$keys[13] => $this->getInterestedParties(),
			$keys[14] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EtimePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setEventId($value);
				break;
			case 2:
				$this->setTitle($value);
				break;
			case 3:
				$this->setStartDate($value);
				break;
			case 4:
				$this->setEndDate($value);
				break;
			case 5:
				$this->setAllDay($value);
				break;
			case 6:
				$this->setLocation($value);
				break;
			case 7:
				$this->setDescription($value);
				break;
			case 8:
				$this->setNotes($value);
				break;
			case 9:
				$this->setCapacity($value);
				break;
			case 10:
				$this->setHasFee($value);
				break;
			case 11:
				$this->setAudioVisualSupport($value);
				break;
			case 12:
				$this->setOrganiser($value);
				break;
			case 13:
				$this->setInterestedParties($value);
				break;
			case 14:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EtimePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEventId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStartDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEndDate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAllDay($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLocation($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDescription($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNotes($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCapacity($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setHasFee($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAudioVisualSupport($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setOrganiser($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setInterestedParties($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedAt($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EtimePeer::DATABASE_NAME);

		if ($this->isColumnModified(EtimePeer::ID)) $criteria->add(EtimePeer::ID, $this->id);
		if ($this->isColumnModified(EtimePeer::EVENT_ID)) $criteria->add(EtimePeer::EVENT_ID, $this->event_id);
		if ($this->isColumnModified(EtimePeer::TITLE)) $criteria->add(EtimePeer::TITLE, $this->title);
		if ($this->isColumnModified(EtimePeer::START_DATE)) $criteria->add(EtimePeer::START_DATE, $this->start_date);
		if ($this->isColumnModified(EtimePeer::END_DATE)) $criteria->add(EtimePeer::END_DATE, $this->end_date);
		if ($this->isColumnModified(EtimePeer::ALL_DAY)) $criteria->add(EtimePeer::ALL_DAY, $this->all_day);
		if ($this->isColumnModified(EtimePeer::LOCATION)) $criteria->add(EtimePeer::LOCATION, $this->location);
		if ($this->isColumnModified(EtimePeer::DESCRIPTION)) $criteria->add(EtimePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(EtimePeer::NOTES)) $criteria->add(EtimePeer::NOTES, $this->notes);
		if ($this->isColumnModified(EtimePeer::CAPACITY)) $criteria->add(EtimePeer::CAPACITY, $this->capacity);
		if ($this->isColumnModified(EtimePeer::HAS_FEE)) $criteria->add(EtimePeer::HAS_FEE, $this->has_fee);
		if ($this->isColumnModified(EtimePeer::AUDIO_VISUAL_SUPPORT)) $criteria->add(EtimePeer::AUDIO_VISUAL_SUPPORT, $this->audio_visual_support);
		if ($this->isColumnModified(EtimePeer::ORGANISER)) $criteria->add(EtimePeer::ORGANISER, $this->organiser);
		if ($this->isColumnModified(EtimePeer::INTERESTED_PARTIES)) $criteria->add(EtimePeer::INTERESTED_PARTIES, $this->interested_parties);
		if ($this->isColumnModified(EtimePeer::UPDATED_AT)) $criteria->add(EtimePeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EtimePeer::DATABASE_NAME);

		$criteria->add(EtimePeer::ID, $this->id);

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

		$copyObj->setEventId($this->event_id);

		$copyObj->setTitle($this->title);

		$copyObj->setStartDate($this->start_date);

		$copyObj->setEndDate($this->end_date);

		$copyObj->setAllDay($this->all_day);

		$copyObj->setLocation($this->location);

		$copyObj->setDescription($this->description);

		$copyObj->setNotes($this->notes);

		$copyObj->setCapacity($this->capacity);

		$copyObj->setHasFee($this->has_fee);

		$copyObj->setAudioVisualSupport($this->audio_visual_support);

		$copyObj->setOrganiser($this->organiser);

		$copyObj->setInterestedParties($this->interested_parties);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getEtimeAudiences() as $relObj) {
				$copyObj->addEtimeAudience($relObj->copy($deepCopy));
			}

			foreach($this->getEtimeRsvps() as $relObj) {
				$copyObj->addEtimeRsvp($relObj->copy($deepCopy));
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
			self::$peer = new EtimePeer();
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

				$criteria->add(EtimeAudiencePeer::ETIME_ID, $this->getId());

				EtimeAudiencePeer::addSelectColumns($criteria);
				$this->collEtimeAudiences = EtimeAudiencePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EtimeAudiencePeer::ETIME_ID, $this->getId());

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

		$criteria->add(EtimeAudiencePeer::ETIME_ID, $this->getId());

		return EtimeAudiencePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEtimeAudience(EtimeAudience $l)
	{
		$this->collEtimeAudiences[] = $l;
		$l->setEtime($this);
	}


	
	public function getEtimeAudiencesJoinAudience($criteria = null, $con = null)
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

				$criteria->add(EtimeAudiencePeer::ETIME_ID, $this->getId());

				$this->collEtimeAudiences = EtimeAudiencePeer::doSelectJoinAudience($criteria, $con);
			}
		} else {
									
			$criteria->add(EtimeAudiencePeer::ETIME_ID, $this->getId());

			if (!isset($this->lastEtimeAudienceCriteria) || !$this->lastEtimeAudienceCriteria->equals($criteria)) {
				$this->collEtimeAudiences = EtimeAudiencePeer::doSelectJoinAudience($criteria, $con);
			}
		}
		$this->lastEtimeAudienceCriteria = $criteria;

		return $this->collEtimeAudiences;
	}

	
	public function initEtimeRsvps()
	{
		if ($this->collEtimeRsvps === null) {
			$this->collEtimeRsvps = array();
		}
	}

	
	public function getEtimeRsvps($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEtimeRsvpPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEtimeRsvps === null) {
			if ($this->isNew()) {
			   $this->collEtimeRsvps = array();
			} else {

				$criteria->add(EtimeRsvpPeer::ETIME_ID, $this->getId());

				EtimeRsvpPeer::addSelectColumns($criteria);
				$this->collEtimeRsvps = EtimeRsvpPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EtimeRsvpPeer::ETIME_ID, $this->getId());

				EtimeRsvpPeer::addSelectColumns($criteria);
				if (!isset($this->lastEtimeRsvpCriteria) || !$this->lastEtimeRsvpCriteria->equals($criteria)) {
					$this->collEtimeRsvps = EtimeRsvpPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEtimeRsvpCriteria = $criteria;
		return $this->collEtimeRsvps;
	}

	
	public function countEtimeRsvps($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEtimeRsvpPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EtimeRsvpPeer::ETIME_ID, $this->getId());

		return EtimeRsvpPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEtimeRsvp(EtimeRsvp $l)
	{
		$this->collEtimeRsvps[] = $l;
		$l->setEtime($this);
	}


	
	public function getEtimeRsvpsJoinRsvp($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEtimeRsvpPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEtimeRsvps === null) {
			if ($this->isNew()) {
				$this->collEtimeRsvps = array();
			} else {

				$criteria->add(EtimeRsvpPeer::ETIME_ID, $this->getId());

				$this->collEtimeRsvps = EtimeRsvpPeer::doSelectJoinRsvp($criteria, $con);
			}
		} else {
									
			$criteria->add(EtimeRsvpPeer::ETIME_ID, $this->getId());

			if (!isset($this->lastEtimeRsvpCriteria) || !$this->lastEtimeRsvpCriteria->equals($criteria)) {
				$this->collEtimeRsvps = EtimeRsvpPeer::doSelectJoinRsvp($criteria, $con);
			}
		}
		$this->lastEtimeRsvpCriteria = $criteria;

		return $this->collEtimeRsvps;
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

				$criteria->add(EtimeTagPeer::ETIME_ID, $this->getId());

				EtimeTagPeer::addSelectColumns($criteria);
				$this->collEtimeTags = EtimeTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EtimeTagPeer::ETIME_ID, $this->getId());

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

		$criteria->add(EtimeTagPeer::ETIME_ID, $this->getId());

		return EtimeTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEtimeTag(EtimeTag $l)
	{
		$this->collEtimeTags[] = $l;
		$l->setEtime($this);
	}


	
	public function getEtimeTagsJoinTag($criteria = null, $con = null)
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

				$criteria->add(EtimeTagPeer::ETIME_ID, $this->getId());

				$this->collEtimeTags = EtimeTagPeer::doSelectJoinTag($criteria, $con);
			}
		} else {
									
			$criteria->add(EtimeTagPeer::ETIME_ID, $this->getId());

			if (!isset($this->lastEtimeTagCriteria) || !$this->lastEtimeTagCriteria->equals($criteria)) {
				$this->collEtimeTags = EtimeTagPeer::doSelectJoinTag($criteria, $con);
			}
		}
		$this->lastEtimeTagCriteria = $criteria;

		return $this->collEtimeTags;
	}

} 
<?php


abstract class BaseEvent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $title;


	
	protected $status_id;


	
	protected $published = false;


	
	protected $description;


	
	protected $notes;


	
	protected $image_url;


	
	protected $organiser;


	
	protected $interested_parties;


	
	protected $created_at;

	
	protected $aStatus;

	
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

	
	public function getStatusId()
	{

		return $this->status_id;
	}

	
	public function getPublished()
	{

		return $this->published;
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
	
	public function setPublished($v)
	{

		if ($this->published !== $v || $v === false) {
			$this->published = $v;
			$this->modifiedColumns[] = EventPeer::PUBLISHED;
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
			$this->modifiedColumns[] = EventPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->title = $rs->getString($startcol + 1);

			$this->status_id = $rs->getInt($startcol + 2);

			$this->published = $rs->getBoolean($startcol + 3);

			$this->description = $rs->getString($startcol + 4);

			$this->notes = $rs->getString($startcol + 5);

			$this->image_url = $rs->getString($startcol + 6);

			$this->organiser = $rs->getString($startcol + 7);

			$this->interested_parties = $rs->getString($startcol + 8);

			$this->created_at = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
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
    if ($this->isNew() && !$this->isColumnModified(EventPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
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


			if (($retval = EventPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
				return $this->getStatusId();
				break;
			case 3:
				return $this->getPublished();
				break;
			case 4:
				return $this->getDescription();
				break;
			case 5:
				return $this->getNotes();
				break;
			case 6:
				return $this->getImageUrl();
				break;
			case 7:
				return $this->getOrganiser();
				break;
			case 8:
				return $this->getInterestedParties();
				break;
			case 9:
				return $this->getCreatedAt();
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
			$keys[2] => $this->getStatusId(),
			$keys[3] => $this->getPublished(),
			$keys[4] => $this->getDescription(),
			$keys[5] => $this->getNotes(),
			$keys[6] => $this->getImageUrl(),
			$keys[7] => $this->getOrganiser(),
			$keys[8] => $this->getInterestedParties(),
			$keys[9] => $this->getCreatedAt(),
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
				$this->setStatusId($value);
				break;
			case 3:
				$this->setPublished($value);
				break;
			case 4:
				$this->setDescription($value);
				break;
			case 5:
				$this->setNotes($value);
				break;
			case 6:
				$this->setImageUrl($value);
				break;
			case 7:
				$this->setOrganiser($value);
				break;
			case 8:
				$this->setInterestedParties($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EventPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStatusId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPublished($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNotes($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setImageUrl($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setOrganiser($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setInterestedParties($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EventPeer::DATABASE_NAME);

		if ($this->isColumnModified(EventPeer::ID)) $criteria->add(EventPeer::ID, $this->id);
		if ($this->isColumnModified(EventPeer::TITLE)) $criteria->add(EventPeer::TITLE, $this->title);
		if ($this->isColumnModified(EventPeer::STATUS_ID)) $criteria->add(EventPeer::STATUS_ID, $this->status_id);
		if ($this->isColumnModified(EventPeer::PUBLISHED)) $criteria->add(EventPeer::PUBLISHED, $this->published);
		if ($this->isColumnModified(EventPeer::DESCRIPTION)) $criteria->add(EventPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(EventPeer::NOTES)) $criteria->add(EventPeer::NOTES, $this->notes);
		if ($this->isColumnModified(EventPeer::IMAGE_URL)) $criteria->add(EventPeer::IMAGE_URL, $this->image_url);
		if ($this->isColumnModified(EventPeer::ORGANISER)) $criteria->add(EventPeer::ORGANISER, $this->organiser);
		if ($this->isColumnModified(EventPeer::INTERESTED_PARTIES)) $criteria->add(EventPeer::INTERESTED_PARTIES, $this->interested_parties);
		if ($this->isColumnModified(EventPeer::CREATED_AT)) $criteria->add(EventPeer::CREATED_AT, $this->created_at);

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

		$copyObj->setStatusId($this->status_id);

		$copyObj->setPublished($this->published);

		$copyObj->setDescription($this->description);

		$copyObj->setNotes($this->notes);

		$copyObj->setImageUrl($this->image_url);

		$copyObj->setOrganiser($this->organiser);

		$copyObj->setInterestedParties($this->interested_parties);

		$copyObj->setCreatedAt($this->created_at);


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

} 
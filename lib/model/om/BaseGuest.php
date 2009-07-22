<?php


abstract class BaseGuest extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $etime_id;


	
	protected $attending = false;


	
	protected $paid = false;


	
	protected $reg_date;


	
	protected $extra_info;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $title;


	
	protected $firstname;


	
	protected $lastname;


	
	protected $preferred_name;


	
	protected $email;


	
	protected $phone;


	
	protected $mobile;


	
	protected $primary_address_line_1;


	
	protected $primary_address_line_2;


	
	protected $primary_address_line_3;


	
	protected $primary_address_city;


	
	protected $primary_address_postcode;


	
	protected $primary_address_state;


	
	protected $primary_address_country;


	
	protected $secondary_address_line_1;


	
	protected $secondary_address_line_2;


	
	protected $secondary_address_line_3;


	
	protected $secondary_address_city;


	
	protected $secondary_address_postcode;


	
	protected $secondary_address_state;


	
	protected $secondary_address_country;


	
	protected $special_req;


	
	protected $position;


	
	protected $company;


	
	protected $srn;


	
	protected $fan;


	
	protected $aou;


	
	protected $id;

	
	protected $aEtime;

	
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

	
	public function getAttending()
	{

		return $this->attending;
	}

	
	public function getPaid()
	{

		return $this->paid;
	}

	
	public function getRegDate($format = 'Y-m-d H:i:s')
	{

		if ($this->reg_date === null || $this->reg_date === '') {
			return null;
		} elseif (!is_int($this->reg_date)) {
						$ts = strtotime($this->reg_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [reg_date] as date/time value: " . var_export($this->reg_date, true));
			}
		} else {
			$ts = $this->reg_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getExtraInfo()
	{

		return $this->extra_info;
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

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getFirstname()
	{

		return $this->firstname;
	}

	
	public function getLastname()
	{

		return $this->lastname;
	}

	
	public function getPreferredName()
	{

		return $this->preferred_name;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getPhone()
	{

		return $this->phone;
	}

	
	public function getMobile()
	{

		return $this->mobile;
	}

	
	public function getPrimaryAddressLine1()
	{

		return $this->primary_address_line_1;
	}

	
	public function getPrimaryAddressLine2()
	{

		return $this->primary_address_line_2;
	}

	
	public function getPrimaryAddressLine3()
	{

		return $this->primary_address_line_3;
	}

	
	public function getPrimaryAddressCity()
	{

		return $this->primary_address_city;
	}

	
	public function getPrimaryAddressPostcode()
	{

		return $this->primary_address_postcode;
	}

	
	public function getPrimaryAddressState()
	{

		return $this->primary_address_state;
	}

	
	public function getPrimaryAddressCountry()
	{

		return $this->primary_address_country;
	}

	
	public function getSecondaryAddressLine1()
	{

		return $this->secondary_address_line_1;
	}

	
	public function getSecondaryAddressLine2()
	{

		return $this->secondary_address_line_2;
	}

	
	public function getSecondaryAddressLine3()
	{

		return $this->secondary_address_line_3;
	}

	
	public function getSecondaryAddressCity()
	{

		return $this->secondary_address_city;
	}

	
	public function getSecondaryAddressPostcode()
	{

		return $this->secondary_address_postcode;
	}

	
	public function getSecondaryAddressState()
	{

		return $this->secondary_address_state;
	}

	
	public function getSecondaryAddressCountry()
	{

		return $this->secondary_address_country;
	}

	
	public function getSpecialReq()
	{

		return $this->special_req;
	}

	
	public function getPosition()
	{

		return $this->position;
	}

	
	public function getCompany()
	{

		return $this->company;
	}

	
	public function getSrn()
	{

		return $this->srn;
	}

	
	public function getFan()
	{

		return $this->fan;
	}

	
	public function getAou()
	{

		return $this->aou;
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
	
	public function setAttending($v)
	{

		if ($this->attending !== $v || $v === false) {
			$this->attending = $v;
			$this->modifiedColumns[] = GuestPeer::ATTENDING;
		}

	} 
	
	public function setPaid($v)
	{

		if ($this->paid !== $v || $v === false) {
			$this->paid = $v;
			$this->modifiedColumns[] = GuestPeer::PAID;
		}

	} 
	
	public function setRegDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [reg_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->reg_date !== $ts) {
			$this->reg_date = $ts;
			$this->modifiedColumns[] = GuestPeer::REG_DATE;
		}

	} 
	
	public function setExtraInfo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->extra_info !== $v) {
			$this->extra_info = $v;
			$this->modifiedColumns[] = GuestPeer::EXTRA_INFO;
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
			$this->modifiedColumns[] = GuestPeer::CREATED_AT;
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
			$this->modifiedColumns[] = GuestPeer::UPDATED_AT;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = GuestPeer::TITLE;
		}

	} 
	
	public function setFirstname($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->firstname !== $v) {
			$this->firstname = $v;
			$this->modifiedColumns[] = GuestPeer::FIRSTNAME;
		}

	} 
	
	public function setLastname($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->lastname !== $v) {
			$this->lastname = $v;
			$this->modifiedColumns[] = GuestPeer::LASTNAME;
		}

	} 
	
	public function setPreferredName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->preferred_name !== $v) {
			$this->preferred_name = $v;
			$this->modifiedColumns[] = GuestPeer::PREFERRED_NAME;
		}

	} 
	
	public function setEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = GuestPeer::EMAIL;
		}

	} 
	
	public function setPhone($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = GuestPeer::PHONE;
		}

	} 
	
	public function setMobile($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mobile !== $v) {
			$this->mobile = $v;
			$this->modifiedColumns[] = GuestPeer::MOBILE;
		}

	} 
	
	public function setPrimaryAddressLine1($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->primary_address_line_1 !== $v) {
			$this->primary_address_line_1 = $v;
			$this->modifiedColumns[] = GuestPeer::PRIMARY_ADDRESS_LINE_1;
		}

	} 
	
	public function setPrimaryAddressLine2($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->primary_address_line_2 !== $v) {
			$this->primary_address_line_2 = $v;
			$this->modifiedColumns[] = GuestPeer::PRIMARY_ADDRESS_LINE_2;
		}

	} 
	
	public function setPrimaryAddressLine3($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->primary_address_line_3 !== $v) {
			$this->primary_address_line_3 = $v;
			$this->modifiedColumns[] = GuestPeer::PRIMARY_ADDRESS_LINE_3;
		}

	} 
	
	public function setPrimaryAddressCity($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->primary_address_city !== $v) {
			$this->primary_address_city = $v;
			$this->modifiedColumns[] = GuestPeer::PRIMARY_ADDRESS_CITY;
		}

	} 
	
	public function setPrimaryAddressPostcode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->primary_address_postcode !== $v) {
			$this->primary_address_postcode = $v;
			$this->modifiedColumns[] = GuestPeer::PRIMARY_ADDRESS_POSTCODE;
		}

	} 
	
	public function setPrimaryAddressState($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->primary_address_state !== $v) {
			$this->primary_address_state = $v;
			$this->modifiedColumns[] = GuestPeer::PRIMARY_ADDRESS_STATE;
		}

	} 
	
	public function setPrimaryAddressCountry($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->primary_address_country !== $v) {
			$this->primary_address_country = $v;
			$this->modifiedColumns[] = GuestPeer::PRIMARY_ADDRESS_COUNTRY;
		}

	} 
	
	public function setSecondaryAddressLine1($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->secondary_address_line_1 !== $v) {
			$this->secondary_address_line_1 = $v;
			$this->modifiedColumns[] = GuestPeer::SECONDARY_ADDRESS_LINE_1;
		}

	} 
	
	public function setSecondaryAddressLine2($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->secondary_address_line_2 !== $v) {
			$this->secondary_address_line_2 = $v;
			$this->modifiedColumns[] = GuestPeer::SECONDARY_ADDRESS_LINE_2;
		}

	} 
	
	public function setSecondaryAddressLine3($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->secondary_address_line_3 !== $v) {
			$this->secondary_address_line_3 = $v;
			$this->modifiedColumns[] = GuestPeer::SECONDARY_ADDRESS_LINE_3;
		}

	} 
	
	public function setSecondaryAddressCity($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->secondary_address_city !== $v) {
			$this->secondary_address_city = $v;
			$this->modifiedColumns[] = GuestPeer::SECONDARY_ADDRESS_CITY;
		}

	} 
	
	public function setSecondaryAddressPostcode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->secondary_address_postcode !== $v) {
			$this->secondary_address_postcode = $v;
			$this->modifiedColumns[] = GuestPeer::SECONDARY_ADDRESS_POSTCODE;
		}

	} 
	
	public function setSecondaryAddressState($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->secondary_address_state !== $v) {
			$this->secondary_address_state = $v;
			$this->modifiedColumns[] = GuestPeer::SECONDARY_ADDRESS_STATE;
		}

	} 
	
	public function setSecondaryAddressCountry($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->secondary_address_country !== $v) {
			$this->secondary_address_country = $v;
			$this->modifiedColumns[] = GuestPeer::SECONDARY_ADDRESS_COUNTRY;
		}

	} 
	
	public function setSpecialReq($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->special_req !== $v) {
			$this->special_req = $v;
			$this->modifiedColumns[] = GuestPeer::SPECIAL_REQ;
		}

	} 
	
	public function setPosition($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->position !== $v) {
			$this->position = $v;
			$this->modifiedColumns[] = GuestPeer::POSITION;
		}

	} 
	
	public function setCompany($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->company !== $v) {
			$this->company = $v;
			$this->modifiedColumns[] = GuestPeer::COMPANY;
		}

	} 
	
	public function setSrn($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->srn !== $v) {
			$this->srn = $v;
			$this->modifiedColumns[] = GuestPeer::SRN;
		}

	} 
	
	public function setFan($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->fan !== $v) {
			$this->fan = $v;
			$this->modifiedColumns[] = GuestPeer::FAN;
		}

	} 
	
	public function setAou($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->aou !== $v) {
			$this->aou = $v;
			$this->modifiedColumns[] = GuestPeer::AOU;
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

			$this->attending = $rs->getBoolean($startcol + 1);

			$this->paid = $rs->getBoolean($startcol + 2);

			$this->reg_date = $rs->getTimestamp($startcol + 3, null);

			$this->extra_info = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->title = $rs->getString($startcol + 7);

			$this->firstname = $rs->getString($startcol + 8);

			$this->lastname = $rs->getString($startcol + 9);

			$this->preferred_name = $rs->getString($startcol + 10);

			$this->email = $rs->getString($startcol + 11);

			$this->phone = $rs->getString($startcol + 12);

			$this->mobile = $rs->getString($startcol + 13);

			$this->primary_address_line_1 = $rs->getString($startcol + 14);

			$this->primary_address_line_2 = $rs->getString($startcol + 15);

			$this->primary_address_line_3 = $rs->getString($startcol + 16);

			$this->primary_address_city = $rs->getString($startcol + 17);

			$this->primary_address_postcode = $rs->getString($startcol + 18);

			$this->primary_address_state = $rs->getString($startcol + 19);

			$this->primary_address_country = $rs->getString($startcol + 20);

			$this->secondary_address_line_1 = $rs->getString($startcol + 21);

			$this->secondary_address_line_2 = $rs->getString($startcol + 22);

			$this->secondary_address_line_3 = $rs->getString($startcol + 23);

			$this->secondary_address_city = $rs->getString($startcol + 24);

			$this->secondary_address_postcode = $rs->getString($startcol + 25);

			$this->secondary_address_state = $rs->getString($startcol + 26);

			$this->secondary_address_country = $rs->getString($startcol + 27);

			$this->special_req = $rs->getString($startcol + 28);

			$this->position = $rs->getString($startcol + 29);

			$this->company = $rs->getString($startcol + 30);

			$this->srn = $rs->getString($startcol + 31);

			$this->fan = $rs->getString($startcol + 32);

			$this->aou = $rs->getString($startcol + 33);

			$this->id = $rs->getInt($startcol + 34);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 35; 
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
    if ($this->isNew() && !$this->isColumnModified(GuestPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(GuestPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

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
				return $this->getAttending();
				break;
			case 2:
				return $this->getPaid();
				break;
			case 3:
				return $this->getRegDate();
				break;
			case 4:
				return $this->getExtraInfo();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			case 7:
				return $this->getTitle();
				break;
			case 8:
				return $this->getFirstname();
				break;
			case 9:
				return $this->getLastname();
				break;
			case 10:
				return $this->getPreferredName();
				break;
			case 11:
				return $this->getEmail();
				break;
			case 12:
				return $this->getPhone();
				break;
			case 13:
				return $this->getMobile();
				break;
			case 14:
				return $this->getPrimaryAddressLine1();
				break;
			case 15:
				return $this->getPrimaryAddressLine2();
				break;
			case 16:
				return $this->getPrimaryAddressLine3();
				break;
			case 17:
				return $this->getPrimaryAddressCity();
				break;
			case 18:
				return $this->getPrimaryAddressPostcode();
				break;
			case 19:
				return $this->getPrimaryAddressState();
				break;
			case 20:
				return $this->getPrimaryAddressCountry();
				break;
			case 21:
				return $this->getSecondaryAddressLine1();
				break;
			case 22:
				return $this->getSecondaryAddressLine2();
				break;
			case 23:
				return $this->getSecondaryAddressLine3();
				break;
			case 24:
				return $this->getSecondaryAddressCity();
				break;
			case 25:
				return $this->getSecondaryAddressPostcode();
				break;
			case 26:
				return $this->getSecondaryAddressState();
				break;
			case 27:
				return $this->getSecondaryAddressCountry();
				break;
			case 28:
				return $this->getSpecialReq();
				break;
			case 29:
				return $this->getPosition();
				break;
			case 30:
				return $this->getCompany();
				break;
			case 31:
				return $this->getSrn();
				break;
			case 32:
				return $this->getFan();
				break;
			case 33:
				return $this->getAou();
				break;
			case 34:
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
			$keys[1] => $this->getAttending(),
			$keys[2] => $this->getPaid(),
			$keys[3] => $this->getRegDate(),
			$keys[4] => $this->getExtraInfo(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getTitle(),
			$keys[8] => $this->getFirstname(),
			$keys[9] => $this->getLastname(),
			$keys[10] => $this->getPreferredName(),
			$keys[11] => $this->getEmail(),
			$keys[12] => $this->getPhone(),
			$keys[13] => $this->getMobile(),
			$keys[14] => $this->getPrimaryAddressLine1(),
			$keys[15] => $this->getPrimaryAddressLine2(),
			$keys[16] => $this->getPrimaryAddressLine3(),
			$keys[17] => $this->getPrimaryAddressCity(),
			$keys[18] => $this->getPrimaryAddressPostcode(),
			$keys[19] => $this->getPrimaryAddressState(),
			$keys[20] => $this->getPrimaryAddressCountry(),
			$keys[21] => $this->getSecondaryAddressLine1(),
			$keys[22] => $this->getSecondaryAddressLine2(),
			$keys[23] => $this->getSecondaryAddressLine3(),
			$keys[24] => $this->getSecondaryAddressCity(),
			$keys[25] => $this->getSecondaryAddressPostcode(),
			$keys[26] => $this->getSecondaryAddressState(),
			$keys[27] => $this->getSecondaryAddressCountry(),
			$keys[28] => $this->getSpecialReq(),
			$keys[29] => $this->getPosition(),
			$keys[30] => $this->getCompany(),
			$keys[31] => $this->getSrn(),
			$keys[32] => $this->getFan(),
			$keys[33] => $this->getAou(),
			$keys[34] => $this->getId(),
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
				$this->setAttending($value);
				break;
			case 2:
				$this->setPaid($value);
				break;
			case 3:
				$this->setRegDate($value);
				break;
			case 4:
				$this->setExtraInfo($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
			case 7:
				$this->setTitle($value);
				break;
			case 8:
				$this->setFirstname($value);
				break;
			case 9:
				$this->setLastname($value);
				break;
			case 10:
				$this->setPreferredName($value);
				break;
			case 11:
				$this->setEmail($value);
				break;
			case 12:
				$this->setPhone($value);
				break;
			case 13:
				$this->setMobile($value);
				break;
			case 14:
				$this->setPrimaryAddressLine1($value);
				break;
			case 15:
				$this->setPrimaryAddressLine2($value);
				break;
			case 16:
				$this->setPrimaryAddressLine3($value);
				break;
			case 17:
				$this->setPrimaryAddressCity($value);
				break;
			case 18:
				$this->setPrimaryAddressPostcode($value);
				break;
			case 19:
				$this->setPrimaryAddressState($value);
				break;
			case 20:
				$this->setPrimaryAddressCountry($value);
				break;
			case 21:
				$this->setSecondaryAddressLine1($value);
				break;
			case 22:
				$this->setSecondaryAddressLine2($value);
				break;
			case 23:
				$this->setSecondaryAddressLine3($value);
				break;
			case 24:
				$this->setSecondaryAddressCity($value);
				break;
			case 25:
				$this->setSecondaryAddressPostcode($value);
				break;
			case 26:
				$this->setSecondaryAddressState($value);
				break;
			case 27:
				$this->setSecondaryAddressCountry($value);
				break;
			case 28:
				$this->setSpecialReq($value);
				break;
			case 29:
				$this->setPosition($value);
				break;
			case 30:
				$this->setCompany($value);
				break;
			case 31:
				$this->setSrn($value);
				break;
			case 32:
				$this->setFan($value);
				break;
			case 33:
				$this->setAou($value);
				break;
			case 34:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GuestPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEtimeId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAttending($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPaid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRegDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setExtraInfo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTitle($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFirstname($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setLastname($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPreferredName($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEmail($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPhone($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMobile($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setPrimaryAddressLine1($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setPrimaryAddressLine2($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPrimaryAddressLine3($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setPrimaryAddressCity($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPrimaryAddressPostcode($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setPrimaryAddressState($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setPrimaryAddressCountry($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setSecondaryAddressLine1($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setSecondaryAddressLine2($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setSecondaryAddressLine3($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setSecondaryAddressCity($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setSecondaryAddressPostcode($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setSecondaryAddressState($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setSecondaryAddressCountry($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setSpecialReq($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setPosition($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCompany($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setSrn($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setFan($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setAou($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setId($arr[$keys[34]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GuestPeer::DATABASE_NAME);

		if ($this->isColumnModified(GuestPeer::ETIME_ID)) $criteria->add(GuestPeer::ETIME_ID, $this->etime_id);
		if ($this->isColumnModified(GuestPeer::ATTENDING)) $criteria->add(GuestPeer::ATTENDING, $this->attending);
		if ($this->isColumnModified(GuestPeer::PAID)) $criteria->add(GuestPeer::PAID, $this->paid);
		if ($this->isColumnModified(GuestPeer::REG_DATE)) $criteria->add(GuestPeer::REG_DATE, $this->reg_date);
		if ($this->isColumnModified(GuestPeer::EXTRA_INFO)) $criteria->add(GuestPeer::EXTRA_INFO, $this->extra_info);
		if ($this->isColumnModified(GuestPeer::CREATED_AT)) $criteria->add(GuestPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(GuestPeer::UPDATED_AT)) $criteria->add(GuestPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(GuestPeer::TITLE)) $criteria->add(GuestPeer::TITLE, $this->title);
		if ($this->isColumnModified(GuestPeer::FIRSTNAME)) $criteria->add(GuestPeer::FIRSTNAME, $this->firstname);
		if ($this->isColumnModified(GuestPeer::LASTNAME)) $criteria->add(GuestPeer::LASTNAME, $this->lastname);
		if ($this->isColumnModified(GuestPeer::PREFERRED_NAME)) $criteria->add(GuestPeer::PREFERRED_NAME, $this->preferred_name);
		if ($this->isColumnModified(GuestPeer::EMAIL)) $criteria->add(GuestPeer::EMAIL, $this->email);
		if ($this->isColumnModified(GuestPeer::PHONE)) $criteria->add(GuestPeer::PHONE, $this->phone);
		if ($this->isColumnModified(GuestPeer::MOBILE)) $criteria->add(GuestPeer::MOBILE, $this->mobile);
		if ($this->isColumnModified(GuestPeer::PRIMARY_ADDRESS_LINE_1)) $criteria->add(GuestPeer::PRIMARY_ADDRESS_LINE_1, $this->primary_address_line_1);
		if ($this->isColumnModified(GuestPeer::PRIMARY_ADDRESS_LINE_2)) $criteria->add(GuestPeer::PRIMARY_ADDRESS_LINE_2, $this->primary_address_line_2);
		if ($this->isColumnModified(GuestPeer::PRIMARY_ADDRESS_LINE_3)) $criteria->add(GuestPeer::PRIMARY_ADDRESS_LINE_3, $this->primary_address_line_3);
		if ($this->isColumnModified(GuestPeer::PRIMARY_ADDRESS_CITY)) $criteria->add(GuestPeer::PRIMARY_ADDRESS_CITY, $this->primary_address_city);
		if ($this->isColumnModified(GuestPeer::PRIMARY_ADDRESS_POSTCODE)) $criteria->add(GuestPeer::PRIMARY_ADDRESS_POSTCODE, $this->primary_address_postcode);
		if ($this->isColumnModified(GuestPeer::PRIMARY_ADDRESS_STATE)) $criteria->add(GuestPeer::PRIMARY_ADDRESS_STATE, $this->primary_address_state);
		if ($this->isColumnModified(GuestPeer::PRIMARY_ADDRESS_COUNTRY)) $criteria->add(GuestPeer::PRIMARY_ADDRESS_COUNTRY, $this->primary_address_country);
		if ($this->isColumnModified(GuestPeer::SECONDARY_ADDRESS_LINE_1)) $criteria->add(GuestPeer::SECONDARY_ADDRESS_LINE_1, $this->secondary_address_line_1);
		if ($this->isColumnModified(GuestPeer::SECONDARY_ADDRESS_LINE_2)) $criteria->add(GuestPeer::SECONDARY_ADDRESS_LINE_2, $this->secondary_address_line_2);
		if ($this->isColumnModified(GuestPeer::SECONDARY_ADDRESS_LINE_3)) $criteria->add(GuestPeer::SECONDARY_ADDRESS_LINE_3, $this->secondary_address_line_3);
		if ($this->isColumnModified(GuestPeer::SECONDARY_ADDRESS_CITY)) $criteria->add(GuestPeer::SECONDARY_ADDRESS_CITY, $this->secondary_address_city);
		if ($this->isColumnModified(GuestPeer::SECONDARY_ADDRESS_POSTCODE)) $criteria->add(GuestPeer::SECONDARY_ADDRESS_POSTCODE, $this->secondary_address_postcode);
		if ($this->isColumnModified(GuestPeer::SECONDARY_ADDRESS_STATE)) $criteria->add(GuestPeer::SECONDARY_ADDRESS_STATE, $this->secondary_address_state);
		if ($this->isColumnModified(GuestPeer::SECONDARY_ADDRESS_COUNTRY)) $criteria->add(GuestPeer::SECONDARY_ADDRESS_COUNTRY, $this->secondary_address_country);
		if ($this->isColumnModified(GuestPeer::SPECIAL_REQ)) $criteria->add(GuestPeer::SPECIAL_REQ, $this->special_req);
		if ($this->isColumnModified(GuestPeer::POSITION)) $criteria->add(GuestPeer::POSITION, $this->position);
		if ($this->isColumnModified(GuestPeer::COMPANY)) $criteria->add(GuestPeer::COMPANY, $this->company);
		if ($this->isColumnModified(GuestPeer::SRN)) $criteria->add(GuestPeer::SRN, $this->srn);
		if ($this->isColumnModified(GuestPeer::FAN)) $criteria->add(GuestPeer::FAN, $this->fan);
		if ($this->isColumnModified(GuestPeer::AOU)) $criteria->add(GuestPeer::AOU, $this->aou);
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

		$copyObj->setAttending($this->attending);

		$copyObj->setPaid($this->paid);

		$copyObj->setRegDate($this->reg_date);

		$copyObj->setExtraInfo($this->extra_info);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setTitle($this->title);

		$copyObj->setFirstname($this->firstname);

		$copyObj->setLastname($this->lastname);

		$copyObj->setPreferredName($this->preferred_name);

		$copyObj->setEmail($this->email);

		$copyObj->setPhone($this->phone);

		$copyObj->setMobile($this->mobile);

		$copyObj->setPrimaryAddressLine1($this->primary_address_line_1);

		$copyObj->setPrimaryAddressLine2($this->primary_address_line_2);

		$copyObj->setPrimaryAddressLine3($this->primary_address_line_3);

		$copyObj->setPrimaryAddressCity($this->primary_address_city);

		$copyObj->setPrimaryAddressPostcode($this->primary_address_postcode);

		$copyObj->setPrimaryAddressState($this->primary_address_state);

		$copyObj->setPrimaryAddressCountry($this->primary_address_country);

		$copyObj->setSecondaryAddressLine1($this->secondary_address_line_1);

		$copyObj->setSecondaryAddressLine2($this->secondary_address_line_2);

		$copyObj->setSecondaryAddressLine3($this->secondary_address_line_3);

		$copyObj->setSecondaryAddressCity($this->secondary_address_city);

		$copyObj->setSecondaryAddressPostcode($this->secondary_address_postcode);

		$copyObj->setSecondaryAddressState($this->secondary_address_state);

		$copyObj->setSecondaryAddressCountry($this->secondary_address_country);

		$copyObj->setSpecialReq($this->special_req);

		$copyObj->setPosition($this->position);

		$copyObj->setCompany($this->company);

		$copyObj->setSrn($this->srn);

		$copyObj->setFan($this->fan);

		$copyObj->setAou($this->aou);


		if ($deepCopy) {
									$copyObj->setNew(false);

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
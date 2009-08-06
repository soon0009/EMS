<?php

/**
 * Subclass for representing a row from the 'etime' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Etime extends BaseEtime
{
  public function __toString() {
    return $this->getTitle();
  }

  public function fullTitle() {
    return $this->getEvent()->getTitle().' - '.$this->getTitle();
  }

  public function getAllDayString () {
    return myTools::yesNo($this->getAllDay());
  }

  public function getAudioVisualSupportString () {
    return myTools::yesNo($this->getAudioVisualSupport());
  }

  public function getHasFeeString () {
    return myTools::yesNo($this->getHasFee());
  }

  public function getStartTime() {
    if ($this->getAllday()) {
      return '';
    }
    return date('h:iA', strtotime($this->getStartDate()));
  }

  public function getEndTime() {
    if ($this->getAllday()) {
      return '';
    }
    return date('h:iA', strtotime($this->getEndDate()));
  }

  public function timeSpan() {
    if ($this->getAllday()) {
      return 'All day';
    }
    else {
      return $this->getStartTime().' - '.$this->getEndTime();
    }
  }

  public function getEtimeTagString() {
    $r = "";
    foreach ($this->getEtimeTags() as $tag) {
      $r .= '"'. $tag->getTag() . '" ';
    }
    return $r;
  }

  public function getStartDateDayString() {
    if ($this->getStartDate()) {
      return date('D, j M Y', strtotime($this->getStartDate()));
    }
    return date('D, j M Y', time());
  }

  public function getStartDateTimeString() {
    if ($this->getStartDate()) {
      return date('h:iA', strtotime($this->getStartDate()));
    }
    return date('h:iA', time());
  }

  public function getEndDateDayString() {
    if ($this->getEndDate()) {
      return date('D, j M Y', strtotime($this->getEndDate()));
    }
    return date('D, j M Y', time());
  }

  public function getEndDateTimeString() {
    if ($this->getEndDate()) {
      return date('h:iA', strtotime($this->getEndDate()));
    }
    return date('h:iA', time());
  }
  public function emailContacts() {
    $email_contact = "";
    $etime_people = $this->getEtimePeoplesJoinPersonType();
    foreach ($etime_people as $person) {
      if (strtolower($person->getPersonType()->getName()) == "contact" && trim($person->getEmail()) != "") {
        if ($email_contact == "") {
          $email_contact = $person->getName()." <a href='mailto:".$person->getEmail()."?subject=RSVP:".$this->getTitle()."'>".$person->getEmail()."</a>";
        }
        else {
          $email_contact .= ", ".$person->getName()." <a href='mailto:".$person->getEmail()."?subject=RSVP: ".$this->getTitle()."'>".$person->getEmail()."</a>";
        }
      }
    }
    return $email_contact ? "By email - ".$email_contact : false;
  }

  public function phoneContacts() {
    $phone_contact = "";
    $etime_people = $this->getEtimePeoplesJoinPersonType();
    foreach ($etime_people as $person) {
      if (strtolower($person->getPersonType()->getName()) == "contact" && trim($person->getPhone()) != "") {
        if ($phone_contact == "") {
          $phone_contact = $person->getName()." ".$person->getPhone();
        }
        else {
          $phone_contact .= ", ".$person->getName()." ".$person->getPhone();
        }
      }
    }
    return $phone_contact ? "By phone - ".$phone_contact : false;
  }

  public function linkRsvp($rsvp) {
    switch (strtolower($rsvp)) {
      case 'email':
        return $this->emailContacts() ? $this->emailContacts() : $rsvp;
        break;
      case 'phone':
        return $this->phoneContacts() ? $this->phoneContacts() : $rsvp;
        break;
      case 'online':
        return 'Online - '.link_to('Register', '@add_outside_guest?etime_id='.$this->getId());
        break;
      default:
        return $rsvp;
    }
    return $rsvp;
  }

  public function getEtimeOrEventDescription() {
    return $this->getDescription() ? $this->getDescription() : $this->getEvent()->getDescription(); 
  }

}

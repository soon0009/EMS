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

  public function getHasFeeString () {
    return myTools::yesNo($this->getHasFee());
  }

  public function getStartTime() {
    if ($this->getAllday()) {
      return '';
    }
    return date('H:i', strtotime($this->getStartDate()));
  }

  public function getEndTime() {
    if ($this->getAllday()) {
      return '';
    }
    return date('H:i', strtotime($this->getEndDate()));
  }

  public function timeSpan() {
    if ($this->getAllday()) {
      return 'All day';
    }
    else {
      return $this->getStartTime().' - '.$this->getEndTime();
    }
  }

}

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

  public function dashboardLinkText() {
    if ($this->getAllday()) {
      return 'All day '.$this->fullTitle();
    }
    else {
      return $this->getStarttime().' - '.$this->getEndtime().' '.$this->fullTitle();
    }
  }

  public function getAllDayString () {
    return myTools::yesNo($this->getAllDay());
  }

  public function getHasFeeString () {
    return myTools::yesNo($this->getHasFee());
  }
}

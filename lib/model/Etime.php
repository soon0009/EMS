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

  public function getEtimeOrEventDescription() {
    return $this->getDescription() ? $this->getDescription() : $this->getEvent()->getDescription(); 
  }

}

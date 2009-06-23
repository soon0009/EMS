<?php

/**
 * Subclass for representing a row from the 'event' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Event extends BaseEvent
{
  public function __toString() {
    return $this->getTitle();
  }

  public function setTitle($v) {
    parent::setTitle($v);
    $this->setSlug(myTools::stripText($v));
  }

  public function getPublishedString() {
    return myTools::yesNo($this->getPublished());
  }

  public function getTagString() {
    $r = "";
    foreach ($this->getEventTags() as $tag) {
      $r .= '"'. $tag->getTag() . '" ';
    }
    return $r;
  }

}

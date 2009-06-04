<?php

/**
 * Subclass for representing a row from the 'tag' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Tag extends BaseTag
{
  public function __toString() {
    return $this->getTag();
  }
  public function setTag($v) {
    parent::setTag($v);
    $this->setNormalizedTag(TagTools::normalize($v));
  }
}

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
    $tags = TagTools::splitPhrase($v);
    foreach ($tags as $tag) {
      parent::setTag($tag);
      $this->setNormalizedTag(TagTools::normalize($tag));
    }
  }
}

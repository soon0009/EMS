<?php

/**
 * Subclass for representing a row from the 'audience' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Audience extends BaseAudience
{
  public function __toString() {
    return $this->getName();
  }
}

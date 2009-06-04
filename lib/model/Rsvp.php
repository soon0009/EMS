<?php

/**
 * Subclass for representing a row from the 'rsvp' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Rsvp extends BaseRsvp
{
  public function __toString() {
    return $this->getName();
  }
}

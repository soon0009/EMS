<?php

/**
 * Subclass for representing a row from the 'person_type' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PersonType extends BasePersonType
{
  public function __toString() {
    return $this->getName();
  }
}

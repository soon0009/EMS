<?php

/**
 * Subclass for representing a row from the 'reg_field' table.
 *
 * 
 *
 * @package lib.model
 */ 
class RegField extends BaseRegField
{
  public function __toString() {
    return $this->getLabel();
  }
}

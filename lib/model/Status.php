<?php

/**
 * Subclass for representing a row from the 'status' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Status extends BaseStatus
{
  public function __toString() {
    return $this->getStatus();
  }
}

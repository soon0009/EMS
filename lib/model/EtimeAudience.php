<?php

/**
 * Subclass for representing a row from the 'etime_audience_key' table.
 *
 * 
 *
 * @package lib.model
 */ 
class EtimeAudience extends BaseEtimeAudience
{
  public function __toString() {
    return $this->getAudience()->getName();
  }
}

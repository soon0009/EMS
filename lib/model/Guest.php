<?php

/**
 * Subclass for representing a row from the 'guest' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Guest extends BaseGuest
{
  public function getAttendingString() {
    return myTools::yesNo($this->getAttending());
  }

}

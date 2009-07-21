<?php

/**
 * Subclass for performing query and update operations on the 'additional_guest' table.
 *
 * 
 *
 * @package lib.model
 */ 
class AdditionalGuestPeer extends BaseAdditionalGuestPeer
{
  public static function recordExists(AdditionalGuest $obj) {
    $c = new Criteria();
    $c->add(AdditionalGuestPeer::PARENT_GUEST_ID, $obj->getParentGuestId());
    $c->add(AdditionalGuestPeer::CHILD_GUEST_ID, $obj->getChildGuestId());
    return AdditionalGuestPeer::doCount($c);
  }
}

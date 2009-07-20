<?php
 
class GuestTools
{
  public static function countAdditionalGuests($parent_id) {
    $c = new Criteria();
    $c->add(AdditionalGuestPeer::PARENT_GUEST_ID, $parent_id);
    return AdditionalGuestPeer::doCount($c);
  }
}

<?php

/**
 * Subclass for performing query and update operations on the 'etime' table.
 *
 * 
 *
 * @package lib.model
 */ 
class EtimePeer extends BaseEtimePeer
{
  public static function getAllOrderedByStartDate() {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(self::START_DATE);
    $c->addDescendingOrderByColumn(self::ALL_DAY);
    return self::doSelect($c);
  }
}

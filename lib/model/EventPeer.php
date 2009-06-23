<?php

/**
 * Subclass for performing query and update operations on the 'event' table.
 *
 * 
 *
 * @package lib.model
 */ 
class EventPeer extends BaseEventPeer
{
  public static function getTaggedEvents($tag) {
    $conn = Propel::getConnection();
    $query = '
      SELECT DISTINCT(%s.*)
      FROM %s as event
      LEFT OUTER JOIN %s event_tag ON (%s = %s)
      LEFT OUTER JOIN %s tag ON (%s = %s)
      LEFT OUTER JOIN %s etime ON (%s = %s)
      LEFT OUTER JOIN %s etime_tag ON (%s = %s)
      LEFT OUTER JOIN %s t ON (t.id = %s)
      WHERE
        tag.normalized_tag = ?
        OR
        t.normalized_tag = ?

    ';

    $query = sprintf($query,
      EventPeer::TABLE_NAME,
      EventPeer::TABLE_NAME,
      EventTagPeer::TABLE_NAME,
      EventPeer::ID,
      EventTagPeer::EVENT_ID,
      TagPeer::TABLE_NAME,
      TagPeer::ID,
      EventTagPeer::TAG_ID,
      EtimePeer::TABLE_NAME,
      EventPeer::ID,
      EtimePeer::EVENT_ID,
      EtimeTagPeer::TABLE_NAME,
      EtimePeer::ID,
      EtimeTagPeer::ETIME_ID,
      TagPeer::TABLE_NAME,
      EtimeTagPeer::TAG_ID
    );

    $stmt = $conn->prepareStatement($query);
    $stmt-> setString(1, $tag);
    $stmt-> setString(2, $tag);
    $resultset = $stmt->executeQuery(ResultSet::FETCHMODE_NUM);
		return EventPeer::populateObjects($resultset);
  }
}

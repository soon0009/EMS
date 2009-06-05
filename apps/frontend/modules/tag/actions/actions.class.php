<?php

/**
 * tag actions.
 *
 * @package    ems
 * @subpackage tag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class tagActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeShow()
  {
    $c = new Criteria();
    $c->add(TagPeer::NORMALIZED_TAG, $this->getRequestParameter('tag'));
    $this->tag = TagPeer::doSelectOne($c);

    $conn = Propel::getConnection();
    $query = '
      SELECT DISTINCT(event.*)
      FROM event
      JOIN event_tag ON (event.id = event_tag.event_id)
      JOIN tag ON (tag.id = event_tag.tag_id)
      JOIN etime ON (event.id = etime.event_id)
      JOIN etime_tag ON (etime.id = etime_tag.etime_id)
      JOIN tag t ON (t.id = etime_tag.tag_id)
      WHERE
        tag.normalized_tag = ?
        OR
        t.normalized_tag = ?

    ';

    $stmt = $conn->prepareStatement($query);
    $stmt-> setString(1, $this->getRequestParameter('tag'));
    $stmt-> setString(2, $this->getRequestParameter('tag'));
    $resultset = $stmt->executeQuery(ResultSet::FETCHMODE_NUM);
		$this->events = EventPeer::populateObjects($resultset);

    $this->forward404Unless($this->events);
  }
}

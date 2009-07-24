<?php

/**
 * Subclass for representing a row from the 'event' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Event extends BaseEvent
{
  public function __toString() {
    return $this->getTitle();
  }

  public function setTitle($v) {
    parent::setTitle($v);
    $this->setSlug(myTools::stripText($v));
  }

  public function getPublishedString() {
    return myTools::yesNo($this->getPublished());
  }

  public function getMediaPotentialString() {
    return myTools::yesNo($this->getMediaPotential());
  }

  public function getTagString() {
    $r = "";
    foreach ($this->getEventTags() as $tag) {
      $r .= '"'. $tag->getTag() . '" ';
    }
    return $r;
  }

  public function regFormOk() {
    $online = false;
    foreach ($this->getEtimes() as $et) {
      foreach ($et->getEtimeRsvps() as $rsvp) {
        if ($rsvp->getRsvp() == "Online") {
          $online = true;
        } 
      }
    }
    if ($online && !$this->getRegForms()) {
      return false;
    }
    return true;
  }

  public function getEventsOnSameDay() {
    $other_events = array();
    if (!$this->getEtimes()) {
      return $other_events;
    }

    $where = "";
    foreach ($this->getEtimes() as $etime) {
      if ($where == "") {
        $where = "AND (";
        $where .= " etime.start_date::date = '{$etime->getStartDate()}'::date";
      }
      else {
        $where .= " OR etime.start_date::date = '{$etime->getStartDate()}'::date";
      }
      $where .= " OR etime.end_date::date = '{$etime->getEndDate()}'::date";
    }
    $where .= ") ";

    $conn = Propel::getConnection();
    $query = "SELECT DISTINCT ON (event.title) * " .
             "FROM event " .
             "JOIN etime ON (event.id = etime.event_id) " .
             "WHERE " .
             "event.id != {$this->getId()} " .
             "AND event.published = true " .
             "$where" .
             "ORDER BY event.title " .
             "";
    $stmt = $conn->prepareStatement($query);
    $resultset = $stmt->executeQuery(ResultSet::FETCHMODE_NUM);
		$other_events = EventPeer::populateObjects($resultset);


    return $other_events;
  }
}

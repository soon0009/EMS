<?php

/**
 * feed actions.
 *
 * @package    ems
 * @subpackage feed
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class feedActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeShow() {
    $feed = new sfAtom1Feed();

    $feed->setTitle('Flinders University Events');
    $feed->setLink('http://www.flinders.edu.au/');
    $feed->setAuthorEmail('webdevelopment@flinders.edu.au');
    $feed->setAuthorName('Web Development');

    $feedImage = new sfFeedImage();
    $feedImage->setFavicon('http://www.flinders.edu.au/favicon.ico');
    $feed->setImage($feedImage);

    $conn = Propel::getConnection();
    $query = '
      SELECT *
      FROM %s
      JOIN %s ON (%s = %s)
      WHERE
        %s = true
        AND %s::date >= now()::date
      ORDER BY %s ASC
    ';

    $query = sprintf($query,
      EtimePeer::TABLE_NAME,
      EventPeer::TABLE_NAME,
      EtimePeer::EVENT_ID,
      EventPeer::ID,
      EventPeer::PUBLISHED,
      EtimePeer::START_DATE,
      EtimePeer::START_DATE
    );

    $stmt = $conn->prepareStatement($query);
    $resultset = $stmt->executeQuery(ResultSet::FETCHMODE_NUM);
		$etimes = EtimePeer::populateObjects($resultset);

    foreach ($etimes as $etime) {
      $item = new sfFeedItem();
      $item->setTitle($etime->getEvent()->getTitle().' - '.$etime->getTitle());
      $item->setLink('@show_outside_event?slug='.$etime->getEvent()->getSlug());
      $item->setAuthorName($etime->getOrganiser());
      $item->setPubdate($etime->getStartDate('U'));
      $item->setUniqueId($etime->getId());
      if ($etime->getDescription()) {
        $item->setDescription($etime->getDescription());
      }
      else {
        $item->setDescription($etime->getEvent()->getDescription());
      }

      $feed->addItem($item);
    }

    $this->feed = $feed;
  }
}

<?php

/**
 * etime actions.
 *
 * @package    ems
 * @subpackage etime
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class etimeActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeList()
  {
    $this->etimes = EtimePeer::getAllOrderedByStartDate();
    $this->forward404Unless($this->etimes);
  }
}

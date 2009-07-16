<?php use_helper('Date'); ?>
<div id="event_details">
  <div id="event_heading" class="light_border_bottom">
    <h2 id="event_title">
      <?php print $event->getTitle(); ?>
    </h2>
    <div id="add_button">
      <?php // link_to('Add time', ); ?>
    </div>
    <div class="clear_float"></div>
  </div>

      <div id="event">
        <div class="yui-gc">
          <div class="yui-u first">
            <div class="label">Organiser:</div>
            <div class="value"><?php print $event->getOrganiser(); ?></div>
            <div class="clear_float"></div>
            <div class="label">Description:</div>
            <div class="value"><?php print $event->getDescription(); ?></div>
            <div class="clear_float"></div>
            <div class="label">Notes:</div>
            <div class="value"><?php print $event->getNotes(); ?></div>
            <div class="clear_float"></div>
            <div class="label">Category:</div>
            <div class="value"><?php print $event->getCategory(); ?></div>
            <div class="clear_float"></div>
          </div> <!-- end yui-u -->
          <div class="yui-u">
            <?php if ($event->getImageUrl()): ?>
              <img src="<?php echo $event->getImageUrl(); ?>"/>
            <?php endif; ?>
          </div> <!-- end yui-u -->
        </div> <!-- end yui-g -->
      </div>
      <div id="when">
        <h3 id="times_heading" class="light_border_bottom">Times</h3>
        <?php foreach ($event->getEtimes() as $etime): ?>
        <h4><?php print $etime->getTitle(); ?></h4>
        <div class="yui-gc when_item">
          <div class="yui-u first">
            <div>
              <div class="label">Location:</div>
              <div class="value"><?php print $etime->getLocation(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Date:</div>
              <div class="value"><?php print myTools::oneDate($etime->getStartDate(), $etime->getEndDate()); ?></div>
              <div class="clear_float"></div>
              <div class="label">Time:</div>
              <div class="value"><?php print $etime->getStartTime(); ?> - <?php print $etime->getEndTime(); ?></div>
              <div class="clear_float"></div>
              <div class="label">All day:</div>
              <div class="value"><?php print $etime->getAllDayString(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Audience:</div>
              <div class="value">
                <ul>
                <?php foreach ($etime->getEtimeAudiences() as $audience): ?>
                  <li><?php print $audience->getAudience(); ?></li>
                <?php endforeach; ?>
                </ul>
              </div>
              <div class="clear_float"></div>
              <div class="label">RSVP:</div>
              <div class="value">
                <ul>
                <?php foreach ($etime->getEtimeRsvps() as $rsvp): ?>
                  <li><?php print $rsvp->getRsvp(); ?></li>
                <?php endforeach; ?>
                </ul>
              </div>
              <div class="clear_float"></div>
              <div class="label">Fee:</div>
              <div class="value"><?php print $etime->getHasFeeString(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Organiser:</div>
              <div class="value"><?php print $etime->getOrganiser(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Description:</div>
              <div class="value"><?php print $etime->getDescription(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Notes:</div>
              <div class="value"><?php print $etime->getNotes(); ?></div>
              <div class="clear_float"></div>
            </div>
          </div> <!-- end yui-u -->
          <div class="yui-u">
          </div> <!-- end yui-u -->
        </div> <!-- end yui-g -->
        <?php endforeach; ?>
      </div>
    </div>
</div> <!-- event_details -->

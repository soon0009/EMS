<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php use_helper('Date', 'Ical'); ?>
<?php if ($sf_flash->has('notice')): ?>
  <div id="sf_admin_container">
    <div class="save-ok">
      <h2><?php echo $sf_flash->get('notice') ?></h2>
    </div>
  </div>
<?php endif; ?>
<div id="event_details">
  <div id="event_heading" class="light_border_bottom">
    <h2 id="event_title"> <?php print $event->getTitle(); ?> </h2>
    <div id="add_button">
      <?php // link_to('Add time', ); ?>
    </div>
    <div class="clear_float"></div>
  </div>

      <div id="event">
        <div class="yui-gc">
          <div class="yui-u first">
            <p><?php print $event->getDescription(); ?></p>
            <div class="label">Organiser:</div>
            <div class="value"><?php print $event->getOrganiser(); ?></div>
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
        <h3 id="times_heading" class="light_border_bottom">Sessions</h3>
        <?php foreach ($event->getEtimes() as $etime): ?>
        <div class="vevent">
          <h4><abbr class="summary" title="<?php print $event->getTitle()." - ".$etime->getTitle(); ?>"><?php print $etime->getTitle(); ?></abbr></h4>
          <div><?php print link_to_ics_generator("Add to calendar"); ?></div>
          <div class="yui-gc when_item">
            <div class="yui-u first">
              <?php echo include_partial('etime/show_public', array('etime'=>$etime, 'event'=>$event)); ?>
              <?php
                foreach ($etime->getEtimeRsvps() as $rsvp) {
                  if ($rsvp->getRsvp() == "Online") {
                    echo link_to('Register for this event', '@add_outside_guest?etime_id='.$etime->getId());
                  }
                }
              ?>
            </div> <!-- end yui-u -->
            <div class="yui-u">
            </div> <!-- end yui-u -->
          </div> <!-- end yui-g -->
        </div>
        <?php endforeach; ?>
      </div>
    </div>
</div> <!-- event_details -->

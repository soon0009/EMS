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
        <div class="yui-g">
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
            <div class="label">Image URL:</div>
            <div class="value"><?php print $event->getImageUrl(); ?></div>
            <div class="clear_float"></div>
            <div class="label">Status:</div>
            <div class="value"><?php print $event->getStatusId(); ?></div>
            <div class="clear_float"></div>
            <div class="label">Published:</div>
            <div class="value"><?php print $event->getPublished(); ?></div>
            <div class="clear_float"></div>
            <div class="label">Interested parties:</div>
            <div class="value"><?php print $event->getInterestedParties(); ?></div>
            <div class="clear_float"></div>
            <div class="label">Updated at:</div>
            <div class="value"><?php print $event->getupdatedAt(); ?></div>
            <div class="clear_float"></div>
            <div class="label"></div>
            <div class="value update"><?php echo link_to('Update event details', 'event/edit?id='.$event->getId()) ?></div>
            <div class="clear_float"></div>
          </div> <!-- end yui-u -->
          <div class="yui-u">
          Next to event
          </div> <!-- end yui-u -->
        </div> <!-- end yui-g -->
      </div>
      <div id="when">
        <h3 id="times_heading" class="light_border_bottom">Times</h3>
        <?php foreach ($event->getEtimes() as $etime): ?>
        <h4><?php print $etime->getTitle(); ?></h4>
        <div class="yui-g when_item">
          <div class="yui-u first">
            <div>
              <div class="label">Location:</div>
              <div class="value"><?php print $etime->getLocation(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Date:</div>
              <div class="value"><?php print $etime->getStartDate(); ?> - <?php print $etime->getEndDate(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Time:</div>
              <div class="value"><?php print $etime->getStartTime(); ?> - <?php print $etime->getEndTime(); ?></div>
              <div class="clear_float"></div>
              <div class="label">All day:</div>
              <div class="value"><?php print $etime->getAllDay(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Audience:</div>
              <div class="value">
                <ul>
                <?php foreach ($etime->getEtimeAudiences() as $audience): ?>
                  <li><?php print $audience->getAudience()->getName(); ?></li>
                <?php endforeach; ?>
                </ul>
              </div>
              <div class="clear_float"></div>
              <div class="label">RSVP:</div>
              <div class="value">
                <ul>
                <?php foreach ($etime->getEtimeRsvps() as $rsvp): ?>
                  <li><?php print $rsvp->getRsvp()->getName(); ?></li>
                <?php endforeach; ?>
                </ul>
              </div>
              <div class="clear_float"></div>
              <div class="label">Registration capacity:</div>
              <div class="value"><?php print $etime->getCapacity(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Fee:</div>
              <div class="value"><?php print $etime->getHasFee(); ?></div>
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
              <div class="label"></div>
              <div class="value update"> <?php // link_to('Update event time details', ) ?> </div>
              <div class="clear_float"></div>
            </div>
          </div> <!-- end yui-u -->
          <div class="yui-u">
            <?php //include('./view/extra_when_details.php'); ?>
          </div> <!-- end yui-u -->
        </div> <!-- end yui-g -->
        <?php endforeach; ?>
      </div>
    </div>
</div> <!-- event_details -->

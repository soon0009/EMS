<?php use_helper('Date', 'People'); ?>
<div id="event_details">

  <?php include_partial('show_messages', array('event'=>$event)); ?>

  <div id="event_heading" class="light_border_bottom">
    <h2 id="event_title">
      <?php print $event->getTitle(); ?>
    </h2>
    <div id="publish" class="align_right">
      <?php include_partial('publish_button', array('event'=>$event)); ?>
    </div>
    <div class="clear_float"></div>
  </div>
      <div id="event">
        <div class="yui-gc">
          <div class="yui-u first">
            <div class="label">Organisers:</div>
            <div id="event_organiser" class="value">
              <?php echo list_people($event, 'getEventPeoples', 'organiser', 'event'); ?>
            </div>
            <div class="label">
            </div>
            <div class="value">
              <div class="add_person_link">
                <?php echo link_to_function(image_tag('add', array('alt'=>'add')).' Add an organiser', visual_effect('blind_down', 'event_add_person_organiser', array('duration' => 0.5))); ?>
              </div>
              <?php echo include_partial('add_person', array('etime_id' => null, 'obj_type' => 'event', 'type' => 'organiser', 'event_id' => $event->getId(), )); ?>
            </div>
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
            <div class="value"><?php print $event->getStatus(); ?></div>
            <div class="clear_float"></div>
            <div class="label">Category:</div>
            <div class="value"><?php print $event->getCategory(); ?></div>
            <div class="clear_float"></div>
            <div class="label">Media potential:</div>
            <div class="value"><?php print $event->getMediaPotentialString(); ?></div>
            <div class="clear_float"></div>
            <div class="label">Contacts:</div>
            <div id="event_contact" class="value">
              <?php echo list_people($event, 'getEventPeoples', 'contact', 'event'); ?>
            </div>
            <div class="label">
            </div>
            <div class="value">
              <div class="add_person_link">
                <?php echo link_to_function(image_tag('add', array('alt'=>'add')).' Add a contact', visual_effect('blind_down', 'event_add_person_contact', array('duration' => 0.5))); ?>
              </div>
              <?php echo include_partial('add_person', array('etime_id' => null, 'obj_type' => 'event', 'type' => 'contact', 'event_id' => $event->getId(), )); ?>
            </div>
            <div class="clear_float"></div>
            <div class="label">Interested parties:</div>
            <div id="event_interested-party" class="value">
              <?php echo list_people($event, 'getEventPeoples', 'interested party', 'event'); ?>
            </div>
            <div class="label">
            </div>
            <div class="value">
              <div class="add_person_link">
                <?php echo link_to_function(image_tag('add', array('alt'=>'add')).' Add an intersted party', visual_effect('blind_down', 'event_add_person_interested', array('duration' => 0.5))); ?>
              </div>
              <?php echo include_partial('add_person', array('etime_id' => null, 'obj_type' => 'event', 'type' => 'interested', 'event_id' => $event->getId(), )); ?>
            </div>
            <div class="clear_float"></div>
            <div class="label">Tags:</div>
            <div class="value">
              <ul>
              <?php foreach ($event->getEventTags() as $tag): ?>
                <li><?php print link_to($tag->getTag(), '@tag?tag='.$tag->getTag()->getNormalizedTag(), 'rel=tag') ?></li>
              <?php endforeach; ?>
              </ul>
            </div>
            <div class="clear_float"></div>
            <div class="label">Updated at:</div>
            <div class="value"><?php print $event->getupdatedAt(); ?></div>
            <div class="clear_float"></div>
            <div class="label"></div>
            <div class="value update"><?php echo link_to('Update event details', '@edit_event?slug='.$event->getSlug()) ?></div>
            <div class="clear_float"></div>
          </div> <!-- end yui-u -->
          <div class="yui-u">
            <div> <?php echo link_to('Add session', '@add_etime?event_id='.$event->getId()); ?> </div>
            <?php if ($event->getRegForms()): ?>
            <?php echo link_to('Registration form', '@show_reg_form?slug='.$event->getSlug()) ?>
            <?php else: ?>
            <?php echo link_to('Create registration form', '@create_reg_form?slug='.$event->getSlug()) ?>
            <?php endif; ?>
          </div> <!-- end yui-u -->
        </div> <!-- end yui-g -->
      </div>
      <div id="when">
        <h3 id="times_heading" class="light_border_bottom">Sessions</h3>
        <?php foreach ($event->getEtimes() as $etime): ?>
        <h4><?php print $etime->getTitle(); ?></h4>
        <div class="yui-gc when_item">
          <div class="yui-u first">
            <?php echo include_partial('etime/show', array('etime'=>$etime)); ?>
          </div> <!-- end yui-u -->
          <div class="yui-u">
            <?php if ($event->getRegForms()): ?>
              <?php echo link_to('Guest list', '@list_guests?etime_id='.$etime->getId()) ?>
            <?php endif; ?>
          </div> <!-- end yui-u -->
        </div> <!-- end yui-g -->
        <?php endforeach; ?>
      </div>
    </div>
</div> <!-- event_details -->

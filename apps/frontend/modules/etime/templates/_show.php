            <div>
              <div class="label">Organisers:</div>
              <div id="event_organiser" class="value">
                <?php echo list_people($etime, 'getEtimePeoples', 'organiser', 'etime'); ?>
              </div>
              <div class="label">
              </div>
              <div class="value">
                <div class="add_person_link">
                  <?php echo link_to_function(image_tag('add', array('alt'=>'add')).' Add an organiser', visual_effect('blind_down', 'etime_add_person_organiser', array('duration' => 0.5))); ?>
                </div>
                <?php echo include_partial('add_person', array('etime_id' => $etime->getId(), 'obj_type' => 'etime', 'type' => 'organiser', 'event_id' => $etime->getEvent()->getId(), )); ?>
              </div>
              <div class="clear_float"></div>
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
              <div class="label">Registration capacity:</div>
              <div class="value"><?php print $etime->getCapacity(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Additional guests:</div>
              <div class="value"><?php print $etime->getAdditionalGuests(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Fee:</div>
              <div class="value"><?php print $etime->getHasFeeString(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Audio/Visual support:</div>
              <div class="value"><?php print $etime->getAudioVisualSupportString(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Description:</div>
              <div class="value"><?php print $etime->getDescription(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Notes:</div>
              <div class="value"><?php print $etime->getNotes(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Contacts:</div>
              <div id="etime_contact" class="value">
                <?php echo list_people($etime, 'getEtimePeoples', 'contact', 'etime'); ?>
              </div>
              <div class="label">
              </div>
              <div class="value">
                <div class="add_person_link">
                  <?php echo link_to_function(image_tag('add', array('alt'=>'add')).' Add a contact', visual_effect('blind_down', 'etime_add_person_contact', array('duration' => 0.5))); ?>
                </div>
                <?php echo include_partial('add_person', array('etime_id' => $etime->getId(), 'obj_type' => 'etime', 'type' => 'contact', 'event_id' => $etime->getEvent()->getId(), )); ?>
              </div>
              <div class="clear_float"></div>
              <div class="label">Interested parties:</div>
              <div id="etime_interested-party" class="value">
                <?php echo list_people($etime, 'getEtimePeoples', 'interested party', 'etime'); ?>
              </div>
              <div class="label">
              </div>
              <div class="value">
                <div class="add_person_link">
                  <?php echo link_to_function(image_tag('add', array('alt'=>'add')).' Add an intersted party', visual_effect('blind_down', 'etime_add_person_interested', array('duration' => 0.5))); ?>
                </div>
                <?php echo include_partial('add_person', array('etime_id' => $etime->getId(), 'obj_type' => 'etime', 'type' => 'interested', 'event_id' => $etime->getEvent()->getId(), )); ?>
              </div>
              <div class="clear_float"></div>
              <div class="label">Tags:</div>
              <div class="value">
                <ul>
                <?php foreach ($etime->getEtimeTags() as $tag): ?>
                  <li><?php print link_to($tag->getTag(), '@tag?tag='.$tag->getTag()->getNormalizedTag(), 'rel=tag') ?></li>
                <?php endforeach; ?>
                </ul>
              </div>
              <div class="label"></div>
              <div class="value update"> <?php echo link_to('Update session details', '@edit_etime?id='.$etime->getId()) ?> </div>
              <div class="clear_float"></div>
            </div>


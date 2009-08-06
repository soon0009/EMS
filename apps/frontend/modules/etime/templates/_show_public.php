            <p><abbr class="description" title="<?php print $etime->getEtimeOrEventDescription();?>"><?php print $etime->getDescription(); ?></abbr></p>
            <div>
              <?php include_partial('etime/show_public_summary', array('etime' => $etime)); ?>
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
            </div>

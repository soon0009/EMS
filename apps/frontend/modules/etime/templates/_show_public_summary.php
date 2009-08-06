              <div class="label">Location:</div>
              <div class="value location"><?php print $etime->getLocation(); ?></div>
              <div class="clear_float"></div>
              <div class="label">Date:</div>
              <div class="value">
                <abbr class="dtstart" title="<?php print myTools::dateIso8601($etime->getStartDate(), $etime->getAllDay()); ?>">
                  <abbr class="dtend" title="<?php print myTools::dateIso8601($etime->getEndDate(), $etime->getAllDay(), true); ?>">
                  <?php print myTools::oneDate($etime->getStartDate(), $etime->getEndDate()); ?></div>
                  </abbr>
                </abbr>
              <div class="clear_float"></div>
              <div class="label">Time:</div>
              <div class="value"><?php print $etime->getStartTime(); ?> - <?php print $etime->getEndTime(); ?></div>
              <div class="clear_float"></div>
              <div class="label">All day:</div>
              <div class="value"><?php print $etime->getAllDayString(); ?></div>
              <div class="clear_float"></div>

<?php use_helper('Date','etime'); ?>
<h1>Event Times</h1>

<div id="dashboard" class="yui-skin-sam">
  <div class="date_view_container">
    <div id="dashboard_entries">
      <div id="event_entries">

<ul id="eventlist">
  <?php $start_date = ""; $close_li = false; $open_li = false; ?>
  <?php foreach ($etimes as $etime): ?>
    <?php if ($start_date != $etime->getStartdate()): $start_date = $etime->getStartdate(); $close_li = true; ?>
  <?php if ($close_li && $open_li): $close_li = false; $open_li = false; ?>
  </li>
  <?php endif; ?>
  <li>
    <?php $open_li = true; ?>
    <div class="eventdate">
      <?php echo formatEventDate($etime, 'week'); ?>
    </div>
    <?php endif; ?>
    <div>
      <div class="eventrecords">
        <div class="record yui-gd">
          <div class="yui-u first">
            <?php echo link_to($etime->dashboardLinkText(), '@show_event?slug='.$etime->getEvent()->getSlug()) ?>
          </div>
          <div class="yui-u">
            <div><?php echo $etime->getDescription() ?></div>
            <div><?php echo $etime->getLocation() ?></div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <?php if ($open_li): ?>
  </li>
  <?php endif; ?>
</ul>
      </div>
    </div>
  </div>
</div>

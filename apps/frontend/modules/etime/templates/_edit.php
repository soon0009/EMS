<?php echo object_input_hidden_tag($etime, 'getId') ?>

  <div class="long_form">
    <label class="label" for="title">Etime title</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getTitle', array ( 'id' => 'etime_title', 'name' => 'etime_title', 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

    <?php echo form_error('start_date'); ?>
    <label class="label" for="start_date">Start date</label>
    <div class="value">
      <?php echo select_datetime_tag('start_date', $etime->getStartDate()) ?>
    </div>

    <div class="clear_float"></div>

    <?php echo form_error('end_date'); ?>
    <label class="label" for="end_date">End date</label>
    <div class="value">
      <?php echo select_datetime_tag('end_date', $etime->getEndDate()) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="all_day">All day</label>
    <div class="value">
      <?php echo object_checkbox_tag($etime, 'getAllDay', array ()) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="location">Location</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getLocation', array ( 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="description">Description</label>
    <div class="value">
      <?php echo object_textarea_tag($etime, 'getDescription', array ( 'id' => 'etime_description', 'name' => 'etime_description', 'size' => '30x3',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="notes">Audience</label>
    <div class="value">
      <?php
        $selected = array();
        if ($sf_params->get('etime_audiences')) {
          $selected = $sf_params->get('etime_audiences');
          array_walk($selected, 'myTools::strToInt');
        }
        else {
          foreach ($etime->getEtimeAudiences() as $eaObject) { $selected[] = $eaObject->getAudienceId(); }
        }
print "<pre>";
var_dump($selected);
print "</pre>";
      ?>
      <?php $c = new Criteria(); $audiences = AudiencePeer::doSelect($c); ?>
      <?php echo select_tag('etime_audiences', objects_for_select($audiences, 'getId', 'getName', $selected), array( 'multiple' => true)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="notes">Notes</label>
    <div class="value">
      <?php echo object_textarea_tag($etime, 'getNotes', array ( 'id' => 'etime_notes', 'name' => 'etime_notes', 'size' => '30x3',)) ?>
    </div>

    <div class="clear_float"></div>

    <?php echo form_error('capacity'); ?>
    <label class="label" for="capacity">Capacity</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getCapacity') ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="has_fee">Has fee</label>
    <div class="value">
      <?php echo object_checkbox_tag($etime, 'getHasFee', array ()) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="organiser">Organiser</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getOrganiser', array ( 'id' => 'etime_organiser', 'name' => 'etime_organiser', 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="interested_parties">Interested parties</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getInterestedParties', array ( 'id' => 'etime_interested_parties', 'name' => 'etime_interested_parties', 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

  </div>

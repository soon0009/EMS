<?php echo object_input_hidden_tag($etime, 'getId') ?>

  <div class="long_form">
    <label class="label" for="title">Sub event title</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getTitle', array ( 'id' => 'etime_title', 'name' => 'etime_title', 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

    <?php echo form_error('start_date'); ?>
    <?php echo form_error('end_date'); ?>
    <label class="label" for="start_date">Data/time</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getStartDateDayString', array('name'=>'start_date',
        'id'=>'startdate',
        'class'=>'medium')
      ); ?>
      <?php echo object_input_tag($etime, 'getStartDateTimeString', array('name'=>'start_date_time',
        'id'=>'startdatetime',
        'class'=>'short')
      ); ?>

      &nbsp;to&nbsp;

      <?php echo object_input_tag($etime, 'getEndDateTimeString', array('name'=>'end_date_time',
        'id'=>'enddatetime',
        'class'=>'short')
      ); ?>
      <?php echo object_input_tag($etime, 'getEndDateDayString', array('name'=>'end_date',
        'id'=>'enddate',
        'class'=>'medium')
      ); ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="all_day">All day</label>
    <div class="value">
      <?php echo object_checkbox_tag($etime, 'getAllDay', array ('id'=>'all_day')) ?>
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

    <label class="label" for="notes">Notes</label>
    <div class="value">
      <?php echo object_textarea_tag($etime, 'getNotes', array ( 'id' => 'etime_notes', 'name' => 'etime_notes', 'size' => '30x3',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="audience">Audience</label>
    <div class="value">
      <?php if ($sf_request->hasError('audience')): ?>
        <?php echo form_error('audience', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
    
      <?php $value = object_admin_check_list($etime, 'getEtimeAudience', array (
      'control_name' => 'audience',
      'through_class' => 'EtimeAudience',
      )); echo $value ? $value : '&nbsp;' ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="audience">Rsvp</label>
    <div class="value">
      <?php if ($sf_request->hasError('audience')): ?>
        <?php echo form_error('audience', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
    
      <?php $value = object_admin_check_list($etime, 'getEtimeRsvp', array (
      'control_name' => 'audience',
      'through_class' => 'EtimeRsvp',
      )); echo $value ? $value : '&nbsp;' ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="notes">Tags</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getEtimeTagString', array ( 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

    <?php echo form_error('capacity'); ?>
    <label class="label" for="capacity">Capacity</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getCapacity') ?>
    </div>

    <div class="clear_float"></div>

    <?php echo form_error('additional_guests'); ?>
    <label class="label" for="additional_guests">Additional guests</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getAdditionalGuests') ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="has_fee">Has fee</label>
    <div class="value">
      <?php echo object_checkbox_tag($etime, 'getHasFee', array ()) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="audio_visual_support">Required audio/visual support</label>
    <div class="value">
      <?php echo object_checkbox_tag($etime, 'getAudioVisualSupport', array ()) ?>
    </div>

    <div class="clear_float"></div>

  </div>

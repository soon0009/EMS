<?php use_helper('DateForm', 'Object', 'Validation') ?>

<?php echo form_tag('etime/edit') ?>

<?php echo object_input_hidden_tag($etime, 'getId') ?>

  <div class="long_form">
    <?php echo form_error('event_id'); ?>
    <label class="label" for="event_id">Event</label>
    <div class="value">
      <?php echo object_select_tag($etime, 'getEventId', array ( 'related_class' => 'Event', 'include_blank' => true,)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="title">Etime title</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getTitle', array ( 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

    <?php echo form_error('start_date'); ?>
    <label class="label" for="start_date">Start date</label>
    <div class="value">
      <?php echo object_input_date_tag($etime, 'getStartDate', array ( 'rich' => 'true',)) ?>
    </div>

    <div class="clear_float"></div>

    <?php echo form_error('end_date'); ?>
    <label class="label" for="end_date">End date</label>
    <div class="value">
      <?php echo object_input_date_tag($etime, 'getEndDate', array ( 'rich' => 'true',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="all_day">All day</label>
    <div class="value">
      <?php echo object_checkbox_tag($etime, 'getAllDay', array ()) ?>
    </div>

    <div class="clear_float"></div>

    <?php echo form_error('start_time'); ?>
    <label class="label" for="start_time">Start time</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getStartTime') ?>
    </div>

    <div class="clear_float"></div>

    <?php echo form_error('end_time'); ?>
    <label class="label" for="end_time">End time</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getEndTime') ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="location">Location</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getLocation', array ( 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="description">Description</label>
    <div class="value">
      <?php echo object_textarea_tag($etime, 'getDescription', array ( 'size' => '30x3',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="notes">Notes</label>
    <div class="value">
      <?php echo object_textarea_tag($etime, 'getNotes', array ( 'size' => '30x3',)) ?>
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
      <?php echo object_input_tag($etime, 'getOrganiser', array ( 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="interested_parties">Interested parties</label>
    <div class="value">
      <?php echo object_input_tag($etime, 'getInterestedParties', array ( 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

  </div>

<hr />

<?php echo submit_tag('save') ?>
<?php if ($etime->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'etime/delete?id='.$etime->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', 'etime/show?id='.$etime->getId()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'event/list') ?>
<?php endif; ?>
</form>

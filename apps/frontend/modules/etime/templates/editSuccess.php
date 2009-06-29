<?php use_helper('DateForm', 'Object', 'ObjectAdmin', 'Validation') ?>

<?php echo form_tag('etime/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'double_list_submit(); return true;'
)) ?>

  <div class="long_form">
    <?php echo form_error('event_id'); ?>
    <label class="label" for="event_id">Event</label>
    <div class="value">
      <?php echo object_select_tag($etime, 'getEventId', array ( 'related_class' => 'Event', 'include_blank' => true,)) ?>
    </div>

    <div class="clear_float"></div>
  </div>

  <?php echo include_partial('edit', array('etime'=>$etime)); ?>

<hr />

<?php echo submit_tag('save') ?>
<?php if ($etime->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'etime/delete?id='.$etime->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', '@show_event?slug='.$etime->getEvent()->getSlug()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'event/list') ?>
<?php endif; ?>
</form>

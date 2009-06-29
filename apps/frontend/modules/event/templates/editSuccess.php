<?php use_helper('Object', 'ObjectAdmin', 'Validation') ?>

<?php echo form_tag('event/edit', array(
  'multipart' => true,
  'onsubmit'  => 'double_list_submit(); return true;'
)) ?>

<?php echo include_partial('edit', array('event'=>$event)); ?>

<hr />

<?php echo submit_tag('save') ?>
<?php if ($event->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'event/delete?id='.$event->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', '@show_event?slug='.$event->getSlug()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'event/list') ?>
<?php endif; ?>
</form>

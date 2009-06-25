<?php use_helper('Object', 'Validation') ?>

<?php echo form_tag('event/edit') ?>

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

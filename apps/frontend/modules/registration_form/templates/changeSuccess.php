<?php use_helper('DateForm', 'Object', 'ObjectAdmin', 'Validation') ?>

<?php echo form_tag('registration_form/change'); ?>
<?php echo object_input_hidden_tag($event, 'getId') ?>
<?php echo object_input_hidden_tag($event, 'getSlug') ?>
<?php echo include_partial('edit', array('regFields'=>$regFields, 'regForm'=>$regForm, 'event'=>$event)); ?>

<hr />

<?php echo submit_tag('save') ?>
<?php if ($event->getRegForms()): ?>
  &nbsp;<?php echo link_to('delete', 'registration_form/delete?event_id='.$event->getId(), 'post=true&confirm=Are you sure?') ?>
<?php else: ?>
<?php endif; ?>
&nbsp;<?php echo link_to('cancel', '@show_reg_form?slug='.$event->getSlug()) ?>
&nbsp;<?php echo link_to($event->getTitle(), '@show_event?slug='.$event->getSlug()) ?>
</form>

<?php use_helper('DateForm', 'Object', 'Validation') ?>

<?php echo form_tag('event/create') ?>

<?php echo include_partial('edit', array('event'=>$event)); ?>
<?php echo include_partial('etime/edit', array('etime'=>$etime)); ?>

<hr />

<?php echo submit_tag('save') ?>
&nbsp;<?php echo link_to('cancel', 'event/list') ?>
</form>

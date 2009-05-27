<?php
// auto-generated by sfPropelCrud
// date: 2009/05/27 13:35:04
?>
<?php use_helper('Object') ?>

<?php echo form_tag('event/update') ?>

<?php echo object_input_hidden_tag($event, 'getId') ?>

<table>
<tbody>
<tr>
  <th>Title*:</th>
  <td><?php echo object_input_tag($event, 'getTitle', array (
  'size' => 80,
)) ?></td>
</tr>
<tr>
  <th>Status:</th>
  <td><?php echo object_select_tag($event, 'getStatusId', array (
  'related_class' => 'Status',
  'include_blank' => true,
)) ?></td>
</tr>
<tr>
  <th>Published*:</th>
  <td><?php echo object_checkbox_tag($event, 'getPublished', array (
)) ?></td>
</tr>
<tr>
  <th>Description:</th>
  <td><?php echo object_textarea_tag($event, 'getDescription', array (
  'size' => '30x3',
)) ?></td>
</tr>
<tr>
  <th>Notes:</th>
  <td><?php echo object_textarea_tag($event, 'getNotes', array (
  'size' => '30x3',
)) ?></td>
</tr>
<tr>
  <th>Image url:</th>
  <td><?php echo object_input_tag($event, 'getImageUrl', array (
  'size' => 80,
)) ?></td>
</tr>
<tr>
  <th>Organiser:</th>
  <td><?php echo object_textarea_tag($event, 'getOrganiser', array (
  'size' => '30x3',
)) ?></td>
</tr>
<tr>
  <th>Interested parties:</th>
  <td><?php echo object_textarea_tag($event, 'getInterestedParties', array (
  'size' => '30x3',
)) ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo submit_tag('save') ?>
<?php if ($event->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'event/delete?id='.$event->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', 'event/show?id='.$event->getId()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'event/list') ?>
<?php endif; ?>
</form>

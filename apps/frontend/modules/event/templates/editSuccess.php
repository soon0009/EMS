<?php use_helper('Object', 'Validation') ?>

<?php echo form_tag('event/edit') ?>

<?php echo object_input_hidden_tag($event, 'getId') ?>
<?php echo object_input_hidden_tag($event, 'getSlug') ?>


  <div class="long_form">
    <?php echo form_error('title'); ?>
    <label class="label" for="title">Event title</label>
    <div class="value">
      <?php echo object_input_tag($event, 'getTitle', array ( 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="organiser">Organiser</label>
    <div class="value">
      <?php echo object_input_tag($event, 'getOrganiser', array ( 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="description">Description</label>
    <div class="value">
      <?php echo object_textarea_tag($event, 'getDescription', array ( 'size' => '30x3',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="notes">Notes</label>
    <div class="value">
      <?php echo object_textarea_tag($event, 'getNotes', array ( 'size' => '30x3',)) ?>
    </div>

    <div class="clear_float"></div>

    <?php echo form_error('image_url'); ?>
    <label class="label" for="image_url">Image URL</label>
    <div class="value">
      <?php echo object_input_tag($event, 'getImageUrl', array ( 'class' => 'long',)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="status">Status</label>
    <div class="value">
      <?php echo object_select_tag($event, 'getStatusId', array ( 'related_class' => 'Status', 'include_blank' => true,)) ?>
    </div>

    <div class="clear_float"></div>

    <label class="label" for="published">Published</label>
    <div class="value">
      <?php echo object_checkbox_tag($event, 'getPublished', array ()) ?>
    </div>

    <div class="clear_float"></div>
  </div>

<hr />

<?php echo submit_tag('save') ?>
<?php if ($event->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'event/delete?id='.$event->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', 'event/show?id='.$event->getId()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'event/list') ?>
<?php endif; ?>
</form>

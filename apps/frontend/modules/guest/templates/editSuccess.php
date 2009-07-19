<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo 'guest information'; ?></h1>

<div id="sf_admin_header">
<?php include_partial('guest/edit_header', array('guest' => $guest)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('guest/edit_messages', array('guest' => $guest, 'labels' => $labels)) ?>
<?php include_partial('guest/edit_form', array('parent_id' => $parent_id, 'outside' => $outside, 'guest' => $guest, 'event_id'=>$event_id, 'form_fields'=> $form_fields, 'required_form_fields'=> $required_form_fields, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('guest/edit_footer', array('guest' => $guest)) ?>
</div>

</div>


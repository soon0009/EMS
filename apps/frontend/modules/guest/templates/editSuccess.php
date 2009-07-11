<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo 'edit guest'; ?></h1>

<div id="sf_admin_header">
<?php include_partial('guest/edit_header', array('guest' => $guest)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('guest/edit_messages', array('guest' => $guest, 'labels' => $labels)) ?>
<?php include_partial('guest/edit_form', array('guest' => $guest, 'event_id'=>$event_id, 'form_fields'=> $form_fields, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('guest/edit_footer', array('guest' => $guest)) ?>
</div>

</div>


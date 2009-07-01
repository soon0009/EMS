<?php
foreach ($regForm as $field) {
  print $field->getRegField() . "<br>";
}
?>
<div>
<?php echo link_to('back', '@show_event?slug='.$event->getSlug()) ?>
</div>

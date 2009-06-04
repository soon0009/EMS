<h1>Events</h1>

<?php echo include_partial('list', array('events'=>$events)); ?>

<?php echo link_to ('ADD EVENT', '@add_event') ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>

  <div id="doc4">
    <div id="header">
      <div id="flinders_header">
        <h1><?php echo link_to('Event Management System', '@homepage'); ?></a></h1>
        <div id="event_header">
          <ul class="header_buttons">
            <li><?php echo link_to('ADD EVENT', '@add_event'); ?></li>
            <li id="header_admin"><?php // echo link_to('admin', '@admin'); ?></li>
            <li><?php echo link_to('logout', '@sf_guard_signout');?></li>
          </ul>
        </div>
      </div>
    </div>
    <div id="bd">
      <?php echo $sf_data->getRaw('sf_content') ?>
    </div>
  </div>

</body>
</html>

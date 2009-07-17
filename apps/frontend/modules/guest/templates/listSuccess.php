<?php use_helper('I18N', 'Date') ?>
<ul>
  <li> <?php echo link_to('back to event', '@show_event?slug='.$etime->getEvent()->getSlug()); ?> </li>
  <li> <?php echo link_to('export to excel', '@excel?etime_id='.$etime->getId()); ?> </li>
  <li> <?php echo link_to('add guest', '@add_guest?etime_id='.$etime->getId()); ?> </li>
</ul>
<table>
  <thead>
    <?php include_partial('list_th_tabular', array('etime'=>$etime, 'form_fields'=>$form_fields)) ?>
  </thead>
  <tfoot>
  <tr><th>
  <div class="float-right">
  <?php if ($pager->haveToPaginate()): ?>
    <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/first.png', array('align' => 'absmiddle', 'alt' => 'First', 'title' => 'First')), 'guest/list?etime_id='.$etime->getId().'&page=1') ?>
    <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/previous.png', array('align' => 'absmiddle', 'alt' => 'Previous', 'title' => 'Previous')), 'guest/list?etime_id='.$etime->getId().'&page='.$pager->getPreviousPage()) ?>
  
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php echo link_to_unless($page == $pager->getPage(), $page, 'guest/list?etime_id='.$etime->getId().'&page='.$page) ?>
    <?php endforeach; ?>
  
    <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/next.png', array('align' => 'absmiddle', 'alt' => 'Next', 'title' => 'Next')), 'guest/list?etime_id='.$etime->getId().'&page='.$pager->getNextPage()) ?>
    <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/last.png', array('align' => 'absmiddle', 'alt' => 'Last', 'title' => 'Last')), 'guest/list?etime_id='.$etime->getId().'&page='.$pager->getLastPage()) ?>
  <?php endif; ?>
  </div>
  <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults()) ?>
  </th></tr>
  </tfoot>
<?php $i = 1; foreach ($pager->getResults() as $guest): $odd = fmod(++$i, 2) ?>
  <tr class="tr_bg_<?php echo $odd ?>">
  <?php include_partial('list_td_tabular', array('guest' => $guest, 'form_fields'=>$form_fields)) ?>
  <?php include_partial('list_td_actions', array('guest' => $guest)) ?>
  </tr>
<?php endforeach; ?>

</table>

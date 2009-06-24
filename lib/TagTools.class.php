<?php
 
class TagTools
{
  public static function normalize($tag)
  {
    $n_tag = strtolower($tag);
 
    // remove all unwanted chars
    $n_tag = preg_replace('/[^a-zA-Z0-9]/', '', $n_tag);
 
    return trim($n_tag);
  }
 
  public static function splitPhrase($phrase)
  {
    $tags = array();
    $phrase = trim($phrase);
 
    $words = preg_split('/(")/', $phrase, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    $delim = 0;
    foreach ($words as $key => $word)
    {
      if ($word == '"')
      {
        $delim++;
        continue;
      }
      if (($delim % 2 == 1) && $words[$key - 1] == '"')
      {
        $tags[] = trim($word);
      }
      else
      {
        $tags = array_merge($tags, preg_split('/\s+/', trim($word), -1, PREG_SPLIT_NO_EMPTY));
      }
    }
 
    return $tags;
  }

  public static function recordTags($phrase, $model, $obj) {
    $tags = TagTools::splitPhrase($phrase);
    foreach ($tags as $settag) {
      $tag      = new Tag();
      if ($model == "etime") {
        $modelTag = new EtimeTag();
      }
      else {
        $modelTag = new EventTag();
      }
      $tag->setTag($settag);

      $c = new Criteria();
      $c->add(TagPeer::NORMALIZED_TAG, $tag->getNormalizedTag());
      $tag_exists = TagPeer::doSelectOne($c);
      if (!$tag_exists) {
        $tag->save();
      }
      else {
        $tag = $tag_exists;
      }

      if ($model == "etime") {
        $modelTag->setEtime($obj);
      }
      else {
        $modelTag->setEvent($obj);
      }
      $modelTag->setTag($tag);
      $modelTag->save();
    }
    return true;
  }

  public static function replaceTags($phrase, $model, $obj) {
    if ($model == "etime") {
      foreach($obj->getEtimeTags() as $etimeTag) {
        $etimeTag->delete();
      }
    }
    else {
      foreach($obj->getEventTags() as $eventTag) {
        $eventTag->delete();
      }
    }
    TagTools::recordTags($phrase, $model, $obj);
  }

}

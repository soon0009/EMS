<?php 
class myTools 
{ 
  public static function stripText($text) 
  { 
    $text = strtolower($text); 
    // strip all non word chars 
    $text = preg_replace('/\W/', ' ', $text); 
    // replace all white space sections with a dash 
    $text = preg_replace('/\ +/', '-', $text); 
    // trim dashes 
    $text = preg_replace('/\-$/', '', $text); 
    $text = preg_replace('/^\-/', '', $text); 
    return $text; 
  } 

  public static function yesNo($option) {
    if ($option) {
      return "Yes";
    }
    else {
      return "No";
    }
  }

  public static function strToInt(&$v) {
    settype($v, 'int');
  }

  public static function oneDate($start_date, $finish_date) {
    if (format_date($start_date) == format_date($finish_date)) {
      return date('D, j M Y', strtotime($start_date));
    }
    return date('D, j M Y', strtotime($start_date))." - ".date('D, j M Y', strtotime($finish_date));
  }

  public static function dateIso8601($date, $all_day=false, $end_date=false) {
    $add_seconds = 0;
    if ($end_date) {
      $add_seconds = 24 * 60 * 60;
    }
    return $all_day ? date('Ymd', strtotime($date) + $add_seconds) : date('Ymd\TH:i:00', strtotime($date));
  }
} 

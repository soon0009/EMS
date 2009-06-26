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
} 


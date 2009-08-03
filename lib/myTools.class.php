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

  public static function randString($l=20, $u=false) {
    $c = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    if (!$u) for ($s = '', $i = 0, $z = strlen($c)-1; $i < $l; $x = rand(0,$z), $s .= $c{$x}, $i++);
    else for ($i = 0, $z = strlen($c)-1, $s = $c{rand(0,$z)}, $i = 1; $i != $l; $x = rand(0,$z), $s .= $c{$x}, $s = ($s{$i} == $s{$i-1} ? substr($s,0,-1) : $s), $i=strlen($s));
    return $s;
  }
} 

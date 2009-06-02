<?php

function formatEventDate($etime, $view="week") {
  $r = "";
  switch ($view) {
    case "week":
      $r .= "<strong>".date('l', strtotime($etime->getStartdate()))."</strong>";
      $r .= " - ";
      $r .= "<span>".date('d M y', strtotime($etime->getStartdate()))."</span>";
      break;
    case "month":
      $r .= "<strong>".date('d M y', strtotime($etime->getStartdate()))."</strong>";
      $r .= " - ";
      $r .= "<span>".date('l', strtotime($etime->getStartdate()))."</span>";
      break;
    default:
      break;
  }
  return $r;
}

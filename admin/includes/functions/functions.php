<?php

/**
 * Title Function That Echo The Page Title In Case The Page
 * Has The Variable $pageTitle And Echo Point Media Title For Other Pages
 */

function getTitle()
{
  global $pageTitle;
  if (isset($pageTitle)) {
    return $pageTitle;
  } else {
    return 'Admin';
  }
}

/**
 * Limit Text Function That Return A Limit Text Depend on A Number Of Words You Need
 */
function limit_text($text, $limit)
{
  if (str_word_count($text, 0) > $limit) {
    $words = str_word_count($text, 2);
    $pos   = array_keys($words);
    $text  = substr($text, 0, $pos[$limit]) . ' [...]';
  }
  return $text;
}


function limit_text_ar($str, $limit)
{
  mb_internal_encoding('UTF-8');
  $str = mb_strlen($str) > $limit ? mb_substr($str, 0, $limit) . " [...]" : $str;
  return $str;
}

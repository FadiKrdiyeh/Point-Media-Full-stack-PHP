<?php

/**
 * Title Function That Echo The Page Title In Case The Page
 * Has The Variable $pageTitle And Echo Point Media Title For Other Pages
 */

function getTitle()
{
  global $pageTitle;
  if (isset($pageTitle)) {
    return t($pageTitle);
  } else {
    return t('Point Media');
  }
}

/**
 * Limit Text Function That Return A Limit Text Depend on A Number Of Words You Need
 */
function limit_text($text, $limit)
{
  $translatedText = t($text);
  if (str_word_count($translatedText, 0) > $limit) {
    $words = str_word_count($translatedText, 2);
    $pos   = array_keys($words);
    $translatedText  = substr($translatedText, 0, $pos[$limit]) . '...';
  }
  return $translatedText;
}

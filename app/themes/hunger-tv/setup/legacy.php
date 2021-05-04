<?php

// Legacy
require __DIR__ . '/../hungertv-custom/hungertv-custom-article-acf-location-rule.php';

// Source: hunger-tv-legacy theme
function hungertv_parse_credits($credits, $wrap_in_aside="true") {
    $lines = "";
    if (strpos($credits, '@@@') !== false) {
      $lines = explode("\n", str_replace("\n\n", "\n", trim($credits)));
      for ($i = 0; $i < count($lines); $i++) {
        if (strpos($credits, '@@@') !== false && trim($lines[$i]) != "") {
          $lines[$i] = '<b>' . str_replace("@@@", '</b> ', $lines[$i]);
        }
      }
      if ($wrap_in_aside){
        return '<aside class="credits" data-lines="' . count($lines) .'"><span>' . implode('<br/>', $lines) . "</span></aside>";
      }else{
        return '<span>' . implode('<br/>', $lines) . "</span>";
      }

    }
  }

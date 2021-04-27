<?php
  add_filter('acf/location/rule_types', 'htvc_acf_location_rules_types');
  function htvc_acf_location_rules_types( $choices ){
    $choices['Post']['htv_post'] = 'HTV Article Version';
    return $choices;
  }

  add_filter('acf/location/rule_values/htv_post', 'htv_acf_location_rules_values_user');
  function htv_acf_location_rules_values_user( $choices ){
    $choices["htv_2"] = "HTV 2.0 Article";
    $choices["htv_3"] = "HTV 3.0 Article";
    $choices["htv_4"] = "HTV 4.0 Article";
    return $choices;
  }

  add_filter('acf/location/rule_match/htv_post', 'htv_acf_location_rules_match_user', 10, 3);
  function htv_acf_location_rules_match_user( $match, $rule, $options ){
    $match = false;

    if (!defined('HTV_LAST_V2_POST_ID'))
      return $match;
    

    if (!empty($options['post_type']) && $options['post_type'] !== "article")
      return $match;

   /* // - commented out by Lara - options not found...
    if ($options['page_template']
        || $options['page_parent']
        || $options['post_format']
        || $options['taxonomy']
        || $options['user_id']
        || $options['user_role']
        || $options['attachment']
        || $options['widget']
        || $options['lang']){
      return $match;
    } */

    $post_id = (int)$options['post_id'];

    $version = $rule['value'];

    if($rule['operator'] == "=="){
      if ($version == "htv_2" && $post_id <= (int)HTV_LAST_V2_POST_ID){
        $match = true;
      }
      if ($version == "htv_3" && $post_id > (int)HTV_LAST_V2_POST_ID && $post_id <= (int)HTV_LAST_V3_POST_ID){
        $match = true;
      }
      if ($version == "htv_4" && $post_id > (int)HTV_LAST_V3_POST_ID){
        $match = true;
      }
    }
    elseif($rule['operator'] == "!="){
      if ($version == "htv_2" && $post_id > (int)HTV_LAST_V2_POST_ID){
        $match = true;
      }
      if ($version == "htv_3" && $post_id <= (int)HTV_LAST_V2_POST_ID){
        $match = true;
      }
    }

    return $match;
  }
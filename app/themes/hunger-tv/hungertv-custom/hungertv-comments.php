<?php
$hungertv_comment_ok = false;

add_filter('preprocess_comment','hungertv_comment_comment',1,1);
function hungertv_comment_comment($commentdata){
  global $hungertv_comment_ok;
  if($commentdata['comment_type'] == 'pingback' || $commentdata['comment_type'] == 'trackback'){
    if($options['trackbacks'] == 'yes'){
        return $commentdata;
    } else {
        exit;
    }
  }
  if(is_user_logged_in()){
    return $commentdata;
  }

  if(!isset($_POST['comment_hash'])){
      wp_die('no comment hash defined');
  }
  if (!empty($_POST['comment_hash'])) {
    $hash = $commentdata['comment_author'] . '_' . $commentdata['comment_author_email'] . '_' . $commentdata['comment_author_url'];
    $res = 0;

    for($i=0; $i < strlen($hash); $i++) {
      $res = $res * 31 + ord($hash[$i]);
    }

    if (substr((string)$res, 0, 13) === substr((string)$_POST['comment_hash'], 0, 13))
      $hungertv_comment_ok = true;
  }
  if ($hungertv_comment_ok) {
    if ( ( isset( $_POST['subscribe-newsletter'] ) ) && ( (string)$_POST['subscribe-newsletter'] === 'subscribe') ) {
      if ( ( isset( $_POST['email'] ) ) && ( (string)$_POST['email'] !== '') ) {
         if ( ( isset( $_POST['lastname'] ) ) && ( (string)$_POST['lastname'] !== '') ) {
            if (function_exists('hungertv_newsletter_mailchimp_subscribe')) {
              hungertv_newsletter_mailchimp_subscribe($_POST['email'], $commentdata['comment_author'], $_POST['lastname'], "", "", "");
            }
         }
      }
    }
  }
  return $commentdata; // send back commentdata, another filter will set comment as spam/pending if gasp is set
}

add_action( 'comment_post', 'hungertv_comment_save_comment_meta_data' );
function hungertv_comment_save_comment_meta_data( $comment_id ) {
  if ( ( isset( $_POST['subscribe-newsletter'] ) ) && ( $_POST['subscribe-newsletter'] != '') )
    $sn = wp_filter_nohtml_kses($_POST['subscribe-newsletter']);
    add_comment_meta( $comment_id, 'subscribetonewsletter', $sn );

  if ( ( isset( $_POST['lastname'] ) ) && ( $_POST['lastname'] != '') )
    $ln = wp_filter_nohtml_kses($_POST['lastname']);
    add_comment_meta( $comment_id, 'lastname', $ln );
}

add_filter('pre_comment_approved','hungertv_comment_comment_check',1,1);
function hungertv_comment_comment_check($approved){
  global $hungertv_comment_ok;
  if($hungertv_comment_ok != NULL){
      $approved = $hungertv_comment_ok;
  }
  return $approved;
}

add_filter( 'comments_open', 'hungertv_comment_comment_status', 10 , 2 );
function hungertv_comment_comment_status( $open, $post_id ) {
  $post = get_post( $post_id );
  if( $post->post_type == 'attachment' ) {
    return false;
  }
  return $open;
}

add_filter("comment_id_fields", 'hunger_comment_get_comment_id_fields', 10, 3);
function hunger_comment_get_comment_id_fields($result, $id, $replytoid) {
  return  '<input type="hidden" name="comment_post_ID" value="' . $id . '" id="comment_post_ID" />' .  "\n"
            . '<input type="hidden" name="comment_parent" id="comment_parent" value="' . $replytoid .'" />' . "\n";
}

add_action('comment_form_top', 'hungertv_comment_form_top', 10, 1);
function hungertv_comment_form_top() {
  print '<input type="hidden" name="comment_hash" id="comment_hash" value="123456789" />';
  print '<input type="hidden" name="comment_redirect_to" id="comment_redirect_to" value="' . get_permalink() . '" />';
}

add_filter('comment_form_default_fields', 'hungertv_comment_add_fields');
function hungertv_comment_add_fields($arg) {
  $fields = array();

  $fields['author'] = '<p class="comment-form-author"><label for="author">First Name</label> <span class="required">*</span><input type="text" aria-required="true" size="30" value="" name="author" id="author"></p>';
  $fields['last_name'] = '<p class="comment-form-lastname"><label for="lastname">Last Name</label> <span class="required">*</span><input type="text" aria-required="true" size="30" value="" name="lastname" id="lastname"></p>';
  $fields['email'] = $arg['email'];
  $fields['url'] = $arg['url'];

  return $fields;
}

add_filter('comment_form_field_comment', 'hungertv_comment_field_comment');
function hungertv_comment_field_comment($arg) {
  return $arg . '<p class="comment-form-subscribe"><input type="checkbox" value="subscribe" name="subscribe-newsletter" id="subscribe-newsletter"><label for="subscribe-newsletter">Subscribe to Hunger TV Newsletter</label></p>';
}
add_filter('comment_post_redirect', 'hungertv_comment_redirect');
function hungertv_comment_redirect($location) {
  global $comment_id;
  if (!empty($_POST['comment_redirect_to'])) {
    return $_POST['comment_redirect_to'] . "#comment-" . $comment_id;
  } else {
    return $location;
  }
}


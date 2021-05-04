<?php

/**
 * Archives widget class
 *
 * @since 2.8.0
 */
class HUNGERTV_Archives extends WP_Widget {

  function __construct() {
    $widget_ops = array('classname' => 'HUNGERTV_Archives', 'description' => 'A monthly archive of your site&#8217;s posts' );
    // changing for php upgrade $this->WP_Widget('HUNGERTV_Archives', 'HungerTV Archive', $widget_ops);
    parent::__construct('HUNGERTV_Archives', 'HungerTV Archive', $widget_ops);
  }

  function widget( $args, $instance ) {
    global $blogger;
    global $showallauthor;

    extract($args);
    $c = ! empty( $instance['count'] ) ? '1' : '0';
    $d = ! empty( $instance['dropdown'] ) ? '1' : '0';
    $title = apply_filters('widget_title', empty($instance['title']) ? __('Archives') : $instance['title'], $instance, $this->id_base);

    echo $before_widget;
    if ( $title )
      echo $before_title . $title . $after_title;

    if ( $d ) {
      if (!is_null($blogger) || $showallauthor) {
        if ($showallauthor) {
          $url = '?showall=1';
        } else {
          global $authordata;
          //$url = get_author_posts_url( $authordata->ID, $authordata->user_nicename );
          $url = '?show_author=' . $authordata->ID;
        }
      } else {
        //$url = home_url() . '/hungry/';
        $url = '?hungry=1';
      }
?>
    <div class="widget"><select name="archive-dropdown" id="hungertv-month" onchange="document.location.href=this.options[this.selectedIndex].value + '<?php echo $url; ?>';"> <option value=""><?php echo esc_attr(__('Select Month')); ?></option> <?php $this->get_archives(apply_filters('widget_archives_dropdown_args', array('type' => 'monthly', 'format' => 'option', 'show_post_count' => $c))); ?> </select></div>
<?php
    } else {
?>
    <ul>
    <?php $this->get_archives(apply_filters('widget_archives_args', array('type' => 'monthly', 'show_post_count' => $c))); ?>
    </ul>
<?php
    }

    echo $after_widget;
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['count'] = $new_instance['count'] ? 1 : 0;
    $instance['dropdown'] = $new_instance['dropdown'] ? 1 : 0;

    return $instance;
  }

  function form( $instance ) {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
    $title = strip_tags($instance['title']);
    $count = $instance['count'] ? 'checked="checked"' : '';
    $dropdown = $instance['dropdown'] ? 'checked="checked"' : '';
?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
    <p>
      <input class="checkbox" type="checkbox" <?php echo $dropdown; ?> id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>" /> <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e('Display as dropdown'); ?></label>
      <br/>
      <input class="checkbox" type="checkbox" <?php echo $count; ?> id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" /> <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show post counts'); ?></label>
    </p>
<?php
  }

  function get_archives($args = '') {

    global $wpdb, $wp_locale;

    $defaults = array(
      'type' => 'monthly', 'limit' => '',
      'format' => 'html', 'before' => '',
      'after' => '', 'show_post_count' => false,
      'echo' => 1
    );

    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );

    if ( '' == $type )
      $type = 'monthly';

    if ( '' != $limit ) {
      $limit = absint($limit);
      $limit = ' LIMIT '.$limit;
    }

    // this is what will separate dates on weekly archive links
    $archive_week_separator = '&#8211;';

    // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
    $archive_date_format_over_ride = 0;

    // options for daily archive (only if you over-ride the general date format)
    $archive_day_date_format = 'Y/m/d';

    // options for weekly archive (only if you over-ride the general date format)
    $archive_week_start_date_format = 'Y/m/d';
    $archive_week_end_date_format = 'Y/m/d';

    if ( !$archive_date_format_over_ride ) {
      $archive_day_date_format = get_option('date_format');
      $archive_week_start_date_format = get_option('date_format');
      $archive_week_end_date_format = get_option('date_format');
    }

    //filters
    $where = apply_filters( 'getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );
    $join = apply_filters( 'getarchives_join', '', $r );

    $output = '';
    if ( 'monthly' == $type ) {
      global $blogger;
      global $showallauthor;
      if (!is_null($blogger) || $showallauthor) {

        if ($showallauthor) {
          $where .= " AND post_author <> 18";
        } else {
          $where .= " AND post_author=" . $blogger['author_id'];
        }

        $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
      } else {

        $categories = get_categories( array('child_of' => 3) );
        $arr_show_cats = '3';
        foreach ($categories as $cat) {
          $arr_show_cats .= ',' . (int)$cat->term_id;
        }
        $join = 'RIGHT JOIN wp_term_relationships tr ON tr.object_id=ID RIGHT JOIN wp_term_taxonomy tt ON tt.term_taxonomy_id=tr.term_taxonomy_id AND tt.term_id IN (' . $arr_show_cats .')';
        $where .= " AND post_author=18";
        $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
      }

      $key = md5($query);
      $cache = wp_cache_get( 'wp_get_archives' , 'general');
      if ( !isset( $cache[ $key ] ) ) {
        $arcresults = $wpdb->get_results($query);
        $cache[ $key ] = $arcresults;
        wp_cache_set( 'wp_get_archives', $cache, 'general' );
      } else {
        $arcresults = $cache[ $key ];
      }
      if ( $arcresults ) {
        $afterafter = $after;
        foreach ( (array) $arcresults as $arcresult ) {
          $url = get_month_link( $arcresult->year, $arcresult->month );

          //$url = '?=show_year=' . $arcresult->year . '&show_month=' . $arcresult->month;
          /* translators: 1: month name, 2: 4-digit year */
          $text = sprintf(__('%1$s %2$d'), $wp_locale->get_month($arcresult->month), $arcresult->year);
          if ( $show_post_count )
            $after = '&nbsp;('.$arcresult->posts.')' . $afterafter;

          $year = get_query_var('year');
          $month = get_query_var('monthnum');

          $selected = '';
          if ($arcresult->year==$year && $arcresult->month==$month)
            $selected = ' selected="selected"';

          $output .= $this->get_archives_link($url, $text, $format, $before, $after, $selected);
        }
      }
    }
    if ( $echo )
      echo $output;
    else
      return $output;
  }

  function get_archives_link($url, $text, $format = 'html', $before = '', $after = '', $selected='') {
    $text = wptexturize($text);
    $title_text = esc_attr($text);
    $url = esc_url($url);

    if ('link' == $format)
      $link_html = "\t<link rel='archives' title='$title_text' href='$url' />\n";
    elseif ('option' == $format)
      $link_html = "\t<option value='$url'$selected>$before $text $after</option>\n";
    elseif ('html' == $format)
      $link_html = "\t<li>$before<a href='$url' title='$title_text'>$text</a>$after</li>\n";
    else // custom
      $link_html = "\t$before<a href='$url' title='$title_text'>$text</a>$after\n";

    $link_html = apply_filters( 'get_archives_link', $link_html );

    return $link_html;
  }
}

class HUNGERTV_Categories extends WP_Widget {

  function __construct() {
    $widget_ops = array('classname' => 'HUNGERTV_Categories', 'description' => 'A custom list or dropdown of categories' );
    // changing for php upgrade $this->WP_Widget('HUNGERTV_Categories', 'HungerTV Categories', $widget_ops);
    parent::__construct('HUNGERTV_Categories', 'HungerTV Categories', $widget_ops);
  }

  function widget( $args, $instance ) {
    extract( $args );
    global $blogger;
    global $showallauthor;

    $title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Categories' ) : $instance['title'], $instance, $this->id_base);
    $c = ! empty( $instance['count'] ) ? '1' : '0';
    $h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
    $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

    echo $before_widget;
    if ( $title )
      echo $before_title . $title . $after_title;

    if (is_category()) {
      $cat_args = array('orderby' => 'name', 'show_count' => $c, 'hierarchical' => $h, 'child_of' => 3);
    } else {

      if (!is_null($blogger) || $showallauthor) {
        if ($showallauthor) {
          $cat_args = array('orderby' => 'name', 'show_count' => $c, 'child_of' => 1, 'depth' => 1, 'hierarchical' => 1);
        } else {
          $cat_args = array('orderby' => 'name', 'show_count' => $c, 'hierarchical' => $h, 'child_of' => $blogger['cat_id']);
        }
      } else {
        $cat_args = array('orderby' => 'name', 'show_count' => $c, 'hierarchical' => $h,);
      }
    }

    if ( $d ) {
      $cat_args['show_option_none'] = __('By Category');
      $cat_args['hide_if_empty'] = true;

      if (!empty($_GET['show_cat'])) {
        $cat_args['selected'] = (int)$_GET['show_cat'];
        $cat_args['child_of'] = 3;
      } else {
        if (!is_null($blogger) || $showallauthor) {
          if ($showallauthor) {
            $cat_args['child_of'] = 1;
          } else {
            $cat_args['child_of'] = $blogger['cat_id'];
          }
        } else {
          $cat_args['child_of'] = 3;
        }
      }
      $cat_args['echo'] = false;

      $list = wp_dropdown_categories(apply_filters('widget_categories_dropdown_args', $cat_args));

      if ($list != "") {
        echo '<div class="widget">';
        echo $list;
        echo '</div>';
?>

<script type='text/javascript'>
/* <![CDATA[ */
  var dropdown = document.getElementById("cat");
  var show_cat = <?php echo (!is_null($blogger))? (($showallauthor)? 1 : (int)$blogger['cat_id']) : (int)$cat_args['child_of']; ?>;
  function onCatChange() {
    if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
      location.href = "<?php echo home_url(); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
    } else {
      location.href = "<?php echo home_url(); ?>/?cat="+show_cat;
    }
  }
  dropdown.onchange = onCatChange;
/* ]]> */
</script>

<?php
}
    } else {
?>
    <ul>
<?php
    $cat_args['title_li'] = '';
    $cat_args['hide_if_empty'] = true;
    wp_list_categories(apply_filters('widget_categories_args', $cat_args));
?>
    </ul>
<?php
    }

    echo $after_widget;
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['count'] = !empty($new_instance['count']) ? 1 : 0;
    $instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
    $instance['dropdown'] = !empty($new_instance['dropdown']) ? 1 : 0;

    return $instance;
  }

  function form( $instance ) {
    //Defaults
    $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
    $title = esc_attr( $instance['title'] );
    $count = isset($instance['count']) ? (bool) $instance['count'] :false;
    $hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
    $dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>"<?php checked( $dropdown ); ?> />
    <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e( 'Display as dropdown' ); ?></label><br />

    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
    <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts' ); ?></label><br />

    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
    <label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e( 'Show hierarchy' ); ?></label></p>
<?php
  }

}

add_action( 'widgets_init', 'hungertv_custom_register_widgets');
function hungertv_custom_register_widgets() {
  register_widget('HUNGERTV_Archives');
  register_widget("HUNGERTV_Categories");
}

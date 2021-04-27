<?php

function hungertv_related_articles($post_id = null) {
  global $wpdb;

  if (is_null($post_id))
    $post_id = get_the_ID();

  if (!empty($post_id)) {
    $articles = get_field('related_articles', $post_id);

    if (is_null($articles) || !$articles) {
      $sql = "SELECT tr.object_id as ID, count(*) as frequency
              FROM wp_term_relationships tr
              LEFT JOIN wp_posts p ON p.ID = tr.object_id
              WHERE tr.object_id <> $post_id AND tr.term_taxonomy_id IN (
                SELECT term_taxonomy_id
                FROM wp_term_relationships
                WHERE object_id=$post_id
                  AND term_taxonomy_id IN (
                    SELECT DISTINCT term_taxonomy_id
                    FROM wp_term_taxonomy
                    WHERE taxonomy='post_tag'
                  )
                )
                AND p.post_status = 'publish'
              GROUP BY tr.object_id
              ORDER BY frequency DESC, post_date DESC
              LIMIT 6;";
      $articles = $wpdb->get_results($sql);
    }

    if (count($articles)) {
      ?>
      <aside class="related">
        <h2>You Might Like</h2>
        <div class="listing">
        <?php
          $c = 0;
          foreach ($articles as $article) :
            if (has_post_thumbnail($article->ID)) :
            ?>
          <a href="<?php echo get_permalink($article->ID); ?>" class="listed">
            <?php
              $formats = array(
                array(
                  "format" => "insert",
                  "pmin" => 0,
                  "pmax" => 150
                ),
                array(
                  "format" => "thumbnail",
                  "pmin" => 151
                )
              );
              echo hungertv_responsive_image(get_post_thumbnail_id($article->ID), $formats, array('title' => '')); ?>
            <span class="title"><?php
              $title = get_the_title($article->ID);
              echo (strlen($title) > 16) ? substr($title,0,16) . '...' : $title
              ?></span>
          </a>
        <?php
            endif;
          $c++;
          endforeach; ?>
        </div>
      </aside><?php
    }

  }
}

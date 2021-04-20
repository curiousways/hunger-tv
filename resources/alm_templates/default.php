<script>
//moreContent();
</script>
<div class="row no-gutters art-margin art">
 <?php
$my_id = get_the_id();
$post_is = $my_id;?>
    <div class="col-md-7 offset-1 col-15 order-2 order-md-1  xl-margin">
    <article <?php post_class() ?>
    <h2 class="post-cats"><?php include \App\template_path(locate_template('views/partials/categories.blade.php')); ?></h2>
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    </div>
    <div class="col-md-9 offset-md-1 order-1 order-md-2 offset-2 col-16">
      <div class="img-full">
        <a href="<?php the_permalink(); ?>">
        <?php if (! get_field('hero_image', $my_id)) {
the_post_thumbnail($my_id, 'large');
        }
        else {
        $image = get_field('hero_image', $my_id);
        $url = $image['url'];

        ?>
            <img src="<?php echo $url_clean; ?>" alt="<?php echo $image['alt']; ?>" />
     <?php   }
        ?>



<?php if ( get_field( 'sponsored', $my_id ) ):
          $sponsored =  (get_field('sponsored', $my_id))[0];
        else: $sponsored = '';
    endif;
        if ($sponsored == 'yes') { ?>
<div class="sponsored">Partnership</div>
      <?php  }
        ?>

</a>
    </div>
    <div class="sm-margin">
    <?php include \App\template_path(locate_template('views/partials/tags.blade.php')); ?>
       </div>
    </div>
        </div>

  <div class="row no-gutters art-margin">
    <div class="col-sm-16 offset-sm-1 center replace-me">
  <!-- ad here -->

<!-- /64193083/BILLBOARD_LEADERBOARD_BF -->
<div id='div-gpt-ad-1532355911205-0'>
<script>
googletag.cmd.push(function() {
  googletag.display('div-gpt-ad-1532355911205-0');
  googletag.pubads().refresh([adslot0]); });
</script>
</div>




</div>

    <div class="col-sm-16 offset-sm-1 center replace-me3">
  <!-- ad here -->

<!-- /64193083/MOB_MPU_LEADER -->
<div id='div-gpt-ad-1529145936494-0'>
<script>
googletag.cmd.push(function() {
    googletag.display('div-gpt-ad-1529145936494-0');
    googletag.pubads().refresh([adslotc0]); });

</script>
</div>
</div>

</div>
  <div class="row no-gutters art-margin">
    <div class="col-md-7 offset-1 col-16">
    <?php
    if (get_field('article_excerpt', $my_id) !== '') { ?>
        <h3><?php echo get_field('article_excerpt', $my_id); ?></h3>
  <?php  }
    else {
        ?>
        <h3><?php echo get_field('excerpt', $my_id); ?></h3>
  <?php
    }

    ?>

      <a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
    </div>
    <div class="col-sm-9 offset-sm-1">
    </div>
  </div>

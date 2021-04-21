
@extends('layouts.app')


@section('content')
<div class="all">
<div class="row no-gutters">
    <div class="col-sm-16 offset-sm-1">
    <?php
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>
<h1 class="lg-margin"><?php echo $curauth->nickname; ?></h1>


</div>
</div>

<?php
//$orig_query = $wp_query;
//$wp_query = new WP_Query($args);
// the rest of your code
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$args = array(
  'author'        =>  $curauth->ID,
  'orderby'       =>  'post_date',
  'post_type' => array('editorial','article','feature'),
  'order'         =>  'ASC',
  'posts_per_page' => 12,
  'paged'=>$paged,
);


$wp_query = query_posts( $args );
//$wp_query = $orig_query;

?>




    @include('partials.content-index')
    <?php
paginate_links();
posts_nav_link();
    ?>
</div>

@endsection

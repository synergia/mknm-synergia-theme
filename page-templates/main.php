<?php
/*
Template Name: Główna
*/
?>
<?php global $snrg_option_global; ?>

<?php get_header(); ?>
<?php get_template_part('parts/topbar'); ?>
<?php get_template_part('parts/hero'); ?>
<?php // args
$projects = array(
    'posts_per_page' => 3,
    'post_type' => 'project',
    'orderby' => 'modified',
);
$projects_query = new WP_Query($projects);
?>
<div class="compensator">
  <div class="cardsWrapper showcase">
    <?php project_card($projects_query); ?>
  </div>
</div>
<?php get_template_part('parts/sponsors');
 ?>

<!-- end content container -->

<?php get_footer(); ?>

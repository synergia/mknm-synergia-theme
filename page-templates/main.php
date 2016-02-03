<?php
/*
Template Name: Główna
*/
?>
<?php global $snrg_option_global; ?>

<?php get_header(); ?>
<?php get_template_part('template-part', 'topnav'); ?>
<?php // args
$projects = array(
    'numberposts' => -1,
    'post_type' => 'project',
    'orderby' => 'modified',
);
$projects_query = new WP_Query($projects);
?>
<div class="content-wrapper">
  <div class="gl portfolio-content">
    <?php project_card($projects_query); ?>
  </div>
</div>
<?php get_template_part('template-part', 'sponsors'); ?>

<!-- end content container -->

<?php get_footer(); ?>

<?php
global $banner_options;

$left_page = $banner_options['left_page'];
$right_page = $banner_options['right_page'];
$middle_page = $banner_options['middle_page'];

$args_left = array(
  'name'        => $left_page,
  'post_type'   => array( 'post', ' project' ),
  'post_status' => 'publish',
  'numberposts' => 1);
$args_right = array(
  'name'        => $right_page,
  'post_type'   => array( 'post', ' project' ),
  'post_status' => 'publish',
  'numberposts' => 1);
$args_middle = array(
  'name'        => $middle_page,
  'post_type'   => array( 'post', ' project' ),
  'post_status' => 'publish',
  'numberposts' => 1);
$left_post = get_posts($args_left);
$right_post = get_posts($args_right);
$middle_post = get_posts($args_middle);
?>

<div class="banner">
    <div class="banner__left">
        <a href="<?php echo get_permalink($left_post[0]); ?>">
            <h3 class="banner__leftTitle banner__leftTitle--animation"><?php echo get_the_title($left_post[0]); ?></h3>
        </a>
        <a href="<?php echo get_permalink($left_post[0]); ?>">
            <img class="banner__leftImg blazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=" data-src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($left_post[0])); ?>" / />
        </a>
    </div>
    <div class="banner__middle">
        <a href="<?php echo get_permalink($middle_post[0]); ?>">
            <h3 class="banner__middleTitle banner__middleTitle--animation"><?php echo get_the_title($middle_post[0]); ?></h3>
        </a>
        <a href="<?php echo get_permalink($middle_post[0]); ?>">
            <img class="banner__middleImg blazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=" data-src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($middle_post[0])); ?>"/>
        <a href="#">
    </div>
    <div class="banner__right">
        <a href="<?php echo get_permalink($right_post[0]); ?>">
            <h3 class="banner__rightTitle banner__rightTitle--animation"><?php echo get_the_title($right_post[0]); ?></h3>
        </a>
        <a href="<?php echo get_permalink($right_post[0]); ?>">
            <img class="banner__rightImg blazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=" data-src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($right_post[0])); ?>"/>
        </a>
    </div>
</div>
<div class="global global--frontpage" data-ajax-url="<?php echo admin_url('admin-ajax.php'); ?>">
  <div class="container">

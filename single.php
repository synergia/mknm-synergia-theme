<?php get_header(); ?>
<?php get_template_part('parts/topbar');
 ?>

<div class="compensator">
	<div class="project">

<?php // theloop
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<header class="project__header loading">
        	<div class="bottom">
            	<div class="project__meta">
                    <time class="project__time"><?php the_date(); ?></time>
                </div>
				<h1 class="project__title"><?php the_title(); ?></h1>
            </div>
			<div class="project__overimage">
			<?php if ( has_post_thumbnail() ) { ?>
				<img class="project__featuredimg blazy"
				 	alt="<?php the_title(); ?>"
					src="<?php bloginfo('template_directory'); ?>/build/img/full.png"
					data-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true)[0];?>"
					data-src-small="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'card_image', true)[0];?>"/>

			<?php } else { ?>
				<img class="blazy"
					src="<?php bloginfo('template_directory'); ?>/build/img/full.png"										data-src="<?php bloginfo('template_directory'); ?>/build/img/full.png"
					data-src-small="<?php bloginfo('template_directory'); ?>/build/img/card.png"/><?php } ?>
			</div>
		</header>
		<?php
		if(pokaz_autora_wpisu_get_meta( 'pokaz_autora_wpisu_show_author_of_post' )) {
		    get_template_part('parts/membercard-small');
		}
		?>		<div class="project__content"><?php the_content(); ?></div>
		<?php wp_link_pages(); ?>
	<?php endwhile; ?>
<?php else: ?>

<?php get_404_template(); ?>

<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>

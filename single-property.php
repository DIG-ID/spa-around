<?php get_header(); ?>
<?php do_action( 'before_main_content' ); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php get_template_part( 'template-parts/post/post', 'header' ); ?>
		<?php get_template_part( 'template-parts/post/post', 'title' ); ?>
		<?php get_template_part( 'template-parts/post/property/intro' ); ?>
		<?php get_template_part( 'template-parts/post/property/host' ); ?>
	</article>
<?php do_action( 'after_main_content' ); ?>
<?php get_footer(); ?>

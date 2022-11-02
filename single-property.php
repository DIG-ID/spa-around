<?php get_header(); ?>
<?php do_action( 'before_main_content' ); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'container' ); ?>>
		<div class="row">
			<div class="col-12">
				<?php the_title( '<h1>', '</h1>' ); ?>
				<?php the_content(); ?>
			</div>
		</div>
	</article>
<?php do_action( 'after_main_content' ); ?>
<?php get_footer(); ?>

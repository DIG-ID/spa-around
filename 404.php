<?php get_header(); ?>
<?php do_action( 'before_main_content' ); ?>
	<section class="section section-error-page-not-found">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			<div class="container">
				<div class="row justify-content-center align-items-center">
					<div class="col-12 col-lg-6 text-center">
						<h1 class="page__title"><?php esc_html_e( '404', 'digid' ); ?></h1>
					</div>
				</div>
			</div>
		</article>
	</section>
<?php do_action( 'after_main_content' ); ?>
<?php get_footer(); ?>
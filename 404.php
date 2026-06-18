<?php get_header(); ?>
<?php do_action( 'before_main_content' ); ?>
	<section class="section section-error-page-not-found">
			<div class="container">
				<div class="row justify-content-center align-items-center">
					<div class="col-12 col-lg-6 text-center">
						<h1 class="page__title section__title section-error-page-not-found__title"><?php esc_html_e( '404', 'digid' ); ?></h1>
						<p><?php esc_html_e( 'The page you are looking for could not be found.', 'digid' ); ?></p>
						<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go back to the homepage', 'digid' ); ?></a>
					</div>
				</div>
			</div>
	</section>
<?php do_action( 'after_main_content' ); ?>
<?php get_footer(); ?>
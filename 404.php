<?php get_header(); ?>
<?php do_action( 'before_main_content' ); ?>
	<section class="section section-error-page-not-found">
			<div class="container">
				<div class="row justify-content-center align-items-center">
					<div class="col-12 col-lg-6 text-center">
						<h1 class="page__title section__title section-error-page-not-found__title"><?php esc_html_e( '404', 'digid' ); ?></h1>
						<h2 class="mb-5"><?php esc_html_e( 'Es sieht so aus, als wärst du vom Wellness-Pfad abgekommen. Lass uns dich zurück zur Entspannung begleiten.', 'digid' ); ?></h2>
						<p><?php esc_html_e( 'Keine Sorge, klicke einfach auf den untenstehenden Button, um wieder auf den richtigen Weg zu kommen.', 'digid' ); ?></p>
						<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Zurück zur Startseite', 'digid' ); ?></a>
					</div>
				</div>
			</div>
	</section>
<?php do_action( 'after_main_content' ); ?>
<?php get_footer(); ?>
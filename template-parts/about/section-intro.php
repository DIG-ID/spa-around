<section class="section section-page-title">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
				if ( function_exists( 'yoast_breadcrumb' ) ) :
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				endif;
				?>
			</div>
		</div>
	</div>
</section>
<section class="section section-intro section-intro__about">
	<div class="container">
		<div class="row align-items-end mb-5">
		<div class="col-12 col-md-4">
			<h1 class="section__title section-page-title__title"><?php _e( 'Platform<br> Spa Around', 'digid' ); ?></h1>
			</div>
			<div class="col-12 col-md-4 offset-md-1">
				<h2><?php esc_html_e( 'Konzept', 'digid' ); ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-4 section__description">
				<?php the_field( 'about_details_description' ); ?>
			</div>
			<div class="col-12 col-md-4 offset-md-1 section__description">
				<?php the_field( 'about_details_konzept' ); ?>
			</div>
		</div>
	</div>
</section>

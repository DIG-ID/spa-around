<section class="section section-single-title">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
				if ( function_exists( 'yoast_breadcrumb' ) ) :
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				endif;
				?>
			</div>
			<div class="col-12 col-md-5">
				<?php the_title( '<h1 class="section__title section-single-title__title">', '</h1>' ); ?>
				<?php do_action( 'custom_meta' ); ?>
			</div>
		</div>
	</div>
</section>

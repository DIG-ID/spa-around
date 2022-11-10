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
			<div class="col-12">
				<?php the_title( '<h1 class="section__title section-page-title__title">', '</h1>' ); ?>
			</div>
		</div>
	</div>
</section>



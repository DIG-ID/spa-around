<section class="section section-properties">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="section__title section-properties__title"><?php esc_html_e( 'Properties', 'digid' ); ?></h2>
			</div>
		</div>
		<div class="row">
		<?php
		if ( have_rows( 'about_details_logos' ) ) :
			while ( have_rows( 'about_details_logos' ) ) :
				the_row();
				echo '<a href="' . esc_url( get_sub_field( 'link' ) ) . '" target="_blank" class="col-6 col-md-3 propertie-logo">' . wp_get_attachment_image( get_sub_field( 'image' ), 'properties-logos' ) . '</a>';
			endwhile;
		endif;
		?>
		</div>
	</div>
</section>

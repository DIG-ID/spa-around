<section class="section section-page-header">
	<?php
	if ( has_post_thumbnail() ) :
		the_post_thumbnail( 'banner-header' );
	else :
		$banner_img = get_template_directory_uri() . '/assets/imgs/default-header.jpg';
		echo '<img src="' . esc_url( $banner_img ) . '" >';
	endif;
	?>
</section>

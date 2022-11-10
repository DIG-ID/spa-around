<?php
function digid_get_header_banner() {
	$img = '';
	if ( has_post_thumbnail() ) :
		$img = get_the_post_thumbnail_url( 'full' );
	else :
		if ( is_page_template( 'page-templates/page-events.php' ) ) :
			$img = get_template_directory_uri() . '/assets/imgs/default-header.jpg';
		elseif ( is_page_template( 'page-templates/page-offers.php' ) ) :
			$img = get_template_directory_uri() . '/assets/imgs/default-header.jpg';
		elseif ( is_page_template( 'page-templates/page-spa-around.php' ) ) :
			$img = get_template_directory_uri() . '/assets/imgs/default-header.jpg';
		elseif ( is_page_template( 'page-templates/page-about.php' ) ) :
			$img = get_template_directory_uri() . '/assets/imgs/default-header.jpg';
		endif;
	endif;
	echo esc_url( $img );
}
?>
<section class="section section-page-header" style="background-color: #464646; background: linear-gradient( rgba(15, 32, 28, 0.5), rgba(15, 32, 28, 0.5) ) , url( <?php digid_get_header_banner(); ?> ); background-position: center; background-repeat: no-repeat; background-size: cover;">
	
</section>

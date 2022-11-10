<?php
function digid_get_header_banner() {
	$img = '';
	if ( has_post_thumbnail() ) :
		$img = get_the_post_thumbnail_url( 'full' );
		echo esc_url( $img );
	else :
		$img = get_template_directory_uri() . '/assets/imgs/default-header.jpg';
		echo esc_url( $img );
	endif;
}
?>
<section class="section section-page-header" style="background-color: #464646; background: linear-gradient( rgba(15, 32, 28, 0.5), rgba(15, 32, 28, 0.5) ) , url( <?php digid_get_header_banner(); ?> ); background-position: center; background-repeat: no-repeat; background-size: cover;">
	
</section>

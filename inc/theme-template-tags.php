<?php

/**
 * Get our socials from the theme customizer and display them.
 */
function digid_theme_socials() {
	echo '<div class="socials-wrapper">';
	$facebook_url  = get_theme_mod( 'facebook_url' );
	$linkedin_url  = get_theme_mod( 'linkedin_url' );
	$instagram_url = get_theme_mod( 'instagram_url' );
	if ( ! empty( $facebook_url ) ) :
		echo '<a href="' , esc_url( $facebook_url ) , '" target="_blank" class="social-link social-link__facebook"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg></a>';
	endif;
	if ( ! empty( $instagram_url ) ) :
		echo '<a href="' , esc_url( $instagram_url ) , '" target="_blank" class="social-link social-link__instagram"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>';
	endif;
	if ( ! empty( $linkedin_url ) ) :
		echo '<a href="' , esc_url( $linkedin_url ) , '" target="_blank" class="social-link social-link__linkedin"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg></a>';
	endif;
	echo '</div>';
}

add_action( 'socials', 'digid_theme_socials' );

/**
 * This function open the main content.
 */
function theme_before_main_content() {
	?>
	<main id="main-content" class="main-content">
	<?php
}

add_action( 'before_main_content', 'theme_before_main_content' );

/**
 * This function closes the main content.
 */
function theme_after_main_content() {
	?>
	</main><!-- #main-content-->
	<?php
}

add_action( 'after_main_content', 'theme_after_main_content' );

/**
 * Select the banner for the header.
 */
function digid_get_header_banner() {
	$banner_img = '';
	if ( has_post_thumbnail() ) :
		$banner_img = get_the_post_thumbnail_url( get_the_ID(), 'banner-header' );
	else :
		$banner_img = get_template_directory_uri() . '/assets/imgs/default-header.jpg';
	endif;
	echo esc_url( $banner_img );
}

add_action( 'get_header_banner', 'digid_get_header_banner' );


/**
 * Get custom post meta
 */
function digid_get_custom_single_post_meta() {

	if ( is_singular( 'spa' ) ) :
		$pod    = pods( 'spa', get_the_id() );
		$parent = $pod->field( 'property' );
		if ( ! empty( $parent ) ) :
			$parent_id    = $parent['ID'];
			$parent_terms = get_the_terms( $parent_id, 'location' );
			$parent_url   = get_permalink( $parent_id );
			$parent_name  = get_the_title( $parent_id );

			$meta_content = '<ul class="single-meta spa-meta">';
			if ( $parent_url && $parent_name ) :
				$meta_content .= '<li><svg xmlns="http://www.w3.org/2000/svg" width="19.778" height="19.778" viewBox="0 0 19.778 19.778"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M13.867,7.933h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978ZM8.922,7.933h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978ZM20.789,19.8H19.8V2.989A.989.989,0,0,0,18.811,2H4.967a.989.989,0,0,0-.989.989V19.8H2.989a.989.989,0,0,0,0,1.978h17.8a.989.989,0,0,0,0-1.978Zm-7.911,0H10.9V15.844h1.978Zm4.944,0H14.856V14.856a.989.989,0,0,0-.989-.989H9.911a.989.989,0,0,0-.989.989V19.8H5.956V3.978H17.822Z" transform="translate(-2 -2)"/></svg><a href="' . esc_url( $parent_url ) . '">' . $parent_name . '</a></li>';
			endif;
			if ( $parent_terms ) :
				foreach ( $parent_terms as $pterm ) :
					$meta_content .= '<li><svg xmlns="http://www.w3.org/2000/svg" width="18" height="19.999" viewBox="0 0 18 19.999"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M11,11.9V17a1,1,0,0,0,2,0V11.9a5,5,0,1,0-2,0ZM12,4A3,3,0,1,1,9,7a3,3,0,0,1,3-3Zm4.21,10.42a1.022,1.022,0,0,0-.42,2C18.06,16.87,19,17.68,19,18c0,.58-2.45,2-7,2s-7-1.42-7-2c0-.32.94-1.13,3.21-1.62a1.022,1.022,0,1,0-.42-2C4.75,15.08,3,16.39,3,18c0,2.63,4.53,4,9,4s9-1.37,9-4C21,16.39,19.25,15.08,16.21,14.42Z" transform="translate(-3 -2.001)"/></svg>' . $pterm->name . '</li>';
				endforeach;
			endif;
			$meta_content .= '</ul>';
			echo $meta_content;
		endif;
	elseif ( is_singular( 'offer' ) ) :
		$pod    = pods( 'offer', get_the_id() );
		$parent = $pod->field( 'property' );
		if ( ! empty( $parent ) ) :
			$parent_id      = $parent['ID'];
			$parent_terms   = get_the_terms( $parent_id, 'location' );
			$parent_url     = get_permalink( $parent_id );
			$parent_name    = get_the_title( $parent_id );
			$offer_price    = get_field( 'offer_details_price' );
			$offer_duration = get_field( 'offer_details_duration' );

			if ( $offer_price ) :
				echo '<div class="price"><p><span>Price:</span> ' . $offer_price . '</p></div>';
			endif;

			$meta_content = '<ul class="single-meta offer-meta">';
			if ( $offer_duration ) :
				$meta_content .= '<li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><defs><style>.a{fill:#50ae94;}</style></defs><g transform="translate(-2 -2)"><path class="a" d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z"/><path class="a" d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2Z"/></g></svg>' . $offer_duration . '</li>';
			endif;
			if ( $parent_terms ) :
				foreach ( $parent_terms as $pterm ) :
					$meta_content .=  '<li><svg xmlns="http://www.w3.org/2000/svg" width="18" height="19.999" viewBox="0 0 18 19.999"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M11,11.9V17a1,1,0,0,0,2,0V11.9a5,5,0,1,0-2,0ZM12,4A3,3,0,1,1,9,7a3,3,0,0,1,3-3Zm4.21,10.42a1.022,1.022,0,0,0-.42,2C18.06,16.87,19,17.68,19,18c0,.58-2.45,2-7,2s-7-1.42-7-2c0-.32.94-1.13,3.21-1.62a1.022,1.022,0,1,0-.42-2C4.75,15.08,3,16.39,3,18c0,2.63,4.53,4,9,4s9-1.37,9-4C21,16.39,19.25,15.08,16.21,14.42Z" transform="translate(-3 -2.001)"/></svg>' . $pterm->name . '</li>';
				endforeach;
			endif;
			if ( $parent_url && $parent_name ) :
				$meta_content .= '<li><svg xmlns="http://www.w3.org/2000/svg" width="19.778" height="19.778" viewBox="0 0 19.778 19.778"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M13.867,7.933h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978ZM8.922,7.933h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978ZM20.789,19.8H19.8V2.989A.989.989,0,0,0,18.811,2H4.967a.989.989,0,0,0-.989.989V19.8H2.989a.989.989,0,0,0,0,1.978h17.8a.989.989,0,0,0,0-1.978Zm-7.911,0H10.9V15.844h1.978Zm4.944,0H14.856V14.856a.989.989,0,0,0-.989-.989H9.911a.989.989,0,0,0-.989.989V19.8H5.956V3.978H17.822Z" transform="translate(-2 -2)"/></svg><a href="' . esc_url( $parent_url ) . '">' . $parent_name . '</a></li>';
			endif;
			$meta_content .= '</ul>';
			echo $meta_content;
		endif;
	elseif ( is_singular( 'events' ) ) :
		$pod    = pods( 'events', get_the_id() );
		$parent = $pod->field( 'property' );
		if ( ! empty( $parent ) ) :
			$parent_id      = $parent['ID'];
			$parent_terms   = get_the_terms( $parent_id, 'location' );
			$parent_url     = get_permalink( $parent_id );
			$parent_name    = get_the_title( $parent_id );
			$event_price    = get_field( 'event_details_price' );
			$event_duration = get_field( 'event_details_duration' );
			$event_date     = get_field( 'event_details_date' );

			if ( $event_price ) :
				echo '<div class="price"><p><span>Price:</span> ' . $event_price . '</p></div>';
			endif;

			$meta_content = '<ul class="single-meta event-meta">';
			if ( $event_date ) :
				$meta_content .= '<li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19"><defs><style>.a{fill:#50ae94;}</style></defs><path class="a" d="M21 5h-4V4c0-.5-.5-1-1-1s-1 .5-1 1v1H9V4c0-.5-.5-1-1-1s-1 .5-1 1v1H3c-.5 0-1 .5-1 1v15c0 .5.5 1 1 1h18c.5 0 1-.5 1-1V6c0-.5-.5-1-1-1zm-1 15H4v-8h16v8zm0-10H4V7h3v1c0 .5.5 1 1 1s1-.5 1-1V7h6v1c0 .5.5 1 1 1s1-.5 1-1V7h3v3z" transform="translate(-2 -3)"/></svg>' . $event_date . '</li>';
			endif;
			if ( $event_duration ) :
				$meta_content .= '<li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><defs><style>.a{fill:#50ae94;}</style></defs><g transform="translate(-2 -2)"><path class="a" d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z"/><path class="a" d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2Z"/></g></svg>' . $event_duration . '</li>';
			endif;
			if ( $parent_terms ) :
				foreach ( $parent_terms as $pterm ) :
					$meta_content .= '<li><svg xmlns="http://www.w3.org/2000/svg" width="18" height="19.999" viewBox="0 0 18 19.999"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M11,11.9V17a1,1,0,0,0,2,0V11.9a5,5,0,1,0-2,0ZM12,4A3,3,0,1,1,9,7a3,3,0,0,1,3-3Zm4.21,10.42a1.022,1.022,0,0,0-.42,2C18.06,16.87,19,17.68,19,18c0,.58-2.45,2-7,2s-7-1.42-7-2c0-.32.94-1.13,3.21-1.62a1.022,1.022,0,1,0-.42-2C4.75,15.08,3,16.39,3,18c0,2.63,4.53,4,9,4s9-1.37,9-4C21,16.39,19.25,15.08,16.21,14.42Z" transform="translate(-3 -2.001)"/></svg>' . $pterm->name . '</li>';
				endforeach;
			endif;
			if ( $parent_url && $parent_name ) :
				$meta_content .= '<li><svg xmlns="http://www.w3.org/2000/svg" width="19.778" height="19.778" viewBox="0 0 19.778 19.778"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M13.867,7.933h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978ZM8.922,7.933h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978ZM20.789,19.8H19.8V2.989A.989.989,0,0,0,18.811,2H4.967a.989.989,0,0,0-.989.989V19.8H2.989a.989.989,0,0,0,0,1.978h17.8a.989.989,0,0,0,0-1.978Zm-7.911,0H10.9V15.844h1.978Zm4.944,0H14.856V14.856a.989.989,0,0,0-.989-.989H9.911a.989.989,0,0,0-.989.989V19.8H5.956V3.978H17.822Z" transform="translate(-2 -2)"/></svg><a href="' . esc_url( $parent_url ) . '">' . $parent_name . '</a></li>';
			endif;
			$meta_content .= '</ul>';
			echo $meta_content;
		endif;
	endif;

}

add_action( 'custom_meta', 'digid_get_custom_single_post_meta' );

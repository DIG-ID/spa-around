<?php

/**
 * Disable contact form 7 to load on all pages
 */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

/**
 * Contact Form 7 date validaion.
 */

add_filter( 'wpcf7_validate_date*', 'custom_date_validation', 20, 2 );

function custom_date_validation( $result, $tag ) {

	if ( 'appointmentdate' == $tag->name ) :
		$appointment_date = isset( $_POST['appointmentdate'] ) ? $_POST['appointmentdate'] : '';
	endif;

	$today_date = date( get_option( 'date_format' ) );

	$a_date = strtotime( $appointment_date );
	$t_date = strtotime( $today_date );

	if ( $a_date > $t_date ) :

		$author_id = get_the_author_meta( 'ID' );

		$count = new WP_Query(
			array(
				'post_type'      => 'appointment',
				'post_status '   => 'publish',
				'posts_per_page' => -1,
				'author__in'     => $author_id,
				'meta_key'       => 'appointment_date',
				'meta_query'     => array(
					array(
						'key'     => 'appointment_date',
						'value'   => $appointment_date,
						'compare' => '=',
					),
				),
			)
		);
		// Loop into all the posts to cout them
		if ( $count->have_posts() ) :
			$count = $count->post_count;
			wp_reset_postdata();
		else :
			$count = 0;
		endif;

		if ( $count >= 0 && $count <= 5 ) :

		else :
				$result->invalidate( $tag, 'The appointments are full to this date, please choose another date.' );
		endif;
	else :
		$result->invalidate( $tag, 'The appointment needs to be made within 24hours prior.' );
	endif;

	return $result;
}


/**
 * Create post after form submissioun.
 */
function digid_create_post_from_form() {
	$appointment_post = array(
		'post_author'  => $author_id,
		'post_type'    => 'appointment',
		'post_title'   => 'Appointment: NR',
		'post_content' => 'This is my appointment.',
		'post_status'  => 'publish',
		'meta_input'   => array(
			'appointment_date' => $appointment_date,
		),
	);

	wp_insert_post( $appointment_post, $wp_error );
}

add_action( 'wpcf7_mail_sent', 'digid_create_post_from_form' );

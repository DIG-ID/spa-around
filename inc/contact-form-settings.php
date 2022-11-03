<?php

function digid_get_post_author() {
	$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$current_post_id = url_to_postid( $url );
	$author_id       = get_post_field( 'post_author', $current_post_id );
}

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

	if ( 'appointment-date' == $tag->name ) :
		$appointment_date = isset( $_POST['appointment-date'] ) ? $_POST['appointment-date'] : '';
	endif;

	$today_date = date( get_option( 'date_format' ) );

	$a_date = strtotime( $appointment_date );
	$t_date = strtotime( $today_date );

	if ( $a_date > $t_date ) :

		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$current_post_id = url_to_postid( $url );
		$author_id       = get_post_field( 'post_author', $current_post_id );

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

		if ( $count >= 5 ) :
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
function digid_create_appointment_after_form_submission( $contact_form ) {

	$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$current_post_id = url_to_postid( $url );
	$author_id       = get_post_field( 'post_author', $current_post_id );

	$user_fname = isset( $_POST['fname'] ) ? $_POST['fname'] : '';
	$user_lname = isset( $_POST['lname'] ) ? $_POST['lname'] : '';
	$user_email = isset( $_POST['email'] ) ? $_POST['email'] : '';
	$user_notes = isset( $_POST['notes'] ) ? $_POST['notes'] : '';
	$user_adate = isset( $_POST['appointment-date'] ) ? $_POST['appointment-date'] : '';

	$post_content = '';
	$post_title   = '';

	$appointment_post = array(
		'post_author'  => $author_id,
		'post_type'    => 'appointment',
		'post_title'   => 'Appointment: NR',
		'post_content' => 'This is my appointment.',
		'post_status'  => 'publish',
		'meta_input'   => array(
			'appointment_date' => $user_adate,
		),
	);

	wp_insert_post( $appointment_post, $wp_error );
}

add_action( 'wpcf7_before_send_mail', 'digid_create_appointment_after_form_submission' );

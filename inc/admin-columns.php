<?php


// Add the custom columns to the appointment post type:
function set_custom_appointment_columns( $columns ) {
	unset( $columns['date'] );
	$columns['appointment_date'] = __( 'Appointment date', 'digid' );
	return $columns;
}

add_filter( 'manage_appointment_posts_columns', 'set_custom_appointment_columns' );

// Add the data to the custom columns for the book post type:
function custom_appointment_column( $column, $post_id ) {
	switch ( $column ) {
		case 'appointment_date' :
			$appointments = pods( 'appointment', get_the_ID() );
			$appointments_date = $appointments->field( 'appointment_date' );

			if ( is_string( $appointments_date ) ) :
					echo date( 'd-m-Y', strtotime( $appointments_date ) );
			else :
					esc_html_e( 'Unable to get the appointment date', 'digid' );
			endif;
			break;
	}
}

add_action( 'manage_appointment_posts_custom_column', 'custom_appointment_column', 10, 2 );

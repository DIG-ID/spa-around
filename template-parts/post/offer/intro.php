<section class="section section-intro-single section-intro-offer">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 description offer-description">
				<?php the_field( 'offer_details_description' ); ?>
				<?php $booking_url = get_field( 'offer_details_booking_url' ); ?>
				<?php if ( $booking_url ) : ?>
					<a class="btn btn-primary" href="<?php echo esc_url( $booking_url ); ?>" target="_blank"><?php esc_html_e( 'Book Now', 'digid' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<section class="section section-intro-single section-intro-offer">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 description offer-description">
				<?php the_field( 'offer_details_description' ); ?>
				<?php $booking_form = get_field( 'offer_details_booking_shortcode' ); ?>
				<?php if ( $booking_form ) : ?>
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#booking-modal">
						<?php esc_html_e( 'Book Now', 'digid' ); ?>
					</button>
					<!-- Vertically centered modal -->
					<div class="modal fade" id="booking-modal" tabindex="-1" aria-labelledby="booking-modal" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<?php echo do_shortcode( $booking_form ); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

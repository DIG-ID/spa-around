<section class="section section-spa-intro">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-12 col-md-4 spa-descrition">
				<?php the_field( 'spa_details_description' ); ?>
				<?php $booking_form = get_field( 'spa_details_booking_shortcode' ); ?>
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
			<div class="col-12 col-md-7 spa-gallery">
				<!-- Swiper -->
				<div id="spa-gallery" class="swiper spa-gallery-swiper">
					<div class="swiper-wrapper">
						<?php
						$images = get_field( 'spa_details_gallery' );
						if ( $images ) : ?>
							<?php foreach ( $images as $image_id ) : ?>
								<div class="swiper-slide">
									<?php echo wp_get_attachment_image( $image_id, 'gallery-item' ); ?>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>
	</div>
</section>

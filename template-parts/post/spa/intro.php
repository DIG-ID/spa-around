<section class="section section-intro-single section-intro-spa">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-12 col-md-12 col-lg-4 order-2 order-lg-1 description spa-descrition">
				<?php the_field( 'spa_details_description' ); ?>
				<?php $booking_form = get_field( 'spa_details_booking_shortcode' ); ?>
				<?php if ( $booking_form ) : ?>
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#booking-modal">
						<?php esc_html_e( 'Jetzt reservieren', 'digid' ); ?>
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
								<div class="modal-footer">
									<div class="alert alert-warning d-flex align-items-center" role="alert">
										<svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 me-2" viewBox="0 0 512 512" role="img" aria-label="Warning:"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zm32 224c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32z"/></svg>
										<p class="modal-footer__note">
											<?php _e( 'Bitte beachten Sie, dass pro Person ein separater Termin gebucht werden muss.', 'digid' ); ?>
										</p>
									</div>
									<div class="alert alert-warning d-flex align-items-center" role="alert">
										<svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 me-2" viewBox="0 0 512 512" role="img" aria-label="Warning:"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zm32 224c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32z"/></svg>
										<p class="modal-footer__note">
											<?php _e( 'Vor Ort wirst du an der jeweiligen Rezeption gebeten, dich mit der Hotelschlüsselkarte mit Namen oder Gästekarte zu identifizieren.', 'digid' ); ?>
										</p>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-12 col-md-12 col-lg-7 order-1 order-lg-2 spa-gallery">
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

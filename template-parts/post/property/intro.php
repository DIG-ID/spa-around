<section class="section section-intro-single section-intro-property">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-12 col-md-4 description property-descrition">
				<?php the_field( 'property_details_description' ); ?>
			</div>
			<div class="col-12 col-md-7 property-gallery">
				<!-- Swiper -->
				<div id="property-gallery" class="swiper property-gallery-swiper">
					<div class="swiper-wrapper">
						<?php
						$images = get_field( 'property_details_gallery' );
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

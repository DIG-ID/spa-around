<section class="section section-intro-single section-intro-property">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-12 col-md-4 description property-descrition">
				<?php the_field( 'property_details_description' ); ?>
				<?php
				$property_address = get_field( 'property_details_address' );
				$property_email   = get_field( 'property_details_email' );
				$property_phone   = get_field( 'property_details_telephone' );
				echo '<ul class="property-contact">';
				if ( $property_address ) :
					echo '<li><span>' . esc_html__( 'Address', 'digid' ) . '</span><br>' . $property_address . '</li>';
				endif;
				if ( $property_email ) :
					echo '<li><a href="mailto:' . $property_email . '" >' . esc_html__( 'Email', 'digid' ) . '</a></li>';
				endif;
				if ( $property_phone ) :
					echo '<li><a href="tel:' . $property_phone . '" >' . esc_html__( 'Telephone', 'digid' ) . '</a></li>';
				endif;
				echo '</ul>';
				?>
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

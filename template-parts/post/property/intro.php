<section class="section section-intro-single section-intro-property">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-12 col-md-12 col-lg-4 description property-descrition">
				<?php the_field( 'property_details_description' ); ?>
				<?php
				$property_address = get_field( 'property_details_address' );
				$property_email   = get_field( 'property_details_email' );
				$property_phone   = get_field( 'property_details_telephone' );
				echo '<ul class="property-contact">';
				if ( $property_address ) :
					echo '<li><a href="' . $property_address . '" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg></a></li>';
				endif;
				if ( $property_email ) :
					echo '<li><a href="mailto:' . $property_email . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg></a></li>';
				endif;
				if ( $property_phone ) :
					echo '<li><a href="tel:' . $property_phone . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg></a></li>';
				endif;
				echo '</ul>';
				?>
			</div>
			<div class="col-12 col-md-12 col-lg-7 property-gallery">
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

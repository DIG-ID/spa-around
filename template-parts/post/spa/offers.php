<?php
$pod    = pods( 'spa', get_the_id() );
$parent = $pod->field( 'property' );
if ( ! empty( $parent ) ) :
	$parent_pod = pods( 'property', $parent['ID'] );
	$offers     = $parent_pod->field( array( 'name' => 'property_offers', 'output' => 'objects' ) );
	//var_dump($offers);
	if ( ! empty( $offers ) ) :
		?>
		<div class="container separator">
			<div class="row">
				<div class="col-12">
					<hr class="separator-line">
				</div>
			</div>
		</div>
		<section class="section section-spa-offers">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="section__title"><?php esc_html_e( 'Spa Offers', 'digid' ); ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-12 related-offers__col">
						<div class="swiper related-offers-swiper">
							<div class="swiper-wrapper">
								<?php
								foreach ( $offers as $post ) :
									setup_postdata( $post );
									get_template_part( 'template-parts/loops/loop', 'related-offers' );
								endforeach;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	endif;
endif;

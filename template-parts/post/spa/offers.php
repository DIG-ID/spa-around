<div class="container separator">
	<div class="row">
		<div class="col-12">
			<hr class="separator-line">
		</div>
	</div>
</div>
<?php
$pod    = pods( 'spa', get_the_id() );
$parent = $pod->field( 'property' );
if ( ! empty( $parent ) ) :
	$parent_pod = pods( 'property', $parent['ID'] );
	$offers     = $parent_pod->field( array( 'name' => 'property_offers', 'output' => 'objects' ) );
	if ( ! empty( $offers ) ) :
		?>
		<section class="section section-spa-offers">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="section__title"><?php esc_html_e( 'SPA Offers', 'digid' ); ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="swiper related-offers-swiper">
							<div class="row swiper-wrapper">
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


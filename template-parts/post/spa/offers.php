<?php
$pod    = pods( 'spa', get_the_id() );
$parent = $pod->field( 'property' );
if ( ! empty( $parent ) ) :
	$parent_pod = pods( 'property', $parent['ID'] );
	$offers     = $parent_pod->field( array( 'name' => 'property_offers', 'output' => 'objects' ) );
	if ( ! empty( $offers ) ) :
		var_dump($offers);
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
						<h2 class="section__title"><?php esc_html_e( 'SPA Offers', 'digid' ); ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="swiper related-offers-swiper">
							<div class="row swiper-wrapper">
								<?php
								foreach ( $offers as $offer ) :
									//setup_postdata( $post );
									var_dump($offer);
									?>
									<article class="swiper-slide col-md-3">
										<a href="<?php echo get_the_permalink( $offer['ID'] ); ?>" rel="bookmark" class="card card-offer">
											<figure>
												<?php
												if ( has_post_thumbnail( $offer['ID'] ) ) :
													echo get_post_thumbnail( $offer['ID'], 'card' );
												endif;
												?>
												<figcaption>
													<h3><?php echo get_the_title( $offer['ID'] ); ?></h3>
												</figcaption>
											</figure>
										</a>
									</article>
									<?php
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

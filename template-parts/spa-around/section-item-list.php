<section class="section section-list" style="padding: 0 0 150px 0;">
	<div class="container">
		<div class="row grid-spa">
			<?php
			$spa_query_args = array(
				'post_type' => 'spa',
				'nopaging'  => true,
				'orderby'   => 'date',
				'order'     => 'ASC',
			);
			$spa_query = new WP_Query( $spa_query_args );
			if ( $spa_query->have_posts() ) :
				while ( $spa_query->have_posts() ) :
					$spa_query->the_post();
					?>
					<?php $spa_terms = get_the_terms( $post->ID, 'infrastructure' ); ?>
					<?php $spa_infrastructures = array();
							if ( $spa_terms && ! is_wp_error( $spa_terms ) ) :
							foreach ( $spa_terms as $spa_term ) {
								$spa_infrastructures[] = $spa_term->name;
							} 
							$spa_infrastructure = join( " ", $spa_infrastructures ); ?>
						
					<article class="col-12 col-md-4 grid-spa-item <?php echo esc_html( $spa_infrastructure ); ?>">
						<?php endif; ?>
						<a href="<?php the_permalink(); ?>" class="card card-link">
							<figure>
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'single-post-thumbnail' ); ?>
								<?php endif; ?>
								<figcaption>
									<?php the_title( '<h2>', '</h2>' ); ?>
								</figcaption>
							</figure>
						</a>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
	</div>
</section>

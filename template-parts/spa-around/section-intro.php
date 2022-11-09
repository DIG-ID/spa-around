<section class="section section-intro" style="padding: 150px;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php the_title( '<h1 class="section__title">', '</h1>' ); ?>
				<p class="section__description">Nullam a ultricies nisl, id variu.Nulla tristique vitae augue pellentesque fringilla.</p>
			</div>
		</div>
	</div>
</section>

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
					<article class="col-12 col-md-4 grid-spa-item">
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

<section class="section section-list" style="padding: 30px 0 50px 0;">
	<div class="container">
		<div class="row">
            <div class="col-12">
                <p class="offer__filter-title"><?php _e('Filter', 'spa-around') ?></p>
            </div>
        </div>
		<div class="row">
			<div class="col-12">
                <p class="offer__filter-name"><?php _e('Category', 'spa-around') ?></p>
            </div>
			<div class="col-12">
				<div class="button-group offer__filter-button-group">
					<button class="offer__filter-button" data-filter="*">All</button>
					<?php 
					$offer_allterms = get_terms( 'category', array('hide_empty' => true) ); 
					if ( $offer_allterms && ! is_wp_error( $offer_allterms ) ) :
						foreach ( $offer_allterms as $offer_allterm ) :
							$offer_category_slug = $offer_allterm->slug;
							$offer_category = $offer_allterm->name;
							echo '<button class="offer__filter-button" data-filter=".' . esc_attr( $offer_category_slug ) . '">' . esc_html( $offer_category ) . '</button>';
						endforeach;
					endif;
					?>
				</div>
			</div>
		</div>
		<div class="row grid-offer">
			<?php
			$offer_query_args = array(
				'post_type' => 'offer',
				'nopaging'  => true,
				'orderby'   => 'date',
				'order'     => 'ASC',
			);
			$offer_query = new WP_Query( $offer_query_args );
			if ( $offer_query->have_posts() ) :
				while ( $offer_query->have_posts() ) :
				$offer_query->the_post();
				?>
				<?php $offer_terms = get_the_terms( $post->ID, 'category' ); ?>
				<?php $offer_categorys = array();
						if ( $offer_terms && ! is_wp_error( $offer_terms ) ) :
						foreach ( $offer_terms as $offer_term ) {
							$offer_categorys[] = $offer_term->slug;
						} 
						$offer_category = join( " ", $offer_categorys ); ?>
				<article class="col-12 col-md-4 grid-offer-item <?php echo esc_html( $offer_category ); ?>">
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

<script type="text/javascript">
	(function( $ ) {
		$(document).on( 'ready', function() {
			$('.offer__filter-button-group').on( 'click', 'button', function() {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({ filter: filterValue });
			});

			var $grid = $(".grid-offer").isotope({
				itemSelector: '.grid-offer-item',
				layoutMode: 'fitRows'
			});
		});
	})(jQuery);
</script>

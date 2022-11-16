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
				<div class="button-group offer__filter-button-group filters">
					<?php 
					$offer_allterms = get_terms( 'category', array('hide_empty' => true) ); 
					if ( $offer_allterms && ! is_wp_error( $offer_allterms ) ) :
						foreach ( $offer_allterms as $offer_allterm ) :
							$offer_category_slug = $offer_allterm->slug;
							$offer_category = $offer_allterm->name;
							echo '<a class="offer__filter-button" data-filter=".' . esc_attr( $offer_category_slug ) . '"><span>X</span>' . esc_html( $offer_category ) . '</a>';
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
			// init Isotope
			var $grid = $('.grid-offer').isotope({
			itemSelector: '.grid-offer-item',
			layoutMode: 'fitRows'
			});

			// store filter for each group
			var filters = [];

			// change is-checked class on buttons
			$('.filters').on( 'click', 'a', function( event ) {
			var $target = $( event.currentTarget );
			$target.toggleClass('is-checked');
			var isChecked = $target.hasClass('is-checked');
			var filter = $target.attr('data-filter');
			if ( isChecked ) {
				addFilter( filter );
			} else {
				removeFilter( filter );
			}
			// filter isotope
			// group filters together, inclusive
			$grid.isotope({ filter: filters.join(',') });
			});
			
			function addFilter( filter ) {
			if ( filters.indexOf( filter ) == -1 ) {
				filters.push( filter );
			}
			}

			function removeFilter( filter ) {
			var index = filters.indexOf( filter);
			if ( index != -1 ) {
				filters.splice( index, 1 );
			}
			}
		});
	})(jQuery);
</script>

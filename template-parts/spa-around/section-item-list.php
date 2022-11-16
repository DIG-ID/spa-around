<section class="section section-list" style="padding: 30px 0 50px 0;">
	<div class="container">
        <div class="row">
            <div class="col-12">
                <p class="spa__filter-title"><?php _e('Filter', 'spa-around') ?></p>
            </div>
        </div>
		<div class="row">
			<div class="col-12 col-lg-4">
                <p class="spa__filter-name"><?php _e('Location', 'spa-around') ?></p>
            </div>
			<div class="col-12 col-lg-8">
                <p class="spa__filter-name"><?php _e('Infrastructure', 'spa-around') ?></p>
            </div>
            <div class="col-12 col-lg-4">
				<div class="button-group spa__filter-button-group filters">
					<?php 
						$spa_locationterms = get_terms( 'location', array('hide_empty' => false) ); 
						if ( $spa_locationterms && ! is_wp_error( $spa_locationterms ) ) :
							foreach ( $spa_locationterms as $spa_locationterm ) :
								$spa_location_slug = $spa_locationterm->slug;
								$spa_location = $spa_locationterm->name;
								echo '<a class="spa__filter-button" data-filter=".' . esc_attr( $spa_location_slug ) . '"><span>X</span>' . esc_html( $spa_location ) . '</a>';
							endforeach;
						endif;
					?>
                </div>
            </div>
			<div class="col-12 col-lg-8">
				<div class="button-group spa__filter-button-group filters">
					<?php 
					$spa_allterms = get_terms( 'infrastructure', array('hide_empty' => true) ); 
					if ( $spa_allterms && ! is_wp_error( $spa_allterms ) ) :
						foreach ( $spa_allterms as $spa_allterm ) :
							$spa_infrastructure_slug = $spa_allterm->slug;
							$spa_infrastructure = $spa_allterm->name;
							echo '<a class="spa__filter-button" data-filter=".' . esc_attr( $spa_infrastructure_slug ) . '"><span>X</span>' . esc_html( $spa_infrastructure ) . '</a>';
						endforeach;
					endif;
					?>
                </div>
            </div>
		</div>
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
			<?php
			$spa_terms = get_the_terms( $post->ID, 'infrastructure' );

			$pod    = pods( 'spa', get_the_id() );
			$parent = $pod->field( 'property' );
				$parent_id = $parent['ID'];
				$parent_terms = get_the_terms( $parent_id, 'location' );
				$parent_locations = array();
				if ( $parent_terms && ! is_wp_error( $parent_terms ) ) :
					foreach ( $parent_terms as $pterm ) :
						$parent_locations[] = $pterm->slug;
					endforeach;
				$parent_location = join( " ", $parent_locations );
				endif;
			?>
			<?php
			$spa_infrastructures = array();
			if ( $spa_terms && ! is_wp_error( $spa_terms ) ) :
				foreach ( $spa_terms as $spa_term ) :
					$spa_infrastructures[] = $spa_term->slug;
				endforeach;
				$spa_infrastructure = join( " ", $spa_infrastructures ); 
			?>
			<article class="col-12 col-md-4 grid-spa-item <?php echo esc_html( $spa_infrastructure ); ?> <?php echo esc_html( $parent_location ); ?>">
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
			var $grid = $('.grid-spa').isotope({
			itemSelector: '.grid-spa-item',
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
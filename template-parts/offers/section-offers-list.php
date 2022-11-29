<section class="section section-list" style="padding: 30px 0 50px 0;">
	<div class="container">
		<div class="row">
            <div class="col-12">
                <p class="offer__filter-title"><?php _e('Filter', 'digid') ?></p>
            </div>
        </div>
		<div class="row">
			<div class="col-12 col-lg-4">
                <p class="spa__filter-name"><?php _e('Location', 'digid') ?></p>
            </div>
			<div class="col-12 col-lg-8">
                <p class="offer__filter-name"><?php _e('Category', 'digid') ?></p>
            </div>
			<div class="col-12 col-lg-4">
				<div class="button-group spa__filter-button-group filters filters_location" data-filter-group="location">
					<?php 
						$offer_locationterms = get_terms( array(
							'taxonomy' => 'location',
							'hide_empty' => false,
						) );
						if ( $offer_locationterms && ! is_wp_error( $offer_locationterms ) ) :
							foreach ( $offer_locationterms as $offer_locationterm ) :
								$offer_location_slug = $offer_locationterm->slug;
								$offer_location = $offer_locationterm->name;
								echo '<a class="spa__filter-button" data-filter=".' . esc_attr( $offer_location_slug ) . '"><span>X</span>' . esc_html( $offer_location ) . '</a>';
							endforeach;
						endif;
					?>
                </div>
			</div>
			<div class="col-12 col-lg-8">
				<div class="button-group offer__filter-button-group filters" data-filter-group="category">
					<?php 
					$offer_allterms = get_terms( array(
						'taxonomy' => 'category',
						'hide_empty' => false,
					) );
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
		<div class="grid__empty">
			<p class="grid__empty-text"><?php _e('Sorry, no results', 'digid') ?></p>
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
				<?php 
				$parent_locations = array();				
				$pod    = pods( 'offer', get_the_id() );
				$parent = $pod->field( 'property' );
				if ( ! empty( $parent ) ) :
					$parent_id = $parent['ID'];
					$parent_terms = get_the_terms( $parent_id, 'location' );
					$offer_terms = get_the_terms( $post->ID, 'category' );
					$filter_classes = array_merge($parent_terms,$offer_terms);
					if ( $filter_classes && ! is_wp_error( $filter_classes ) ) :
						foreach ( $filter_classes as $fterm ) :
							$parent_locations[] = $fterm->slug;
						endforeach;
					$parent_location = join( " ", $parent_locations );
					endif;
				endif; ?>
				<article class="col-12 col-md-4 grid-offer-item <?php echo esc_html( $parent_location ); ?>">
					
					<a href="<?php the_permalink(); ?>" class="card card-link">
						<figure>
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'card' ); ?>
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
		var filtersValue = [];
		var filters = [];
		var index = '';
		// change is-checked class on buttons
		$('.filters').on( 'click', 'a', function(  ) {
			var $this = $(this);
			var filter = '';
			$this.toggleClass('is-checked');
			var isChecked = $this.hasClass('is-checked');

			// get group key
			var $buttonGroup = $this.parents('.button-group');
			var filterGroup = $buttonGroup.attr('data-filter-group');
			// set filter for group
			filtersValue[ filterGroup ] = $this.attr('data-filter');
			filter = concatValues( filtersValue );
			
			if ( isChecked ) {
				addFilter( filter, $this );
			} else {
				removeFilter( filter );
			}
			// filter isotope
			// group filters together, inclusive
			$grid.isotope({ filter: filters.join('') });
		});
		
		$grid.on( 'arrangeComplete', function( event, filters ) {
			if ( filters.length == 0 ){
				$('.grid__empty').css('display', 'block');
			} else{
				$('.grid__empty').css('display', 'none');
			}
		});

		function addFilter( filter, $this ) {
			$location_button = $this.parents('.button-group');
			if($location_button.hasClass('filters_location')){
				index = filters.indexOf( filter);
				$location_button.children('a').not($this).removeClass('is-checked');
				filters.splice( index, 1 );
				filtersValue = [];
				if ( index == -1 ) {
					filters.push( filter );
					filtersValue = [];
				}
			} else {
				index = filters.indexOf( filter);
				if ( index == -1 ) {
					filters.push( filter );
					filtersValue = [];
				}
			}
		}

		function removeFilter( filter ) {
			index = filters.indexOf( filter);
			if ( index != -1 ) {
				filters.splice( index, 1 );
				filtersValue = [];
			}
		}
		// flatten object by concatting values
		function concatValues( obj ) {
			var value = '';
			for ( var prop in obj ) {
				value += obj[ prop ];
			}
			return value;
		}
	});
})(jQuery);
</script>

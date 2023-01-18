<section class="section section-list" style="padding: 30px 0 50px 0;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p class="event__filter-title"><?php esc_html_e( 'Filter', 'digid' ); ?></p>
			</div>
		</div>
		<div class="row event-filters event__filter-row">
			<div class="col-12 col-lg-4 ui-group">
				<h3 class="spa__filter-name"><?php esc_html_e( 'Location', 'digid' ); ?></h3>
				<div class="button-group spa__filter-button-group filters filters_location" data-filter-group="location">
					<?php 
						$event_location_terms = get_terms( array(
							'taxonomy' => 'location',
							'hide_empty' => false,
						) );
						if ( $event_location_terms && ! is_wp_error( $event_location_terms ) ) :
							foreach ( $event_location_terms as $event_location ) :
								$event_location_slug = $event_location->slug;
								$event_location_name = $event_location->name;
								echo '<button class="button spa__filter-button" data-filter=".' . esc_attr( $event_location_slug ) . '"><span>X</span>' . esc_html( $event_location_name ) . '</button>';
							endforeach;
						endif;
					?>
				</div>
			</div>
			<div class="col-12 col-lg-8 ui-group">
				<h3 class="spa__filter-name"><?php esc_html_e( 'Date Range', 'digid' ); ?></h3>
				<div class="button-group offer__filter-button-group filtersDate" data-filter-group="date" style="display: block;">
					<?php
						$dateraw = gmdate( 'd/m/Y' );
						$datenow = strtotime( $dateraw );
					?>
					<input id="event_date_start" class="start date__filter-button" type="text" placeholder="<?php echo $dateraw; ?>" data-start="<?php echo $datenow; ?>"></input>
					<input id="event_date_end" class="end date__filter-button" type="text" placeholder="<?php echo $dateraw; ?>" data-end="<?php echo $datenow; ?>"></input>
					<button class="button button--filter event_filter spa__filter-button" data-filter="dateRange"><span>X</span><?php esc_html_e( 'Filter', 'digid' ); ?></button>
				</div>
			</div>
		</div>
		<div class="grid__empty">
			<p class="grid__empty-text"><?php esc_html_e( 'Sorry, no results', 'digid' ); ?></p>
		</div>
		<div class="row grid-events">
			<?php
			$today = gmdate( 'Ymd' );
			$event_query_args = array(
				'post_type'  => 'events',
				'nopaging'   => true,
				'orderby'    => 'meta_value_num',
				'order'      => 'ASC',
				'meta_query' => array(
					array(
						'key'     => 'event_details_date',
						'compare' => '>=',
						'value'   => $today,
					),
				),
			);
			$event_query = new WP_Query( $event_query_args );
			if ( $event_query->have_posts() ) :
				while ( $event_query->have_posts() ) :
					$event_query->the_post();

					$event_date_start = strtotime( get_field( 'event_details_date' ) );
					$event_date_end   = strtotime( get_field( 'event_details_date_end' ) );

					$parent_locations = array();

					$pod    = pods( 'events', get_the_id() );
					$parent = $pod->field( 'property' );

					if ( ! empty( $parent ) ) :
						$parent_id    = $parent['ID'];
						$parent_name  = get_the_title( $parent_id );
						$parent_terms = get_the_terms( $parent_id, 'location' );
						if ( $parent_terms && ! is_wp_error( $parent_terms ) ) :
							foreach ( $parent_terms as $pterm ) :
								$parent_locations[] = $pterm->slug;
							endforeach;
							$parent_location = join( " ", $parent_locations );
						endif;
					endif;
					?>
					<article class="col-12 col-md-4 event-item <?php echo esc_attr( $parent_location ); ?>" data-start="<?php echo esc_attr( $event_date_start ); ?>" data-end="<?php echo esc_html( $event_date_end ); ?>">
						<a href="<?php the_permalink(); ?>" class="card card-link">
							<figure>
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'card' ); ?>
								<?php endif; ?>
								<figcaption>
									<?php the_title( '<h2>', '</h2>' ); ?>
									<?php if ( $parent_name ) : ?>
										<ul class="single-meta card__events-property"><li><svg xmlns="http://www.w3.org/2000/svg" width="19.778" height="19.778" viewBox="0 0 19.778 19.778"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M13.867,7.933h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978ZM8.922,7.933h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978ZM20.789,19.8H19.8V2.989A.989.989,0,0,0,18.811,2H4.967a.989.989,0,0,0-.989.989V19.8H2.989a.989.989,0,0,0,0,1.978h17.8a.989.989,0,0,0,0-1.978Zm-7.911,0H10.9V15.844h1.978Zm4.944,0H14.856V14.856a.989.989,0,0,0-.989-.989H9.911a.989.989,0,0,0-.989.989V19.8H5.956V3.978H17.822Z" transform="translate(-2 -2)"/></svg><?php echo $parent_name ?></li></ul>
									<?php endif; ?>
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

		// store filter
		var filters = {};
		var filter = [];
		var index = '';

		var filterFns = {
			// show item in the date range
			dateRange: function() {
				// use $(this) to get item element
				var dateStart = $('#event_date_start').attr("data-start");
				var dateEnd   = $('#event_date_end').attr("data-end");
				return dateStart <= $(this).data('start') && dateEnd >= $(this).data('end');
			},
		};

		// init Isotope
		var $grid = $( '.grid-events' ).isotope({
			itemSelector: '.event-item',
			layoutMode: 'fitRows',
			filter: function() {
				var isMatched = true;
				var $this = $(this);

				for ( var prop in filters ) {
					var filter = filters[ prop ];
					// use function if it matches
					filter = filterFns[ filter ] || filter;
					// test each filter
					if ( filter ) {
						isMatched = isMatched && $(this).is( filter );
					}
					// break if not matched
					if ( !isMatched ) {
						break;
					}
				}
				return isMatched;
			}
		});

		$('.event-filters').on( 'click', '.button', function( event ) {
			var $this = $(this);
			// get group key
			var $buttonGroup = $this.parents('.button-group');
			var filterGroup = $buttonGroup.attr('data-filter-group');
			// set filter for group
			filters[ filterGroup ] = $this.attr('data-filter');
			// set filter for Isotope
			$grid.isotope();

			$this.toggleClass('is-checked');

			if ( $this.hasClass('is-checked') ) {
				addFilter( filter, $this );
			} else {
				removeFilter( filter );
			}
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
				$location_button.children('button').not($this).removeClass('is-checked');
				index = filter.indexOf(filters);
				filter.splice( index, 1 );
				filtersValue = [];
				if ( index == -1 ) {
					filter.push( filters );
					filtersValue = [];
				}
			} else {
				index = filter.indexOf(filters);
				if ( index == -1 ) {
					filter.push( filters );
					filtersValue = [];
				}
			}
		}

		function removeFilter( filter ) {
			if($location_button.hasClass('filters_location')){
				index = filter.indexOf(filters);
				if ( index != -1 ) {
					filter.splice( index, 1 );
					filtersValue = [];
				}
			} else if ($location_button.hasClass('filtersDate')) {
				// remove date range filter from filters object
				filters.date = null;
				// update isotope layout to apply updated filters
				$grid.isotope();
			}
		}


	});
})(jQuery);
</script>

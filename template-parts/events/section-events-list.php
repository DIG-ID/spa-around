<section class="section section-list" style="padding: 30px 0 50px 0;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p class="event__filter-title"><?php esc_html_e( 'Filter', 'digid' ); ?></p>
			</div>
		</div>
		<div class="row event__filter-row">
			<div class="col-12 col-lg-12">
				<p class="spa__filter-name"><?php esc_html_e( 'Location', 'digid' ); ?></p>
			</div>
			<div class="col-12 col-lg-4">
				<div class="button-group spa__filter-button-group filters filters_location" data-filter-group="location">
					<?php 
						$event_locationterms = get_terms( array(
							'taxonomy' => 'location',
							'hide_empty' => false,
						) );
						if ( $event_locationterms && ! is_wp_error( $event_locationterms ) ) :
							foreach ( $event_locationterms as $event_locationterm ) :
								$event_location_slug = $event_locationterm->slug;
								$event_location = $event_locationterm->name;
								echo '<a class="spa__filter-button" data-filter=".' . esc_attr( $event_location_slug ) . '"><span>X</span>' . esc_html( $event_location ) . '</a>';
							endforeach;
						endif;
					?>
								</div>
			</div>
			<div class="col-12 col-lg-8">
				<div class="button-group offer__filter-button-group filtersDate" data-filter-group="date" style="display: block;">
					<?php
						$dateraw = date('d/m/Y', time());
						$datenow = strtotime( $dateraw );
					?>
					<input id="event_date_start" class="start date__filter-button" type="text" placeholder="<?php echo $dateraw; ?>" data-start="<?php echo $datenow; ?>"></input>
					<input id="event_date_end" class="end date__filter-button" type="text" placeholder="<?php echo $dateraw; ?>" data-end="<?php echo $datenow; ?>"></input>
					<a class="event_filter spa__filter-button" data-filter="date"><span>X</span><?php _e('Filter', 'digid') ?></a>
				</div>
			</div>
		</div>
		<div class="grid__empty">
			<p class="grid__empty-text"><?php esc_html_e( 'Sorry, no results', 'digid' ); ?></p>
		</div>
		<div class="row grid-event">
			<?php
			$event_query_args = array(
				'post_type' => 'events',
				'nopaging'  => true,
				'orderby'   => 'date',
				'order'     => 'ASC',
			);
			$event_query = new WP_Query( $event_query_args );
			if ( $event_query->have_posts() ) :
				while ( $event_query->have_posts() ) :
					$event_query->the_post();

					//$event_date_start_raw = get_field( 'event_details_date' );
					//$event_date_end_raw   = get_field( 'event_details_date_end' );

					//$event_date_start_raw = str_replace( '/', '-', $event_date_start_raw );
					//$event_date_end_raw   = str_replace( '/', '-', $event_date_end_raw );

					$event_date_start = strtotime( get_field( 'event_details_date' ) );
					$event_date_end   = strtotime( get_field( 'event_details_date_end' ) );
					var_dump($event_date_start);
					var_dump($event_date_end);

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
					<article class="col-12 col-md-4 grid-event-item <?php echo esc_attr( $parent_location ); ?>" data-start="<?php echo esc_attr( $event_date_start ); ?>" data-end="<?php echo esc_html( $event_date_end ); ?>">
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
		// init Isotope
		var $grid = $( '.grid-event' ).isotope({
			itemSelector: '.grid-event-item',
			layoutMode: 'fitRows'
		});

		// store filter for each group
		var filtersValue = [];
		var filters = [];
		var index = '';

		$('.filtersDate').on( 'click', '.event_filter', function( event ) {
			var startdate_raw = $('#event_date_start').val();
			var	enddate_raw = $('#event_date_end').val();
			var startdate = $('#event_date_start').attr("data-start");
			var enddate = $('#event_date_end').attr("data-end");
			console.log(startdate, enddate);
			$grid.isotope({
				filter: function () {
					return startdate <= $(this).data("startdate") && enddate >= $(this).data("enddate");
				}
			});
		});

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

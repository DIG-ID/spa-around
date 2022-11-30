<section class="section section-list" style="padding: 30px 0 50px 0;">
	<div class="container">
        <div class="row">
            <div class="col-12">
                <p class="event__filter-title"><?php _e('Filter', 'digid') ?></p>
            </div>
        </div>
		<div class="row event__filter-row">
			<div class="col-12 col-lg-12">
                <p class="spa__filter-name"><?php _e('Location', 'digid') ?></p>
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
				<div class="button-group offer__filter-button-group filtersDate" data-filter-group="date" style="display:none;">
					<input id="event_date_start" class="start" type="text"></input>
					<input id="event_date_end" class="end" type="text"></input>
					<a class="event_filter" data-filter="date"><?php _e('Filter', 'digid') ?></a>
				</div>
			</div>
		</div>
		<div class="grid__empty">
			<p class="grid__empty-text"><?php _e('Sorry, no results', 'digid') ?></p>
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
				?>
				<?php 
				$event_date_start_raw = get_field('event_details_date');
				$event_date_end_raw = get_field('event_details_date_end');
				$event_date_start_raw = str_replace('/', '-', $event_date_start_raw);
				$event_date_end_raw = str_replace('/', '-', $event_date_end_raw);
				$event_date_start = strtotime($event_date_start_raw);
				$event_date_end = strtotime($event_date_end_raw);
				$parent_locations = array();
				$pod    = pods( 'events', get_the_id() );
				$parent = $pod->field( 'property' );
				if ( ! empty( $parent ) ) :
					$parent_id = $parent['ID'];
					$parent_terms = get_the_terms( $parent_id, 'location' );
					if ( $parent_terms && ! is_wp_error( $parent_terms ) ) :
						foreach ( $parent_terms as $pterm ) :
							$parent_locations[] = $pterm->slug;
						endforeach;
					$parent_location = join( " ", $parent_locations );
					endif;
				endif; ?>
				<article class="col-12 col-md-4 grid-event-item <?php echo esc_attr( $parent_location ); ?>" data-startdate="<?php echo esc_attr( $event_date_start ); ?>" data-enddate="<?php echo esc_html( $event_date_end ); ?>">
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
<?php



?>
<script type="text/javascript">
(function( $ ) {
	$(document).on( 'ready', function() {
		// init Isotope
		var $grid = $('.grid-event').isotope({
		itemSelector: '.grid-event-item',
		layoutMode: 'fitRows'
		});
		// store filter for each group
		var filters = [];

		$('.filtersDate').on( 'click', '.event_filter', function( event ) {
			var startdate_raw = $('#event_date_start').val();
			var	enddate_raw = $('#event_date_end').val();
			var startdate = $('#event_date_start').attr("data-start");
			var enddate = $('#event_date_end').attr("data-end");
			console.log(startdate, enddate);
			$grid.isotope({
				filter: function () {
					return startdate <= $(".grid-event-item").data("startdate") && enddate > $('.grid-event-item').data("enddate");
				}
			});
		});
		$('.filters').on( 'click', 'a', function( event ) {
			var $this = $(this);
			var $target = $( event.currentTarget );
			$target.toggleClass('is-checked');
			var isChecked = $target.hasClass('is-checked');
			var filter = $target.attr('data-filter');
			if ( isChecked ) {
				addFilter( filter, $this );
			} else {
				removeFilter( filter );
			}
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
			var index = filters.indexOf( filter);
			if ( index != -1 ) {
				filters.splice( index, 1 );
			}
		}
	});
})(jQuery);
</script>

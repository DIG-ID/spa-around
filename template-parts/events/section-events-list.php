<section class="section section-list" style="padding: 30px 0 50px 0;">
	<div class="container">
        <div class="row">
            <div class="col-12">
                <p class="event__filter-title"><?php _e('Filter', 'spa-around') ?></p>
            </div>
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
				
				<article class="col-12 col-md-4 grid-event-item">
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
			var $grid = $(".grid-event").isotope({
				itemSelector: '.grid-event-item',
				layoutMode: 'fitRows'
			});
		});
	})(jQuery);
</script>

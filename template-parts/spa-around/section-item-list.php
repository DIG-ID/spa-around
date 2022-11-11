<section class="section section-list" style="padding: 30px 0 50px 0;">
	<div class="container">
        <div class="row">
            <div class="col-12">
                <p class="spa__filter-title"><?php _e('Filter', 'spa-around') ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="spa__filter-name"><?php _e('Location', 'spa-around') ?></p>
            </div>
        </div>
		<div class="row">
            <div class="col-12">
                <div class="button-group spa__filter-button-group">
                <button class="spa__filter-button" data-filter="*">All</button>
                <?php 
                $spa_allterms = get_terms( 'infrastructure', array('hide_empty' => true) ); 
                if ( $spa_allterms && ! is_wp_error( $spa_allterms ) ) :
                    foreach ( $spa_allterms as $spa_allterm ) :
                        $spa_infrastructure_slug = $spa_allterm->slug;
                        $spa_infrastructure = $spa_allterm->name;
                        echo '<button class="spa__filter-button" data-filter=".' . esc_attr( $spa_infrastructure_slug ) . '">' . esc_html( $spa_infrastructure ) . '</button>';
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
				<?php $spa_terms = get_the_terms( $post->ID, 'infrastructure' ); ?>
				<?php $spa_infrastructures = array();
						if ( $spa_terms && ! is_wp_error( $spa_terms ) ) :
						foreach ( $spa_terms as $spa_term ) {
							$spa_infrastructures[] = $spa_term->slug;
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

<script type="text/javascript">
	(function( $ ) {
		$(document).on( 'ready', function() {
			$('.spa__filter-button-group').on( 'click', 'button', function() {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({ filter: filterValue });
			});

			var $grid = $(".grid-spa").isotope({
				itemSelector: '.grid-spa-item',
				layoutMode: 'fitRows'
			});
		});
	})(jQuery);
</script>
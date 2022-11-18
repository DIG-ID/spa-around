<section class="section section-single-title">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
				if ( function_exists( 'yoast_breadcrumb' ) ) :
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				endif;
				?>
			</div>
			<div class="col-12 col-md-5">
				<?php the_title( '<h1 class="section__title section-single-title__title">', '</h1>' ); ?>
				<?php
				if ( is_singular( 'spa' ) ) :
					$pod    = pods( 'spa', get_the_id() );
					$parent = $pod->field( 'property' );
					if ( ! empty( $parent ) ) :
						?><ul class="single-meta spa-meta"><?php
						$parent_id = $parent['ID'];
						echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="19.778" height="19.778" viewBox="0 0 19.778 19.778"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M13.867,7.933h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978ZM8.922,7.933h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978ZM20.789,19.8H19.8V2.989A.989.989,0,0,0,18.811,2H4.967a.989.989,0,0,0-.989.989V19.8H2.989a.989.989,0,0,0,0,1.978h17.8a.989.989,0,0,0,0-1.978Zm-7.911,0H10.9V15.844h1.978Zm4.944,0H14.856V14.856a.989.989,0,0,0-.989-.989H9.911a.989.989,0,0,0-.989.989V19.8H5.956V3.978H17.822Z" transform="translate(-2 -2)"/></svg><a href="' . esc_url( get_permalink( $parent_id ) ) . '">' . get_the_title( $parent_id ) . '</a></li>';
						$parent_terms = get_the_terms( $parent_id, 'location' );
						foreach ( $parent_terms as $pterm ) :
							echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="18" height="19.999" viewBox="0 0 18 19.999"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M11,11.9V17a1,1,0,0,0,2,0V11.9a5,5,0,1,0-2,0ZM12,4A3,3,0,1,1,9,7a3,3,0,0,1,3-3Zm4.21,10.42a1.022,1.022,0,0,0-.42,2C18.06,16.87,19,17.68,19,18c0,.58-2.45,2-7,2s-7-1.42-7-2c0-.32.94-1.13,3.21-1.62a1.022,1.022,0,1,0-.42-2C4.75,15.08,3,16.39,3,18c0,2.63,4.53,4,9,4s9-1.37,9-4C21,16.39,19.25,15.08,16.21,14.42Z" transform="translate(-3 -2.001)"/></svg>' . $pterm->name . '</li>';
						endforeach;
						?></ul><?php
					endif;
				elseif ( is_singular( 'offer' ) ) :
					$pod    = pods( 'offer', get_the_id() );
					$parent = $pod->field( 'property' );
					if ( ! empty( $parent ) ) :
						echo '<div class="price"><p><span>Price:</span> ' . get_field( 'offer_details_price' ) . '</p></div>';
						echo '<ul class="single-meta offer-meta">';
						$parent_id = $parent['ID'];
						echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><defs><style>.a{fill:#50ae94;}</style></defs><g transform="translate(-2 -2)"><path class="a" d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z"/><path class="a" d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2Z"/></g></svg>' . get_field( 'offer_details_duration' ) . '</li>';
						$parent_terms = get_the_terms( $parent_id, 'location' );
						foreach ( $parent_terms as $pterm ) :
							echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="18" height="19.999" viewBox="0 0 18 19.999"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M11,11.9V17a1,1,0,0,0,2,0V11.9a5,5,0,1,0-2,0ZM12,4A3,3,0,1,1,9,7a3,3,0,0,1,3-3Zm4.21,10.42a1.022,1.022,0,0,0-.42,2C18.06,16.87,19,17.68,19,18c0,.58-2.45,2-7,2s-7-1.42-7-2c0-.32.94-1.13,3.21-1.62a1.022,1.022,0,1,0-.42-2C4.75,15.08,3,16.39,3,18c0,2.63,4.53,4,9,4s9-1.37,9-4C21,16.39,19.25,15.08,16.21,14.42Z" transform="translate(-3 -2.001)"/></svg>' . $pterm->name . '</li>';
						endforeach;
						echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="19.778" height="19.778" viewBox="0 0 19.778 19.778"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M13.867,7.933h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978ZM8.922,7.933h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978ZM20.789,19.8H19.8V2.989A.989.989,0,0,0,18.811,2H4.967a.989.989,0,0,0-.989.989V19.8H2.989a.989.989,0,0,0,0,1.978h17.8a.989.989,0,0,0,0-1.978Zm-7.911,0H10.9V15.844h1.978Zm4.944,0H14.856V14.856a.989.989,0,0,0-.989-.989H9.911a.989.989,0,0,0-.989.989V19.8H5.956V3.978H17.822Z" transform="translate(-2 -2)"/></svg><a href="' . esc_url( get_permalink( $parent_id ) ) . '">' . get_the_title( $parent_id ) . '</a></li>';
						echo '</ul>';
					endif;
				elseif ( is_singular( 'events' ) ) :
					$pod    = pods( 'events', get_the_id() );
					$parent = $pod->field( 'property' );
					if ( ! empty( $parent ) ) :
						$parent_id = $parent['ID'];
						echo '<div class="price"><p><span>Price:</span> ' . get_field( 'event_details_price' ) . '</p></div>';
						echo '<ul class="single-meta event-meta">';
						echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19"><defs><style>.a{fill:#fff;}.b{fill:#50ae94;}</style></defs><g transform="translate(-2 -3)"><rect class="a" width="18" height="15" transform="translate(3 6)"/><path class="b" d="M21,22H3a1,1,0,0,1-1-1V6A1,1,0,0,1,3,5H21a1,1,0,0,1,1,1V21A1,1,0,0,1,21,22ZM4,20H20V7H4Z"/><rect class="b" width="20" height="2" transform="translate(2 10)"/><path class="b" d="M8,9A1,1,0,0,1,7,8V4A1,1,0,0,1,9,4V8A1,1,0,0,1,8,9Zm8,0a1,1,0,0,1-1-1V4a1,1,0,0,1,2,0V8A1,1,0,0,1,16,9Z"/></g></svg>' . get_field( 'event_details_date' ) . '</li>';
						echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><defs><style>.a{fill:#50ae94;}</style></defs><g transform="translate(-2 -2)"><path class="a" d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z"/><path class="a" d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2Z"/></g></svg>' . get_field( 'event_details_duration' ) . '</li>';
						$parent_terms = get_the_terms( $parent_id, 'location' );
						foreach ( $parent_terms as $pterm ) :
							echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="18" height="19.999" viewBox="0 0 18 19.999"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M11,11.9V17a1,1,0,0,0,2,0V11.9a5,5,0,1,0-2,0ZM12,4A3,3,0,1,1,9,7a3,3,0,0,1,3-3Zm4.21,10.42a1.022,1.022,0,0,0-.42,2C18.06,16.87,19,17.68,19,18c0,.58-2.45,2-7,2s-7-1.42-7-2c0-.32.94-1.13,3.21-1.62a1.022,1.022,0,1,0-.42-2C4.75,15.08,3,16.39,3,18c0,2.63,4.53,4,9,4s9-1.37,9-4C21,16.39,19.25,15.08,16.21,14.42Z" transform="translate(-3 -2.001)"/></svg>' . $pterm->name . '</li>';
						endforeach;
						echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="19.778" height="19.778" viewBox="0 0 19.778 19.778"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M13.867,7.933h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978ZM8.922,7.933h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978ZM20.789,19.8H19.8V2.989A.989.989,0,0,0,18.811,2H4.967a.989.989,0,0,0-.989.989V19.8H2.989a.989.989,0,0,0,0,1.978h17.8a.989.989,0,0,0,0-1.978Zm-7.911,0H10.9V15.844h1.978Zm4.944,0H14.856V14.856a.989.989,0,0,0-.989-.989H9.911a.989.989,0,0,0-.989.989V19.8H5.956V3.978H17.822Z" transform="translate(-2 -2)"/></svg><a href="' . esc_url( get_permalink( $parent_id ) ) . '">' . get_the_title( $parent_id ) . '</a></li>';
						echo '</ul>';
					endif;
				endif;
				?>
			</div>
		</div>
	</div>
</section>



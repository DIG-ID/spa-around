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
			<div class="col-12">
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
							echo '<li><p><svg xmlns="http://www.w3.org/2000/svg" width="18" height="19.999" viewBox="0 0 18 19.999"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M11,11.9V17a1,1,0,0,0,2,0V11.9a5,5,0,1,0-2,0ZM12,4A3,3,0,1,1,9,7a3,3,0,0,1,3-3Zm4.21,10.42a1.022,1.022,0,0,0-.42,2C18.06,16.87,19,17.68,19,18c0,.58-2.45,2-7,2s-7-1.42-7-2c0-.32.94-1.13,3.21-1.62a1.022,1.022,0,1,0-.42-2C4.75,15.08,3,16.39,3,18c0,2.63,4.53,4,9,4s9-1.37,9-4C21,16.39,19.25,15.08,16.21,14.42Z" transform="translate(-3 -2.001)"/></svg>' . $pterm->name . '</p></li>';
						endforeach;
						?></ul><?php
					endif;
				endif;
				if ( is_singular( 'offer' ) ) :
					$pod    = pods( 'offer', get_the_id() );
					$parent = $pod->field( 'property' );
					if ( ! empty( $parent ) ) :
						echo '<ul class="single-meta offer-meta">';
						$parent_id = $parent['ID'];
						echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="19.778" height="19.778" viewBox="0 0 19.778 19.778"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M13.867,7.933h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978h-.989a.989.989,0,0,0,0,1.978ZM8.922,7.933h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978Zm0,3.956h.989a.989.989,0,0,0,0-1.978H8.922a.989.989,0,0,0,0,1.978ZM20.789,19.8H19.8V2.989A.989.989,0,0,0,18.811,2H4.967a.989.989,0,0,0-.989.989V19.8H2.989a.989.989,0,0,0,0,1.978h17.8a.989.989,0,0,0,0-1.978Zm-7.911,0H10.9V15.844h1.978Zm4.944,0H14.856V14.856a.989.989,0,0,0-.989-.989H9.911a.989.989,0,0,0-.989.989V19.8H5.956V3.978H17.822Z" transform="translate(-2 -2)"/></svg><a href="' . esc_url( get_permalink( $parent_id ) ) . '">' . get_the_title( $parent_id ) . '</a></li>';
						$parent_terms = get_the_terms( $parent_id, 'location' );
						foreach ( $parent_terms as $pterm ) :
							echo '<li><p><svg xmlns="http://www.w3.org/2000/svg" width="18" height="19.999" viewBox="0 0 18 19.999"><defs><style>.a{fill:#068c66;}</style></defs><path class="a" d="M11,11.9V17a1,1,0,0,0,2,0V11.9a5,5,0,1,0-2,0ZM12,4A3,3,0,1,1,9,7a3,3,0,0,1,3-3Zm4.21,10.42a1.022,1.022,0,0,0-.42,2C18.06,16.87,19,17.68,19,18c0,.58-2.45,2-7,2s-7-1.42-7-2c0-.32.94-1.13,3.21-1.62a1.022,1.022,0,1,0-.42-2C4.75,15.08,3,16.39,3,18c0,2.63,4.53,4,9,4s9-1.37,9-4C21,16.39,19.25,15.08,16.21,14.42Z" transform="translate(-3 -2.001)"/></svg>' . $pterm->name . '</p></li>';
						endforeach;
						echo '</ul>';
					endif;
				endif;
				?>
			</div>
		</div>
	</div>
</section>



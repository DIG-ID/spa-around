<section class="section section-spa-infrastructure">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="section__title"><?php esc_html_e( 'Infrastructure', 'digid' ); ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-8">
				<?php
				$infrastructures = get_the_terms( get_the_ID(), 'infrastructure' );
				if ( ! empty( $infrastructures ) ) :
					echo '<ul class="infrastructure-list">';
					foreach ( $infrastructures as $structure ) :
						echo '<li>' . $structure->name . '</li>';
					endforeach;
					echo '</ul>';
				endif;
				?>
			</div>
		</div>
	</div>
</section>

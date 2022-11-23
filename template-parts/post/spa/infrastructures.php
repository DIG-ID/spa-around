<?php
if ( have_rows( 'spa_details_infrastruktur' ) ) :
	?>
	<section class="section section-spa-infrastructure">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="section__title"><?php esc_html_e( 'Infrastructure', 'digid' ); ?></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-8">
					<ul class="infrastructure-list">
						<?php
						while ( have_rows( 'spa_details_infrastruktur' ) ) :
							the_row();
							echo '<li>' . get_sub_field( 'item' ) . '</li>';
						endwhile;
						?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<?php
endif;

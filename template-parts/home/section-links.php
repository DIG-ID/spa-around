<section class="section section-links">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="section__title section-about__title"><?php the_field( 'links_title' ); ?></h2>
			</div>
		</div>
		<div class="row">
			<?php
			if ( have_rows( 'links_links' ) ) :
				while ( have_rows( 'links_links' ) ) :
					the_row();
					?>
					<article class="col-12 col-md-4">
						<a href="<?php the_sub_field( 'link_url' ); ?>" class="card card-link">
							<figure>
								<?php echo wp_get_attachment_image( get_sub_field( 'link_image' ), 'full' ); ?>
								<figcaption>
									<h3><?php the_sub_field( 'link_title' ); ?></h3>
								</figcaption>
							</figure>
						</a>
					</article>
					<?php
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>

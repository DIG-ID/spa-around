<section id="about" class="section section-about">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="section__title section-about__title"><?php the_field( 'about_title' ); ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-6">
				<?php the_field( 'about_description_block_1' ); ?>
			</div>
			<div class="col-12 col-md-6">
				<?php the_field( 'about_description_block_2' ); ?>
			</div>
		</div>
	</div>
</section>

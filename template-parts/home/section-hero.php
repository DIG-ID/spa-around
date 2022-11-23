<section class="section section-hero" style="background-color: #464646; background: linear-gradient( rgba(15, 32, 28, 0.7), rgba(15, 32, 28, 0.7) ) , url( <?php the_field( 'hero_image' ); ?> ); background-position: center; background-repeat: no-repeat; background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex flex-column justify-content-center align-items-center">
				<h1 class="section__title section-hero__title text-center"><?php the_field( 'hero_title' ); ?></h1>
				<p class="section__description section-hero__description text-center"><?php the_field( 'hero_description' ); ?></p>
				<a class='section-hero__scrolldown' href="#about">
					<div class="chevrons">
						<div class="chevrondown"></div>
						<div class="chevrondown"></div>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

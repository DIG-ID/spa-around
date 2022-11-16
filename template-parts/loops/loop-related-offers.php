<div class="swiper-slide">
	<article>
		<a href="<?php the_permalink(); ?>" rel="bookmark" class="card card-offer">
			<figure>
				<?php
				if ( has_post_thumbnail() ) :
					the_post_thumbnail( 'card' );
				endif;
				?>
				<figcaption>
					<h3><?php the_title(); ?></h3>
				</figcaption>
			</figure>
		</a>
	</article>
</div>

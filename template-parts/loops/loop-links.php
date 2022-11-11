<article class="col-12 col-md-4">
	<a href="<?php the_sub_field( 'link_url' ); ?>" rel="bookmark" class="card card-link">
		<figure>
			<?php echo wp_get_attachment_image( get_sub_field( 'link_image' ), 'card' ); ?>
			<figcaption>
				<h3><?php the_sub_field( 'link_title' ); ?></h3>
			</figcaption>
		</figure>
	</a>
</article>

<section class="section section-intro" style="padding: 150px;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="section__title">Insert<br>title</h1>
				<p class="section__description">Nullam a ultricies nisl, id variu.Nulla tristique vitae augue pellentesque fringilla.</p>
			</div>
		</div>
	</div>
</section>

<section class="section section-list" style="padding: 0 0 150px 0;">
    <div class="container-fluid">
        <div class="grid-spa">
        <?php
            $layout_spa_query_args = array(
                'post_type' => 'spa',
                'nopaging'  => true,
                'orderby'   => 'date',
                'order'     => 'ASC',
            );
            $layout_spa_query = new WP_Query( $layout_spa_query_args );
            if ( $layout_spa_query->have_posts() ) :
            while ( $layout_spa_query->have_posts() ) :
            $layout_spa_query->the_post();
            ?>
            <!-- width of .grid-sizer used for columnWidth -->
            <div class="grid-spa-sizer"></div>
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <img src="<?php echo $image[0]; ?>" class="grid-spa-item grid-spa__image" style="width:100%;">
            <?php endif; ?>
        </div>
            <?php
                endwhile;
            endif;
            wp_reset_postdata();
        ?>
    </div>
</section>
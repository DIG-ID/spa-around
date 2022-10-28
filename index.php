<?php get_header(); ?>
<?php do_action( 'before_main_content' ); ?>
	<h1>DIGID</h1>
	<div class="container">
		<div class="row">
			<?php get_template_part( 'template-parts/loops/loop', 'default' ); ?>
		</div>
	</div>
<?php do_action( 'after_main_content' ); ?>
<?php get_footer(); ?>

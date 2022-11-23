<?php
/**
 * Template Name: About Page Template
 */

get_header();
	do_action( 'before_main_content' );
	get_template_part( 'template-parts/page/page', 'header' );
	get_template_part( 'template-parts/page/page', 'title' );
	get_template_part( 'template-parts/about/section', 'intro' );
	get_template_part( 'template-parts/about/section', 'properties' );
	do_action( 'after_main_content' );
get_footer();

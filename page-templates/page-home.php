<?php
/**
 * Template Name: Home Page Template
 */

get_header();
	do_action( 'before_main_content' );
	get_template_part( 'template-parts/home/section', 'hero' );
	get_template_part( 'template-parts/home/section', 'links' );
	get_template_part( 'template-parts/home/section', 'about' );
	do_action( 'after_main_content' );
get_footer();

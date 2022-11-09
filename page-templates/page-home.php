<?php
/**
 * Template Name: Home Page Template
 */

get_header();
	do_action( 'before_main_content' );
	get_template_part( 'template-parts/home/section', 'hero' );
	get_template_part( 'template-parts/home/section', 'about' );
	get_template_part( 'template-parts/home/section', 'links' );
	do_action( 'after_main_content' );
get_footer();

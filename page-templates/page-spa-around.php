<?php
/**
 * Template Name: Spa Around Page Template
 */

get_header();
	do_action( 'before_main_content' );
	get_template_part( 'template-parts/page/page', 'header' );
	get_template_part( 'template-parts/page/page', 'title' );
	get_template_part( 'template-parts/spa-around/section', 'intro' );
	get_template_part( 'template-parts/spa-around/section', 'item-list' );
	do_action( 'after_main_content' );
get_footer();

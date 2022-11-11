<?php
/**
 * Template Name: Offers Page Template
 */

get_header();
	do_action( 'before_main_content' );
	get_template_part( 'template-parts/page/page', 'header' );
	get_template_part( 'template-parts/page/page', 'title' );
	get_template_part( 'template-parts/offers/section', 'intro' );
	get_template_part( 'template-parts/offers/section', 'offers-list' );
	do_action( 'after_main_content' );
get_footer();

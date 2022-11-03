<header id="main-header" class="main-header" itemscope itemtype="http://schema.org/WebSite">
	<nav class="navbar fixed-top navbar-dark" role="navigation" aria-label="<?php esc_attr_e( 'Main navigation', 'digid' ); ?>">
		<div class="container-fluid">
			<div class="site-branding">
				<?php
				if ( has_custom_logo() ) :
					the_custom_logo();
				endif;
				?>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php do_action( 'wpml_add_language_selector' ); ?>
			</div>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main',
						'container'      => false,
						'menu_class'     => '',
						'items_wrap'     => '<ul id="%1$s" class="navbar-nav %2$s">%3$s</ul>',
						'fallback_cb'    => '__return_false',
						'detph'          => 2,
						'walker'         => new digid_bs5_nav_walker(),
					),
				);
				?>
			</div>
		</div>
	</nav>
</header>

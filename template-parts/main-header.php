<header id="main-header" class="main-header" itemscope itemtype="http://schema.org/WebSite">
	<nav class="navbar navbar-expand-lg navbar-dark" role="navigation" aria-label="<?php esc_attr_e( 'Main navigation', 'digid' ); ?>">
		<div class="container">
			<div class="site-branding">
				<div class="row justify-content-between align-items-center">
					<div class="col">
						<?php
						if ( has_custom_logo() ) :
							?><div class="site-logo"><?php the_custom_logo(); ?></div><?php
						endif;
						?>
					</div>
					<div class="col d-none d-lg-flex justify-content-end">
						<?php do_action( 'socials' ); ?>
					</div>
					<div class="col d-flex justify-content-end d-lg-none">
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-controls="navbarSupportedContent">
							<span></span>
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'main',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarSupportedContent',
					'menu_class'      => 'navbar-nav',
					'fallback_cb'     => '',
					'menu_id'         => 'main-nav',
				)
			);
			?>
		</div>
	</nav>
</header>

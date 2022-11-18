<div class="container separator">
	<div class="row">
		<div class="col-12">
			<hr class="separator-line">
		</div>
	</div>
</div>
<?php
$host_name        = get_field( 'host_details_name' );
$host_position    = get_field( 'host_details_position' );
$host_description = get_field( 'host_details_description' );
$host_image       = get_field( 'host_details_avatar' );

if ( $host_name && $host_image ) :
	?>
	<section class="section section-host">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="section__title"><?php esc_html_e( 'Host', 'digid' ); ?></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-8">
					<div class="row justify-content-between">
						<div class="col-3">
							<figure class="host-avatar">
								<?php echo wp_get_attachment_image( $host_image, 'avatar' ); ?>
							</figure>
						</div>
						<div class="col-8 description">
							<p class="host-name"><?php echo $host_name; ?></p>
							<p class="host-position"><?php echo $host_position; ?></p>
							<?php echo $host_description; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
endif;



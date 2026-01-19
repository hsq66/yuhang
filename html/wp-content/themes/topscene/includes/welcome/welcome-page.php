<?php
function topscene_add_welcome_page() {
	add_theme_page(
		esc_html__('Topscene Info', 'topscene'),
		esc_html__('Topscene Info', 'topscene'),
		'edit_theme_options',
		'topscene-welcome',
		'topscene_render_welcome_page'
	);
}
add_action('admin_menu', 'topscene_add_welcome_page');

function topscene_render_welcome_page() {
	$image_url = get_template_directory_uri() . '/includes/welcome/img/mockup_pro.webp';
	?>
	<style>
		.topscene-welcome-container {
			display: flex;
			flex-wrap: wrap;
			align-items: flex-start;
			margin-top: 40px;
		}
		.topscene-welcome-left,
		.topscene-welcome-right {
			flex: 1 1 100%;
		}
		@media (min-width: 768px) {
			.topscene-welcome-left {
				flex: 1 1 30%;
			}
			.topscene-welcome-right {
				flex: 1 1 40%;
			}
		}
		.topscene-mockup img {
			max-width: 100%;
			height: auto;
			display: block;
			border-radius: 10px;
		}
		.topscene-welcome-left p{
			font-size: 20px;
			letter-spacing: 1.2px;
		}
		.theme-cta{
			display: flex;
			flex-direction:row;
			gap: 25px;
			a{
				transition: all 0.5s ease;
			}
			a:hover{
				transform: translateY(-5px);
			}
		}
		.store-cta-wrapper{
			display: flex;
			flex-direction: column;
			gap: 10px;
			align-items: start;
			justify-content: left;
			a{
				text-decoration:none;
				transition: all 0.5s ease;

			}
			a:hover{
				color:gold;
			}
			
		}
		.cta-store{
			background: #1a1a1a;
			color: #FCFCFC;
			padding: 24px 32px;
			border-radius: 8px;
			max-width: 100%;
			text-align: center;
			text-transform: uppercase;
			font-weight: 700;
			font-size: 20px;
		
		}
		.cta-edit-mode{
			background: #FCFCFC;
			color: #1a1a1a;
			border: 2px solid #1a1a1a;
			padding: 14px 20px;
			border-radius: 8px;
			max-width: 100%;
			text-align: center;
			text-transform: uppercase;
			font-weight: 700;
			font-size: 15px;
		}
	
	</style>

	<div class="wrap" style="font-family: Arial, sans-serif;">
		<h1 style="font-size: 2em;"><?php esc_html_e('Welcome to Topscene', 'topscene'); ?></h1>
		<p style="max-width: 600px; font-size: 20px; letter-spacing: 1.2px;"><?php esc_html_e("You're now using the free version of Topscene. Take your site to the next level with powerful tools available in the Pro version.", 'topscene'); ?></p>

		<div class="topscene-welcome-container">
			<div class="topscene-welcome-left">
				<div style="max-width: 500px; padding: 30px; background: #FCFCFC; border: 2px dashed #1a1a1a; border-radius: 8px; color: #1a1a1a;">
					<h2 style="margin-bottom: 10px; color: #1a1a1a; text-transform: uppercase;">💡 <?php esc_html_e('Unlock More with Topscene Pro', 'topscene'); ?></h2>
					<p style="margin-bottom: 30px;"><?php esc_html_e('Access advanced customization options, premium templates and patterns.', 'topscene'); ?></p>
					<div class="theme-cta">
						<a href="<?php echo esc_url('https://q8labs.shop/theme/topscene/'); ?>" target="_blank" style="text-decoration:none; margin-top: 15px; background: #FCFCFC; color: #1a1a1a; padding: 16px 12px; text-transform: uppercase; font-weight: 700; border: 2px solid #1a1a1a;">
							<?php esc_html_e('Upgrade to Pro', 'topscene'); ?>
						</a>
						<a href="<?php echo esc_url('https://q8labs.shop/preview/?url=https://q8labs.shop/themes/topscene/'); ?>" target="_blank" style="text-decoration:none; margin-top: 15px; background: #1a1a1a; color: #FCFCFC; padding: 16px 12px; text-transform: uppercase; font-weight: 700; border: 2px solid #1a1a1a;">
							<?php esc_html_e('Pro Preview', 'topscene'); ?>
						</a>
					</div>
					
				</div>

				<div class="store-cta-wrapper" style="list-style: disc; margin-left: 20px;">
					<p><?php esc_html_e('Looking for a premium theme? Explore our theme store and find the perfect design for your project', 'topscene'); ?></p>
					
					<a class="cta-store" href="<?php echo esc_url('https://q8labs.shop/'); ?>" target="_blank"><?php esc_html_e('Premium Themes', 'topscene'); ?></a>
					<?php
						$mode = get_option('q8labs_edit_mode', 'maintain_structure');
						$toggle_url = esc_url(add_query_arg('q8labs_toggle_mode', '1'));
						$toggle_label = ($mode === 'maintain_structure')
							? '🧱 Edit freely with Q8Labs'
							: '🧩 Maintain structure with Q8Labs';
						?>

						<a class="cta-edit-mode" href="<?php echo $toggle_url; ?>">
							<?php echo esc_html($toggle_label); ?>
						</a>
				</div>

				<div class="store-cta-wrapper" style="list-style: disc; margin-left: 20px;">
					<p><?php esc_html_e('Looking for a premium theme? Explore our theme store and find the perfect design for your project', 'topscene'); ?></p>
					
					<a class="cta-store" href="<?php echo esc_url('https://q8labs.shop/'); ?>" target="_blank"><?php esc_html_e('Premium Themes', 'topscene'); ?></a>
				</div>
			</div>

			<div class="topscene-welcome-right topscene-mockup">
				<img src="<?php echo esc_url($image_url); ?>" alt="<?php esc_attr_e('Topscene Pro Mockup', 'topscene'); ?>">
			</div>
		</div>
	</div>
	<?php
}

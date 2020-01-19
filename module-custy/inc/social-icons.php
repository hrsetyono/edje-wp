<?php

function blocksy_social_icons($socials_descriptor = null, $args = []) {
	$args = wp_parse_args(
		$args,
		[
			'icons-color' => 'custom',
			'type' => 'simple'
		]
	);

	$has_any_social = false;

	if ( ! $socials_descriptor ) {
		$socials_descriptor = [
			[
				'id' => 'facebook',
				'enabled' => true,
			],

			[
				'id' => 'twitter',
				'enabled' => true,
			],

			[
				'id' => 'instagram',
				'enabled' => true,
			],

			[
				'id' => 'pinterest',
				'enabled' => true,
			],

			[
				'id' => 'dribbble',
				'enabled' => true,
			],

			[
				'id' => 'linkedin',
				'enabled' => true,
			],

			[
				'id' => 'medium',
				'enabled' => true,
			],

			[
				'id' => 'patreon',
				'enabled' => true,
			],

			[
				'id' => 'vk',
				'enabled' => true,
			],

			[
				'id' => 'youtube',
				'enabled' => true,
			],

			[
				'id' => 'vimeo',
				'enabled' => true,
			],

			[
				'id' => 'rss',
				'enabled' => true,
			],

			[
				'id' => 'xing',
				'enabled' => true,
			],

			[
				'id' => 'whatsapp',
				'enabled' => true,
			],

			[
				'id' => 'viber',
				'enabled' => true,
			],

			[
				'id' => 'telegram',
				'enabled' => true,
			],

			[
				'id' => 'weibo',
				'enabled' => true,
			],

			[
				'id' => 'qq',
				'enabled' => true,
			],

			[
				'id' => 'wechat',
				'enabled' => true,
			],
		];
	}

	foreach ($socials_descriptor as $single_social) {
		if (
			! isset($single_social['enabled'])
			||
			(
				isset($single_social['enabled'])
				&&
				$single_social['enabled']
			)
		) {
			$has_any_social = true;
			break;
		}
	}

	if (! $has_any_social) {
		return '';
	}

	ob_start();

	?>

	<ul class="ct-social-box"
		data-icons="<?php echo esc_attr($args['type']); ?>"
		data-icons-color="<?php echo esc_attr($args['icons-color']) ?>">
		<?php foreach ($socials_descriptor as $single_social) { ?>
			<?php

			if (
				isset($single_social['enabled'])
				&&
				! $single_social['enabled']
			) {
				continue;
			}

			$link = get_theme_mod($single_social['id'], '#');

			?>

			<li data-network="<?php echo esc_attr($single_social['id']); ?>">
				<a href="<?php echo esc_attr($link) ?>" target="_blank" class="item-icon">
					<?php if ( $single_social['id'] === 'facebook' ) { ?>
						<svg height="20px" viewBox="0 0 20 20">
							<path d="M16.5,0H3.5C1.6,0,0,1.6,0,3.5v13.1C0,18.4,1.6,20,3.5,20h7v-7.1h-2v-3h2V8c0-2.1,1.7-3.7,3.7-3.7h2.4v3h-2.4c-0.4,0-0.8,0.4-0.8,0.8v1.9H16v3h-2.5V20h1.4h1.7c1.9,0,3.5-1.6,3.5-3.5V3.5C20,1.6,18.4,0,16.5,0z"/>
						</svg>
						<span hidden>Facebook</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'twitter' ) { ?>
						<svg height="20px" viewBox="0 0 24.6 20">
							<path d="M24.6,2.4c-0.9,0.4-1.9,0.7-2.9,0.8c1-0.6,1.8-1.6,2.2-2.8c-1,0.6-2.1,1-3.2,1.2C19.8,0.6,18.5,0,17,0c-2.8,0-5,2.3-5,5c0,0.4,0,0.8,0.1,1.2C7.9,6,4.2,4,1.7,0.9C1.3,1.7,1,2.5,1,3.5c0,1.8,0.9,3.3,2.2,4.2C2.4,7.6,1.7,7.4,1,7c0,0,0,0,0,0.1c0,2.4,1.7,4.5,4.1,5c-0.4,0.1-0.9,0.2-1.3,0.2c-0.3,0-0.6,0-1-0.1c0.6,2,2.5,3.5,4.7,3.5c-1.7,1.4-3.9,2.2-6.3,2.2c-0.4,0-0.8,0-1.2-0.1C2.2,19.2,4.9,20,7.7,20c9.3,0,14.4-7.7,14.4-14.4c0-0.2,0-0.4,0-0.7C23.1,4.3,23.9,3.4,24.6,2.4z"/>
						</svg>
						<span hidden>Twitter</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'instagram' ) { ?>
						<svg height="20px" viewBox="0 0 20 20">
							<circle cx="10" cy="10" r="3.3"/>
							<path d="M14.2,0H5.8C2.6,0,0,2.6,0,5.8v8.3C0,17.4,2.6,20,5.8,20h8.3c3.2,0,5.8-2.6,5.8-5.8V5.8C20,2.6,17.4,0,14.2,0zM10,15c-2.8,0-5-2.2-5-5s2.2-5,5-5s5,2.2,5,5S12.8,15,10,15z M15.8,5C15.4,5,15,4.6,15,4.2s0.4-0.8,0.8-0.8s0.8,0.4,0.8,0.8S16.3,5,15.8,5z"/>
						</svg>

						<span hidden>Instagram</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'pinterest' ) { ?>
						<svg height="20px" viewBox="0 0 20 20">
							<path d="M10,0C4.5,0,0,4.5,0,10c0,4.1,2.5,7.6,6,9.2c0-0.7,0-1.5,0.2-2.3c0.2-0.8,1.3-5.4,1.3-5.4s-0.3-0.6-0.3-1.6c0-1.5,0.9-2.6,1.9-2.6c0.9,0,1.3,0.7,1.3,1.5c0,0.9-0.6,2.3-0.9,3.5c-0.3,1.1,0.5,1.9,1.6,1.9c1.9,0,3.2-2.4,3.2-5.3c0-2.2-1.5-3.8-4.2-3.8c-3,0-4.9,2.3-4.9,4.8c0,0.9,0.3,1.5,0.7,2C6,12,6.1,12.1,6,12.4c0,0.2-0.2,0.6-0.2,0.8c-0.1,0.3-0.3,0.3-0.5,0.3c-1.4-0.6-2-2.1-2-3.8c0-2.8,2.4-6.2,7.1-6.2c3.8,0,6.3,2.8,6.3,5.7c0,3.9-2.2,6.9-5.4,6.9c-1.1,0-2.1-0.6-2.4-1.2c0,0-0.6,2.3-0.7,2.7c-0.2,0.8-0.6,1.5-1,2.1C8.1,19.9,9,20,10,20c5.5,0,10-4.5,10-10C20,4.5,15.5,0,10,0z"/>
						</svg>
						<span hidden>Pinterest</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'dribbble' ) { ?>
						<svg height="20px" viewBox="0 0 20 20">
							<path d="M10,0C4.5,0,0,4.5,0,10c0,5.5,4.5,10,10,10c5.5,0,10-4.5,10-10C20,4.5,15.5,0,10,0 M16.1,5.2c1,1.2,1.6,2.8,1.7,4.4c-1.1-0.2-2.2-0.4-3.2-0.4v0h0c-0.8,0-1.6,0.1-2.3,0.2c-0.2-0.4-0.3-0.8-0.5-1.2C13.4,7.6,14.9,6.6,16.1,5.2 M10,2.2c1.8,0,3.5,0.6,4.9,1.7c-1,1.2-2.4,2.1-3.8,2.7c-1-2-2-3.4-2.7-4.3C8.9,2.3,9.4,2.2,10,2.2 M6.6,3c0.5,0.6,1.6,2,2.8,4.2C7,8,4.6,8.1,3.2,8.1c0,0-0.1,0-0.1,0h0c-0.2,0-0.4,0-0.6,0C3,5.9,4.5,4,6.6,3 M2.2,10c0,0,0-0.1,0-0.1c0.2,0,0.5,0,0.9,0h0c1.6,0,4.3-0.1,7.1-1c0.2,0.3,0.3,0.7,0.4,1c-1.9,0.6-3.3,1.6-4.4,2.6c-1,0.9-1.7,1.9-2.2,2.5C2.9,13.7,2.2,11.9,2.2,10 M10,17.8c-1.7,0-3.3-0.6-4.6-1.5c0.3-0.5,0.9-1.3,1.8-2.2c1-0.9,2.3-1.9,4.1-2.5c0.6,1.7,1.1,3.6,1.5,5.7C11.9,17.6,11,17.8,10,17.8M14.4,16.4c-0.4-1.9-0.9-3.7-1.4-5.2c0.5-0.1,1-0.1,1.6-0.1h0h0h0c0.9,0,2,0.1,3.1,0.4C17.3,13.5,16.1,15.3,14.4,16.4"/>
						</svg>
						<span hidden>Dribbble</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'linkedin' ) { ?>
						<svg height="20px" viewBox="0 0 19.9 20">
							<path d="M18.4,0H1.5C0.7,0,0,0.6,0,1.4v17.1C0,19.4,0.7,20,1.5,20h16.9c0.8,0,1.5-0.6,1.5-1.4V1.4C19.9,0.6,19.2,0,18.4,0z M6,16.7H3v-9h3V16.7z M4.5,6.5L4.5,6.5c-1,0-1.7-0.7-1.7-1.6c0-0.9,0.7-1.6,1.7-1.6c1,0,1.7,0.7,1.7,1.6C6.2,5.8,5.6,6.5,4.5,6.5zM16.8,16.7h-3v-4.8c0-1.2-0.4-2-1.5-2c-0.8,0-1.3,0.6-1.5,1.1c-0.1,0.2-0.1,0.5-0.1,0.7v5h-3c0,0,0-8.2,0-9h3V9c0.4-0.6,1.1-1.5,2.7-1.5c2,0,3.5,1.3,3.5,4.1L16.8,16.7L16.8,16.7z"/>
						</svg>
						<span hidden>LinkedIn</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'medium' ) { ?>
						<svg height="20px" viewBox="0 0 25.2 20">
							<polygon points="23,5.2 23,2.6 25.2,0.5 25.2,0 18.2,0 15.6,6.7 13.3,12.3 10.6,6.4 10.6,6.4 7.7,0 0.3,0 0.3,0.5 3,3.7 3,5.2 3,5.6 3,15.8 0,19.5 0,20 7.5,20 7.5,19.5 4.5,15.8 4.5,5.6 4.5,5.6 4.5,5.5 4.5,5.6 4.5,5.6 4.7,6.1 4.7,6.1 4.7,6.1 11,20 11.9,20 17.3,6.2 17.5,5.6 17.5,17.4 15.3,19.5 15.3,20 25.2,20 25.2,19.5 23,17.4 23,5.9 "/>
						</svg>
						<span hidden>Medium</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'patreon' ) { ?>
						<svg height="20px" viewBox="0 0 20.8 20">
							<path d="M13.3,0c4.1,0,7.5,3.4,7.5,7.5S17.4,15,13.3,15s-7.5-3.4-7.5-7.5S9.1,0,13.3,0z M0,0h3.7v20H0V0z"/>
						</svg>
						<span hidden>Patreon</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'vk' ) { ?>
						<svg height="20" viewBox="0 0 20 20">
							<path class="st0" d="M17.4,0H2.6C1.2,0,0,1.2,0,2.6v14.9C0,18.8,1.2,20,2.6,20h14.9c1.4,0,2.6-1.2,2.6-2.6V2.6C20,1.2,18.8,0,17.4,0z M14.5,10.6c0.1,0.6,2.3,1.9,2.1,3c-0.1,0.5-0.8,0.4-1.5,0.4c-0.6,0-1.2,0-1.5-0.1c-0.5-0.2-1.7-1.8-2-1.7c-0.7,0.1-0.4,1.6-0.7,1.7c-0.3,0.1-1.3,0.1-1.6,0.1c-2-0.3-3.1-1.7-4.2-3.3C3.9,8.4,3.1,6.9,3.4,6.7c0.4-0.2,1.4-0.2,2.4-0.1c0.3,0,1.2,2.3,1.4,2.6c0.9,1.5,1.2,0.4,1.2,0.3c0.3-2.7-0.4-2.6-0.8-2.6C8,5.9,10,6.1,10,6.1s0.7,0.2,0.9,0.3c0.1,0.1,0.2,0.3,0.2,1c0,1.1-0.1,2.5,0.3,2.5c0.4,0,0.9-0.8,1.4-1.7c0.4-0.8,0.7-1.5,0.9-1.6c0.1-0.1,0.8-0.1,1.4-0.1c0.6,0,1.3,0,1.4,0.1c0.3,0.3-0.2,1.2-0.8,2C15.3,9.3,14.5,10.1,14.5,10.6z"/>
						</svg>
						<span hidden>VKontakte</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'youtube' ) { ?>
						<svg height="20" viewBox="0 0 20 20">
							<path d="M15,0H5C2.2,0,0,2.2,0,5v10c0,2.8,2.2,5,5,5h10c2.8,0,5-2.2,5-5V5C20,2.2,17.8,0,15,0z M14.5,10.9l-6.8,3.8c-0.1,0.1-0.3,0.1-0.5,0.1c-0.5,0-1-0.4-1-1l0,0V6.2c0-0.5,0.4-1,1-1c0.2,0,0.3,0,0.5,0.1l6.8,3.8c0.5,0.3,0.7,0.8,0.4,1.3C14.8,10.6,14.6,10.8,14.5,10.9z"/>
						</svg>
						<span hidden>YouTube</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'vimeo' ) { ?>
						<svg height="20" viewBox="0 0 23.3 20">
							<path d="M20.1,0c-0.4,0-0.8,0-1.1,0.1c-1,0.2-4.5,1.4-5.6,4.9c0.3-0.1,0.6-0.1,0.8-0.1c1.4,0,2.3,0.8,2.2,2.7c-0.1,0.9-0.6,2-1.1,2.9c-0.5,0.8-1.2,2.3-2.2,2.3c-0.3,0-0.7-0.2-1.1-0.6c-1.4-1.4-1.2-4.2-1.6-6c-0.2-1-0.4-2.3-0.7-3.4c-0.3-0.9-1-2-1.8-2.2C7.7,0.6,7.5,0.6,7.3,0.6c-0.7,0-1.5,0.3-2,0.6C3.3,2.4,1.8,4.1,0,5.5c0.3,0.3,0.5,1.1,1,1.2c0.1,0,0.1,0,0.2,0c0.7,0,1.4-0.5,2-0.5c0.3,0,0.6,0.1,0.9,0.6c0.5,0.8,0.6,1.7,1,2.6c0.4,1.2,0.7,2.5,1.1,3.8c0.6,2.3,1.3,5.8,3.3,6.6C9.7,20,10,20,10.3,20c0.9,0,1.9-0.4,2.5-0.8c2.1-1.2,3.8-3,5.2-4.9c3.2-4.3,5-9.2,5.3-10.6c0.2-1,0.2-2-0.4-2.7C22.2,0.2,21.1,0,20.1,0L20.1,0z"/>
						</svg>
						<span hidden>Vimeo</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'rss' ) { ?>
						<svg height="20" viewBox="0 0 20 20">
							<path d="M16.6,0H3.4C1.5,0,0,1.5,0,3.4v13.2C0,18.5,1.5,20,3.4,20h13.2c1.9,0,3.4-1.5,3.4-3.4V3.4C20,1.5,18.5,0,16.6,0z M6,16.5c-1.2,0-2.1-0.9-2.1-2.1s0.9-2.1,2.1-2.1s2.1,0.9,2.1,2.1S7.2,16.5,6,16.5z M11.6,16.5c-0.6,0-1.2-0.5-1.2-1.2c0-3-2.4-5.3-5.3-5.3c-0.6,0-1.2-0.5-1.2-1.2c0-0.6,0.5-1.2,1.2-1.2c4.2,0,7.7,3.4,7.7,7.7C12.7,16,12.2,16.5,11.6,16.5z M15.8,16.5c-0.6,0-1.2-0.5-1.2-1.2c0-5.3-4.3-9.5-9.5-9.5c-0.6,0-1.2-0.5-1.2-1.2c0-0.6,0.5-1.2,1.2-1.2c3.4,0,6.3,1.2,8.5,3.4c2.3,2.3,3.4,5.1,3.4,8.4C16.9,16,16.4,16.5,15.8,16.5z"/>
						</svg>
						<span hidden>RSS</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'xing' ) { ?>
						<svg height="20" viewBox="0 0 20 20">
							<path d="M16.8,0H3.2C1.4,0,0,1.4,0,3.2v13.6C0,18.6,1.4,20,3.2,20h13.6c1.8,0,3.2-1.4,3.2-3.2V3.2C20,1.4,18.6,0,16.8,0z M6.2,13.3H3.8c-0.2,0-0.3-0.3-0.3-0.4L6,8.4c0.1-0.1,0.1-0.2,0-0.3L4.5,5.4C4.4,5.3,4.5,5,4.7,5H7c0.1,0,0.2,0.1,0.3,0.2L9,8.2c0.1,0.1,0.1,0.2,0,0.3l-2.6,4.7C6.4,13.2,6.2,13.3,6.2,13.3z M16.3,2.9l-4.7,8.6c-0.1,0.1-0.1,0.2,0,0.3l3,5.3c0.1,0.2,0,0.4-0.3,0.4h-2.3c-0.1,0-0.2-0.1-0.3-0.2l-3.2-5.6c-0.1-0.1-0.1-0.2,0-0.3l4.8-8.9c0.1,0,0.3-0.1,0.3-0.1h2.3C16.3,2.5,16.4,2.8,16.3,2.9z"/>
						</svg>
						<span hidden>Xing</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'whatsapp' ) { ?>
						<svg height="20" viewBox="0 0 20 20">
							<path d="M17.1,2.9C15,0.8,12.1-0.2,9.2,0c-4,0.3-7.5,3.1-8.7,7c-0.8,2.7-0.5,5.6,0.9,8L0,19.3c-0.1,0.4,0.3,0.8,0.7,0.7l4.5-1.2C6.7,19.6,8.3,20,10,20h0c4.2,0,8.1-2.6,9.4-6.5C20.7,9.6,19.8,5.6,17.1,2.9z M14.9,13.6c-0.2,0.6-1.2,1.1-1.7,1.2c-0.5,0-0.9,0.2-3-0.6c-2.5-1-4.1-3.6-4.3-3.8c-0.1-0.2-1-1.4-1-2.6s0.6-1.8,0.9-2.1C6,5.4,6.3,5.4,6.5,5.4c0.2,0,0.3,0,0.5,0c0.2,0,0.4,0,0.6,0.4c0.2,0.5,0.7,1.7,0.8,1.9s0.1,0.3,0,0.4C8.2,8.3,8.2,8.4,8,8.5C7.9,8.7,7.8,8.8,7.7,9C7.5,9.1,7.4,9.2,7.6,9.5c0.1,0.3,0.6,1.1,1.4,1.7c1,0.9,1.8,1.1,2,1.2c0.3,0.1,0.4,0.1,0.5-0.1c0.1-0.2,0.6-0.7,0.8-1s0.3-0.2,0.6-0.1c0.2,0.1,1.5,0.7,1.7,0.8c0.3,0.1,0.4,0.2,0.5,0.3C15.1,12.5,15.1,13,14.9,13.6z"/>
						</svg>
						<span hidden>WhatsApp</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'viber' ) { ?>
						<svg height="20" viewBox="0 0 20 20">
							<path d="M18.6,4.4c-0.3-1.2-1-2.2-2-2.9c-1.2-0.9-2.7-1.2-3.9-1.3C11,0,9.4-0.1,8,0.1C6.6,0.3,5.5,0.6,4.6,1c-1.9,0.9-3,2.2-3.3,4.1C1.1,6,1,6.9,0.9,7.6c-0.1,1.8,0,3.4,0.4,4.9c0.4,1.5,1.2,2.5,2.2,3.2c0.3,0.2,0.6,0.3,1,0.4c0.2,0.1,0.3,0.1,0.5,0.2v2.9C5,19.7,5.3,20,5.7,20c0.2,0,0.4-0.1,0.5-0.2l2.7-2.6C9,17,9,17,9.1,17c0.9,0,1.9-0.1,2.8-0.1c1.1-0.1,2.5-0.2,3.7-0.7c1.1-0.5,2-1.2,2.5-2.2c0.5-1.1,0.8-2.2,0.9-3.5C19.3,8.2,19.1,6.2,18.6,4.4z M13.9,13.1c-0.3,0.4-0.7,0.8-1.2,1c-0.4,0.1-0.7,0.1-1.1,0C8.8,12.8,6.5,10.9,5,8.1C4.7,7.5,4.5,6.9,4.2,6.3C4.2,6.2,4.2,6,4.2,5.9c0-1,0.8-1.5,1.5-1.7c0.3-0.1,0.5,0,0.8,0.2c0.6,0.6,1.1,1.2,1.4,2C8,6.7,8,7,7.7,7.2C7.6,7.3,7.6,7.3,7.5,7.4C6.9,7.8,6.8,8.2,7.2,8.9c0.5,1.2,1.5,1.9,2.6,2.4c0.3,0.1,0.6,0.1,0.8-0.2c0,0,0.1-0.1,0.1-0.1c0.5-0.8,1.1-0.7,1.8-0.3c0.4,0.3,0.8,0.6,1.2,0.9C14.3,12.1,14.3,12.5,13.9,13.1z M9.6,6.3c0-0.3,0.2-0.5,0.5-0.5c1.3,0,2.4,1.1,2.4,2.4c0,0.3-0.2,0.5-0.5,0.5s-0.5-0.2-0.5-0.5c0-0.8-0.6-1.4-1.4-1.4C9.9,6.8,9.6,6.6,9.6,6.3z M14.1,8.5c0,0.2-0.2,0.4-0.5,0.4c0,0-0.1,0-0.1,0c-0.3,0-0.4-0.3-0.4-0.5c0-0.2,0-0.3,0-0.5c0-1.5-1.3-2.8-2.8-2.8c-0.2,0-0.3,0-0.5,0C9.7,5.2,9.5,5,9.4,4.8c0-0.3,0.1-0.5,0.4-0.5c0.2,0,0.4-0.1,0.6-0.1c2.1,0,3.7,1.7,3.7,3.7C14.2,8.1,14.1,8.3,14.1,8.5z M15.7,8.8c0,0.2-0.2,0.4-0.5,0.4c0,0-0.1,0-0.1,0c-0.3-0.1-0.4-0.3-0.4-0.6c0.1-0.3,0.1-0.6,0.1-0.9c0-2.3-1.9-4.2-4.2-4.2c-0.3,0-0.6,0-0.9,0.1C9.5,3.6,9.2,3.5,9.2,3.2C9.1,2.9,9.3,2.7,9.5,2.6c0.4-0.1,0.8-0.1,1.1-0.1c2.8,0,5.2,2.3,5.2,5.2C15.8,8,15.8,8.4,15.7,8.8z"/>
						</svg>
						<span hidden>Viber</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'telegram' ) { ?>
						<svg height="20" viewBox="0 0 20 20">
							<path d="M17,0H3C1.4,0,0,1.4,0,3v14c0,1.7,1.4,3,3,3h14c1.7,0,3-1.4,3-3V3C20,1.4,18.6,0,17,0z M15.9,5.8l-2,9.8c-0.1,0.4-0.6,0.6-1,0.4l-2.7-2c-0.2-0.2-0.5-0.1-0.7,0l-1.3,1.3c-0.3,0.3-0.7,0.1-0.9-0.2l-1.1-3.3c-0.1-0.2-0.2-0.3-0.3-0.3l-2.8-0.9c-0.4-0.1-0.4-0.6,0-0.8l12-4.7C15.5,4.9,16,5.3,15.9,5.8z M13.6,7.2l-5.6,5c-0.1,0.1-0.1,0.1-0.1,0.2l-0.2,1.9c0,0.1-0.1,0.1-0.1,0l-0.9-2.9c-0.1-0.1,0-0.3,0.1-0.4L13.4,7C13.6,6.9,13.7,7.1,13.6,7.2z"/>
						</svg>
						<span hidden>Telegram</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'weibo' ) { ?>
						<svg height="20" viewBox="0 0 20 20">
							<path d="M15.9,7.6c0.3-0.9-0.5-1.8-1.5-1.6c-0.9,0.2-1.1-1.1-0.3-1.3c2-0.4,3.6,1.4,3,3.3C16.9,8.8,15.6,8.4,15.9,7.6z M8.4,18.1c-4.2,0-8.4-2-8.4-5.3C0,11,1.1,9,3,7.2c3.9-3.9,7.9-3.9,6.8-0.2c-0.2,0.5,0.5,0.2,0.5,0.2c3.1-1.3,5.5-0.7,4.5,2c-0.1,0.4,0,0.4,0.3,0.5C20.3,11.3,16.4,18.1,8.4,18.1L8.4,18.1z M14,12.4c-0.2-2.2-3.1-3.7-6.4-3.3C4.3,9.4,1.8,11.4,2,13.6s3.1,3.7,6.4,3.3C11.7,16.6,14.2,14.6,14,12.4z M13.6,2c-1,0.2-0.7,1.7,0.3,1.5c2.8-0.6,5.3,2.1,4.4,4.8c-0.3,0.9,1.1,1.4,1.5,0.5C21,4.9,17.6,1.2,13.6,2L13.6,2z M10.5,14.2c-0.7,1.5-2.6,2.3-4.3,1.8c-1.6-0.5-2.3-2.1-1.6-3.5c0.7-1.4,2.5-2.2,4-1.8C10.4,11.1,11.2,12.7,10.5,14.2z M7.2,13c-0.5-0.2-1.2,0-1.5,0.5C5.3,14,5.5,14.6,6,14.8c0.5,0.2,1.2,0,1.5-0.5C7.8,13.8,7.7,13.2,7.2,13z M8.4,12.5c-0.2-0.1-0.4,0-0.6,0.2c-0.1,0.2-0.1,0.4,0.1,0.5c0.2,0.1,0.5,0,0.6-0.2C8.7,12.8,8.6,12.6,8.4,12.5z"/>
						</svg>
						<span hidden>Weibo</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'qq' ) { ?>
						<svg height="20" viewBox="0 0 20 20">
							<path d="M18.2,16.4c-0.5,0.1-1.8-2.1-1.8-2.1c0,1.2-0.6,2.8-2,4c0.7,0.2,2.1,0.7,1.8,1.3C16,20.2,11.3,20,10,19.8c-1.3,0.2-5.9,0.3-6.2-0.2c-0.4-0.6,1.1-1.1,1.8-1.3c-1.4-1.2-2-2.8-2-4c0,0-1.3,2.1-1.8,2.1c-0.2,0-0.5-1.2,0.4-3.9c0.4-1.3,0.9-2.4,1.6-4.1C3.6,3.8,5.5,0,10,0c4.4,0,6.4,3.8,6.3,8.4c0.7,1.8,1.2,2.8,1.6,4.1C18.7,15.3,18.4,16.4,18.2,16.4L18.2,16.4z"/>
						</svg>
						<span hidden>QQ</span>
					<?php } ?>

					<?php if ( $single_social['id'] === 'wechat' ) { ?>
						<svg height="20" viewBox="0 0 20 20">
							<path d="M13.5,6.8c0.2,0,0.5,0,0.7,0c-0.6-2.9-3.7-5-7.1-5C3.2,1.9,0,4.5,0,7.9c0,1.9,1.1,3.5,2.8,4.8l-0.7,2.1l2.5-1.2c0.9,0.2,1.6,0.4,2.5,0.4c0.2,0,0.4,0,0.7,0c-0.1-0.5-0.2-1-0.2-1.5C7.5,9.3,10.2,6.8,13.5,6.8L13.5,6.8z M9.7,4.9c0.5,0,0.9,0.4,0.9,0.9c0,0.5-0.4,0.9-0.9,0.9c-0.5,0-1.1-0.4-1.1-0.9C8.7,5.2,9.2,4.9,9.7,4.9z M4.8,6.6c-0.5,0-1.1-0.4-1.1-0.9c0-0.5,0.5-0.9,1.1-0.9c0.5,0,0.9,0.4,0.9,0.9C5.7,6.3,5.3,6.6,4.8,6.6z M20,12.3c0-2.8-2.8-5.1-6-5.1c-3.4,0-6,2.3-6,5.1s2.6,5.1,6,5.1c0.7,0,1.4-0.2,2.1-0.4l1.9,1.1l-0.5-1.8C18.9,15.3,20,13.9,20,12.3z M12,11.4c-0.4,0-0.7-0.4-0.7-0.7c0-0.4,0.4-0.7,0.7-0.7c0.5,0,0.9,0.4,0.9,0.7C12.9,11.1,12.6,11.4,12,11.4z M15.9,11.4c-0.4,0-0.7-0.4-0.7-0.7c0-0.4,0.4-0.7,0.7-0.7c0.5,0,0.9,0.4,0.9,0.7C16.8,11.1,16.5,11.4,15.9,11.4z"/>
						</svg>
						<span hidden>WeChat</span>
					<?php } ?>
				</a>
			</li>
		<?php } ?>
	</ul>

	<?php

	return ob_get_clean();
}
<?php


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function gutenberg_card_block_cgb_block_assets() { 
	wp_register_style(
		'gutenberg_card_block-cgb-style-css',
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ),
		is_admin() ? array( 'wp-editor' ) : null,
		null 
	);

	// Register block editor script for backend.
	wp_register_script(
		'gutenberg_card_block-cgb-block-js',
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
		null,
		true
	);

	// Register block editor styles for backend.
	wp_register_style(
		'gutenberg_card_block-cgb-block-editor-css',
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ),
		array( 'wp-edit-blocks' ),
		null
	);

	// WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
	wp_localize_script(
		'gutenberg_card_block-cgb-block-js',
		'cgbGlobal',
		[
			'pluginDirPath' => plugin_dir_path( __DIR__ ),
			'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
		]
	);

	register_block_type(
		'cgb/block-gutenberg-card-block', array(

			'style'         => 'gutenberg_card_block-cgb-style-css',
			'editor_script' => 'gutenberg_card_block-cgb-block-js',
			'editor_style'  => 'gutenberg_card_block-cgb-block-editor-css',
		)
	);
}

// Hook: Block assets.
add_action( 'init', 'gutenberg_card_block_cgb_block_assets' );

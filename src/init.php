<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function afia_gutenberg_card_block_assets() { 
	wp_register_style(
		'afia-gutenberg-card-block-style-css',
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ),
		is_admin() ? array( 'wp-editor' ) : null,
		null 
	);

	wp_register_script(
		'afia-gutenberg-card-block-js',
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
		null,
		true
	);

	wp_register_style(
		'afia-gutenberg-card-block-editor-css',
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ),
		array( 'wp-edit-blocks' ),
		null
	);

	wp_localize_script(
		'afia-gutenberg-card-block-js',
		'afiaGlobal',
		[
			'pluginDirPath' => plugin_dir_path( __DIR__ ),
			'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
		]
	);

	register_block_type(
		'afia/afia-gutenberg-card-block', array(

			'style'         => 'afia-gutenberg-card-block-style-css',
			'editor_script' => 'afia-gutenberg-card-block-js',
			'editor_style'  => 'afia-gutenberg-card-block-editor-css',
		)
	);
}

add_action( 'init', 'afia_gutenberg_card_block_assets' );

function block_categories($categories, $post)
{
    if ($post->post_type === 'post' || $post->post_type === 'page' || $post->post_type === 'wp_block') {
        $categories = array_merge($categories, [
            [
                'slug' => 'afia-gutenberg-blocks',
                'title' => __('Afia Blocks', 'afia_block'),
            ],
        ]);
    }
    return $categories;

}
add_filter('block_categories', 'block_categories', 10, 2);
<?php

/*
Plugin Name: mdg Hiring Test
*/

namespace mdg;

class mdgHiringTest {

	public static function init() {
		add_shortcode( 'mdg-events', [ __CLASS__, 'render' ]);
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_scripts' ] );
	}

	public static function enqueue_scripts() {
		wp_enqueue_script( 'mdg-events', plugin_dir_url(__FILE__) . 'scripts.js', [], null, true );
		wp_enqueue_style( 'mdg-events', plugin_dir_url(__FILE__) . 'styles.css' );
	}

	public static function render() {

		ob_start();

		include( plugin_dir_path(__FILE__) . 'template.php' );

		return ob_get_clean();

	}

}

mdgHiringTest::init();

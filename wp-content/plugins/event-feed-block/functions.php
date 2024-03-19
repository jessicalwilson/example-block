<?php
/**
 * Register Post Type: Events
 */

function register_events_cpt() {
$labels = [
    "name" => __( "Events", "" ),
    "singular_name" => __( "Event", "" ),
];
$args = [
    "label" => __( "Events", "" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "events", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "taxonomies" => [ "event_category" ],
    "show_in_graphql" => false,
];
register_post_type( "event", $args );
}
add_action( 'init', 'register_events_cpt' );

/**
 * Register Taxonomy: Events Categories
 */
function register_events_category() {
$labels = [
    "name" => __( "Event Categories", "" ),
    "singular_name" => __( "Event Category", "" ),
];
$args = [
    "label" => __( "Event Categories", "" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'event_category', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "event_category",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
];
register_taxonomy( "event_category", [ "event" ], $args );
}
add_action( 'init', 'register_events_category' );

// Register Event Feed Block
function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/event-feed' );
}
add_action( 'init', 'register_acf_blocks' );
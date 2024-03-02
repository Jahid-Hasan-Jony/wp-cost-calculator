<?php

/*
 * Plugin Name: Wp Cost Calculator
 */



// Added manu page

add_action( 'admin_menu', 'wp_cost_calculator_menu_page' );


function wp_cost_calculator_menu_page() {
    add_menu_page(
        'WP Cost Calculator',
        'Cost Calculator',
        'manage_options',
        'wp-cost-calculator',
        'wp_cost_calculator',
        'dashicons-calculator',
        20
    );
}

function wp_cost_calculator(){

    include_once plugin_dir_path(__FILE__) . 'menu_page.php';

}
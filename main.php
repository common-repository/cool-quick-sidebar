<?php

/*
Plugin Name: Cool Quick Sidebar
Plugin URI: http://e-pressen.dk/
Description: A quick sidebar builder.
Version: 1.0.0
Author: Kjeld Hansen
Author URI: #
Requires at least: 4.0
Tested up to: 4.6
Text Domain: cool-quick-sidebar
*/

 if ( ! defined( 'ABSPATH' ) ) exit; 
add_action('admin_menu','cool_quick_sidebar_admin_menu');
function cool_quick_sidebar_admin_menu() { 
    add_menu_page(
		"Cool Quick Sidebar",
		" Quick Sidebar",
		8,
		__FILE__,
		"cool_quick_sidebar_admin_menu_list"/*,
		plugins_url( 'images/plugin-icon.png', __FILE__) */
	); 
}

add_action( 'widgets_init', 'cool_quick_sidebar_widgets_init' );
function cool_quick_sidebar_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Quick Sidebar', 'cool-quick-sidebar' ),
        'id' => 'cool_quick_sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages as quick widget.', 'cool-quick-sidebar' ),
        'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

function cool_quick_sidebar_admin_menu_list(){
	echo '<h2>Quick Sidebar</h2>';	
	?>
    
    <?php
    echo "<?php echo do_shortcode('[quick-sidebar]'); ?>";
	?>
    <?php
}


	
function cool_quick_sidebar_scripts_js() { 
	wp_enqueue_script( 'cool-quick-sidebar-jquery', plugins_url( '/quick-cool-sidebar.js', __FILE__), array( 'jquery' ), '1.0.0', true );
?>

<?php
    wp_enqueue_style( 'cool-quick-sidebar', plugins_url( '/quick-cool-sidebar.css', __FILE__) );
}
add_action( 'wp_enqueue_scripts', 'cool_quick_sidebar_scripts_js' );

add_shortcode('quick-sidebar', 'cool_quick_sidebar_fun');
function cool_quick_sidebar_fun(){ ?>

<div class="riquickContact">
	<span class="riqcl"><h2>Quick Sidebar</h2></span>
    <div class="riqcr">
    	<?php if ( is_active_sidebar( 'cool_quick_sidebar' ) ) : ?>
            <ul id="sidebar">
                <?php dynamic_sidebar( 'cool_quick_sidebar' ); ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

<?php }






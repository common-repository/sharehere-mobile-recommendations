<?php
/*
    Plugin Name: ShareHere Mobile Recommendations
    Plugin URI: http://wordpress.sharehere.com/
    Description: Show mobile visitors a recommendation bar, suggesting that they view other related articles, primarily on your Wordpress site.
    Version: 1.0
    Author: ShareHere
    Author URI: http://wordpress.sharehere.com
    License: GNU General Public License v3
*/

class ShareHereMobileRecommendations {

    public function __construct() {
        add_action( 'admin_menu',   array($this,'addAdminMenu') );
        add_action( 'admin_init',   array($this, 'register_button_options') );
        add_action( 'wp_footer',    array($this, 'generateFeedBackCode') );
        add_action( 'admin_enqueue_scripts', array($this,'sharehere_register') );
    }

    public function sharehere_register( $hook_suffix ) {
        if($hook_suffix == "settings_page_sharehere-mobile-recommendations") {
            // wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
            wp_enqueue_script( 'sharehere-mobile-recommendations-js', plugins_url('sharehere-mobile-recommendations.js', __FILE__ ), array(), false, true );
        }
    }

    public function register_button_options() {
            register_setting( 'sharehere-mobile-recommendations-options', 'buttonOptions' );
    }

    public function addAdminMenu() {
        add_options_page( 'ShareHere Mobile Recommendations', 'ShareHere Mobile Recommendations', 'manage_options', 'sharehere-mobile-recommendations', array($this,'showOptions') );
    }

    public function showOptions() {
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }

        $options = get_option('buttonOptions');
        include plugin_dir_path(__FILE__) . "sharehere-options.php";
    }

    public function generateFeedBackCode() {
            $options = get_option('buttonOptions');
            echo "<script type=\"text/javascript\" src=\"http://tags.sharehere.com/".$options["sharehereTagID"]."\"></script>";
    }
}

$shareherewp = new ShareHereMobileRecommendations();

?>
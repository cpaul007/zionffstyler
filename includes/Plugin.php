<?php

namespace ZionFfStyler;

use ZionFfStyler\RegisterElements;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    return;
}

class Plugin {

    public static $instance = null;
    
    public function __construct() {
        self::define_constants();

        self::$instance = $this;

        \register_activation_hook( ZFF_FILE,   __CLASS__ . '::zff_activate' );
        
        add_action( 'admin_init',               __CLASS__ . '::zff_activate' );
        add_action( 'switch_theme',             __CLASS__ . '::zff_activate' );   
        add_action( 'plugins_loaded',           __CLASS__ . '::zff_plugin_loaded' );
    }

    public static function instance() {
        return self::$instance;
    }

    static function define_constants() {
        //* Define constants
        define( 'ZFF_VERSION',    '1.0.2' );
        define( 'ZFF_FILE',       trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'zionffstyler.php' );
        define( 'ZFF_DIR',        plugin_dir_path( ZFF_FILE ) );
        define( 'ZFF_URL',        plugins_url( '/', ZFF_FILE ) );
    }

    static function zff_activate()
    {
        if ( ! class_exists('ZionBuilder\Plugin') )
        {
            deactivate_plugins( ZFF_FILE );
            add_action( 'admin_notices',            __CLASS__ . '::zff_admin_notice_message' );
            add_action( 'network_admin_notices',    __CLASS__ . '::zff_admin_notice_message' );
        }
    }

    /**
     * Shows an admin notice if you're not using the Zion Builder.
     */
    static function zff_admin_notice_message()
    {
        if ( ! is_admin() ) {
            return;
        }
        else if ( ! is_user_logged_in() ) {
            return;
        }
        else if ( ! current_user_can( 'update_core' ) ) {
            return;
        }

        $error = __( "Sorry, you can't use the ZionFfStyler unless the Zion Builder is active.", 'zionffstyler' );

        echo '<div class="error"><p>' . $error . '</p></div>';
        if ( isset( $_GET['activate'] ) )
        {
            unset( $_GET['activate'] );
        }
    }

    /**
     * Load textdomain for translation
     */ 
    function zff_text_domain()
    {
        load_plugin_textdomain( 'zionffstyler', false, basename( ZFF_DIR ) . '/languages' );
    }

    static function zff_plugin_loaded() {
        if( ! class_exists( 'ZionBuilder\Plugin' ) )
            return;

        self::$instance->zff_text_domain();

        add_action( 'zionbuilder/loaded', [ self::$instance, 'init_plugin' ] );
    }

    function init_plugin() {
        new RegisterElements();
    }
}

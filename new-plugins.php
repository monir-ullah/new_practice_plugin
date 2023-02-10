<?php 

    /*
        * @package NewPlugins
    */

    /*
        * Plugin Name:       New Plugins
        * Plugin URI:        https://example.com/plugins/the-basics/
        * Description:       Handle the basics with this plugin.
        * Version:           1.10.3
        * Requires at least: 5.2
        * Requires PHP:      7.2
        * Author:            Monir Ullah
        * Author URI:        https://author.example.com/
        * License:           GPL v2 or later
        * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
        * Update URI:        https://example.com/my-plugin/
        * Text Domain:       new-plugins
        * Domain Path:       /languages
    
    */



    defined('ABSPATH') or die('Hey, What are your doing here. You silly human');

    class AlecadddPlugin{
        
        public $plugin_link;
        function __construct(){
            add_action('init', [$this, 'custom_post_type']);

            $this->plugin_link = plugin_basename( __FILE__ );
        }
        function activation(){
            $this->custom_post_type();
            flush_rewrite_rules();
        }
        function register(){
            add_action( 'admin_enqueue_scripts', array($this, 'enqueue'));

            add_action( 'admin_menu', array($this, 'admin_control_menu') );

            add_filter( "plugin_action_links_$this->plugin_link", array($this, 'plugin_dashborad_custom_link') );
        }
        public function plugin_dashborad_custom_link($links){
            $new_link = '<a href="admin.php?page=new_plugin">Settings</a>';
            array_push($links,$new_link);
            return $links;
        }
        function admin_control_menu(){
            add_menu_page( 'New Plugin Page', 'New Plugin', 'manage_options', 'new_plugin', array($this, 'admin_control_option'), 'dashicons-format-status', 101 );
        }
        function admin_control_option(){
            echo '<h1>Welcome to New Plugin </h1>';
            echo '<input type="color">';
        }
        function deactivation(){
            flush_rewrite_rules();
        }

        function uninstall(){

        }

        function custom_post_type(){
            register_post_type( 'book', ['public'=> true, 'label' => 'Books'] );
        }

        function enqueue(){
            wp_enqueue_style( 'myplugin', plugins_url( '/assets/myplugin.css', __FILE__ ));
        }
    }

    if(class_exists('AlecadddPlugin')){
        $alecaddPlugin = new AlecadddPlugin('Monir Ullah');
        $alecaddPlugin->register();
    }


    // activation
    register_activation_hook( __FILE__, array($alecaddPlugin, 'activation') );

    // deactivation
    register_deactivation_hook( __FILE__, array($alecaddPlugin, 'deactivation') );

    // uninstall

    // register_uninstall_hook( __FILE__, array() );
   
?>


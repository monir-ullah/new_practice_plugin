<?php 

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
      
        function __construct(){
            add_action('init', [$this, 'custom_post_type']);
        }
        function activation(){
            $this->custom_post_type();
            flush_rewrite_rules();
        }

        function deactivation(){
            flush_rewrite_rules();
        }

        function uninstall(){

        }

        function custom_post_type(){
            register_post_type( 'book', ['public'=> true, 'label' => 'Books'] );
        }

    }

    if(class_exists('AlecadddPlugin')){
        $alecaddPlugin = new AlecadddPlugin('Monir Ullah');
    }


    // activation
    register_activation_hook( __FILE__, array($alecaddPlugin, 'activation') );

    // deactivation
    register_deactivation_hook( __FILE__, array($alecaddPlugin, 'deactivation') );

    // uninstall

    register_uninstall_hook( __FILE__, array() );

?>


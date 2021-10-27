<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/HoverEpic
 * @since      1.0.0
 *
 * @package    BlockyProg
 * @subpackage BlockyProg/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    BlockyProg
 * @subpackage BlockyProg/public
 * @author     Epic <pcsrvadm@gmail.com>
 */
class BlockyProg_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in BlockyProg_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The BlockyProg_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/blockyprog-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in BlockyProg_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The BlockyProg_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/blockyprog-public.js', array('jquery'), $this->version, false);
    }

    function exec_blocky_page($post) {
        if (!is_admin() && get_post_type($post->ID) === 'blocky_function') {
            $custom = get_post_custom($post->ID);
            $blocky_php = isset($custom["blocky_php_code"][0]) ? $custom["blocky_php_code"][0] : "";
            try {
                eval($blocky_php);
            } catch (ParseError $e) {
                echo "<pre>" . $blocky_php . "</pre>";
                echo $e->__toString();
            }
        }
    }

    private $fired = false;

    function exec_blocky_hook() {
//        if ($this->fired) {
//            return false;
//        }
        $posts_array = get_posts(
                array(
                    'posts_per_page' => -1,
                    'post_type' => 'blocky_function',
                    'post_status' => 'publish'
                )
        );
        if (count($posts_array) > 0) {
            foreach ($posts_array as $blocky_post) {
                $custom = get_post_custom($blocky_post->ID);
                $blocky_hook_type = isset($custom["blocky_hook_type"][0]) ? $custom["blocky_hook_type"][0] : "";
                $blocky_hook = isset($custom["blocky_hook"][0]) ? $custom["blocky_hook"][0] : "";
                $blocky_php = isset($custom["blocky_php_code"][0]) ? $custom["blocky_php_code"][0] : "";

                if ($blocky_hook_type == 'action') {
                    add_action($blocky_hook, function() use ($blocky_php) {
                        $this->exec_blocky_code($blocky_php);
                    });
                } elseif ($blocky_hook_type == 'filter') {
                    add_filter($blocky_hook, function() use ($blocky_php) {
                        $this->exec_blocky_code($blocky_php);
                    });
                } elseif ($blocky_hook_type == 'shortcode') {
                    add_shortcode($blocky_hook, function() use ($blocky_php) {
                        $this->exec_blocky_code($blocky_php);
                    });
                }
            }
        }
//        $this->fired = true;
    }

    function exec_blocky_code($php_code) {
        try {
            eval($php_code);
        } catch (ParseError $e) {
            echo "<pre>" . $php_code . "</pre>";
            echo $e->__toString();
        }
    }

}

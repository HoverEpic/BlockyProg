<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/HoverEpic
 * @since      1.0.0
 *
 * @package    BlockyProg
 * @subpackage BlockyProg/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    BlockyProg
 * @subpackage BlockyProg/admin
 * @author     Epic <pcsrvadm@gmail.com>
 */
class BlockyProg_Admin {

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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
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
        //autoload
        $path = get_blockyprog_dir_path() . 'admin/css/'; // local path
        $files = glob($path . '*'); //list files in path
        foreach ($files as $file) {
            $url = str_replace($path, plugin_dir_url(__FILE__) . 'css/', $file); // transforme path into url
            wp_enqueue_style($this->plugin_name . '-' . $file, $url, array(), $this->version, 'all'); // enqueue the file
        }
    }

    /**
     * Register the JavaScript for the admin area.
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
        //autoload root
        $path = get_blockyprog_dir_path() . 'admin/js/'; // local path
        $files = glob($path . '*'); //list files in path
        foreach ($files as $file) {
            if (!is_dir($file)) {
                $url = str_replace($path, plugin_dir_url(__FILE__) . 'js/', $file); // transforme path into url
                wp_enqueue_script($this->plugin_name . '-' . $file, $url, array(), $this->version, 'all'); // enqueue the file
            }
        }
    }

    /**
     * Adds a settings page link to a menu
     *
     * @link 		https://codex.wordpress.org/Administration_Menus
     * @since 		1.0.0
     * @return 		void
     */
    public function setup_admin_menu() {
//        add_menu_page(
//                'Custom Menu Title', //page title
//                'BockyProg', //menu title
//                'manage_options', //permission
//                $this->plugin_name . '-code', //slug
//                array($this, 'page_admin'), //function
//                plugins_url('myplugin/images/icon.png'), //icon
//                72 //position
//        );

        add_submenu_page(
                'edit.php?post_type=blocky_function', //submenu slug
                $this->plugin_name . ' configuration', //page title
                'Configuration', // menu title
                'manage_options', //permission
                $this->plugin_name . '-config', //unique menu slug
                array($this, 'page_admin'), //function
                1 //position
        );
    }

    // FUNCTIONS
    public function post_type_blocky_function() {
        $supports = array(
            'title', // post title
            'post-formats', // post formats
            // disable wpseo_meta
        );
        $labels = array(
            'name' => _x('Fonctions Blocky', 'plural'),
            'singular_name' => _x('Fonction Blocky', 'singular'),
            'menu_name' => _x('Fonctions Blocky', 'admin menu'),
            'name_admin_bar' => _x('Fonctions Blocky', 'admin bar'),
//            'add_new' => _x('Ajouter un nouveau', 'add new'),
            'add_new_item' => __('Ajouter une fonction'),
            'new_item' => __('Nouvelle fonction'),
            'edit_item' => __('Editer une fonction'),
            'view_item' => __('Voir une fonction'),
            'all_items' => __('Toutes les fonction'),
            'search_items' => __('Rechercher'),
            'not_found' => __('Pas de fonction trouvé.'),
        );
        $args = array(
            'supports' => $supports,
            'labels' => $labels,
            'public' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'blocky_function'),
            'has_archive' => true,
            'hierarchical' => false,
            'menu_icon' => 'dashicons-admin-generic'
        );
        register_post_type('blocky_function', $args);
    }

    /**
     * Creates the admin page
     *
     * @since 		1.0.0
     * @return 		void
     */
    public function page_admin() {
        include( plugin_dir_path(__FILE__) . 'partials/blockyprog-admin-display.php' );
    }
    
    public function remove_wpseo_meta_box() {
        remove_meta_box('wpseo_meta', 'blocky_function', 'normal');
    }

    public function add_blocky_function_meta_boxes() {
// see https://developer.wordpress.org/reference/functions/add_meta_box for a full explanation of each property
        add_meta_box(
                "blocky_function_metadata", // div id containing rendered fields
                "Blocky", // section heading displayed as text
                array($this, "display_blocky_function_meta_box"), // callback function to render fields
                "blocky_function", // name of post type on which to render fields
                "normal", // location on the screen
                "low" // placement priority
        );
    }

    function display_blocky_function_meta_box() {
        global $post;
        $custom = get_post_custom($post->ID);
        $blocky_xml = isset($custom["blocky_xml_code"][0]) ? $custom["blocky_xml_code"][0] : "";
        $blocky_php = isset($custom["blocky_php_code"][0]) ? $custom["blocky_php_code"][0] : "";
        $blocky_hook_type = isset($custom["blocky_hook_type"][0]) ? $custom["blocky_hook_type"][0] : "";
        $blocky_hook = isset($custom["blocky_hook"][0]) ? $custom["blocky_hook"][0] : "";
        //todo sanitize
        //autoload blockly
        $path = get_blockyprog_dir_path() . 'admin/js/blockly/'; // local path
        $files = glob($path . '*'); //list files in path
        foreach ($files as $file) {
            $url = str_replace($path, plugin_dir_url(__FILE__) . 'js/blockly/', $file); // transforme path into url
            wp_enqueue_script($this->plugin_name . '-' . $file, $url, array(), $this->version, 'all'); // enqueue the file
        }
        ?>
        <div id="tabs">
            <ul>
                <li><a href="#tab-blocky">Visuel</a></li>
                <li><a href="#tab-code">Code</a></li>
                <li><a href="#tab-xml">XML</a></li>
                <li><a href="#tab-triggers">Appels</a></li>
            </ul>
            <div id="tab-blocky">
                <?php require 'partials/blockly_toolbox/toolbox.php'; ?>
                <textarea id="blocklyArea" style="min-height: 900px; width: 100%; display: none" disabled></textarea>
                <div id="blocklyDiv"></div>
            </div>
            <div id="tab-code">
                <!--<textarea id="codeTextarea" style="min-height: 900px; width: 100%" disabled></textarea>-->
                <!--<div id="codeTextareaEditor" style="position: absolute; min-height: 900px; width: 100%"></div>-->
                <pre><code id="codeTextarea" style="max-height: 900px"><?php echo htmlspecialchars($blocky_php, ENT_QUOTES); ?></code></pre>
                <input type="hidden" id="phpBlocky" name="blocky_php_code" value="<?php echo $blocky_php; ?>"/>
            </div>
            <div id="tab-xml">
                <!--<textarea id="xmlTextarea" style="min-height: 900px; width: 100%;" value="<?php echo $blocky_xml; ?>"></textarea>-->
                <pre><code id="xmlTextarea" style="max-height: 900px"><?php echo $blocky_xml; ?></code></pre>
                <input type="hidden" id="xmlBlocky" name="blocky_xml_code" value="<?php echo $blocky_xml; ?>"/>
            </div>
            <div id="tab-triggers">
                Type d'action
                <select name="blocky_hook_type" id="hook_type">
                    <option value="" <?php echo $blocky_hook_type == '' ? 'selected' : ''; ?>>disabled</option>
                    <option value="action"<?php echo $blocky_hook_type == 'action' ? 'selected' : ''; ?>>action hook</option>
                    <option value="filter"<?php echo $blocky_hook_type == 'filter' ? 'selected' : ''; ?>>filter hook</option>
                    <option value="shortcode"<?php echo $blocky_hook_type == 'shortcode' ? 'selected' : ''; ?>>shortcode</option>
                </select>
                <br>
                Name :
                <input type="text" id="hookBlocky" name="blocky_hook" value="<?php echo $blocky_hook; ?>"/><br>
                <br>
                <a href="https://developer.wordpress.org/plugins/hooks/">More informations about hooks.</a><br>
                <br>
                Exemples :<br><br>
                <code>woocommerce_before_add_to_cart_button<br>
                    woocommerce_add_cart_item_data<br>
                    woocommerce_after_cart_table<br>
                    woocommerce_checkout_before_customer_details<br>
                    woocommerce_before_thankyou<br>
                    woocommerce_email_before_order_table<br>
                    woocommerce_order_details_before_order_table<br>
                    woocommerce_review_order_before_cart_contents<br>
                    woocommerce_checkout_create_order_line_item<br>
                    woocommerce_cart_calculate_fees<br>
                    woocommerce_checkout_shipping
                </code>
            </div>
            <script>
                jQuery(document).ready(function ($) {
                    $("#tabs").tabs();

                    var blocklyArea = document.getElementById('blocklyArea');
                    var blocklyDiv = document.getElementById('blocklyDiv');

                    //Blockly ressources
                    //https://developers.google.com/blockly
                    //https://blockly-demo.appspot.com/static/demos/blockfactory/index.html
                    //https://fustyles.github.io/webduino/myBlockly/index.html

                    var workspace = Blockly.inject(blocklyDiv,
                            {
                                toolbox: document.getElementById('toolbox'),
                                zoom:
                                        {controls: true,
                                            wheel: true,
                                            startScale: 1.0,
                                            maxScale: 3,
                                            minScale: 0.3,
                                            scaleSpeed: 1.2,
                                            pinch: true},
                                trashcan: true
                            });

                    var onresize = function (e) {
                        blocklyArea.style.display = 'block';
                        // Compute the absolute coordinates and dimensions of blocklyArea.
                        var element = blocklyArea;
                        var x = 0;
                        var y = 0;
                        do {
                            x += element.offsetLeft;
                            y += element.offsetTop;
                            element = element.offsetParent;
                        } while (element);
                        // Position blocklyDiv over blocklyArea.
                        blocklyDiv.style.left = x + 'px';
                        blocklyDiv.style.top = y + 'px';
                        blocklyDiv.style.width = blocklyArea.offsetWidth + 'px';
                        blocklyDiv.style.height = blocklyArea.offsetHeight + 'px';
                        Blockly.svgResize(workspace);
                        blocklyArea.style.display = 'none';
                    };
                    window.addEventListener('resize', onresize, false);
                    onresize();
                    Blockly.svgResize(workspace);

                    function load() {
                        try {
                            var xml = Blockly.Xml.textToDom(document.getElementById('xmlBlocky').value);
                            workspace.clear();
                            Blockly.Xml.domToWorkspace(xml, workspace);
                        } catch (e) {
                            console.log(e);
                        }
                    }
                    load();

                    // https://stackoverflow.com/a/4835406
                    var escapeHtml = function (text) {
                        var map = {
                            '&': '&amp;',
                            '<': '&lt;',
                            '>': '&gt;',
                            '"': '&quot;',
                            "'": '&#039;'
                        };

                        return text.replace(/[&<>"']/g, function (m) {
                            return map[m];
                        });
                    }

                    // https://stackoverflow.com/a/47317538
                    var prettifyXml = function (sourceXml)
                    {
                        var xmlDoc = new DOMParser().parseFromString(sourceXml, 'application/xml');
                        var xsltDoc = new DOMParser().parseFromString([
                            // describes how we want to modify the XML - indent everything
                            '<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform">',
                            '  <xsl:strip-space elements="*"/>',
                            '  <xsl:template match="para[content-style][not(text())]">', // change to just text() to strip space in text nodes
                            '    <xsl:value-of select="normalize-space(.)"/>',
                            '  </xsl:template>',
                            '  <xsl:template match="node()|@*">',
                            '    <xsl:copy><xsl:apply-templates select="node()|@*"/></xsl:copy>',
                            '  </xsl:template>',
                            '  <xsl:output indent="yes"/>',
                            '</xsl:stylesheet>',
                        ].join('\n'), 'application/xml');

                        var xsltProcessor = new XSLTProcessor();
                        xsltProcessor.importStylesheet(xsltDoc);
                        var resultDoc = xsltProcessor.transformToDocument(xmlDoc);
                        var resultXml = new XMLSerializer().serializeToString(resultDoc);
                        return resultXml;
                    };

                    function onUpdate(event) {

                        //PHP
                        var code = Blockly.PHP.workspaceToCode(workspace);
                        document.getElementById('codeTextarea').innerHTML = escapeHtml('<\?php\n' + code);
                        document.getElementById('phpBlocky').value = code;

                        //XML
                        var xml = Blockly.Xml.workspaceToDom(workspace);
                        var xml_text = Blockly.Xml.domToText(xml);
                        document.getElementById('xmlTextarea').innerHTML = escapeHtml(prettifyXml(xml_text));
                        document.getElementById('xmlBlocky').value = xml_text;

                        hljs.highlightAll();
                    }
                    workspace.addChangeListener(onUpdate);
                    onUpdate();
                });
            </script>
        </div>
        <?php
    }

    public function save_blocky_function_meta_boxes() {
        global $post;
        if ($post != null && get_post_type($post->ID) === 'blocky_function') {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return;
            }
            if (get_post_status($post->ID) === 'auto-draft') {
                return;
            }
            $php_code = $_POST["blocky_php_code"];
            $blocky_hook_type = $_POST["blocky_hook_type"];
            $blocky_hook = $_POST["blocky_hook"];

            //WARNING, php code saved to database
            update_post_meta($post->ID, "blocky_xml_code", htmlspecialchars($_POST["blocky_xml_code"]));
            update_post_meta($post->ID, "blocky_php_code", $php_code);
            update_post_meta($post->ID, "blocky_hook_type", $blocky_hook_type);
            update_post_meta($post->ID, "blocky_hook", $blocky_hook);

            //if need to write the file
//            $php_code = stripslashes($php_code);
//            file_put_contents(get_blockyprog_dir_path() . 'generated/' . $post->post_name . '.php', '<?php' . PHP_EOL . $php_code . PHP_EOL);
        }
    }

}

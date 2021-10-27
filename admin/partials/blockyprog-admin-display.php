<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/HoverEpic
 * @since      1.0.0
 *
 * @package    BlockyProg
 * @subpackage BlockyProg/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form action="options.php" method="POST">
        <?php
        
        ?>
        <div id="tabs">
            <ul>
                <li><a href="#tab-welcome">Welcome</a></li>
                <li><a href="#tab-options">Options</a></li>
            </ul>
            <div id="tab-welcome">
                <h2>Welcome</h2>
                <p>Thanks for using my plugin !</p><a href="https://developers.google.com/blockly" target="_blank" style="float: right"><img src="/wp-content/plugins/blockyprog/admin/img/logo_built_on.png"/></a>
                <p>Blockly is a library from Google for building beginner-friendly block-based programming languages.</p>
                <p>Blockly is the beginner way to programming languages.</p>
                <div style="clear: both"></div>
            </div>
            <div id="tab-options">
                <h2>Options</h2>
                <table class="form-table" role="presentation">
                    <?php
                    
                    ?>
                </table>
            </div>
            <script>
                jQuery(document).ready(function ($) {
                    $("#tabs").tabs();
                });
            </script>
        </div>
        <?php
        
        ?>
    </form>
</div>
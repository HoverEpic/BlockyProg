<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<xml xmlns="https://developers.google.com/blockly/xml" id="toolbox" style="display: none">

    <?php
    require 'logic.php';
    require 'loops.php';
    require 'maths.php';
    require 'lists.php';
    require 'print.php';
    ?>
    <sep></sep>
    <?php
    require 'variables.php';
    require 'functions.php';
    ?>
    <sep></sep>
    <?php
    require 'wordpress.php';
    ?>
    <sep></sep>
    <?php
    require 'woocommerce.php';
    ?>
    <sep></sep>
    <?php
    require 'libraries.php';
    ?>
    <category name="HTML" colour="#9fa55b">
            <block type="html_element_block"></block>
            <block type="html_element_block_a"></block>
    </category>
    <category name="PHP" colour="#9fa55b">
        <category name="Variables" colour="#9fa55b">
            <block type="variables_get2"></block>
            <block type="variable"></block>
            <block type="globale"></block>
        </category>

    </category>

</xml>
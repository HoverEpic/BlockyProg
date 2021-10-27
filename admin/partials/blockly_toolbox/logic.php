<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<category name="Logic" colour="%{BKY_LOGIC_HUE}">
    <category name="If" colour="%{BKY_LOGIC_HUE}">
        <block type="controls_if"></block>
        <block type="controls_if">
            <mutation else="1"></mutation>
        </block>
        <block type="controls_if">
            <mutation elseif="1" else="1"></mutation>
        </block>
    </category>
    <category name="Boolean" colour="%{BKY_LOGIC_HUE}">
        <block type="logic_compare"></block>
        <block type="logic_operation"></block>
        <block type="logic_negate"></block>
        <block type="logic_boolean"></block>
        <block type="logic_null"></block>
        <block type="logic_ternary"></block>
    </category>
</category>
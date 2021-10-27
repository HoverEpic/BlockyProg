<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<category name="Print" colour="%{BKY_TEXTS_HUE}">
    <block type="text">
        <field name="TEXT"></field>
    </block>
    <block type="text_print">
        <value name="TEXT">
        </value>
    </block>
    <block type="text_print">
        <value name="TEXT">
            <block type="text">
                <field name="TEXT"></field>
            </block>
        </value>
    </block>
    <block type="text_print">
        <value name="TEXT">
            <block type="math_number">
                <field name="NUM">100</field>
            </block>
        </value>
    </block>
    <block type="text_print">
        <value name="TEXT">
            <block type="text_multiline"></block>
        </value>
    </block>
    <block type="text_multiline"></block>
    <block type="var_dump"></block>
</category>
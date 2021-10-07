<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<category name="Math" colour="%{BKY_MATH_HUE}">
    <block type="math_number">
        <field name="NUM">123</field>
    </block>
    <block type="math_arithmetic"></block>
    <block type="math_single"></block>
    <block type="math_trig"></block>
    <block type="math_constant"></block>
    <block type="math_number_property"></block>
    <block type="math_round"></block>
    <block type="math_on_list"></block>
    <block type="math_modulo"></block>
    <block type="math_constrain">
        <value name="LOW">
            <block type="math_number">
                <field name="NUM">1</field>
            </block>
        </value>
        <value name="HIGH">
            <block type="math_number">
                <field name="NUM">100</field>
            </block>
        </value>
    </block>
    <block type="math_random_int">
        <value name="FROM">
            <block type="math_number">
                <field name="NUM">1</field>
            </block>
        </value>
        <value name="TO">
            <block type="math_number">
                <field name="NUM">100</field>
            </block>
        </value>
    </block>
    <block type="math_random_float"></block>
    <block type="math_atan2"></block>
</category>
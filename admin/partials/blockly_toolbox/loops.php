<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<category name="Loops" colour="%{BKY_LOOPS_HUE}">
    <block type="controls_repeat_ext">
        <value name="TIMES">
            <block type="math_number">
                <field name="NUM">10</field>
            </block>
        </value>
    </block>
    <block type="controls_whileUntil"></block>
    <block type="controls_for">
        <field name="VAR">i</field>
        <value name="FROM">
            <block type="math_number">
                <field name="NUM">1</field>
            </block>
        </value>
        <value name="TO">
            <block type="math_number">
                <field name="NUM">10</field>
            </block>
        </value>
        <value name="BY">
            <block type="math_number">
                <field name="NUM">1</field>
            </block>
        </value>
    </block>
    <block type="controls_forEach"></block>
    <block type="controls_flow_statements"></block>
</category>
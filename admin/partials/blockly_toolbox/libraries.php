<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<category name="Library">
    <category name="Randomize">
        <block type="procedures_defnoreturn">
            <mutation>
                <arg name="list"></arg>
            </mutation>
            <field name="NAME">randomize</field>
            <statement name="STACK">
                <block type="controls_for" inline="true">
                    <field name="VAR">x</field>
                    <value name="FROM">
                        <block type="math_number">
                            <field name="NUM">1</field>
                        </block>
                    </value>
                    <value name="TO">
                        <block type="lists_length" inline="false">
                            <value name="VALUE">
                                <block type="variables_get">
                                    <field name="VAR">list</field>
                                </block>
                            </value>
                        </block>
                    </value>
                    <value name="BY">
                        <block type="math_number">
                            <field name="NUM">1</field>
                        </block>
                    </value>
                    <statement name="DO">
                        <block type="variables_set" inline="false">
                            <field name="VAR">y</field>
                            <value name="VALUE">
                                <block type="math_random_int" inline="true">
                                    <value name="FROM">
                                        <block type="math_number">
                                            <field name="NUM">1</field>
                                        </block>
                                    </value>
                                    <value name="TO">
                                        <block type="lists_length" inline="false">
                                            <value name="VALUE">
                                                <block type="variables_get">
                                                    <field name="VAR">list</field>
                                                </block>
                                            </value>
                                        </block>
                                    </value>
                                </block>
                            </value>
                            <next>
                                <block type="variables_set" inline="false">
                                    <field name="VAR">temp</field>
                                    <value name="VALUE">
                                        <block type="lists_getIndex" inline="true">
                                            <mutation statement="false" at="true"></mutation>
                                            <field name="MODE">GET</field>
                                            <field name="WHERE">FROM_START</field>
                                            <value name="AT">
                                                <block type="variables_get">
                                                    <field name="VAR">y</field>
                                                </block>
                                            </value>
                                            <value name="VALUE">
                                                <block type="variables_get">
                                                    <field name="VAR">list</field>
                                                </block>
                                            </value>
                                        </block>
                                    </value>
                                    <next>
                                        <block type="lists_setIndex" inline="false">
                                            <value name="AT">
                                                <block type="variables_get">
                                                    <field name="VAR">y</field>
                                                </block>
                                            </value>
                                            <value name="LIST">
                                                <block type="variables_get">
                                                    <field name="VAR">list</field>
                                                </block>
                                            </value>
                                            <value name="TO">
                                                <block type="lists_getIndex" inline="true">
                                                    <mutation statement="false" at="true"></mutation>
                                                    <field name="MODE">GET</field>
                                                    <field name="WHERE">FROM_START</field>
                                                    <value name="AT">
                                                        <block type="variables_get">
                                                            <field name="VAR">x</field>
                                                        </block>
                                                    </value>
                                                    <value name="VALUE">
                                                        <block type="variables_get">
                                                            <field name="VAR">list</field>
                                                        </block>
                                                    </value>
                                                </block>
                                            </value>
                                            <next>
                                                <block type="lists_setIndex" inline="false">
                                                    <value name="AT">
                                                        <block type="variables_get">
                                                            <field name="VAR">x</field>
                                                        </block>
                                                    </value>
                                                    <value name="LIST">
                                                        <block type="variables_get">
                                                            <field name="VAR">list</field>
                                                        </block>
                                                    </value>
                                                    <value name="TO">
                                                        <block type="variables_get">
                                                            <field name="VAR">temp</field>
                                                        </block>
                                                    </value>
                                                </block>
                                            </next>
                                        </block>
                                    </next>
                                </block>
                            </next>
                        </block>
                    </statement>
                </block>
            </statement>
        </block>
    </category>
    <category name="Jabberwocky">
        <block type="text_print">
            <value name="TEXT">
                <block type="text">
                    <field name="TEXT">'Twas brillig, and the slithy toves</field>
                </block>
            </value>
            <next>
                <block type="text_print">
                    <value name="TEXT">
                        <block type="text">
                            <field name="TEXT">  Did gyre and gimble in the wabe:</field>
                        </block>
                    </value>
                    <next>
                        <block type="text_print">
                            <value name="TEXT">
                                <block type="text">
                                    <field name="TEXT">All mimsy were the borogroves,</field>
                                </block>
                            </value>
                            <next>
                                <block type="text_print">
                                    <value name="TEXT">
                                        <block type="text">
                                            <field name="TEXT">  And the mome raths outgrabe.</field>
                                        </block>
                                    </value>
                                </block>
                            </next>
                        </block>
                    </next>
                </block>
            </next>
        </block>
        <block type="text_print">
            <value name="TEXT">
                <block type="text">
                    <field name="TEXT">"Beware the Jabberwock, my son!</field>
                </block>
            </value>
            <next>
                <block type="text_print">
                    <value name="TEXT">
                        <block type="text">
                            <field name="TEXT">  The jaws that bite, the claws that catch!</field>
                        </block>
                    </value>
                    <next>
                        <block type="text_print">
                            <value name="TEXT">
                                <block type="text">
                                    <field name="TEXT">Beware the Jubjub bird, and shun</field>
                                </block>
                            </value>
                            <next>
                                <block type="text_print">
                                    <value name="TEXT">
                                        <block type="text">
                                            <field name="TEXT">  The frumious Bandersnatch!"</field>
                                        </block>
                                    </value>
                                </block>
                            </next>
                        </block>
                    </next>
                </block>
            </next>
        </block>
    </category>
</category>
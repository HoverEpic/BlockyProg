/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Multi lignes input
Blockly.PHP['text_multiline'] = function (block) {
    var text_field = block.getFieldValue('TEXT');
    var code = '\'' + text_field.replaceAll('\n', '<br>') + '\'';
    return [code, Blockly.PHP.ORDER_NONE];
};

Blockly.PHP['var_dump'] = function(block) {
  var value_name = Blockly.PHP.valueToCode(block, 'NAME', Blockly.PHP.ORDER_NONE);
  var code = 'var_dump(' + value_name + ');\n';
  return code;
};

Blockly.PHP['variables_get2'] = function(block) {
  var variable_var = Blockly.PHP.nameDB_.getName(block.getFieldValue('VAR'), Blockly.Variables.NAME_TYPE);
  var value_name = Blockly.PHP.valueToCode(block, 'NAME', Blockly.PHP.ORDER_NONE);
  var code = variable_var + value_name;
  return [code, Blockly.PHP.ORDER_NONE];
};

Blockly.PHP['variable'] = function (block) {
    var text_variable = block.getFieldValue('variable');
    var value_name = Blockly.PHP.valueToCode(block, 'NAME', Blockly.PHP.ORDER_NONE);
    var code = '$' + text_variable + value_name;
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['globale'] = function (block) {
    var text_variable = block.getFieldValue('globale');
    var value_name = Blockly.PHP.valueToCode(block, 'NAME', Blockly.PHP.ORDER_NONE);
    var code = 'global $' + text_variable + value_name + ';\n';
    return code;
};

Blockly.PHP['get_posts'] = function (block) {
    var code = 'get_posts()';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['the_post_1'] = function (block) {
    var code = '$post';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['the_post_2'] = function (block) {
    var value_post = Blockly.PHP.valueToCode(block, 'post', Blockly.PHP.ORDER_NONE);
    var code = '$post' + value_post;
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['get_post_field'] = function (block) {
    var dropdown_post_field = block.getFieldValue('post_field');
    var code = '->' + dropdown_post_field;
    return [code, Blockly.PHP.ORDER_NONE];
};

// post cat
Blockly.PHP['get_categories'] = function (block) {
    var code = 'get_categories()';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['get_cat_field'] = function (block) {
    var dropdown_post_field = block.getFieldValue('post_field');
    var code = '->' + dropdown_post_field;
    return [code, Blockly.PHP.ORDER_NONE];
};

// post tag
Blockly.PHP['get_tags'] = function (block) {
    var code = 'get_terms(\'post_tag\', array(\'hide_empty\' => false))';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['get_tag_field'] = function (block) {
    var dropdown_post_field = block.getFieldValue('post_field');
    var code = '->' + dropdown_post_field;
    return [code, Blockly.PHP.ORDER_NONE];
};

// HTML
Blockly.PHP['html_element_block'] = function (block) {
    var dropdown_html_element = block.getFieldValue('html_element');
    var text_class = block.getFieldValue('class');
    var text_id = block.getFieldValue('id');
    var text_style = block.getFieldValue('style');
    var statements_element = Blockly.PHP.statementToCode(block, 'element');
    var code = '?>\n<' + dropdown_html_element + ' class=\'' + text_class + '\' id=\'' + text_id + '\' style=\'' + text_style + '\'>\n<?php\n' + statements_element + '?>\n</' + dropdown_html_element + '>\n<?php\n';
    return code;
};
//Blockly.PHP['html_element_block2'] = function (block) {
//    var dropdown_html_element = block.getFieldValue('html_element');
//    var text_class = block.getFieldValue('class');
//    var text_id = block.getFieldValue('id');
//    var text_style = block.getFieldValue('style');
//    var statements_element = Blockly.PHP.statementToCode(block, 'element');
//    var code = '\'<' + dropdown_html_element + ' class=\'' + text_class + '\' id=\'' + text_id + '\' style=\'' + text_style + '\'>\n' + statements_element + '\n</' + dropdown_html_element + '>\'';
//    return [code, Blockly.PHP.ORDER_NONE];
//};

Blockly.PHP['html_element_block_a'] = function (block) {
    var text_class = block.getFieldValue('class');
    var text_id = block.getFieldValue('id');
    var text_style = block.getFieldValue('style');
    var value_link = Blockly.PHP.valueToCode(block, 'link', Blockly.PHP.ORDER_ATOMIC);
    var statements_element = Blockly.PHP.statementToCode(block, 'element');
    var code = '?>\n<a' + ' href=\'' + value_link + '\' class=\'' + text_class + '\' id=\'' + text_id + '\' style=\'' + text_style + '\'>\n<?php\n' + statements_element + '?>\n</a>\n<?php\n';
    return code;
};

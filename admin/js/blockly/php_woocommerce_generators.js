/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


Blockly.PHP['wc_get_products'] = function (block) {
    var code = 'wc_get_products(array())';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['wc_get_product'] = function (block) {
    var text_product_id = block.getFieldValue('product_id');
    var code = 'wc_get_product(' + text_product_id + ')';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['wc_get_product_from_id'] = function (block) {
    var text_product_id = block.getFieldValue('product_id');
    var code = 'wc_get_product(' + text_product_id + ')';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['get_product_field'] = function (block) {
    var dropdown_product_field = block.getFieldValue('product_field');
    var code = '->' + dropdown_product_field;
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['wc_get_product_cats'] = function (block) {
    var text_product_id = block.getFieldValue('product_id');
    var code = 'wp_get_post_terms(' + text_product_id + ', \'product_cat\', array(\'fields\' => \'ids\'))';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['wc_get_product_tags'] = function (block) {
    var text_product_id = block.getFieldValue('product_id');
    var code = 'wp_get_post_terms(' + text_product_id + ', \'product_tag\', array(\'fields\' => \'ids\'))';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['wc_get_product_quantity'] = function (block) {
    var text_product_id = block.getFieldValue('product_id');
    var code = 'wc_get_product(' + text_product_id + ')->get_stock_quantity()';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['wc_update_product_quantity'] = function (block) {
    var text_product_id = block.getFieldValue('product_id');
    var dropdown_opertion = block.getFieldValue('opertion');
    var value_count = Blockly.PHP.valueToCode(block, 'count', Blockly.PHP.ORDER_ATOMIC);
    var code = 'wc_update_product_stock(' + text_product_id + ', ' + value_count + ', \'' + dropdown_opertion + '\');\n';
    return code;
};
Blockly.PHP['wc_get_cart_items'] = function (block) {
    var code = 'WC()->cart->get_cart()';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['wc_cart_add_fee'] = function (block) {
    var value_text = Blockly.PHP.valueToCode(block, 'text', Blockly.PHP.ORDER_ATOMIC);
    var value_value = Blockly.PHP.valueToCode(block, 'value', Blockly.PHP.ORDER_NONE);
    var code = 'WC()->cart->add_fee(' + value_text + ', ' + value_value + ');\n';
    return code;
};
Blockly.PHP['wc_get_cart_item_field'] = function (block) {
    var dropdown_product_field = block.getFieldValue('product_field');
    var code = '' + dropdown_product_field;
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['wc_get_cart_weight'] = function (block) {
    var code = 'WC()->cart->get_cart_contents_weight()';
    return [code, Blockly.PHP.ORDER_NONE];
};
Blockly.PHP['wc_get_cart_contents_count'] = function (block) {
    var code = 'WC()->cart->get_cart_contents_count()';
    return [code, Blockly.PHP.ORDER_NONE];
};
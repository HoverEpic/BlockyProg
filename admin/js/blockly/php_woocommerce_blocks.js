/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Blockly.Blocks['wc_get_products'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get products");
        this.setOutput(true, "Array");
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['wc_get_product'] = {
    init: function () {
        this.appendValueInput("NAME")
                .setCheck(null)
                .appendField("get product")
                .appendField(new Blockly.FieldTextInput("product_id"), "product_id");
        this.setOutput(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['wc_get_product_from_id'] = {
    init: function () {
        this.appendValueInput("product_id")
                .setCheck("Number")
                .appendField("get product");
        this.setOutput(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['get_product_field'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get product field")
                .appendField(new Blockly.FieldDropdown([
                    ["get_id()", "get_id()"],
                    ["get_status()", "get_status()"],
                    ["get_price()", "get_price()"]
                ]), "product_field");
        this.setOutput(true, null);
        this.setColour(230);
        this.setTooltip("Get the product field");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['wc_get_product_cats'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get product cat")
                .appendField(new Blockly.FieldTextInput("product_id"), "product_id");
        this.setOutput(true, "Array");
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['wc_get_product_tags'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get product tags")
                .appendField(new Blockly.FieldTextInput("product_id"), "product_id");
        this.setOutput(true, "Array");
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['wc_get_product_quantity'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get product quantity")
                .appendField(new Blockly.FieldTextInput("product_id"), "product_id");
        this.setOutput(true, "Number");
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['wc_update_product_quantity'] = {
    init: function () {
        this.appendValueInput("count")
                .setCheck("Number")
                .appendField("update product quantity")
                .appendField(new Blockly.FieldTextInput("product_id"), "product_id")
                .appendField(new Blockly.FieldDropdown([
                    ["set", "OPTIONNAME"],
                    ["increase", "OPTIONNAME"],
                    ["decrease", "OPTIONNAME"]]),
                        "opertion");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['wc_get_cart_items'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get cart items");
        this.setOutput(true, "Array");
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['wc_get_cart_item_field'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get cart item field")
                .appendField(new Blockly.FieldDropdown([
                    ["ID", "['product_id']"],
                    ["quantity", "['quantity']"],
                    ["variation_id", "['variation_id']"],
                    ["weight", "['weight']"],
                    ["price", "['data']->get_price()"]
                ]), "product_field");
        this.setOutput(true, null);
        this.setColour(230);
        this.setTooltip("Get the cart item field");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['wc_cart_add_fee'] = {
    init: function () {
        this.appendValueInput("text")
                .setCheck("String")
                .appendField("cart add fee")
                .appendField("Message");
        this.appendValueInput("value")
                .setCheck("Number")
                .appendField("Value");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['wc_get_cart_weight'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get cart weight");
        this.setOutput(true, "Number");
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['wc_get_cart_contents_count'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get cart items count");
        this.setOutput(true, "Number");
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
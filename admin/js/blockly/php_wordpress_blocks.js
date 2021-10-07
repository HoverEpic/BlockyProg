/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Blockly.Blocks['text_multiline'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("multiline text input:")
                .appendField(new Blockly.FieldMultilineInput('default text\n with newline character'), 'TEXT');
        this.setOutput(true, null);
    }
};

Blockly.Blocks['var_dump'] = {
    init: function () {
        this.appendValueInput("NAME")
                .appendField("var_dump")
                .setCheck(null);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['variables_get2'] = {
    init: function () {
        this.appendDummyInput()
                .appendField(new Blockly.FieldVariable(null), "VAR");
        this.appendValueInput("NAME")
                .setCheck(null);
        this.setInputsInline(false);
        this.setOutput(true, null);
        this.setColour(330);
        this.setTooltip("Returns the value of this variable.");
        this.setHelpUrl("https://github.com/google/blockly/wiki/Variables#get");
    }
};

Blockly.Blocks['variable'] = {
    init: function () {
        this.appendValueInput("NAME")
                .appendField("$")
                .setCheck(null)
                .appendField(new Blockly.FieldTextInput("variable"), "variable");
        this.setOutput(true, null);
        this.setColour(330);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['globale'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("globale")
                .appendField(new Blockly.FieldTextInput("globale"), "globale");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(330);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['get_posts'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get posts");
        this.setInputsInline(true);
        this.setOutput(true, "Array");
        this.setColour(270);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['the_post_1'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("the post");
        this.setOutput(true, "wordpress post");
        this.setColour(230);
        this.setTooltip("Get the Post Object of the page");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['the_post_2'] = {
    init: function () {
        this.appendValueInput("post")
                .setCheck(null)
                .appendField("the post");
        this.setOutput(true, "wordpress post");
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['get_post_field'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get post field")
                .appendField(new Blockly.FieldDropdown([
                    ["ID", "ID"],
                    ["post_author", "post_author"],
                    ["post_date", "post_date"],
                    ["post_date_gmt", "post_date_gmt"],
                    ["post_content", "post_content"],
                    ["post_title", "post_title"],
                    ["post_excerpt", "post_excerpt"],
                    ["post_status", "post_status"],
                    ["comment_status", "comment_status"],
                    ["ping_status", "ping_status"],
                    ["post_password", "post_password"],
                    ["post_name", "post_name"],
                    ["to_ping", "to_ping"],
                    ["pinged", "pinged"],
                    ["post_modified", "post_modified"],
                    ["post_modified_gmt", "post_modified_gmt"],
                    ["post_content_filtered", "post_content_filtered"],
                    ["post_parent", "post_parent"],
                    ["guid", "guid"],
                    ["menu_order", "menu_order"],
                    ["post_type", "post_type"],
                    ["post_mime_type", "post_mime_type"],
                    ["comment_count", "comment_count"],
                    ["filter", "filter"]
                ]), "post_field");
        this.setOutput(true, null);
        this.setColour(230);
        this.setTooltip("Get the post field");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['get_categories'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get categories");
        this.setInputsInline(true);
        this.setOutput(true, "Array");
        this.setColour(270);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['get_cat_field'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get cat field")
                .appendField(new Blockly.FieldDropdown([
                    ["term_id", "term_id"],
                    ["name", "name"],
                    ["slug", "post_date"],
                    ["term_group", "post_date_gmt"],
                    ["term_taxonomy_id", "post_content"],
                    ["taxonomy", "post_title"],
                    ["description", "post_excerpt"],
                    ["parent", "post_status"],
                    ["count", "comment_status"],
                    ["filter", "ping_status"],
                    ["meta", "post_password"]
                ]), "post_field");
        this.setOutput(true, null);
        this.setColour(230);
        this.setTooltip("Get the post cat field");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['get_tags'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get tags");
        this.setInputsInline(true);
        this.setOutput(true, "Array");
        this.setColour(270);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
Blockly.Blocks['get_tag_field'] = {
    init: function () {
        this.appendDummyInput()
                .appendField("get tag field")
                .appendField(new Blockly.FieldDropdown([
                    ["term_id", "term_id"],
                    ["name", "name"],
                    ["slug", "post_date"],
                    ["term_group", "post_date_gmt"],
                    ["term_taxonomy_id", "post_content"],
                    ["taxonomy", "post_title"],
                    ["description", "post_excerpt"],
                    ["parent", "post_status"],
                    ["count", "comment_status"],
                    ["filter", "ping_status"],
                    ["meta", "post_password"]
                ]), "post_field");
        this.setOutput(true, null);
        this.setColour(230);
        this.setTooltip("Get the post tag field");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['html_element_block'] = {
    init: function () {
        this.appendStatementInput("element")
                .setCheck(null)
                .appendField("HTML")
                .appendField(new Blockly.FieldDropdown([["div", "div"], ["span", "span"], ["p", "p"], ["h1", "h1"], ["h2", "h2"], ["h3", "h3"], ["h4", "h4"], ["h5", "h5"], ["h6", "h6"]]), "html_element")
                .appendField("class")
                .appendField(new Blockly.FieldTextInput(""), "class")
                .appendField("id")
                .appendField(new Blockly.FieldTextInput(""), "id");
        this.appendDummyInput()
                .appendField("style")
                .appendField(new Blockly.FieldMultilineInput(''), "style");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};
//To add a button to the wordpress editor copy the button and button functionality code. Edit all of the fields to match your button. Then add it to the array_push in the main plugin file.

(function() {
    tinymce.create("tinymce.plugins.shortcode_plugin", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //-----------------------------------columns button
        ed.addButton("graphw_button", {
            title:'graphw_toolbox',
            text:'GW Toolbox',
            type:'menubutton',
            autofocus: false,
            menu: [
            // COLUMNS
                {
                text : 'Columns',
                onselect : function() {
                    ed.windowManager.open({
                        title: 'Columns',
                        body: [
                            {type: 'listbox', //COLUMNS
                            values: [
                                { text: 'One', value: 'one' },
                                { text: 'Two', value: 'two' },
                                { text: 'Three', value: 'three' },
                                { text: 'Four', value: 'four' },
                                { text: 'Five', value: 'five' },
                                { text: 'Six', value: 'six' },
                                { text: 'Seven', value: 'seven' },
                                { text: 'Eight', value: 'eight' },
                                { text: 'Nine', value: 'nine' },
                                { text: 'Ten', value: 'ten' },
                                { text: 'Eleven', value: 'eleven' },
                                { text: 'Twelve', value: 'twelve' },
                            ], name: 'columns', label: 'Columns'},
                            {type: 'listbox',  //OFFSET
                            values: [
                                { text: 'None', value: 'none' },
                                { text: 'One', value: 'one' },
                                { text: 'Two', value: 'two' },
                                { text: 'Three', value: 'three' },
                                { text: 'Four', value: 'four' },
                                { text: 'Five', value: 'five' },
                                { text: 'Six', value: 'six' },
                                { text: 'Seven', value: 'seven' },
                                { text: 'Eight', value: 'eight' },
                                { text: 'Nine', value: 'nine' },
                                { text: 'Ten', value: 'ten' },
                                { text: 'Eleven', value: 'eleven' },
                                { text: 'Twelve', value: 'twelve' },
                            ], name: 'offset', label: 'Offset by'},
                            {type: 'textbox', name: 'class', label: 'Class'}
                        ],
                        onsubmit: function(e) {    
                            var selected_text = ed.selection.getContent();

                            //if offset doesn't exist don't use it
                            e.data.offset == 'none' ? col_offset = '' : col_offset = ' offset="'+e.data.offset+'"';

                             //if class doesn't exist don't use it
                            e.data.class == '' ? col_class = '' : col_class = ' class="'+e.data.class+'"';

                            var return_text = '[col columns="'+e.data.columns+'"'+col_offset+col_class+']' + selected_text + "[/col]";

                            ed.execCommand("mceInsertContent", 0, return_text);
                        }
                    });
                },
            },
            {
                text : 'Row',
                onselect : function() {
                    ed.windowManager.open({
                        title: 'Row',
                        body: [
                            {type: 'textbox', name: 'class', label: 'Class'}
                        ],
                        onsubmit: function(e) {    
                            var selected_text = ed.selection.getContent();
                            var selected_text = ed.selection.getContent();
                            //if class doesn't exist don't use it
                            e.data.class == '' ? row_class = '' : row_class = ' class="'+e.data.class+'"';
                            var return_text = '[row'+row_class+']' + selected_text + "[/row]";
                            ed.execCommand("mceInsertContent", 0, return_text);
                        }
                    });
                }
            },
            {
                text : 'Container',
                onselect : function() {
                    ed.windowManager.open({
                        title: 'Container',
                        body: [
                            {type: 'textbox', name: 'class', label: 'Class'}
                        ],
                        onsubmit: function(e) {    
                            var selected_text = ed.selection.getContent();
                            var selected_text = ed.selection.getContent();
                            e.data.class == '' ? container_class = '' : container_class = ' class="'+e.data.class+'"';
                            var return_text = '[container'+container_class+']' + selected_text + "[/container]";
                            ed.execCommand("mceInsertContent", 0, return_text);
                        }
                    });
                }
            },
            {
                text : 'Div',
                onselect : function() {
                    ed.windowManager.open({
                        title: 'Div',
                        body: [
                            {type: 'textbox', name: 'class', label: 'Class'}
                        ],
                        onsubmit: function(e) {    
                            var selected_text = ed.selection.getContent();
                            var selected_text = ed.selection.getContent();
                            e.data.class == '' ? container_class = '' : container_class = ' class="'+e.data.class+'"';
                            var return_text = '[div'+container_class+']' + selected_text + "[/div]";
                            ed.execCommand("mceInsertContent", 0, return_text);
                        }
                    });
                }
            },
            {
                text : 'Section',
                onselect : function() {
                    ed.windowManager.open({
                        title: 'Section',
                        body: [
                            {type: 'textbox', name: 'class', label: 'Class'}
                        ],
                        onsubmit: function(e) {    
                            var selected_text = ed.selection.getContent();
                            var selected_text = ed.selection.getContent();
                            e.data.class == '' ? section_class = '' : section_class = ' class="'+e.data.class+'"';
                            var return_text = '[section'+section_class+']' + selected_text + "[/section]";
                            ed.execCommand("mceInsertContent", 0, return_text);
                        }
                    });
                }
            },

            {
                text : 'Accordion Container',
                onselect : function() {
                    ed.windowManager.open({
                        title: 'Accordion Container',
                        body: [
                            {type: 'textbox', name: 'class', label: 'Class'}
                        ],
                        onsubmit: function(e) {    
                            var selected_text = ed.selection.getContent();
                            var selected_text = ed.selection.getContent();
                            e.data.class == '' ? acc_container_class = '' : acc_container_class = ' class="'+e.data.class+'"';
                            var return_text = '[acc-container'+acc_container_class+']' + selected_text + "[/acc-container]";
                            ed.execCommand("mceInsertContent", 0, return_text);
                        }
                    });
                }
            },
            {
                text : 'Accordion Title',
                onselect : function() {
                    ed.windowManager.open({
                        title: 'Accordion Title',
                        body: [
                            {type: 'textbox', name: 'class', label: 'Class'}
                        ],
                        onsubmit: function(e) {    
                            var selected_text = ed.selection.getContent();
                            var selected_text = ed.selection.getContent();
                            e.data.class == '' ? acc_title_class = '' : acc_title_class = ' class="'+e.data.class+'"';
                            var return_text = '[acc-title'+acc_title_class+']' + selected_text + "[/acc-title]";
                            ed.execCommand("mceInsertContent", 0, return_text);
                        }
                    });
                }
            },
            {
                text : 'Accordion Content',
                onselect : function() {
                    ed.windowManager.open({
                        title: 'Accordion Content',
                        body: [
                            {type: 'textbox', name: 'class', label: 'Class'}
                        ],
                        onsubmit: function(e) {    
                            var selected_text = ed.selection.getContent();
                            var selected_text = ed.selection.getContent();
                            e.data.class == '' ? acc_content_class = '' : acc_content_class = ' class="'+e.data.class+'"';
                            var return_text = '[acc-content'+acc_content_class+']' + selected_text + "[/acc-content]";
                            ed.execCommand("mceInsertContent", 0, return_text);
                        }
                    });
                }
            },
        ]
        });
            

            // BUTTON WITHOUT POPUP
            // //-----------------------------------Accordian Title button   
            // ed.addButton("acc_content_button", {
            //     title : "Accordian_Content",
            //     cmd : "accordian_content_command",
            //     text : 'Accordian Content'
            // });

            // //-----------------------------------Accordian Title functionality
            // ed.addCommand("accordian_content_command", function() {
            //     var selected_text = ed.selection.getContent();
            //     var return_text = '[acc-content class=""]' + selected_text + "[/acc-content]";
            //     ed.execCommand("mceInsertContent", 0, return_text);
            // });

        },

        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add("shortcode_plugin", tinymce.plugins.shortcode_plugin);
})();
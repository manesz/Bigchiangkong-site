tinymce.PluginManager.add('gt_shortcodes', function(ed, url) {

    // Add a button that opens a window
    ed.addButton('gt_shortcodes_button', {
        text: 'GT Shortcodes',
        type: 'menubutton',
        icon: 'gt_shortcodes_icon',
        menu: [
            {
                text: 'Columns',
                menu: [
                    {
                        text: 'One Half First',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[one_half_first]Some dummy content here[/one_half_first]');
                        }
                    },
                    {
                        text: 'One Half Last',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[one_half_last]Some dummy content here[/one_half_last]');
                        }
                    },
                    {
                        text: 'One Third First',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[one_third_first]Some dummy content here[/one_third_first]');
                        }
                    },
                    {
                        text: 'One Third',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[one_third]Some dummy content here[/one_third]');
                        }
                    },
                    {
                        text: 'One Third Last',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[one_third_last]Some dummy content here[/one_third_last]');
                        }
                    },
                    {
                        text: 'One Fourth First',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[one_fourth_first]Some dummy content here[/one_fourth_first]');
                        }
                    },
                    {
                        text: 'One Fourth',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[one_fourth]Some dummy content here[/one_fourth]');
                        }
                    },
                    {
                        text: 'One Fourth Last',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[one_fourth_last]Some dummy content here[/one_fourth_last]');
                        }
                    },
                ]
            },
            {
                text: 'Elements',
                menu: [
                    {
                        text: 'Pricing Table',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[pricing_table]<br />[pricing column="4" class="" icon="fa-video-camera" title="Pricing #1" price="$9.99" per="per month" button_url="http://yoursite.com/sign-up-page" button_text="Sign Up Now"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br />[pricing column="4" class="" icon="fa-video-camera" title="Pricing #1" price="$9.99" per="per month" button_url="http://yoursite.com/sign-up-page" button_text="Sign Up Now"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br />[pricing column="4" class="" icon="fa-video-camera" title="Pricing #1" price="$9.99" per="per month" button_url="http://yoursite.com/sign-up-page" button_text="Sign Up Now"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br />[pricing column="4" class="" icon="fa-video-camera" title="Pricing #1" price="$9.99" per="per month" button_url="http://yoursite.com/sign-up-page" button_text="Sign Up Now"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br />[/pricing_table]');
                        }
                    },
                    {
                        text: 'Dropcap',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[dropcap][/dropcap]');
                        }
                    },
                    {
                        text: 'Blockquote',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[blockquote cite="John Doe"]Some dummy content here[/blockquote]');
                        }
                    },
                    {
                        text: 'Styled Paragraph',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[styled_paragraph]Some dummy content here[/styled_paragraph]');
                        }
                    },
                ]
            },
            {
                text: 'jQuery',
                menu: [
                    {
                        text: 'Accordion',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[accordion]<br />[accordion_section title="Section #1"]Some dummy content here[/accordion_section]<br />[accordion_section title="Section #2"]Some dummy content here[/accordion_section]<br />[/accordion]');
                        }
                    },
                    {
                        text: 'Tabs',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[tabgroup]<br />[tab title="Tab One" id="tab1"]Some dummy content here[/tab]<br />[tab title="Tab Two" id="tab2"]Some dummy content here[/tab]<br />[/tabgroup]');
                        }
                    },
                    {
                        text: 'Skillbar',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[skillbar title="A nice skillbar" percentage="50" color="#333" show_percent="false"]');
                        }
                    },
                    {
                        text: 'Pie Chart',
                        onclick: function(){
                            tinyMCE.activeEditor.selection.setContent('[piechart]<br />[piechart_inner percent="50" title="Piechart title"][/piechart_inner]<br />[/piechart]');
                        }
                    },
                ]
            }
        ]
    });
});


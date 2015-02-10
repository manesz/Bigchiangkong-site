(function() {
	tinymce.create('tinymce.plugins.gtShortcodeMce', {
		init : function(ed, url){
			tinymce.plugins.gtShortcodeMce.theurl = url;
		},
		createControl : function(btn, e) {
			if ( btn == "gt_shortcodes_button" ) {
				var a = this;	
				var btn = e.createSplitButton('gt_button', {
	                title: "Insert Shortcode",
					image: tinymce.plugins.gtShortcodeMce.theurl +"/images/gt_shortcodes_icon.png",
					icons: false,
	            });
	            btn.onRenderMenu.add(function (c, b) {
					
					b.add({title : 'GT Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
					
					// Columns
					c = b.addMenu({title:"Columns"});
					
						a.render( c, "One Half First", "halfFirst" );
						a.render( c, "One Half Last", "halfLast" );
						a.render( c, "One Third First", "thirdFirst" );
						a.render( c, "One Third", "third" );
						a.render( c, "One Third Last", "thirdLast" );
						a.render( c, "One Fourth First", "fourthFirst" );
						a.render( c, "One Fourth", "fourth" );
						a.render( c, "One Fourth Last", "fourthLast" );
					
					b.addSeparator();
					
					// Elements
					c = b.addMenu({title:"Elements"});
									
						a.render( c, "Pricing Table", "pricingtable" );
						a.render( c, "Dropcap", "dropcap" );
						a.render( c, "Blockquote", "blockquote" );
						a.render( c, "Styled Paragraph", "styledParagraph" );
					
					b.addSeparator();
					
					// jQuery
					c = b.addMenu({title:"jQuery"});
					
						a.render( c, "Accordion", "accordion" );
						a.render( c, "Tabs", "tabs" );
						a.render( c, "Skillbar", "skillbar" );
						a.render( c, "Pie Chart", "piechart" );
					
				});
	            
	          return btn;
			}
			return null;               
		},
		render : function(ed, title, id) {
			ed.add({
				title: title,
				onclick: function () {
				
					// Columns
					if(id == "halfFirst") {
						tinyMCE.activeEditor.selection.setContent('[one_half_first]Some dummy content here[/one_half_first]');
					}
					if(id == "halfLast") {
						tinyMCE.activeEditor.selection.setContent('[one_half_last]Some dummy content here[/one_half_last]');
					}
					if(id == "thirdFirst") {
						tinyMCE.activeEditor.selection.setContent('[one_third_first]Some dummy content here[/one_third_first]');
					}
					if(id == "third") {
						tinyMCE.activeEditor.selection.setContent('[one_third]Some dummy content here[/one_third]');
					}
					if(id == "thirdLast") {
						tinyMCE.activeEditor.selection.setContent('[one_third_last]Some dummy content here[/one_third_last]');
					}
					if(id == "fourthFirst") {
						tinyMCE.activeEditor.selection.setContent('[one_fourth_first]Some dummy content here[/one_fourth_first]');
					}
					if(id == "fourth") {
						tinyMCE.activeEditor.selection.setContent('[one_fourth]Some dummy content here[/one_fourth]');
					}
					if(id == "fourthLast") {
						tinyMCE.activeEditor.selection.setContent('[one_fourth_last]Some dummy content here[/one_fourth_last]');
					}
					
					// Skillbar
					if(id == "skillbar") {
						tinyMCE.activeEditor.selection.setContent('[skillbar title="A nice skillbar" percentage="50" color="#333" show_percent="false"]');
					}

					// Accordion
					if(id == "accordion") {
						tinyMCE.activeEditor.selection.setContent('[accordion]<br />[accordion_section title="Section #1"]Some dummy content here[/accordion_section]<br />[accordion_section title="Section #2"]Some dummy content here[/accordion_section]<br />[/accordion]');
					}
					
					// Pie Chart
					if(id == "piechart") {
						tinyMCE.activeEditor.selection.setContent('[piechart]<br />[piechart_inner percent="50" title="Piechart title"][/piechart_inner]<br />[/piechart]');
					}
					
					// Blockquote
					if(id == "blockquote") {
						tinyMCE.activeEditor.selection.setContent('[blockquote cite="John Doe"]Some dummy content here[/blockquote]');
					}
					
					// Styled Paragraph
					if(id == "styledParagraph") {
						tinyMCE.activeEditor.selection.setContent('[styled_paragraph]Some dummy content here[/styled_paragraph]');
					}
					
					// Dropcap
					if(id == "dropcap") {
						tinyMCE.activeEditor.selection.setContent('[dropcap][/dropcap]');
					}
					
					// Tabs
					if(id == "tabs") {
						tinyMCE.activeEditor.selection.setContent('[tabgroup]<br />[tab title="Tab One" id="tab1"]Some dummy content here[/tab]<br />[tab title="Tab Two" id="tab2"]Some dummy content here[/tab]<br />[/tabgroup]');
					}

					// Pricing
					if(id == "pricingtable") {
						tinyMCE.activeEditor.selection.setContent('[pricing_table]<br />[pricing column="4" class="" icon="fa-video-camera" title="Pricing #1" price="$9.99" per="per month" button_url="http://yoursite.com/sign-up-page" button_text="Sign Up Now"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br />[pricing column="4" class="" icon="fa-video-camera" title="Pricing #1" price="$9.99" per="per month" button_url="http://yoursite.com/sign-up-page" button_text="Sign Up Now"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br />[pricing column="4" class="" icon="fa-video-camera" title="Pricing #1" price="$9.99" per="per month" button_url="http://yoursite.com/sign-up-page" button_text="Sign Up Now"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br />[pricing column="4" class="" icon="fa-video-camera" title="Pricing #1" price="$9.99" per="per month" button_url="http://yoursite.com/sign-up-page" button_text="Sign Up Now"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br />[/pricing_table]');
					}
										
					return false;
				}
			})
		}
	
	});
	tinymce.PluginManager.add("gt_shortcodes", tinymce.plugins.gtShortcodeMce);
})();
(function ()
{
	// create rnrShortcodes plugin
	tinymce.create("tinymce.plugins.rnrShortcodes",
	{
		init: function ( ed, url )
		{

		},
		createControl: function ( btn, e )
		{
			if ( btn == "rnr_button" )
			{	
				var a = this;

				var btn = e.createSplitButton('rnr_button', {
                    title: "Insert RockNRolla Shortcode",
					image: RnrShortcodes.plugin_folder +"/images/icon.png",
					icons: false
                });

                btn.onRenderMenu.add(function (c, b)
				{		

					a.addImmediate( b, "Accordions", "[accordion]<br>\
										[accordion_item title=\"First Accordion Title\"]Accordion Content Here[/accordion_item]<br>\
										[accordion_item title=\"Second Accordion Title\"]Accordion Content Here[/accordion_item]<br>\
										[accordion_item title=\"Third Accordion Title\"]Accordion Content Here[/accordion_item]<br>\
										[/accordion]" );

					a.addImmediate( b, "Buttons", "[button title=\"Button Text\" link_url=\"http://\"]" );

					c = b.addMenu({
							title: "Boxes"
					});

					a.addImmediate( c, "Alert Box", "[alert_box message=\"YOUR MESSAGE HERE\" type=\"notice,warning,success,error,info\"]" );					
					a.addImmediate( c, "Callout Box", "[callout title=\"CALLOUT TITLE HERE\" btn_title=\"BUTTON TITLE HERE\" btn_url=\"BUTTON URL LINK HERE(Ex:http://)\"]YOUR CALLOUT DESCRIPTION COMES HERE![/callout]" );					
					//update
					a.addImmediate( b, "Clents Box", "[clients_box]<br>\
										[client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
										[client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
										[client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
										[client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
										[client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
										[client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
										[client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
										[client logo=\"CLIENT LOGO LINK HERE\" url=\"#\" title=\"Client Title Here\"]<br>\
										[/clients_box]" );
					a.addImmediate( c, "Contact Box", "[contact_box email=\"emailaddress@site.com\" telephone=\"123-456-7890\" address=\"Envato, Melbourner, AU\"]" );			
					a.addImmediate( c, "Full Width Box","[full_width_color bg_color=\"#EFEFEF\" color=\"#333333\"]Your Content Here[/full_width_color]" );
					a.addImmediate( c, "Icon Box","[icon_box icon=\"icon-class or Icon image URL\" title=\"Service Box Title Here\" icon_type=\"image or icon-font\"]Give icon={icon class name from Font Awesome List} for icon_type={icon-font} and icon={htttp:// iconimageurl} for icon_type={image}[/icon_box]" );
					a.addImmediate( c, "Milestone Box","[milestone_box count=\"500\" title=\"Pizzas\"]" );			
					a.addImmediate( c, "Parallax Quote","[parallax_quote author=\"John Doe\"]Your Quote Here[/parallax_quote]" );
					a.addImmediate( c, "Service Box","[service_box icon=\"icon-class\" title=\"Service Box Title Here\"]Give icon={icon class name from Font Awesome List}[/service_box]" );
					a.addImmediate( c, "Tweet Box","[parallax_twitter count=\"5\" title=\"Follow us on Twitter\"]" );
					
					c = b.addMenu({
							title: "Columns"
					});

					//a.addImmediate( b, "Preformatted Code","pre" );
					a.addImmediate( c, "One Half", "[one_half]Your Content Here[/one_half]" );
					a.addImmediate( c, "One Half Last", "[one_half_last]Your Content Here[/one_half_last]" );
					a.addImmediate( c, "One Third", "[one_third]Your Content Here[/one_third]" );
					a.addImmediate( c, "One Third Last", "[one_third_last]Your Content Here[/one_third_last]" );
					a.addImmediate( c, "One Fourth", "[one_fourth]Your Content Here[/one_fourth]" );
					a.addImmediate( c, "One Fourth Last", "[one_fourth_last]Your Content Here[/one_fourth_last]" );
					a.addImmediate( c, "One Fifth", "[one_fifth]Your Content Here[/one_fifth]" );
					a.addImmediate( c, "One Fifth Last", "[one_fifth_last]Your Content Here[/one_fifth_last]" );
					a.addImmediate( c, "One Sixth", "[one_sixth]Your Content Here[/one_sixth]" );
					a.addImmediate( c, "One Sixth Last", "[one_sixth_last]Your Content Here[/one_sixth_last]" );
					a.addImmediate( c, "Two Third", "[two_third]Your Content Here[/two_third]" );
					a.addImmediate( c, "Two Third Last", "[two_third_last]Your Content Here[/two_third_last]" );
					a.addImmediate( c, "Two Fifth", "[two_fifth]Your Content Here[/two_fifth]" );
					a.addImmediate( c, "Two Fifth Last", "[two_fifth_last]Your Content Here[/two_fifth_last]" );
					a.addImmediate( c, "Three Fourth", "[three_fourth]Your Content Here[/three_fourth]" );
					a.addImmediate( c, "Three Fourth Last", "[three_fourth_last]Your Content Here[/three_fourth_last]" );					
					a.addImmediate( c, "Three Fifth", "[three_fifth]Your Content Here[/three_fifth]" );
					a.addImmediate( c, "Three Fifth Last", "[three_fifth_last]Your Content Here[/three_fifth_last]" );				
					a.addImmediate( c, "Four Fifth", "[four_fifth]Your Content Here[/four_fifth]" );
					a.addImmediate( c, "Four Fifth Last", "[four_fifth_last]Your Content Here[/four_fifth_last]" );					
					a.addImmediate( c, "Five Sixth", "[five_sixth]Your Content Here[/five_sixth]" );
					a.addImmediate( c, "Five Sixth Last", "[five_sixth_last]Your Content Here[/five_sixth_last]" );			
					
					a.addImmediate( b, "Google Map","[map url=\"GOOGLEMAP_URL_HERE\" width=\"100%\" height=\"330px\"]" );
					
					c = b.addMenu({
							title: "Home Variations"
					});					

					a.addImmediate( c, "Home Circular Quote","[home_circle_callout]<br>\
						[home_circle_callout_line]DESIGNERS ARE MEANT TO BE LOVED,[/home_circle_callout_line]<br>\
						[home_circle_callout_line highlight=\"true\"]NOT TO BE UNDERSTOOD[/home_circle_callout_line]<br>\
						[home_circle_callout_line]AND THEY ARE THE BEST[/home_circle_callout_line]<br>\
						[home_circle_callout_line]THAT'S WHY![/home_circle_callout_line]<br>\
						[/home_circle_callout]" );

					a.addImmediate( c, "Home Quote","[home_callout]<br>\
						[home_callout_line]Creativity always bleeds[/home_callout_line]<br>\
						[home_callout_line bg_highlight=\"true\"]from the touch[/home_callout_line]<br>\
						[home_callout_line]of inspiration[/home_callout_line]<br>\
						[/home_callout]" );

					a.addImmediate( c, "Home Text Slider","[home_textslides]<br>\
						[textslide]WE ARE [highlight]CRAZY[/highlight] CODERS[/textslide]<br>\
						[textslide]WE [highlight]LOVE[/highlight] PIZZAS[/textslide]<br>\
						[textslide]WE ARE [highlight]CREATIVE[/highlight] NERDS[/textslide]<br>\
						[/home_textslides]" );


					c = b.addMenu({
							title: "Helpers"
					});

					a.addImmediate( c, "Break","[br]" );
					a.addImmediate( c, "Center","[center]" );
					a.addImmediate( c, "Clear","[clear]" );	
					a.addImmediate( c, "Highlight","[highlight]" );
					a.addImmediate( c, "Space","[space]" );					
								
					a.addImmediate( b, "Social Sharing","[social icon=\"twitter\" url=\"#\" target=\"_self or _blank\"]" );

					a.addImmediate( b, "Tabs", "[tabgroup]<br>\
										[tab title=\"Tab Title Here\"]Tabs Content Here[/tab]<br>\
										[tab icon=\"icon-home(Check Font awesomes for Icon Class Names)\"]Tabs Content Here[/tab]<br>\
										[tab title=\"Tab Title Here\" icon=\"icon-home(Check Font awesomes for Icon Class Names)\"]Tabs Content Here[/tab]<br>\
										[/tabgroup]" );
					
					a.addImmediate( b, "Testimonial Slider","[testimonial_slider_box]<br>\
										[testimonial_slide author=\"Client Name Here\"]Testimonial Here[/testimonial_slide]<br>\
										[testimonial_slide author=\"Client Name Here\"]Testimonial Here[/testimonial_slide]<br>\
										[testimonial_slide author=\"Client Name Here\"]Testimonial Here[/testimonial_slide]<br>\
										[testimonial_slide author=\"Client Name Here\"]Testimonial Here[/testimonial_slide]<br>\
										[testimonial_slide author=\"Client Name Here\"]Testimonial Here[/testimonial_slide]<br>\
										[testimonial_slide author=\"Client Name Here\"]Testimonial Here[/testimonial_slide]<br>\
										[testimonial_slide author=\"Client Name Here\"]Testimonial Here[/testimonial_slide]<br>\
										[testimonial_slide author=\"Client Name Here\"]Testimonial Here[/testimonial_slide]<br>\
										[/testimonial_slider_box]" );

					a.addImmediate( b, "Team Member","[team_member img=\"IMAGE_LINK_HERE\" name=\"MEMBER_NAME\" role=\"MEMBER_ROLE\" viewprofile=\"yes or no\" size=\"one or two or three or four\"]TEAM MEMBER DESCRIPTION HERE[/team_member]" );	

					a.addImmediate( b, "Toggles", "[toggle title=\"First Toggle Title\" open=\"0\"]YOUR TOGGLE CONTENT HERE![/toggle]<br>\
									[toggle title=\"Second Toggle Title(Open by Default)\" open=\"1\"]YOUR TOGGLE CONTENT HERE![/toggle]<br>\
									[toggle title=\"Third Toggle Title\" open=\"0\"]YOUR TOGGLE CONTENT HERE![/toggle]" );	
					
					c = b.addMenu({
                        title: "TypoElements"
                    });	

					//a.addImmediate( c, "Custom Typography","typography" );					
                  
                    a.addImmediate( c, "Fancy Header","[fancy_header type=\"1 or 2 or 3\" subtitle=\"for type=2\"]Your Fancy Header Title Here![/fancy_header]" );

					a.addImmediate( c, "Pullquote","[pullquote align=\"left or right\"]Your Pullquote Text Here![/pullquote]" );

					a.addImmediate( c, "BlockQuote","[blockquote]Your Blockquote Text Here![/blockquote]" );
					
					a.addImmediate( c, "Skill Bar","[skill_bar percentage=\"50\" title=\"Web Design\"]<br>\
										[skill_bar percentage=\"30\" title=\"UX Design\"]<br>\
										[skill_bar percentage=\"80\" title=\"Brand Package\"]<br>\
										[skill_bar percentage=\"70\" title=\"WordPress\"]" );	
				
					a.addImmediate( b, "Video","[video type=\"youtube,vimeo\" id=\"YOUTUBE_ID or VIMEO_ID here\" autoplay=\"yes,no\"]");

				});
                
                return btn;
			}
			
			return null;
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'RockNRolla Shortcodes',
				author: 'RockNRolla',
				authorurl: 'http://themeforest.net/user/RockNRollaDesigns/',
				infourl: 'http://wiki.moxiecode.com/',
				version: "1.0"
			}
		}
	});
	
	// add rnrShortcodes plugin
	tinymce.PluginManager.add("rnrShortcodes", tinymce.plugins.rnrShortcodes);
})();
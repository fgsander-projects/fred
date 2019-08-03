<?php
return $change_log = '
24 May 2019 - Version 2.2.1
	FIXED! Metaboxes not showing for post types
	FIXED! Theme Options export/import not working
	FIXED! Some styling issues

23 May 2019 - Version 2.2
	NEW! Categories option for testimonials
	UPDATED! Vestige Core plugin
	FIXED! Some styling bugs

15 November 2018 - Version 2.1
	UPDATED! WPML Config file
	FIXED! A bug with functions.php when website is not using Woocommerce

25 September 2018 - Version 2.0
	NEW! Vestige Dashboard to manage theme options, plugins, updates, demo importer all in one place
	NEW! Improved demo importer one click interface
	NEW! GDPR Framework plugin added as recommended plugin
	UPDATED! Revolution Slider plugin
	UPDATED! Vestige Core plugin
	IMPROVEMENT! Escaped all variables, escaped html from static strings
	IMPROVEMENT! Custom post type to support pretty permalinks
	ADDED! Vestige HTML Template (Worth $18)
	FIXED! Missing fields for WPML string translations
	FIXED! Warnings for custom widgets in PHP 7.1+
	FIXED! Shortcodes used in page builder editor widget getting extra spacing br tags
	FIXED! Option to disable page title not working
	FIXED! Layout breaking problem with post list widget of page builder
	FIXED! Some styling issues

21 April 2018 - Version 1.9.2
	NEW! Option to disable event scripts and styles from theme
	UPDATED! Revolution Slider plugin
	UPDATED! Header cart module to support live updates
	FIXED! Broken gavatar image in author box on single posts page
	FIXED! Search page URL in header search module
	FIXED! Some date and time issues in event functionality
	FIXED! Events sort not working in WP Dashboard events listing
	FIXED! Some styling bugs
	
07 April 2018 - Version 1.9.2
	FIXED! A bug with the carousel view of events and exhibitions page builder widget
	
31 March 2018 - Version 1.9
	NEW! Option to use custom booking URL for Events and Exhibitions
	NEW! Option to set background colour and link colours for mobile menu
	UPDATED! Revolution Slider plugin
	FIXED! Widget title border is wrong when used in custom pogo sidebars
	FIXED! Blank list item showing on single event when its all day event
	FIXED! A bug with pages banner template
	FIXED! Artists widget to show artists with out any artworks
	FIXED! Some styling bugs
	FIXED! A bug in Dashboard menu page for edit item block

25 January 2018 - Version 1.8.9
	NEW! Pagination added for the artists page builder widget
	UPDATED! Revolution slider plugin
	UPDATED! Woocommerce to support lightbox gallery and zoom function
	FIXED! When page banner is selected then colour banner code needs to be removed first to use the image banner
	FIXED! Event archive page pagination not working
	FIXED! A bug with mega menu that is breaking the layout
	FIXED! Some styling bugs
	FIXED! Custom text and number colour for counter widget not working
	FIXED! A bug with bulk installation and activation of plugins using TGM Class
	FIXED! Some styling bug with demo importer

04 November 2017 - Version 1.8.8
	NEW! Price and dimension fields for artwork post types
	FIXED! WooCommerce pages are not working as expected
	FIXED! Some styling Bugs

28 October 2017 - Version 1.8.7
	UPDATED! Revolution Slider Plugin
	FIXED! PHP 7.1 problem on single event and events calendar page
	FIXED! Yoast SEO plugin conflicting with custom editor field for venues, artists
	FIXED! Pagination not working for events list/grid page builder widget
	FIXED! Gallery slider next/prev arrows not working
	FIXED! Title in magnetic and pretty photo lightbox were not showing
	UPDATED! Number of posts slider in page builder widgets
	FIXED! Single artwork page image slider not showing featured image in it

22 June 2017 - Version 1.8.6
	UPDATED! Demo importer to support PHP 7.0
	UPDATED! Revolution Slider plugin
	UPDATED! Custom widgets to support PHP 7.0
	
23 May, 2017 - Version 1.8.5
	NEW! Event/Exhibition manager email field to receive emails for the registrations
	UPDATED! Main menu dropdown to open in left if not fitting the screen width
	FIXED! Taxonomy(Venue/Artists) description fields not showing full editor when Yoast SEO plugin is active
	FIXED! Events calendar not working with WPML
	FIXED! WP 4.7.5 version update to fix repeated category/tags listed for custom post types (Vestige Core plugin updated)
	FIXED! Pagination on event archive page is not working
	
04 May, 2017 - Version 1.8.4
	UPDATED! Revolution Slider to latest version
	UPDATED! Demo data
	FIXED! Exhibitions order not correct when used single view
	FIXED! event date bug in single-event.php
	FIXED! Theme options fields not translatable with WPML
	FIXED! Event ticket price not displaying on the ticket
	FIXED! Sub menu title color/background not working for 2nd and 3rd level dropdowns
	FIXED! Some styling bugs
	
07 February, 2017 - Version 1.8.3
	NEW! Option to filter artworks on artists basis in Artworks Grid/List page builder widget
	NEW! Added next previous nav for single artwork page
	FIXED! Error on single event page
	FIXED! Todays date showing when previewing event from WP Dashboard
	FIXED! Event pagination rounding off number of events in events list widget list view
	
26 January, 2016 - Version 1.8.2
	FIXED! Jetpack plugin conflict with theme’s Upcoming Events Widget for page builder
	NEW! Option to change order of events in Events List/Grid page builder widget
	FIXED! Single event page showing undefined date when accessing it from the WP Dashboard
	FIXED! Some styling bugs
	
18 January, 2017 - Version 1.8.1
	UPDATED! Revolution slider to latest version
	UPDATED! Maximum venue show in venues page builder widget
	FIXED! Event post type page header title not working from Theme Options
	FIXED! Featured image for single event single page should be full size
	FIXED! Custom list/grid widget URL not working
	FIXED! Recent post widget date format not changing with date general settings
	FIXED! Site origin image widget link is opening in magnetic popup
	FIXED! Pinch zoom not working in android devices
	FIXED! Gallery, Venue tab in event, exhibition single page not activate by default
	FIXED! Event category banner image not working
	FIXED! Exhibition category banner image not working
	
16 September, 2016 - Version 1.8
	NEW! Option to show exhibitions as single post instead of multiple instances
	FIXED! Event/Exhibition registration form not showing error message when no ticket is selected
	FIXED! Map is not showing center position for single event/exhibition view
	FIXED! Styling issue when testimonial widget has 1 column layout
	FIXED! Blank separator showing when no venue is selected for any event/exhibition
	FIXED! Banner image for post category not working
	FIXED! Calendar is not showing event category color
	
27 July, 2016 - Version 1.7
	NEW! TripAdvisor and Email icon added for header/footer social icons
	NEW! Widget for artists taxonomy
	NEW! Taxonomy venue and artist description field converted to tinymce editor
	FIXED! Exhibition time not going to email confirmation
	FIXED! Shop main products page showing first product title in the header
	NEW! Option to change archive page titles in Theme Options > header > inner page header
	FIXED! Header inconsistency on product category pages
	FIXED! Search/cart blocks in header showing below logo in Chrome Browser
	NEW! Telephone field for staff posts
	NEW! Option to include/exclude venues from the widget
	NEW! Option to shuffle venues list/grid in widget
	FIXED! Pagination in event category/tag templates not working
	NEW! Field added for Google Maps API key at Theme Options
	UPDATED! Demo content
	UPDATED! Meta Box Plugin
	FIXED! Taxonomy banner/Venue Image delete option not working
	
07 July, 2016 - Version 1.6.2
	NEW! Option to add custom registration popup content for events/exhibitions
	FIXED! Event start time is not working as 24 hours
	UPDATED! Font Awesome to latest version
	
02 July, 2016 - Version 1.6.1
	FIXED! In email to registrant and administrator, the name and surname were without space
	FIXED! Number of tickets were not getting updated for registrants
	FIXED! Free event were not updating remaining tickets count
	FIXED! Register button was initially saying proceed to Paypal, now it will show register
	FIXED! Special characters in event/exhibition calendar was not showing properly
	FIXED! Events/exhibitions on calendar were movable
	FIXED! View details link in upcoming events widget taking to wrong URL
	UPDATED! Revolution Slider to latest version
	
03 June, 2016 - Version 1.6
	NEW! Page styling options added
	NEW! Option to change logo background colour at Theme Options > Logo
	NEW! Search & Woo commerce cart option in menu
	NEW! Magnetic Popup support for SiteOrigin Image widget
	FIXED! Venue taxonomy template not showing full content description
	NEW! Google map added on Venue taxonomy detail page
	UPDATED! Revolution Slider
	UPDATED! Meta box plugin
	UPDATED! TGM Class
	
19 April, 2016 - Version 1.5.1
	UPDATED! Revolution Slider to Latest Version
	FIXED! Lightbox option not working for some widgets and pages
	UPDATED! Google maps js library
	NEW! Single gallery post template
	
24 March, 2016 - Version 1.5
	NEW! Menu Styling options at Theme Options > Menu
	NEW! Option for title, title position and title color in Venue page builder widget
	NEW! Typography option for Inner page title at Theme Options > Header > inner page header
	UPDATED! Vestige Core plugin to v1.2.1
	FIXED! Page header title display option not working from Theme Options
	FIXED! Custom page header height not working correctly
	NEW! Option to choose if event will display till start time or end time
	FIXED! Error message coming when adding new menu item
	FIXED! Mega menu inside menu link attributes like class and target not working
	FIXED! Conor banner was showing default pattern image
	FIXED! Upcoming exhibitions widget not working with category filtering
	NEW! Option to add page banner for taxonomies
	NEW! Exhibitions List widget now have option to show past exhibitions
	UPDATED! Revolution Slider to latest version 5.2.3.5
	
17 February, 2016 - Version 1.4
	NEW! Artwork Post type added
	NEW! Artwork posts page builder widget, taxonomy pages added
	UPDATED!Theme options panel for more advanced customisation options
	UPDATED! Currency list for Paypal configuration at Theme Options
	UPDATED! Font Awesome icons to latest version 4.5
	NEW! Custom permalink option for event, exhibition, artwork and staff post types at Settings > Permalinks
	FIXED! Map not working for some users on single event and exhibition pages
	FIXED! Calendar escaping special characters in URL
	FIXED! Free events not working
	FIXED! Events registration with 0 amount taking to Paypal website
	FIXED! Upcoming exhibition widget showing static text “Now Open”
	NEW! Templates for event tags and exhibition tag added
	FIXED! Grid columns not working in some widgets
	FIXED! Pagination not working in event grid widget
	NEW! Yelp icon for header footer social icons
	UPDATED! Featured blocks widget now use vertical align center instead of line height for multiple lines of text support
	NEW! Option to add links in Icon Box widget of theme
	NEW! Header banner option for gallery and exhibition single pages
	NEW! Default header image for artwork and exhibition archives
	FIXED! Default venue sidebar not working
	NEW! Single page template for team posts and option in its page builder widget to add links to team member name and thumbnail
	FIXED! Category filter for exhibition list widget not working
	FIXED! Escaped H3 tags were showing in search results page
	FIXED! Some styling bugs
	FIXED! Header style for buttons not working for Header Style 3
	NEW! Option to set default sidebar for pages, posts, staff, events, exhibitions, artworks
	NEW! Homepage style 2 added
	UPDATED! Demo data updated
	
29 December, 2015 - Version 1.3
	FIXED!  Event/Exhibition details page sometime shows current date instead of actual date.
	FIXED! Book Online button always showing even disabled from Event/Exhibition
	FIXED! Available tickets should not be less than 0
	FIXED! Quantity spelling mistake in singe-exhibition and single-event.php
	FIXED! event not calculating correct time
	FIXED! event post type archive file included
	
21 November, 2015 - Version 1.2
	FIXED! Post list widget pagination not working
	FIXED! Team list widget category selection not working
	UPDATED! Vestige Core plugin
	FIXED! Events list widget not working with category selection
	FIXED! Issue with creating new time for exhibitions
	
17 November, 2015 - Version 1.1
	NEW! Paid events, exhibitions plugin 
	NEW! Event registration tickets
	UPDATED! Revolution Slider to latest version
	FIXED! Bug with pagination showing wrong number of pages
	FIXED! Upcoming exhibition widget date bug
	FIXED! Venue address not showing on single venue taxonomy page
	FIXED! Event category not working for list grid event widget
	FIXED! Category filters in event list widget is not working
	FIXED! Demo importer issue when Redux plugin is been updated
	FIXED! Child theme style issue for parent theme name
	FIXED! Styling for title of carousel image widget
	FIXED! Styling issue in grid event widget
	FIXED! Gallery grid widget autoplay field is not getting blank
	FIXED! Styling issues with animated counter widget
	FIXED! Wrong header style images in theme options
	FIXED! Google map not generating on venue tab on single pages
	
28 October, 2015 - Version 1.0.1
	Fixed demo importer issue
	
25 September 2015 - Version 1.0
	INITIAL RELEASE
';
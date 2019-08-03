<?php
/* * ** Meta Box Functions **** */
$prefix = 'imic_';
global $meta_boxes;
$meta_boxes = array();

/* Staff Meta Box
================================================== */
$meta_boxes[] = array(
    'id' => 'staff_meta_box',
    'title' => esc_html__('Member Details', 'vestige'),
    'pages' => array('team'),
    'fields' => array(
		array(
            'name' => esc_html__('Position', 'vestige'),
            'id' => $prefix . 'staff_position',
            'desc' => esc_html__("Enter staff member's job title.", 'vestige'),
            'type' => 'text',
            'std' => '',
        ),
		array(
            'name' => esc_html__('Email', 'vestige'),
            'id' => $prefix . 'staff_member_email',
            'desc' => esc_html__("Enter staff member's Email.", 'vestige'),
            'type' => 'text',
            'std' => '',
        ),
		array(
            'name' => esc_html__('Phone no.', 'vestige'),
            'id' => $prefix . 'staff_member_phone',
            'desc' => esc_html__("Enter staff member's Phone number.", 'vestige'),
            'type' => 'text',
            'std' => '',
        ),
		array(
			'name'  => esc_html__('Social Profiles', 'vestige'),
			'id'    => $prefix."social_icon_list",
			'desc'  =>  esc_html__('Choose Social Icon and enter URL.', 'vestige'),
			'type'  => 'text_list',
			'clone' => true,
			'options' => array(
					'0' => esc_html__('Social', 'vestige'),
					'1' => esc_html__('URL', 'vestige'))
			  ),
    )
);
/* Artwork Meta Box
  ================================================== */
$meta_boxes[] = array(
    'id' => 'artwork_meta_box',
    'title' => esc_html__('Artwork Details', 'vestige'),
    'pages' => array('artwork'),
		'fields' => array(
		array(
            'name' => esc_html__('Dimensions', 'vestige'),
            'id' => $prefix . 'artwork_dimension',
			'desc' => esc_html__("Enter dimension details of the artwork. It can be in any format as you like.", 'vestige'),
            'type' => 'text',
            'std' => '',
        ),
		array(
            'name' => esc_html__('Price', 'vestige'),
            'id' => $prefix . 'artwork_price',
			'desc' => esc_html__("Enter price of the artwork including the currency.", 'vestige'),
            'type' => 'text',
            'std' => '',
        ),
		array(
			'name' => esc_html__('additional Images', 'vestige'),
			'id' => $prefix . 'artwork_images',
			'desc' => esc_html__("Upload images for artwork gallery.", 'vestige'),
			'type' => 'image_advanced',
			'max_file_uploads' => 30
		),
	)
);
/* Registrant Meta Box
  ================================================== */
$meta_boxes[] = array(
    'id' => 'registrant_meta_box',
    'title' => esc_html__('Registrant Details', 'vestige'),
    'pages' => array('event_registrants', 'exhibition_reg'),
		'fields' => array(
		array(
            'name' => esc_html__('Time', 'vestige'),
            'id' => $prefix . 'registrant_exhibition_time',
            'type' => 'text',
            'std' => '',
        ),
		),
    'fields' => array(
		array(
            'name' => esc_html__('Email', 'vestige'),
            'id' => $prefix . 'registrant_email',
            'type' => 'text',
            'std' => '',
        ),
		array(
            'name' => esc_html__('Phone', 'vestige'),
            'id' => $prefix . 'registrant_phone',
            'type' => 'text',
            'std' => '',
        ),
		array(
            'name' => esc_html__('Address', 'vestige'),
            'id' => $prefix . 'registrant_address',
            'type' => 'textarea',
            'std' => '',
        ),
		array(
            'name' => esc_html__('Addition Notes', 'vestige'),
            'id' => $prefix . 'registrant_additional_notes',
            'type' => 'textarea',
            'std' => '',
        ),
		array(
            'name' => esc_html__('Date', 'vestige'),
            'id' => $prefix . 'registrant_event_date',
            'type' => 'text',
            'std' => '',
        ),
		array(
            'name' => esc_html__('Payment Status', 'vestige'),
            'id' => $prefix . 'registrant_payment_status',
			'desc' => esc_html__("Value is verified online.", 'vestige'),
            'type' => 'text',
            'std' => '',
        ),
		array(
            'name' => esc_html__('Paid Amount', 'vestige'),
            'id' => $prefix . 'registrant_paid_amount',
			'desc' => esc_html__("Value is verified online.", 'vestige'),
            'type' => 'text',
            'std' => '',
        ),
		array(
            'name' => esc_html__('Registration Number', 'vestige'),
            'id' => $prefix . 'registrant_registration_number',
            'type' => 'text',
            'std' => '',
        ),
    )
);
/* Registrant Meta Box
  ================================================== */
$meta_boxes[] = array(
    'id' => 'registrant_meta_box_exhibition',
    'title' => esc_html__('Exhibition Details', 'vestige'),
    'pages' => array('exhibition_reg'),
		'fields' => array(
		array(
            'name' => esc_html__('Time', 'vestige'),
            'id' => $prefix . 'registrant_exhibition_time',
            'type' => 'text',
            'std' => '',
        ),
    )
);
/* Event Meta Box
  ================================================== */
/*** Event Details Meta box ***/   
$meta_boxes[] = array(
    'id' => 'event_meta_box',
    'title' => esc_html__('Details', 'vestige'),
    'pages' => array('event'),
    'fields' => array( 
        array(
            'name' => esc_html__('Event Start Date', 'vestige'),
            'id' => $prefix . 'event_start_dt',
            'desc' => esc_html__("Insert date of Event start.", 'vestige'),
            'type' => 'datetime',
			'js_options' => array(
	        	'dateFormat'   		=> 'yy-mm-dd',
				'hourMax' 			=> 24,
				'changeMonth'     	=> true,
				'changeYear'      	=> true,
				'showButtonPanel' 	=> true,
				'stepMinute' 		=> 5,
				'showSecond' 		=> false,
				'stepSecond' 		=> 10,
			),
        ),
        //Event End Date
        array(
            'name' => esc_html__(' Event End Date', 'vestige'),
            'id' => $prefix . 'event_end_dt',
            'desc' => esc_html__("Insert date of Event end, multiple days Event could not be recur.", 'vestige'),
            'type' => 'datetime',
			'js_options' => array(
	       		'dateFormat'      	=> 'yy-mm-dd',
				'hourMax' 			=> 24,
				'changeMonth'     	=> true,
				'changeYear'      	=> true,
				'showButtonPanel' 	=> true,
				'stepMinute' 		=> 5,
				'showSecond' 		=> false,
				'stepSecond' 		=> 10,
			),
        ),
		#Event All Day Event
        array(
            'name' => esc_html__('All Day Event', 'vestige'),
            'id' => $prefix . 'event_all_day',
            'type' => 'checkbox',
        ),
    )
);
/* Event Meta Box
  ================================================== */
/*** Event Details Meta box ***/   
$meta_boxes[] = array(
    'id' => 'event_meta_box1',
    'title' => esc_html__('Registration', 'vestige'),
    'pages' => array('event', 'exhibition'),
	'context'  => 'side',
    'priority' => 'low',
    'fields' => array(  
		array(
			'name' => esc_html__( 'Enable Registration', 'vestige' ),
			'id' => $prefix.'event_registration',
			'type' => 'checkbox',
			'std' => 1,
		),
		array(
			'name' => esc_html__( 'Custom Registration Button URL', 'vestige' ),
			'id' => $prefix.'custom_event_registration',
			'desc' => esc_html__("For example EventBrite Event page URL of yours.", 'vestige'),
			'type' => 'text',
			'visible' => array('imic_event_registration','=','1'),
		),
		array(
			'name' => esc_html__( 'Open custom URL in new Tab/Window', 'vestige' ),
			'id' => $prefix.'custom_event_registration_target',
			'type' => 'checkbox',
			'std' => 1,
			'visible' => array('imic_event_registration','=','1'),
		),
	)
);
/*** Event Recurrence Meta box ***/   
$meta_boxes[] = array(
    'id' => 'event_recurring_box',
    'title' => esc_html__('Recurring Options', 'vestige'),
    'pages' => array('event'),
    'fields' => array( 		 
        //Frequency of Event
		array(
            'name' => esc_html__('Event Frequency Type', 'vestige'),
            'id' => $prefix . 'event_frequency_type',
            'desc' => esc_html__("Select Frequency Type.", 'vestige'),
            'type' => 'select',
            'options' => array(
				'0' => esc_html__('Not Required','vestige'),
				'1' => esc_html__('Fixed Date','vestige'),
                '2' => esc_html__('Week Day', 'vestige'),
        ),
		),
		array(
            'name' => esc_html__('Day of Month', 'vestige'),
            'id' => $prefix . 'event_day_month',
            'desc' => esc_html__("Select Day of Month.", 'vestige'),
            'type' => 'select',
            'options' => array(
				'first' => esc_html__('First','vestige'),
                'second' => esc_html__('Second', 'vestige'),
				'third' => esc_html__('Third', 'vestige'),
				'fourth' => esc_html__('Fourth', 'vestige'),
				'last' => esc_html__('Last', 'vestige'),
        	),
			'hidden' => array('imic_event_frequency_type','!=','2')
		),
		array(
            'name' => esc_html__('Event Week Day', 'vestige'),
            'id' => $prefix . 'event_week_day',
            'desc' => esc_html__("Select Week Day.", 'vestige'),
            'type' => 'select',
            'options' => array(
				'sunday' => esc_html__('Sunday','vestige'),
                'monday' => esc_html__('Monday', 'vestige'),
				'tuesday' => esc_html__('Tuesday', 'vestige'),
				'wednesday' => esc_html__('Wednesday', 'vestige'),
				'thursday' => esc_html__('Thursday', 'vestige'),
				'friday' => esc_html__('Friday', 'vestige'),
				'saturday' => esc_html__('Saturday', 'vestige'),
        	),
			'hidden' => array('imic_event_frequency_type','!=','2'),
		),
        array(
            'name' => esc_html__('Event Frequency', 'vestige'),
            'id' => $prefix . 'event_frequency',
            'desc' => esc_html__("Select Frequency.", 'vestige'),
            'type' => 'select',
            'options' => array(
				'35' => esc_html__('Select', 'vestige'),
                '1' => esc_html__('Every Day', 'vestige'),
				'2' => esc_html__('Every Second Day', 'vestige'),
				'3' => esc_html__('Every Third Day', 'vestige'),
				'4' => esc_html__('Every Fourth Day', 'vestige'),
				'5' => esc_html__('Every Fifth Day', 'vestige'),
				'6' => esc_html__('Every Sixth Day', 'vestige'),
                '7' => esc_html__('Every Week', 'vestige'),
				'30' => esc_html__('Every Month', 'vestige'),
            ),
			'hidden' => array('imic_event_frequency_type','!=','1'),
        ),
		//Frequency Count
		array(
            'name' => esc_html__('Number of times to repeat event', 'vestige'),
            'id' => $prefix . 'event_frequency_count',
            'desc' => esc_html__("Enter the number of how many time this event should repeat.", 'vestige'),
            'type' => 'text',
			'hidden' => array('imic_event_frequency_type','=','0')
        ),
		array(
            'name' => esc_html__('Do not change', 'vestige'),
            'id' => $prefix . 'event_frequency_end',
            'desc' => esc_html__("If any changes done in this file, may your theme will not work like running now.", 'vestige'),
            'type' => 'hidden',
        ),    
    )
);
/*** Event Details Meta box ***/   
$meta_boxes[] = array(
    'id' => 'event_details_box1',
    'title' => esc_html__('Details', 'vestige'),
    'pages' => array('event', 'exhibition'),
    'fields' => array( 		 
        array(
            'name' => esc_html__('Details Tab', 'vestige'),
            'id' => $prefix . 'event_details_data',
            'desc' => esc_html__("Enable Details Tab.", 'vestige'),
            'type' => 'select',
            'options' => array(
				'1' => esc_html__('Yes', 'vestige'),
                '0' => esc_html__('No', 'vestige'),
            ),
        ),
		array(
            'name' => esc_html__('Venue Tab', 'vestige'),
            'id' => $prefix . 'event_venue_data',
            'desc' => esc_html__("Enable Venue Tab.", 'vestige'),
            'type' => 'select',
            'options' => array(
				'1' => esc_html__('Yes', 'vestige'),
                '0' => esc_html__('No', 'vestige'),
            ),
        ),
		array(
            'name' => esc_html__('Gallery Tab', 'vestige'),
            'id' => $prefix . 'event_gallery_data',
            'desc' => esc_html__("Enable Gallery Tab.", 'vestige'),
            'type' => 'select',
            'options' => array(
				'1' => esc_html__('Yes', 'vestige'),
                '0' => esc_html__('No', 'vestige'),
            ),
        ), 
		array(
            'name' => esc_html__('Gallery Images', 'vestige'),
            'id' => $prefix . 'event_gallery_images',
            'desc' => esc_html__("Upload images for Gallery.", 'vestige'),
            'type' => 'image_advanced',
            'max_file_uploads' => 30,
			'hidden' => array('imic_event_gallery_data','=','0')
        ), 
		array(
            'name' => esc_html__('Event Manager Email', 'vestige'),
            'id' => $prefix . 'event_manager_email',
            'desc' => esc_html__("Enter email of event manager", 'vestige'),
            'type' => 'text',
        ),
    )
);
/* Event Meta Box
  ================================================== */
/*** Event Details Meta box ***/   
$meta_boxes[] = array(
    'id' => 'custom_modalbox_meta_box1',
    'title' => esc_html__('Custom Registration PopUp Content', 'vestige'),
    'desc' => esc_html__('', 'vestige'),
    'pages' => array('event', 'exhibition'),
    'fields' => array(
		array(
            'name' => esc_html__('Use these fields to enter your own custom data for the registration popup box that opens on click of Book Online button when registration is enabled.', 'vestige'),
            'id' => $prefix . 'cpopup_desc',
            'type' => 'heading',
        ),
		array(
            'name' => esc_html__('Popup Modal Header', 'vestige'),
            'id' => $prefix . 'cpopup_header',
            'desc' => esc_html__("Enter the title for the popup", 'vestige'),
            'type' => 'text',
			'size' => 50
        ),
		array(
            'name' => esc_html__('Popup Modal Body', 'vestige'),
            'id' => $prefix . 'cpopup_body',
            'desc' => esc_html__("Enter the boxy text for the popup", 'vestige'),
            'type' => 'wysiwyg',
        ),
		array(
            'name' => esc_html__('Popup Modal Footer', 'vestige'),
            'id' => $prefix . 'cpopup_footer',
            'desc' => esc_html__("Enter the footer text/info for the popup", 'vestige'),
            'type' => 'text',
			'size' => 50
        ),
	)
);
/* Gallery & Post Meta Box
  ================================================== */
$meta_boxes[] = array(
    'id' => 'gallery_meta_box',
    'title' => esc_html__('Post Media', 'vestige'),
    'pages' => array('gallery'),
    'fields' => array(
        // Gallery Video Url
		array(
            'name' => esc_html__('Video Options', 'vestige'),
            'id' => $prefix . 'post_video_option',
            'desc' => esc_html__("Select Video Option.", 'vestige'),
            'type' => 'select',
            'options' => array(
                '1' => esc_html__('Youtube or Vimeo', 'vestige'),
            ),
			'visible' => ['post_format','video']
        ),
        array(
            'name' => esc_html__('Video URL', 'vestige'),
            'id' => $prefix . 'gallery_video_url',
            'desc' => esc_html__("Enter the Youtube or Vimeo URL.", 'vestige'),
            'type' => 'url',
			'hidden' => array('imic_post_video_option','=','0')
        ),
		array(
            'name' => esc_html__('MP4 Video', 'vestige'),
            'id' => $prefix . 'post_mp4_video',
            'desc' => esc_html__("Insert MP4 Video.", 'vestige'),
            'type' => 'file_input',
			'clone' => false,
            'std' => '',
			'hidden' => array('imic_post_video_option','=','1')
        ),
		array(
            'name' => esc_html__('WEBM Video', 'vestige'),
            'id' => $prefix . 'post_webm_video',
            'desc' => esc_html__("Insert WEBM Video.", 'vestige'),
            'type' => 'file_input',
			'clone' => false,
            'std' => '',
			'hidden' => array('imic_post_video_option','=','1')
        ),
		array(
            'name' => esc_html__('OGG Video', 'vestige'),
            'id' => $prefix . 'post_ogg_video',
            'desc' => esc_html__("Insert OGG Video.", 'vestige'),
            'type' => 'file_input',
			'clone' => false,
            'std' => '',
			'hidden' => array('imic_post_video_option','=','1')
        ),
        // Gallery Link Url
        array(
            'name' => esc_html__('Link URL', 'vestige'),
            'id' => $prefix . 'gallery_link_url',
            'desc' => esc_html__("Enter the Link URL.", 'vestige'),
            'type' => 'url',
			'visible' => ['post_format','link']
        ),
		array(
            'name' => esc_html__('Gallery Images', 'vestige'),
            'id' => $prefix . 'gallery_images',
            'desc' => esc_html__("Upload images for gallery.", 'vestige'),
            'type' => 'image_advanced',
            'max_file_uploads' => 30,
			'visible' => ['post_format','gallery']
        ),
		array(
            'name' => esc_html__('Slider Autoplay', 'vestige'),
            'id' => $prefix . 'gallery_slider_auto_slide',
            'desc' => esc_html__("Select Yes to autoplay the slider.", 'vestige'),
            'type' => 'select',
            'options' => array(
                'yes' => esc_html__('Yes', 'vestige'),
                'no' => esc_html__('No', 'vestige'),
            ),
			'visible' => ['post_format','gallery']
        ),
		array(
            'name' => esc_html__('Per Slide Interval', 'vestige'),
            'id' => $prefix . 'gallery_slider_speed',
            'desc' => esc_html__("Default per slide interval is 5000. 1000 is equals to 1 second.", 'vestige'),
            'type' => 'text',
			'hidden' => array('imic_gallery_slider_auto_slide','=','no')
        ),
       array(
            'name' => esc_html__('Slider Pagination', 'vestige'),
            'id' => $prefix . 'gallery_slider_pagination',
            'desc' => esc_html__("Enable to show pagination for slider.", 'vestige'),
            'type' => 'select',
            'options' => array(
                'yes' => esc_html__('Enable', 'vestige'),
                'no' => esc_html__('Disable', 'vestige'),
            ),
			'visible' => ['post_format','gallery']
        ),
		array(
            'name' => esc_html__('Slider Direction Arrows', 'vestige'),
            'id' => $prefix . 'gallery_slider_direction_arrows',
            'desc' => esc_html__("Select Yes to show slider direction arrows.", 'vestige'),
            'type' => 'select',
            'options' => array(
                'yes' => esc_html__('Yes', 'vestige'),
                'no' => esc_html__('No', 'vestige'),
            ),
			'visible' => ['post_format','gallery']
        ),
		array(
            'name' => esc_html__('Slider Effects', 'vestige'),
            'id' => $prefix . 'gallery_slider_effects',
            'desc' => esc_html__("Select effects for slider.", 'vestige'),
            'type' => 'select',
            'options' => array(
                'fade' => esc_html__('Fade', 'vestige'),
                'slide' => esc_html__('Slide', 'vestige'),
            ),
			'visible' => ['post_format','gallery']
        ),
        //Audio Display
        array(
            'name' => esc_html__('Audio', 'vestige'),
            'id' => $prefix . 'gallery_uploaded_audio',
            'desc' => esc_html__("Soundcloud Audio URL", 'vestige'),
            'type' => 'text',
			'visible' => ['post_format','audio']
        ),
    )
);
/* Post Page Meta Box
  ================================================== */
$meta_boxes[] = array(
    'id' => 'post_page_meta_box',
    'title' => esc_html__('Page/Post Header Options', 'vestige'),
   'pages' => array('post','page','event','product','exhibition','team','artwork','gallery'),
    'fields' => array(
		array(
            'name' => esc_html__('Page Header Show/Hide', 'vestige'),
            'id' => $prefix . 'page_header_show_hide',
            'type' => 'select',
            'options' => array(
                1 => esc_html__('Show', 'vestige'),
                2 => esc_html__('Hide', 'vestige'),
            ),
            'std' => 1,
        ),
		array(
            'name' => esc_html__('Page Title Show/Hide', 'vestige'),
            'id' => $prefix . 'page_title_show_hide',
            'desc' => esc_html__("This option will override page title setting at Theme Options > Header > Inner Page Header", 'vestige'),
            'type' => 'select',
            'options' => array(
                1 => esc_html__('Show', 'vestige'),
                2 => esc_html__('Hide', 'vestige'),
            ),
            'std' => 1,
        ),
		array(
            'name' => esc_html__('Choose Header Type', 'vestige'),
            'id' => $prefix . 'pages_Choose_slider_display',
            'desc' => esc_html__("Select Banner Type.", 'vestige'),
            'type' => 'select',
            'options' => array(
				'1' => esc_html__('Color Banner', 'vestige'),
				'2' => esc_html__('Image Banner', 'vestige'),
                '3' => esc_html__('Flex Slider', 'vestige'),
				'4' => esc_html__('Nivo Slider','vestige'),
                '5' => esc_html__('Revolution Slider', 'vestige')
            ),
			'std' => 2,
			'hidden' => array('imic_page_header_show_hide','!=','1')
        ),
		array(
			'name' => esc_html__( 'Color Banner', 'vestige' ),
			'id' => $prefix.'pages_banner_color',
			'type' => 'color',
			'hidden' => array('imic_pages_Choose_slider_display','!=','1')
		),
		array(
            'name' => esc_html__('Image Banner', 'vestige'),
            'id' => $prefix . 'header_image',
            'desc' => esc_html__("Upload banner image for header for this Page/Post.", 'vestige'),
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
			'hidden' => array('imic_pages_Choose_slider_display','!=','2')
        ),
        array(
		   'name' => esc_html__('Select Revolution Slider from list','vestige'),
			'id' => $prefix . 'pages_select_revolution_from_list',
			'desc' => esc_html__("Select Revolution Slider from list", 'vestige'),
			'type' => 'select',
			'options' => imic_RevSliderShortCode(),
			'hidden' => array('imic_pages_Choose_slider_display','!=','5')
		),
        //Slider Image
		array(
            'name' => esc_html__('Banner Height', 'vestige'),
            'id' => $prefix . 'pages_slider_height',
            'desc' => esc_html__("Enter Height for Banner Ex-300", 'vestige'),
            'type' => 'text',
			'hidden' => array('imic_pages_Choose_slider_display','between',array('4','5'))
        ),
        array(
            'name' => esc_html__('Slider Images', 'vestige'),
            'id' => $prefix . 'pages_slider_image',
            'desc' => esc_html__("Upload/Select slider images.", 'vestige'),
            'type' => 'image_advanced',
			'visible' => array('imic_pages_Choose_slider_display','between',array('3','4'))
        ),
		array(
            'name' => esc_html__('Slider Pagination', 'vestige'),
            'id' => $prefix . 'pages_slider_pagination',
            'desc' => esc_html__("Enable to show pagination for slider.", 'vestige'),
            'type' => 'select',
            'options' => array(
                'yes' => esc_html__('Enable', 'vestige'),
                'no' => esc_html__('Disable', 'vestige'),
            ),
			'visible' => array('imic_pages_Choose_slider_display','between',array('3','4'))
        ),
		array(
            'name' => esc_html__('Slider Autoplay', 'vestige'),
            'id' => $prefix . 'pages_slider_auto_slide',
            'desc' => esc_html__("Select Yes to slide automatically.", 'vestige'),
            'type' => 'select',
            'options' => array(
                'yes' => esc_html__('Yes', 'vestige'),
                'no' => esc_html__('No', 'vestige'),
            ),
			'visible' => array('imic_pages_Choose_slider_display','between',array('3','4'))
        ),
		array(
            'name' => esc_html__('Slider Direction Arrows', 'vestige'),
            'id' => $prefix . 'pages_slider_direction_arrows',
            'desc' => esc_html__("Select Yes to show slider direction arrows.", 'vestige'),
            'type' => 'select',
            'options' => array(
                'yes' => esc_html__('Yes', 'vestige'),
                'no' => esc_html__('No', 'vestige'),
            ),
			'visible' => array('imic_pages_Choose_slider_display','between',array('3','4'))
        ),
		array(
            'name' => esc_html__('Slider Effects', 'vestige'),
            'id' => $prefix . 'pages_slider_effects',
            'desc' => esc_html__("Select effects for slider.", 'vestige'),
            'type' => 'select',
            'options' => array(
                'fade' => esc_html__('Fade', 'vestige'),
                'slide' => esc_html__('Slide', 'vestige'),
            ),
			'visible' => array('imic_pages_Choose_slider_display','=',array('3'))
        ),
		array(
            'name' => esc_html__('Slider Effects', 'vestige'),
            'id' => $prefix . 'pages_nivo_effects',
            'desc' => esc_html__("Select effects for slider.", 'vestige'),
            'type' => 'select',
            'options' => array(
                'sliceDown' => esc_html__('sliceDown', 'vestige'),
                'sliceDownLeft' => esc_html__('sliceDownLeft', 'vestige'),
				'sliceUp' => esc_html__('sliceUp', 'vestige'),
                'sliceUpLeft' => esc_html__('sliceUpLeft', 'vestige'),
				'sliceUpDown' => esc_html__('sliceUpDown', 'vestige'),
                'sliceUpDownLeft' => esc_html__('sliceUpDownLeft', 'vestige'),
				'fold' => esc_html__('fold', 'vestige'),
                'fade' => esc_html__('fade', 'vestige'),
				'random' => esc_html__('random', 'vestige'),
                'slideInRight' => esc_html__('slideInRight', 'vestige'),
				'slideInLeft' => esc_html__('slideInLeft', 'vestige'),
                'boxRandom' => esc_html__('boxRandom', 'vestige'),
				'boxRain' => esc_html__('boxRain', 'vestige'),
				'boxRainReverse' => esc_html__('boxRainReverse', 'vestige'),
				'boxRainGrow' => esc_html__('boxRainGrow', 'vestige'),
				'boxRainGrowReverse' => esc_html__('boxRainGrowReverse', 'vestige'),
            ),
			'visible' => array('imic_pages_Choose_slider_display','=',array('4'))
        ),
  	)
);
/* Post Page Background Meta Box
  ================================================== */
$meta_boxes[] = array(
    'id' => 'post_page_bg_meta_box',
    'title' => esc_html__('Background Options', 'vestige'),
   	'pages' => array('post','page','event','product','exhibition','team','artwork','gallery'),
    'fields' => array(
		array(
            'name' => esc_html__('Below options work only in Boxed Layout', 'vestige'),
            'id' => $prefix . 'boxed_option_heading',
            'type' => 'heading',
		),
		array(
            'name' => esc_html__('Background Color', 'vestige'),
            'id' => $prefix . 'pages_body_bg_color',
            'desc' => esc_html__("Choose background color for the outer area", 'vestige'),
            'type' => 'color',
        ),
		array(
            'name' => esc_html__('Background Image', 'vestige'),
            'id' => $prefix . 'pages_body_bg_image',
            'desc' => esc_html__("Choose background image for the outer area", 'vestige'),
            'type' => 'image_advanced',
            'max_file_uploads' => 1
        ),
		array(
            'name' => esc_html__('100% Background Image', 'vestige'),
            'id' => $prefix . 'pages_body_bg_wide',
            'desc' => esc_html__("Choose to have the background image display at 100%.", 'vestige'),
            'type' => 'select',
            'options' => array(
                '1' => esc_html__('Yes', 'vestige'),
                '0' => esc_html__('No', 'vestige'),
            ),
            'std' => 0,
        ),
		array(
            'name' => esc_html__('Background Repeat', 'vestige'),
            'id' => $prefix . 'pages_body_bg_repeat',
            'desc' => esc_html__("Select how the background image repeats.", 'vestige'),
            'type' => 'select',
            'options' => array(
                'repeat' => esc_html__('Repeat', 'vestige'),
                'repeat-x' => esc_html__('Repeat Horizontally', 'vestige'),
                'repeat-y' => esc_html__('Repeat Vertically', 'vestige'),
                'no-repeat' => esc_html__('No Repeat', 'vestige'),
            ),
            'std' => 'repeat',
        ),
		array(
            'id' => $prefix . 'wide_option_divider',
            'type' => 'divider',
		),
		array(
            'name' => esc_html__('Below options work in boxed and wide mode:', 'vestige'),
            'id' => $prefix . 'wide_option_heading',
            'type' => 'heading',
		),
		array(
            'name' => esc_html__('Background Color', 'vestige'),
            'id' => $prefix . 'pages_content_bg_color',
            'desc' => esc_html__("Choose background color for the Content area", 'vestige'),
            'type' => 'color',
        ),
		array(
            'name' => esc_html__('Background Image', 'vestige'),
            'id' => $prefix . 'pages_content_bg_image',
            'desc' => esc_html__("Choose background image for the Content area", 'vestige'),
            'type' => 'image_advanced',
            'max_file_uploads' => 1
        ),
		array(
            'name' => esc_html__('100% Background Image', 'vestige'),
            'id' => $prefix . 'pages_content_bg_wide',
            'desc' => esc_html__("Choose to have the background image display at 100%.", 'vestige'),
            'type' => 'select',
            'options' => array(
                '1' => esc_html__('Yes', 'vestige'),
                '0' => esc_html__('No', 'vestige'),
            ),
            'std' => 0,
        ),
		array(
            'name' => esc_html__('Background Repeat', 'vestige'),
            'id' => $prefix . 'pages_content_bg_repeat',
            'desc' => esc_html__("Select how the background image repeats.", 'vestige'),
            'type' => 'select',
            'options' => array(
                'repeat' => esc_html__('Repeat', 'vestige'),
                'repeat-x' => esc_html__('Repeat Horizontally', 'vestige'),
                'repeat-y' => esc_html__('Repeat Vertically', 'vestige'),
                'no-repeat' => esc_html__('No Repeat', 'vestige'),
            ),
            'std' => 'repeat',
        ),
	)
);
/* Post Page Social Meta Box
  ================================================== */
$meta_boxes[] = array(
    'id' => 'post_page_design_meta_box',
    'title' => esc_html__('Page Design Options', 'vestige'),
   	'pages' => array('page','post','event','exhibition','team','artwork','gallery'),
    'fields' => array(
		array(
            'name' => esc_html__('Content Width', 'vestige'),
            'desc' => esc_html__("Enter width of content in px or %", 'vestige'),
            'id' => $prefix . 'content_width',
            'type' => 'text',
		),
		array(
            'name' => esc_html__('Content Padding Top', 'vestige'),
            'desc' => esc_html__("Do not include px or % here", 'vestige'),
            'id' => $prefix . 'content_padding_top',
            'type' => 'number',
            'std' => 50,
		),
		array(
            'name' => esc_html__('Content Padding Bottom', 'vestige'),
            'desc' => esc_html__("Do not include px or % here", 'vestige'),
            'id' => $prefix . 'content_padding_bottom',
            'type' => 'number',
            'std' => 50,
		),
		array(
            'name' => esc_html__('Show social sharing buttons', 'vestige'),
            'id' => $prefix . 'pages_social_show',
            'type' => 'select',
            'options' => array(
                '1' => esc_html__('Show', 'vestige'),
                '2' => esc_html__('Hide', 'vestige'),
            ),
            'std' => '1',
        ),
		array(
            'name' => esc_html__('Show breadcrumbs', 'vestige'),
            'id' => $prefix . 'pages_breadcrumb_show',
            'type' => 'select',
            'options' => array(
                '1' => esc_html__('Show', 'vestige'),
                '2' => esc_html__('Hide', 'vestige'),
            ),
            'std' => '1',
        )
	)
);

/* * ******************* META BOX REGISTERING ********************** */
/**
 * Register meta boxes
 *
 * @return void
 */
function imic_register_meta_boxes() {
    global $meta_boxes;
    // Make sure there's no errors when the plugin is deactivated or during upgrade
    if (class_exists('RW_Meta_Box')) {
        foreach ($meta_boxes as $meta_box) {
            new RW_Meta_Box($meta_box);
        }
    }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking Page template, categories, etc.
add_action('admin_init', 'imic_register_meta_boxes');
/* * ******************* META BOX CHECK ********************** */
/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function rw_maybe_include($template_file) {
    // Include in back-end only
    if (!defined('WP_ADMIN') || !WP_ADMIN)
        return false;
    // Always include for ajax
    if (defined('DOING_AJAX') && DOING_AJAX)
        return true;
    // Check for post IDs
    $checked_post_IDs = array();
    if (isset($_GET['post']))
        $post_id = $_GET['post'];
    elseif (isset($_POST['post_ID']))
        $post_id = $_POST['post_ID'];
    else
        $post_id = false;
    $post_id = (int) $post_id;
    if (in_array($post_id, $checked_post_IDs))
        return true;
    // Check for Page template
    $checked_templates = array($template_file);
    $template = get_post_meta($post_id, '_wp_page_template', true);
    if (in_array($template, $checked_templates))
        return true;
// If no condition matched
    return false;
}
?>
jQuery(document).ready(function() {
    jQuery('.calendar').prepend('<div id="loading-image"><img id="loading-image-img" src="' + calenderEvents.homeurl + '/assets/images/loader-new.gif" alt="Loading..." /></div>');
      jQuery('.calendar').fullCalendar({
		eventAfterRender: function (event, element) {
			element.find('.fc-title').html(event.title);
		},
        monthNames: calenderEvents.monthNames,
        monthNamesShort: calenderEvents.monthNamesShort,
        dayNames: calenderEvents.dayNames,
        dayNamesShort: calenderEvents.dayNamesShort,
        editable: false,
		eventLimit: 3,
		viewRender: function (view, element) {
		var b = jQuery('.calendar').fullCalendar('getDate');
		this_month = b.format('YYYY-MM');
		//alert(this_month);
		jQuery('.calendar').fullCalendar('removeEventSource', calenderEvents.homeurl + '/framework/json-feed.php'); 
		jQuery('.calendar').fullCalendar('refetchEvents');
		jQuery('.calendar').fullCalendar('addEventSource', { url: calenderEvents.homeurl + '/framework/json-feed.php',
						type: 'POST',
						data: {
						   event_cat_id: jQuery('.event_calendar').attr('id'),
						   month_event: this_month,
							lang: calenderEvents.language
						  }})
		jQuery('.calendar').fullCalendar('refetchEvents');
	 	},
		googleCalendarApiKey: calenderEvents.googlekey,
			eventSources: [
				{
					googleCalendarId:calenderEvents.googlecalid
					
				},
				],
        timeFormat: calenderEvents.time_format,
        firstDay:calenderEvents.start_of_week,
        loading: function(bool) {
            if (bool)
                jQuery('#loading-image').show();
            else
                jQuery('#loading-image').hide();
        },
    });
});
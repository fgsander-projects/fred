jQuery(document).ready(function() {
    jQuery('.calendar').prepend('<div id="loading-image"><img id="loading-image-img" src="' + calenderExhibitions.homeurl + '/assets/images/loader-new.gif" alt="Loading..." /></div>');
      jQuery('.calendar').fullCalendar({
		eventAfterRender: function (event, element) {
			element.find('.fc-title').html(event.title);
		},
        monthNames: calenderExhibitions.monthNames,
        monthNamesShort: calenderExhibitions.monthNamesShort,
        dayNames: calenderExhibitions.dayNames,
        dayNamesShort: calenderExhibitions.dayNamesShort,
        editable: false,
		eventLimit: 3,
		viewRender: function (view, element) {
		var b = jQuery('.calendar').fullCalendar('getDate');
		this_month = b.format('YYYY-MM');
		//alert(this_month);
		jQuery('.calendar').fullCalendar('removeEventSource', calenderExhibitions.homeurl + '/framework/json-feed-exhibition.php'); 
		jQuery('.calendar').fullCalendar('refetchEvents');
		jQuery('.calendar').fullCalendar('addEventSource', { url: calenderExhibitions.homeurl + '/framework/json-feed-exhibition.php',
						type: 'POST',
						data: {
						   event_cat_id: jQuery('.event_calendar').attr('id'),
						   month_event: this_month,
						  }})
		jQuery('.calendar').fullCalendar('refetchEvents');
	 	},
        timeFormat: calenderExhibitions.time_format,
		height: 'auto',
		defaultView: 'agendaDay',
        minTime: '08:00:00',
        maxTime: '20:00:00',
        firstDay:calenderExhibitions.start_of_week,
        loading: function(bool) {
            if (bool)
                jQuery('#loading-image').show();
            else
                jQuery('#loading-image').hide();
        },
    });
});
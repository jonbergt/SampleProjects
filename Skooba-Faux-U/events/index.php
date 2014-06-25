<?php
	require_once '../utils.php';

// Retrieve list of UPCOMING (i.e. today and future) events 
	function getEventsContacts() {
		static $events;
		if ( $events == null or $events == "") {
			$connected = DBConnect();
			$sqlStmt = ( "select eventDate, eventName, eventLocation, eventDescription, contactName
								from dive_event
									inner join dive_event_contact on eventID = eventContactEvID
									inner join dive_contact on eventContactCtID = contactID
							where eventDate >= current_date
							order by eventDate, eventName");
			$events = mysql_query($sqlStmt) or die("Query Failed: ".mysql_errno()."; "
						.mysql_error()."<br />".$sqlStmt."<br />");
		}
		$row = mysql_fetch_array($events);
		if (!$row) {
			mysql_close($connected);
		}
		return $row;
	}
		
	// Assemble the markup defining all the applicable rows for display in the HTML table
	while ( $event = getEventsContacts() ) {
		list($date, $name, $location, $details, $contact) = $event;
		$dateParsed = date_parse_from_format("Y-m-d", $date); 
		$eventRows .= 	"\t<tr>\n"
							."\t\t<td>"
							.date( "D, M d, Y", 
								mktime(0,0,0,$dateParsed['month'],$dateParsed['day'],$dateParsed['year']) )
							."</td>\n"
							."\t\t<td>{$name}</td>\n"
							."\t\t<td>{$location}</td>\n"
							."\t\t<td>{$details}</td>\n"
							."\t\t<td>{$contact}</td>\n"
							."\t</tr>\n";
	}

	include 'events.html.php';
?>
<?php
	// Construct and return a path "prefix" to access files for this site
	function pathSansPage() {
		$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') 
						=== FALSE ? 'http' : 'https';
      $host     = $_SERVER['HTTP_HOST'];
   	$siteMain   = 'Skooba-Faux-U';
   	$pathToMain = $protocol.'://'.$host.'/'.$siteMain.'/';
   	return $pathToMain;
	}

	// Establish MySQL database connection and return resource/handle
	function DBConnect() {
		$mysqlServer="localhost";
		$mysqlUser="root";
		$mysqlPassword="jonphpadmin";
		$link = mysql_connect($mysqlServer, $mysqlUser, $mysqlPassword) 
				or die("Connection Failed: ".mysql_errno()."; ".mysql_error());
		$dbSelected = mysql_select_db("skooba_faux_u") 
				or die("Database missing or failure: ".mysql_errno().mysql_error());
		if ($dbSelected) {
			return $link;
		}
		else  {
			return FALSE;
		}		
	}

	// Establish the next contact ID number
	function getNextContact()  {
		$data = mysql_query("select max(contactID) as lastContact from dive_contact") 
						or die("Query Failed: ".mysql_errno()."; "
						.mysql_error()."<br />".$sqlStmt."<br />");
		$contactInfo = mysql_fetch_array($data);
		$contact = $contactInfo['lastContact'];
		if ($contact >= 0) {
			$contact++;
		}
		else {
			$contact = 1;
		}
		return $contact;
	}

	// Establish the next event ID number
	function getNextEvent() {
		$data = mysql_query("select max(eventID) as lastEvent from dive_event") 
						or die("Query Failed: ".mysql_errno()."; "
						.mysql_error()."<br />".$sqlStmt."<br />");
		$eventInfo = mysql_fetch_array($data);
		$event = $eventInfo['lastEvent'];
		if ($event >= 0) {
			$event++;
		}
		else {
			$event = 1;
		}
		return $event;
	}
	
	// Insert applicable values into the Contact table
	function setContact($contact, $name, $phone, $email, $timetocall) {
		$sqlStmt = ( "insert into dive_contact (contactID, contactName, contactPhone, 
						contactEmail, contactCallTime)
	   	       	values({$contact}, {$name}, {$phone}, {$email}, {$timetocall})" );
		$inserted = mysql_query($sqlStmt) or die("Query Failed: ".mysql_errno()."; "
						.mysql_error()."<br />".$sqlStmt."<br />");
		return $inserted;
	}

	// Insert values into the Events table	
	function setEvent($event, $name, $date, $location, $description) {
		$sqlStmt = ( "insert into dive_event (eventID, eventName, eventDate, 
						eventLocation, eventDescription)
   		       	values({$event}, {$name}, {$date}, {$location}, {$description})" );
		$inserted = mysql_query($sqlStmt) or die("Query Failed: ".mysql_errno()."; "
						.mysql_error()."<br />".$sqlStmt."<br />");
		return $inserted;
	}

	// Insert values into the EventsContact table
	function setEventContact($contact, $event, $publicize) {
		$sqlStmt = ( "insert into dive_event_contact (eventContactCtID, eventContactEvID, 
						eventContactPermission)
	  		       	values({$contact}, {$event}, {$publicize} )" );
		$inserted = mysql_query($sqlStmt) or die("Query Failed: ".mysql_errno()."; "
						.mysql_error()."<br />".$sqlStmt."<br />");
		return $inserted;
	}
	
?>
<?php
	require_once '../utils.php';

	// Determine if no posted entries were made, or retrieve the input value of each
	function getPostFormatted() {
		
		// Load an array of all the posted Input for return to the caller
		$postInputs = array(
			'contactname' => filter_input(INPUT_POST, 'contactname', FILTER_DEFAULT),
			'telephone' => filter_input(INPUT_POST, 'telephone', FILTER_DEFAULT),
			'email' => filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL),
			'eventname' => filter_input(INPUT_POST, 'eventname', FILTER_DEFAULT),
			'eventdate' => filter_input(INPUT_POST, 'eventdate', FILTER_DEFAULT),
			'region' => filter_input(INPUT_POST, 'region', FILTER_DEFAULT),
			'details' => filter_input(INPUT_POST, 'details', FILTER_DEFAULT),
			'timetocall' => filter_input(INPUT_POST, 'timetocall', FILTER_DEFAULT),
			'publicize' => filter_input(INPUT_POST, 'publicize', FILTER_VALIDATE_BOOLEAN, 
								FILTER_NULL_ON_FAILURE)
		);
		
		// If any single input value was found invalid or not set, return boolean FALSE;
		// otherwise, return the entire array, formatted for MySQL-insert.
		foreach ($postInputs as $key => $value) {
			if (is_null($value)) {
				return FALSE;
			}
			switch ($key) {
				// convert publicize to MySQL-insert-friendly boolean
				case 'publicize':
					if ($value == 'on') {
						$postInputs[$key] = "'1'";
					}
					else {
						$postInputs[$key] = "'0'";
					}
				break;
				// 'Details' may contain any character, so enclose in dblquotes
				case 'details':
					if ($value === FALSE) {
						return FALSE;
					}
					else {
						$postInputs[$key] = '"'.$postInputs[$key].'"';
					}
				break;
				// for any other input type, enclose in apostraphes
				default:
					if ($value === FALSE) {
						return FALSE;
					}
					else {
						$postInputs[$key] = "'".$postInputs[$key]."'";
					}
				break;
			}  // end switch ($key)
		}  // end foreach $postInputs
		return $postInputs;
	}	// end function getPostFormatted()

	session_start();
	
	/* Once it is determined the form should initially display "empty", indicate the next step will be 
	 * "send-mode"
	 * NOTE: the extract() function works similarly to list() but for associative arrays ( list() only 
	 * works on numerical arrays ) and also AUTOMATICALLY loads the value into a $variable that is named 
	 * after corresponding key of the associative array; e.g. array('dog'=>'beagle','cat'=>'tabby') will
	 * implicitly extract(array) as $dog='beagle' and $cat='tabby', w/o explicit variable assignment code.
	 */
	if ( $_SESSION['mode'] != "send" 
			or !extract( getPostFormatted() ) 
	) 
	{
		$_SESSION['mode'] = "send";
	}	
	// ... otherwise, use the retrieved posted input values to insert into the database
	else  {	
		$connected = DBConnect();
		
		// Establish the "next contact#" and "next event#"
		$contactID = getNextContact();
		$eventID = getNextEvent();
		
		// 
		if ( setContact($contactID, $contactname, $telephone, $email, $timetocall) ) {
			if ( setEvent($eventID, $eventname, $eventdate, $region, $details) ) {
				// Use the following to show a javascript "successsful update" msg upon return to the form-page
				if ( setEventContact($contactID, $eventID, $publicize) ) {
					$_SESSION['insertStatus'] = 'updated';
				}
				else {
					$_SESSION['insertStatus'] = 'failed';
				}  // end else of if ( setEventContact...
			}	// end if ( setEvent...
		}  // end if ( setContact...
		
		mysql_close($connected);
		unset($_SESSION['mode']);
		
	} // end else of if ( $_SESSION['mode'] != "send" or !list(...

	/* This HTML include contains all the "presentation" code necessary to display the form in either
	 * "entry-mode"($_SESSION['mode'] is not set) or "send-mode" ($_SESSION['mode'] = "send")
	 * 1) "entry-mode": this PHP script displays the HTML page to the browser, remaining in a "display-wait"
	 * 	condition for the user to complete the entries and submit the form
	 * 2) "send-mode": this PHP script is executed a 2nd time, now processing the form entries from the
	 * 	1st execution of the script and writing them to the database, after which displaying the form
	 * 	empty in "entry-mode" again, awaiting further user interaction.
	 */
	include 'contact.html';
?>
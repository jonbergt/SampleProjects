<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<title>Forthcoming Club Dives and Events with Skooba-Faux-U</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/skooba-Faux-U/style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="header">
		<div id="sitebranding">
			<h1>Skooba-Faux-U.com</h1>
		</div>
		<div id="tagline">
			<p>The Mid-Mississippi Valley Diving Club - get to the bottom of Mark Twain's world!
			</p>
		</div>
	</div><!-- END header -->
	<div id="navigation">
		<ul>
			<li><a href="http://localhost/skooba-Faux-U/">Home</a></li>
			<li><a href="http://localhost/skooba-Faux-U/about/">About Us</a></li>
			<li><a href="http://localhost/skooba-Faux-U/events/">Club Events</a></li>
			<li><a href="http://localhost/skooba-Faux-U/contact/">Contact Us</a></li>
		</ul>
	</div><!-- END navigation -->
	<div id="bodycontent">
      <p><img class="feature" src="/skooba-Faux-U/images/floating.jpg" height="129" width="197" 
         alt="A club member pauses a dive for a floating pose" />        
      </p>
      <h2>Forthcoming Club Events</h2>
  		<p>Skooba-Faux-U members love meeting up for dive trips around the country.  
			Below are all the dive trips that we currently 
			have planned.  For more information about any of them, 
			please get in contact with that event's organizer. 
		</p>
      <table class="events" summary="Details of upcoming club events and dive trips">
			<caption>Club events/dive trips for the next six months</caption>
			<!-- "scope" tells the browser to associate this header with the entire column
					when being read, for e.g., by assistive technology, which will read linearly
					by row and otherwise lose the conceptual link between cells beneath and the 
					header
			 -->
			<tr>
            <th scope="col">Date</th>
				<th scope="col">Event<br/>Description</th>
				<th scope="col">Location</th>
				<th scope="col">Details</th>
				<th scope="col">Contact</th>
			</tr>
			<?php 
				echo $eventRows;
			?>
  		</table>
	</div><!-- END bodycontent -->
</body>
</html>
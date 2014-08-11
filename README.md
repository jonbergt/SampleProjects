SampleProjects
==============

[Programming projects to share and review]

Please note that the three folders in "SampleProjects" represent 3 versions of the same web project.  Each folder represents a stage of my progressive effort to learn new skills and at the same time apply some of what I already know about database programming from my years of experience with RPG ILE and RPG-Free programming on the IBM iSeries platform. The folder/stages are outlined below, with Version 3 being the current "live" operational sample posted on the Web at skooba-faux-u-cs.com :

Version 1 - "BuildYourOwnWebsite": this is the original out-of-the-box, "paint-by-number" style web site built from the instructions in the book of the same title published by Sitepoint.com.  The artwork was downloaded from the book's associated website, but the HTML was coded by my hand as an intro to building websites.  The design is however supplied by the author(s) of the book for training, and not my design.  (This version is not posted on the Web).

Version 2 - "Skooba-Faux-U": this version adds some database programming of my own design, changing the originally "hard-coded" table data found in the Version 1 design on the "events" page, to instead be supplied from a MySQL database of multiple tables, with my own PHP code supplying the database-access to load the web pages.  (The code was successfully tested, however this version is also not currently posted on a website).

Version 3 - "Skoob-Faux-U-cs": this version is the most current version ("...-cs..." for C#).  It is operational and POSTED ON THE WEB at skooba-faux-u-cs.com. I converted the standard HTML code where necessary to ASP.NET syntax, adpated the database for MS SQLServer, and utilized C#.NET (instead of PHP) to access the data, both for display in the "events" page, and for update from the "contact us" form.  (Note that the primary database-access is accomplished in the App_Code/DataHandler.cs class, not so much the events.aspx.cs or contact.aspx.cs source files)

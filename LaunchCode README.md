SampleProjects
==============

Programming projects to share and review

LaunchCode Team:

If you may remember from our first interview, we determined I would create a project in C# / ASP.NET to further improve my familiarity and skill level.  I offered to take an older web project I began as simply a "by the book" HTML training project about 3 years ago.  At that time, I also began some PHP training, and decided to adapt the "straight out of the book" version to include my own from-scratch design to store in my own MySQL database the originally hard-coded table values in the "by the book" version, and then also enhance the HTML to include PHP code to display and maintain the newly added MySQL database.

The CURRENT version is now in ASP.NET.  Since I had a little difficulty inserting ASP.NET server controls into the HTML "as-is" while taking on the challenge of maintaining the basic CSS-style and design on those pages,  I chose to rewrite some standard HTML into ASP.NET rather than play around with merging two different techniques.

My goal was then to rewrite my original PHP code from 2 or 3 years ago, now within the context of the .NET framework and C#.NET, and make it accomplish the same (or slightly better) functionality.  So on the ASP.NET side I decided to add some standard .NET framework validation controls on the entry form but to use an "ObjectDataSource" on the submit button and the GridView/table so that C# code would be REQUIRED to enable the database functionality that I had previously designed in PHP code.

Please consider then, the 3 project folders in this 3 phase context (not in alpha-sequence as in the repository): 

1. BuildYourOwnWebSite - this represents the original HTML-only web site (a fictional scuba diving club called "BubbleUnder") built simply following instructions "by-the-book" (i.e. "Build Your Own Website the Right Way" by Ian Lloyd, published by Sitepoint.com).

2. Skooba-Faux-U - this represents the same basic HTML code/appearance as the BubbleUnder website from #1, but I renamed the fictional "club" to Skooba-Faux-U and added my own designed PHP/MySQL functionality for database.

3. Skooba-Faux-U-cs - this represnts the CURRENT project still based on the original HTML/appearance but maintaining my added database and code only now fully redesigned in SQLServer (instead of MySQL) and restated (and somewhat redesigned) in C# code.

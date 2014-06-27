SampleProjects
==============

Programming projects to share and review

LaunchCode Team:

If you may remember from our first interview, we determined I would create a project in C# / ASP.NET to further improve my familiarity and skill level.  I offered to revise in ASP.NET/C# an older web project that was originally a "by the book" HTML training project about 3 years ago.  At that time, I also began some PHP training, and decided to enhance the "straight out of the book" version to include my own from-scratch MySQL database design in which to store the originally hard-coded table values in the "by the book" version, and then also enhance the HTML to include PHP code to display and maintain the newly added MySQL database.
 
The CURRENT version is now in ASP.NET and C#.  Since I had a little difficulty inserting ASP.NET server controls into the HTML "as-is" while taking on the challenge of maintaining the basic CSS-style and design on those pages,  I chose instead to rewrite some of the standard HTML into ASP.NET rather than play around with merging two different front-end techniques.
 
My goal then was to rewrite my original PHP code from 2 or 3 years ago, now to utilize the .NET framework and C#.NET, and make it accomplish the same (or slightly better) functionality.  So on the ASP.NET side I decided to enhance the original functionality with some standard .NET framework validation controls on the entry form, and then to select an "ObjectDataSource" for the submit button and the GridView/table (rather than using the ASP.NET framework to generate its own data access functions) so that C# code would be REQUIRED to be added to enable the database functionality that I had previously designed in PHP code.
 
Please consider then, the 3rd folder in sequence below as the "target" or current version of the now 3 phase development; folders listed in 1 & 2 below are for comparison only:  

1.BuildYourOwnWebSite - this represents the original HTML-only web site (a fictional scuba diving club called "BubbleUnder") built a few years ago, simply by following instructions "by-the-book" (i.e. "Build Your Own Website the Right Way" by Ian Lloyd, published by Sitepoint.com).

2.Skooba-Faux-U - this next step also from a few years ago, represents the same basic HTML code/appearance as the BubbleUnder website from #1, but I added my own back-end design for PHP/MySQL functionality and database access, and renamed the fictional "diving club" to Skooba-Faux-U.

3.Skooba-Faux-U-cs - ("...-cs" for C Sharp) this represents the CURRENT project still based on the original HTML/appearance but maintaining my added database and code only now fully redesigned for SQLServer (instead of MySQL) with the PHP code restated (and somewhat redesigned) in C#.NET code.


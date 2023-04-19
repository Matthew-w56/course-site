# Basic Info
	
	Author:		Matthew Williams
	Start Date:	January 2023
	Project:	Course Site
	Copyright:	Attribution Only

# Project Overview

	The goal of this project is to be an introductory course to the topic
	of Machine Learning for the user.  It is meant to provide lessons that
	explain a variety of topics, demonstrations that the user can utilize
	to see the algorithms working real-time within the webpage, and possibly
	more as the project matures.

# Current Work Being Done

	Currently, the in-page Linear Regression model is done and the content of
	the lessons is being expanded and refined.  Next steps would include making
	the Linear Regression demo more informational about what's going on, and
	look nicer within the lesson.

# Features of the Site

	1) Robust Log-In System:
		The user can create an account with an email and a password.  The system
		uses cookies and session variables to ensure the user stays logged in if
		that's what they want.  A Database is set up for storing their usernames
		and the salted hashes of their passwords.  The missing feature from this
		system would be a way to recover the account in case of a lost password
		via an emailed link.

# File Structure Explaination

	The "Construction" folder contains items not used in the page itself, but are
	utilized during development.  This can include unused images, page templates,
	temporary JS files for testing, etc.

	Within the "img" folder, there is a "lesson-img" folder that contains all the
	images used within lessons, and a "math" folder that contains all the math equations
	referenced.  Any images directly inside of the "img" folder are general images
	used around the site.

	The "php" folder has all the files that are primarily php utilities, functions,
	etc.  While all the site pages are .php files, those inside of the "php" folder
	are not webpages themselves.  The "handlers" sub-folder holds server-side scripts
	mainly used for logging in and out.

	The "topic" folder is where all the lesson pages live.  They are split into
	sub-folders depending on what lesson group they belong to, and each page is
	a lesson for one topic.

	Any .php file in the root folder is a page in the general website, outside of the
	lessons.
	Note: There is an index.php file inside of each folder and sub-folder.  With the
	exception of the root's index.php page, the rest are a "poor man's security" technique
	to redirect the user to the main index page as opposed to allowing them to browse
	the server files.

# Project Vision

	How big do I plan to make this site, or what all do I intend to add?

	My general vision is that one day it'll have a solid set of lessons on the topics
	lined out in the file structure and informaiton pages of the site.  Ideally, any lesson
	based on a topic that could make for an interactive element would have one (model
	demo, sliders, visualizations, etc).  My goal for the site is somewhere where people
	can come to learn the basics of ML, and come away not only with an intuitive sense
	for what happens behind the scenes, but also with any mathematical background that
	they come ready to receive.  As I learned about ML myself, I was interested in the
	math and found that a better understanding of the calculus, statistics, linear algebra,
	etc greatly increased my understanding of the various ML models, and their abilities and
	limitations.
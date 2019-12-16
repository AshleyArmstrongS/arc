
![My Site](Client/assets/images/GoCollegeLogo.png)
# Go College
Our website is designed to allow students to get to college more efficently whilebeing in contact with other students.

## Notes
- We have used PostgreSQL, this must installed on your machine
- The php.ini file must be configured to allow the PostgreSQL to connect to the project Look for the Windows Extensions section and uncomment the PostgreSQL modules by removing the semicolon (;) from the beginning of the following lines:
 1. extension=php_pdo_pgsql.dll
 2. extension=php_pgsql.dll

## Table of contents

- [Introduction](#Introduction)
- [Project Features](#project-features)
- [Improvements](#improvements)
- [References](#references)
- [Hosting Links](#hosting)


## Introduction
A non existing user will be not be able to view any pages on the website. A user must pass the authentication before being a registered user. Exisitng users will be able to log in and view the all other drivers or passengers stored in the database. A user eill be able to search for a particular user, filter users by gender and day. Once the desired user is found, their profile can be viewed by clicking on their name, a conversation can be started by clicking the message icon and the distance between the logged in user and the user listed is displayed. A map has been integrated also, once the map icon is clicked there are two pins on the map to represent the location of th elogged in user and the user that has been clicked on. You can schedule a lift with a user once you message them and you are the driver. Reviews can also be left by clicking on each users profile, review is in the form of a star system and a comment box.


## Project Features
- Applied MVC 
- Create, read and update for users
- Messaging System
- Rating System
- Schedule lifts
- Ajax/Javascript to retrieve filter values submitted
- Bootstrap
- Font Awsome CSS (icons)
- Login/Sign up
- A collaborative Git repository

## Improvements
There was some features which we would have wished to implement if we had more time:
1. Allow a user to only try enter an authentication code for an email 3 times 
2. Making the site look more attractive to a user
3. Error messages for the forms could be improved
4. Use more images and more bootstrap



## References
- For the front end frame work we have used Boostrap :https://getbootstrap.com/ and :https://jquery.com/
- Rapid library was given to use last year by our lecturer Shane Gavin

## Hosting
- Tried AWS hosting but did not work alongside our PostgreSQL database.
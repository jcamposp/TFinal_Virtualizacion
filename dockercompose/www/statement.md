# Statement

## Login in the restaurant website

### Task

Starting from the Task 6.1 or 6.2 project, you have to modify the `index.php` page to show the logged user in the webpage, using sessions:
+ If it exists a logged user, you have to show his username and his email, and a button to log out.
+ If it doesn't exist a logged user, you have to show a log in button.

First of all, you need to insert into the database some users, using the sql file `users.sql` into the `sql` folder.  

You must create a `login.php` page, that shows a form, asking for a username and a password. With the POST method you have to read this parameters, and query the database searching this user. If this username and password are correct, you have to store the necessary information into sessions variables and return to the `index.php` page.  
You must also create a `logout.php` page to remove all session information from this user.

### Delivery format
+ Start from the GitHub repository "*Restaurants_SurnameName*", created in Task 6.1 or 6.2.
+ The *README* file must be a Markdown file that explains how this program can be deployed in a web server, and their requirements (Apache, PHP, ...). Important: now, it must contain how to deploy the database. This file must contain also information about this task (name, author, subject, school year, ...).
+ The project must contain, into an `sql` folder, a `restaurants.sql` file, with the structure and the data of your database.

Then, you have to send the link to a release of this repository on GitHub.
+ How to create releases: https://help.hithub.com/articles/creating-releases.
+ The release name will be *"Task 7.1"*.
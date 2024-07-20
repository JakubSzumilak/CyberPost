# CyberPost - an online mailing service
A project of internet mailing service made during vocational workshops

## Features
+ Registration and login system
+ Password hashing
+ Account management
+ Three types of subscription available to choose
+ E-mail sending features
+ Uploading E-mail recipents from a CSV file

### How to run
Make sure to see the prerequisites folder for .ini files. Copy your .ini files and replace them with the given files in the following locations:
+ xampp\sendmail\sendmail.ini
+ xampp\php\php.ini

You will also have to create a database "bazapraktyki" and import the users table using users.sql in the prerequisites folder. If you wish to have another name for the database, change in in the users.sql and login.php

When trying to send an email, you will be asked to designate recipents. The only way to do that is to attach a CSV file with addresses. An example CSV file is in the prerequisites folder

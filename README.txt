Download and install XAMPP.
in windows explorer Navigate to C:\xampp\apache\conf
rightclick httpd.conf and open with text editor
scroll down to line 246 where it says DocumentRoot "C:/xampp...
change lines 246 and 247 to:
DocumentRoot "C:/xampp/htdocs/SER322-FinalProject-master/SER322-FinalProject-master/www"
<Directory "C:/xampp/htdocs/SER322-FinalProject-master/SER322-FinalProject-master/www">

unzip SER322-FinalProject-master.zip to C:/xampp/htdocs
Run XAMPP controll panel.
On the Apache module and the MySQL module, click start.
navigate to C:\xampp\htdocs\SER322-FinalProject-master\SER322-FinalProject-master\setup
right click SQL_DUMP.sql and open with text editor
copy all text from SQL_DUMP.sql
in the web browser, navigate to http://localhost/phpmyadmin/
click the SQL tab
paste the text from SQL_DUMP.sql
click the 'Go' button at the bottom right
in windows explorer navigate to C:\xampp\htdocs\SER322-FinalProject-master\SER322-FinalProject-master\config
rightclick db.config.php open with text editor
change DB_USER, DB_PASSWORD, and DB_HOST if needed
navigate to C:\xampp\htdocs\SER322-FinalProject-master\SER322-FinalProject-master\www
rightclick index.php and open with a web browser
change the URL to: http://localhost/index.php


If the below error is encountered, please run the following SQL statement as root: (this error occured while running on Ubuntu)

ERROR:
Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'TEAM05_MOVIES.m.ID' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by

SQL:
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));

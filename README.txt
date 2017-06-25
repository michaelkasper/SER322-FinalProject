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

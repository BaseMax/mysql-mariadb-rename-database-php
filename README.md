# mysql-mariadb-rename-database-php

A tiny script to rename and move all of your table into a new database. (using pure PHP)

## Using

```
$ php rename.php
```

Keep in mind that the transfer may take some time. Therefore, no time limit should be set on PHP and the web server.

To prevent this, it is better to run directly on the server console.
You can get help from cronjob too. (Remember we use transactions, this can cause problem if you are already using your database in proccess list)

## Config database connection

```php
$servername = "localhost";
$username = "root";
$password = "01";
$dbname = "stock";
$nextDbname= "newDB";
```

You must put your database information in the desired file.

Keep in mind that your user may need to have access to **both databases**. (Both current and future databases)

### Setting the php maximum execution time

Use a text editor to add the following line to the `.htaccess` file. Replace 30 with the maximum execution time value that you want to set, in seconds:
```
php_value max_execution_time 30
```

Save the changes to the `.htaccess` file and exit the text editor.

To verify that the new setting is active, create a PHP test file that contains the following code in the same directory where the `.htaccess` file is located:
```php
<?php phpinfo(); ?>
```

## Apache max_execution_time

**.htaccess** file:

```
<IfModule mod_php5.c>
php_value max_execution_time 300
</IfModule>

OR

<IfModule mod_php7.c>
    php_value max_execution_time 300
</IfModule>
```

**More configuration options:**

```
<IfModule mod_php5.c>
  php_value post_max_size 5M
  php_value upload_max_filesize 5M
  php_value memory_limit 128M
  php_value max_execution_time 300
  php_value max_input_time 300
  php_value session.gc_maxlifetime 1200
</IfModule>

OR

<IfModule mod_php7.c>
  php_value post_max_size 5M
  php_value upload_max_filesize 5M
  php_value memory_limit 128M
  php_value max_execution_time 300
  php_value max_input_time 300
  php_value session.gc_maxlifetime 1200
</IfModule>
```

ref: https://stackoverflow.com/questions/7739870/increase-max-execution-time-for-php

---------

# Max Base

My nickname is Max, Programming language developer, Full-stack programmer. I love computer scientists, researchers, and compilers. ([Max Base](https://maxbase.org/))

## Asrez Team

A team includes some programmer, developer, designer, researcher(s) especially Max Base.

[Asrez Team](https://www.asrez.com/)

# mysql-mariadb-rename-database-php

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

---------

# Max Base

My nickname is Max, Programming language developer, Full-stack programmer. I love computer scientists, researchers, and compilers. ([Max Base](https://maxbase.org/))

## Asrez Team

A team includes some programmer, developer, designer, researcher(s) especially Max Base.

[Asrez Team](https://www.asrez.com/)

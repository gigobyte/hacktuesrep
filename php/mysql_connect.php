<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "lorempass";
$db_name = "users";

@mysql_connect ("$db_host","$db_username","$db_password") or die ("Couldn't connect to MySQL");
@mysql_select_db("$db_name") or die ("No database");
mysql_query("set names 'utf8'");

?>
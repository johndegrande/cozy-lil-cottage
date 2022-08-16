<?php
$hostname='localhost';
$username='discoverystudio';
$password='@8mnEn395mQ-';
$dbname='cozylilcottage';
mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
?>
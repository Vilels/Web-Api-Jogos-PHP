<?php
require_once ("lib/limonade.php");
require "jogos.php";

function configure() {
try {
    $dbh = new PDO('mysql:host=localhost;dbname=jogos', "root", "TcM22R00");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	option('db_conn', $dbh);
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
}
  
  run();
?>
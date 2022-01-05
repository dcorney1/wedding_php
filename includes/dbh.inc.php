<?php
  //defin PDO - tell about the database file
  $dir = 'sqlite:' . realpath(__DIR__ . '/..') . './db/wedding.sqlite';
  print($dir);
  $dbh  = new PDO($dir) or die("cannot open the database");
  $result = $dbh->exec('PRAGMA journal_mode=WAL;');
  if ($result === FALSE) {
    print "Failed to set schema: " . $conn->errorMsg();
  }

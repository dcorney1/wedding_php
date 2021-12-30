<?php
  //defin PDO - tell about the database file
  $dir = 'sqlite:' . __DIR__ . '/wedding.sqlite';

  $dbh  = new PDO($dir) or die("cannot open the database");
  $result = $dbh->exec('PRAGMA journal_mode=WAL;');
  if ($result === FALSE) {
    print "Failed to set schema: " . $conn->errorMsg();
  }

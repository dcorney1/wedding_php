<?php
  //defin PDO - tell about the database file
  $pdo = new PDO('sqlite:' . __DIR__ . '/includes/wedding.sqlite');

  //write SQL
  $statement = $pdo->query("select * from guests");

  //run the sqlite_array_query
  $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

  //show it on the screen
  var_dump($rows);

<?php

require 'config.php';

// ملف ترحيل الجداول الي الداتا بيس
try {

    $migrateConn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $migrateConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Read the contents of the SQL file
    $sqlFile = file_get_contents('sqlDatabase.sql');

    // use exec() because no results are returned
    $migrateConn->exec($sqlFile);

    echo "Smart Database created successfully<br>";
} catch (PDOException $e) {
    echo  "<br>" . $e->getMessage();
}

<?php

//Koneksi dengan database

$databaseHost = 'localhost';
$databaseName = 'db_crud';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);

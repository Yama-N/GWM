<?php

const ENV = "prod";

function getPDOInstance() 
{
  if (ENV === "prod") {
    $dsn = 'mysql:dbname=atgp-sby_y-miyazaki;host=mysql57.atgp-sby.sakura.ne.jp;charset=utf8mb4';
    $username = 'atgp-sby';
    $password = 'General777';
  } elseif (ENV === "miyazaki") {
    $dsn = 'mysql:dbname=gwm;host=localhost;charset=utf8mb4';
    $username = 'root';
    $password = 'root';
  } elseif (ENV === "yamashita") {
    $dsn = 'mysql:dbname=gwm;host=localhost;charset=utf8mb4';
    $username = 'root';
    $password = '';
  }
    $driver_options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, $username, $password, $driver_options);
    return $pdo;
}

function getData($pdo)
{
  $stmt = $pdo->query("SELECT * FROM data");
  $rows = $stmt->fetchAll();
  return $rows;
}


function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


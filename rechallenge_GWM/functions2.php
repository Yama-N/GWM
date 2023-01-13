<?php

const ENV = "prod";

function getPDOInstance() 
{
  if (ENV === "prod") {
    $dsn = 'mysql:dbname=fitsuki_gwm;host=mysql1.php.xdomain.ne.jp;charset=utf8';
    $username = 'fitsuki_gwm';
    $password = '123qwerty';
  } elseif (ENV === "miyazaki") {
    $dsn = 'mysql:dbname=gwm;host=localhost;charset=utf8';
    $username = 'root';
    $password = 'root';
  } elseif (ENV === "yamashita") {
    $dsn = 'mysql:dbname=gwm;host=localhost;charset=utf8';
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
  $stmt = $pdo->query("SELECT * FROM data order by id asc");
  $rows = $stmt->fetchAll();
  return $rows;
}


function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


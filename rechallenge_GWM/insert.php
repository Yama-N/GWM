<?php

  $id = $_POST['id'];
  $start_hour = $_POST['start_hour'];
  $start_min = $_POST['start_min'];
  $end_hour = $_POST['end_hour'];
  $end_min = $_POST['end_min'];
  $comment = $_POST['comment'];

  // var_dump($id,$start_hour,$start_min,$end_hour,$end_min,$comment);

  require_once(__DIR__ . DIRECTORY_SEPARATOR . "functions2.php");

try {
  $pdo = getPDOInstance();
  
  if ($end_hour === 'bounce') {
    $is_bounce = 1;
  } else {
    $is_bounce = 0;
  }
                                                        
  $stmt = $pdo->prepare("UPDATE data SET start_hour=:start_hour,start_min=:start_min,end_hour=:end_hour,end_min=:end_min,is_bounce=:is_bounce,comment=:comment,login_flag=:login_flag,updated_at=now() WHERE id = :id");
  $stmt->bindValue('id', $id, PDO::PARAM_INT);
  if ($start_hour === "") {
    $stmt->bindValue('start_hour', NULL, PDO::PARAM_INT);
  } else {
    $stmt->bindValue('start_hour', $start_hour, PDO::PARAM_INT);
  }
  if ($start_min === "") {
    $stmt->bindValue('start_min', NULL, PDO::PARAM_INT);
  } else {
    $stmt->bindValue('start_min', $start_min, PDO::PARAM_STR);
  }
  if ($end_hour === "") {
    $stmt->bindValue('end_hour', NULL, PDO::PARAM_INT);
  } else {
    $stmt->bindValue('end_hour', $end_hour, PDO::PARAM_INT);
  }
  if ($end_min === "") {
    $stmt->bindValue('end_min', NULL, PDO::PARAM_INT);
  } else {
    $stmt->bindValue('end_min', $end_min, PDO::PARAM_INT);
  }
  
  $stmt->bindValue('is_bounce', $is_bounce, PDO::PARAM_INT);
  $stmt->bindValue('comment', $comment, PDO::PARAM_STR);
  $stmt->bindValue('login_flag', 1, PDO::PARAM_INT); // grayout用フラグ追加
  $stmt->execute();
  
  header('Location: ./index.php');
  
} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}




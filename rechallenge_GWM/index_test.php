<?php
  require_once(__DIR__ . DIRECTORY_SEPARATOR . "functions2.php");

  try {
    $pdo = getPDOInstance();
  
    $rows = getData($pdo);

    
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>行先掲示板</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body class="body_top">

  <header class="header_top">
    <!-- 現在時刻 -->
    <div class="header_time_top" datetime="<?= date("Y.m.d H:i") ?>"><?= date("Y.m.d H:i") ?></div>
  </header>
  
</body>
</html>
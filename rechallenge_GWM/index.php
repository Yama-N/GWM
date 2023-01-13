<?php
  require_once(__DIR__ . DIRECTORY_SEPARATOR . "functions2.php");

  try {
    $pdo = getPDOInstance();
  
    $rows = getData($pdo);

    $stmt = $pdo->prepare("UPDATE data SET start_hour=:start_hour,start_min=:start_min,end_hour=:end_hour,end_min=:end_min,is_bounce=:is_bounce,comment=:comment,login_flag=:login_flag,updated_at=NULL WHERE updated_at < CURRENT_DATE");
    $stmt->bindValue('start_hour', NULL, PDO::PARAM_INT);
    $stmt->bindValue('start_min', NULL, PDO::PARAM_INT);
    $stmt->bindValue('end_hour', NULL, PDO::PARAM_INT);
    $stmt->bindValue('end_min', NULL, PDO::PARAM_INT);
    $stmt->bindValue('is_bounce', NULL, PDO::PARAM_INT);
    $stmt->bindValue('comment', NULL, PDO::PARAM_STR);
    $stmt->bindValue('login_flag', 0, PDO::PARAM_INT); // grayout用フラグ追加
    $stmt->execute();

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
  
  <main class="main_top">
    <?php foreach ($rows as $row) : ?>
      <div class="row">
      <!-- grayout用場合分け -->
      <?php if ((int) $row['login_flag'] === 1 ) : ?> 
        <table class="name_time">
      <?php else : ?>
        <table class="name_time_grayout">
      <?php endif; ?>
          <tbody>
            <tr onclick="location.href = 'edit.php?id=<?= $row['id'] ?>'">
              <th class="name_top"><div><?= $row['name'] ?></div><th>
              <!-- コメント -->
              <td class="comment">
                <!-- コメントをDBから表示 -->
                <div><?= h($row['comment']) ?></div>
              </td> 
              <!-- 開始時間 -->
              <td class="time_top">
                <i class="start_time">
                  <!-- 開始時間をDBから表示 -->
                  <?php if ($row['start_hour'] === NULL and $row['start_min'] === NULL) : ?>
                  <?php else : ?>
                  <?= h(sprintf('%02d', $row['start_hour']).':'.sprintf('%02d', $row['start_min'])) ?><span class="nami">～</span>
                  <?php endif; ?>
                </i>
                <!-- 終了時間 -->
                <i class="end_time">
                  <!-- 終了時間をDBから表示 -->
                  <?php if ($row['end_hour'] === NULL and $row['end_min'] === NULL) : ?>
                  <?php elseif ($row['is_bounce'] === 1) : ?>
                    <p class="end_time_bounce"><?= '直帰' ?></p>
                  <?php else : ?>
                    <?= h(sprintf('%02d', $row['end_hour']).':'.sprintf('%02d', $row['end_min'])) ?>
                  <?php endif; ?>
                </i>
              </td>
            </tr>
            <input type="hidden" value="<?= $row['updated_at'] ?>" class="updated_at">
          </tbody>
        </table>
      </div>
    <?php endforeach ; ?>
  </main>
  
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>
</html>
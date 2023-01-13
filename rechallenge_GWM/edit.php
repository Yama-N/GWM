<?php

$id = $_GET['id'];

require_once(__DIR__ . DIRECTORY_SEPARATOR . "functions2.php");

try {
  $pdo = getPDOInstance();

  $rows = getData($pdo);

} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

// xfree対応のため(int)を追加　$idとstart_hour他の型を合わせるため　*_minは00がありNULLの場合INTでは0になるため場合分けをする
$name = $rows[$id - 1]['name'];
$comment = $rows[$id - 1]['comment'];
$start_h = (int) $rows[$id - 1]['start_hour'];
if ($row['start_min'] === NULL ) : 
  $start_m = $rows[$id - 1]['start_min'];
else : 
  $start_m = (int) $rows[$id - 1]['start_min'];
endif; 
$end_h = (int) $rows[$id - 1]['end_hour'];
if ($row['end_min'] === NULL ) : 
  $start_m = $rows[$id - 1]['end_min'];
else : 
  $start_m = (int) $rows[$id - 1]['end_min'];
endif; 
$is_bounce = $rows[$id - 1]['is_bounce'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>行先掲示板 - 編集 - </title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body class="body_edit">
  <header class="header_edit"> 
    <!-- 現在時刻 -->
    <div class="header_time_edit" datetime="<?= date("Y-m-d") ?>"><?= date("Y.m.d") ?></div>
  </header>

  <main class="main_edit">
    <!-- 担当者名 -->
    <div class="name_edit">
      <p>
        氏名
      </p>
      <h2>
        <!-- DBから名前を表示 -->
        <?= $name ?>
      </h2>
    </div>

    <!-- データ送信 -->
    <form method="post" action="insert.php" id="form">
      <div class="time_form">
        <!-- 時間 -->
        <p>外出時間</p>
        <select name="start_hour" class="time_edit">
          <option value=""></option>
          <option value="00">00</option>
          <?php for($i=1; $i<=9; $i++) : ?>
            <?php if ($i === $start_h) : ?>
              <option value="<?= $i ?>" selected>0<?= $i ?></option>
            <?php else : ?>
              <option value="<?= $i ?>">0<?= $i ?></option>
            <?php endif; ?>
          <?php endfor ; ?>
          <?php for($i=10; $i<=23; $i++) : ?>
            <?php if ($i === $start_h) : ?>
              <option value="<?= $i ?>" selected><?= $i ?></option>
            <?php else : ?>
              <option value="<?= $i ?>"><?= $i ?></option>
            <?php endif; ?>
          <?php endfor ; ?>
        </select>
        <!-- コロン -->
        <span class="colon">:</span>
        <!-- 分 -->
        <select name="start_min" class="time_edit">
          <option value=""></option>
        <?php if ($start_m === 00) : ?>
          <option value="00" selected>00</option>
          <?php else : ?>
          <option value="00">00</option>
        <?php endif; ?>
        <?php if ($start_m === 30) : ?>
          <option value="30" selected>30</option>
          <?php else : ?>
          <option value="30">30</option>
        <?php endif; ?>
        </select>
        <!-- 波 -->
        <span class="wave">～</span>
        <!-- 時間 -->
        <select name="end_hour" class="time_edit">
          <option value=""></option>
          <option value="00">00</option>
          <?php for($i=1; $i<=9; $i++) : ?>
            <?php if ($i === $end_h) : ?>
              <option value="<?= $i ?>" selected>0<?= $i ?></option>
            <?php else : ?>
              <option value="<?= $i ?>">0<?= $i ?></option>
            <?php endif; ?>
          <?php endfor ; ?>
          <?php for($i=10; $i<=23; $i++) : ?>
            <?php if ($i === $end_h) : ?>
              <option value="<?= $i ?>" selected><?= $i ?></option>
            <?php else : ?>
              <option value="<?= $i ?>"><?= $i ?></option>
            <?php endif; ?>
          <?php endfor ; ?>
        <?php if ($is_bounce === 1) : ?>
          <option value="bounce" selected>直帰</option>
          <?php else : ?>
          <option value="bounce">直帰</option>
        <?php endif; ?>
        </select>
        <!-- コロン -->
        <span class="colon">:</span>
        <!-- 分 -->
        <select name="end_min" class="time_edit">
          <option value=""></option>
          <?php if ($end_m === 00) : ?>
          <option value="00" selected>00</option>
          <?php else : ?>
          <option value="00">00</option>
        <?php endif; ?>
        <?php if ($end_m === 30) : ?>
          <option value="30" selected>30</option>
          <?php else : ?>
          <option value="30">30</option>
        <?php endif; ?>
        </select>
      </div>

      <!-- コメントフォーム -->
      <dl>
        <dt class="comment_edit_title">
          <label for="c">用件(30文字以内)<span class="show_count">0</span>/30</label>
          <button type="button" class="remove_button"></button>
        </dt>
        <dd class="comment_edit_form">
          <!-- コメント -->
          <div><textarea placeholder="文字を入力してください" class="comment_edit" name="comment"><?= $comment ?></textarea></div>
        </dd>
      </dl>

      <!-- エラーメッセージ -->
      <div class="error_message">
        <!-- エラーアイコンは疑似要素で追加 -->
        <p class="error"></p>
      </div>
      
      <input type="hidden" name="id" value="<?= $id ?>">
      
      <!-- 登録＋全体削除 -->
      <ul>
        <li><button type="reset" class="clear">クリア</button></li>         
        <li><button type="submit" class="insert">登録</button></li>         
      </ul>

    </form>
  </main>

  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>
</html>
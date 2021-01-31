<?php


require_once('funcs.php');
$pdo = db_conn();
$id = $_GET['id'];

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM 俳句帳 WHERE id = " . $id . ';');
$status = $stmt->execute();


//３．データ表示

if ($status == false) {
    sql_error($status);
} else {
    $row =  $stmt->fetch();
}


?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>俳句リスト</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>詳細データ</legend>
     <label>俳句：<input type="text" name="haiku" value=" <?= $row['haiku']?>"></label><br>
     <label>季語：<input type="text" name="kigo" value=" <?= $row['kigo']?>"></label><br>
     <label>季節：<input type="text" name="kisetsu" value=" <?= $row['kisetsu']?>"></label><br>
     <input type="hidden" name="id" value=" <?= $row['id']?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

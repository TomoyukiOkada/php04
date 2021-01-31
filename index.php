<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>俳句</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
      
      <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
      <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>俳句登録</legend>
     <label>俳句：<input type="text" name="haiku"></label><br>
     <label>季語：<input type="text" name="kigo"></label><br>
     <label>季節
     <select name="kisetsu">
        <option value="春">春</option>
        <option value="夏">夏</option>
        <option value="秋">秋</option>
        <option value="冬">冬</option>
        <option value="新年">新年</option>
        <option value="無季">無季</option>
     </select>
     <br>
     <input type="submit" value="詠">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

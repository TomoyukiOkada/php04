<?php
session_start();

require_once('funcs.php');
$pdo = db_conn();

loginCheck();

//データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM 俳句帳");
$status = $stmt->execute();



$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';

        
        $view .= '<a href ="detail.php?id=' . $result['id'] . '">';
        $view .= $result["haiku"];
        $view .='</a>';

        $view .= '<a href ="delete.php?id=' . $result['id'] . '">';
        $view .= '【削除】';
        $view .='</a>';

        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>俳句表示</title>
    <style type="text/css">
<!--
body{
  -ms-writing-mode: tb-rl;
  writing-mode: vertical-rl;
}
-->
</style>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">詠</a>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="select_haru.php">春</a>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="select_natsu.php">夏</a>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="select_aki.php">秋</a>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="select_fuyu.php">冬</a>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="select_shinnen.php">新年</a>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="select_muki.php">無季</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>

<?php
session_start();
// DB接続
require_once("funcs.php");
$pdo = db_conn();

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$stmt = $pdo->prepare('SELECT * FROM user');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

// エラー
if($status==false){
    sql_error($stmt);
}


$val = $stmt->fetch();


if( $val["id"] != "" ){
    
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    $_SESSION["name"]      = $val['name'];
    header('Location: select.php');
}else{
    //Login失敗時(Logout経由)
    header('Location: login_error.php');
}

exit();
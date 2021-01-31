<?php
$haiku   = $_POST["haiku"];
$kigo  = $_POST["kigo"];
$kisetsu = $_POST["kisetsu"];


require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare("INSERT INTO 俳句帳(haiku,kigo,kisetsu)VALUES(:haiku,:kigo,:kisetsu)");
$stmt->bindValue(':haiku', $haiku, PDO::PARAM_STR);
$stmt->bindValue(':kigo', $kigo, PDO::PARAM_STR);
$stmt->bindValue(':kisetsu', $kisetsu, PDO::PARAM_STR);
$status = $stmt->execute(); //実行



if($status==false){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    header("Location: index.php");
    exit();
}
?>

<?php
//1. POSTデータ取得
$bname   = $_POST["bname"];
$burl  = $_POST["burl"];
$bcomment = $_POST["bcomment"];
 //追加されています

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO 0718gs_an_table(bname,burl,bcomment,indate)VALUES(:bname,:burl,:bcomment,sysdate())");
$stmt->bindValue(':bname', $bname, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':burl', $burl, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bcomment', $bcomment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("index.php");
}
?>

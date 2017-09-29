<?php
//1. データ受信
//セ・リーグ
$commentatorC = $_POST["commentatorC"];//解説者
$dateC = $_POST["dateC"];//掲載・放送日
$sourceC = $_POST["sourceC"];//出所
$firstC = $_POST["firstC"];//1位
$secondC = $_POST["secondC"];//2位
$thirdC = $_POST["thirdC"];//3位
$fourthC = $_POST["fourthC"];//4位
$fifthC = $_POST["fifthC"];//5位
$sixthC = $_POST["sixthC"];//6位
$remarksC = $_POST["remarksC"];//備考


//パリーグ
$commentatorP = $_POST["commentatorP"];//解説者
$dateP = $_POST["dateP"];//掲載・放送日
$sourceP = $_POST["sourceP"];//出所
$firstP = $_POST["firstP"];//1位
$secondP = $_POST["secondP"];//2位
$thirdP = $_POST["thirdP"];//3位
$fourthP = $_POST["fourthP"];//4位
$fifthP = $_POST["fifthP"];//5位
$sixthP = $_POST["sixthP"];//6位
$remarksP = $_POST["remarksP"];//備考


//2. db接続
try {
  $pdo = new PDO('mysql:dbname=pro_bb;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//３．SQLを作って実行
if(isset($commentatorC)){
    //セ・リーグ
    $stmt = $pdo->prepare("INSERT INTO central_league(id, commentator, indate, source, first, second, third, fourth, fifth, sixth, remarks )VALUES(NULL, :commentatorC, :dateC, :sourceC, :firstC, :secondC, :thirdC, :fourthC, :fifthC, :sixthC, :remarksC )");
    $stmt->bindValue(':commentatorC', $commentatorC, PDO::PARAM_STR);
    $stmt->bindValue(':dateC', $dateC, PDO::PARAM_STR);
    $stmt->bindValue(':sourceC', $sourceC, PDO::PARAM_STR);
    $stmt->bindValue(':firstC', $firstC, PDO::PARAM_STR);
    $stmt->bindValue(':secondC', $secondC, PDO::PARAM_STR);
    $stmt->bindValue(':thirdC', $thirdC, PDO::PARAM_STR);
    $stmt->bindValue(':fourthC', $fourthC, PDO::PARAM_STR);
    $stmt->bindValue(':fifthC', $fifthC, PDO::PARAM_STR);
    $stmt->bindValue(':sixthC', $sixthC, PDO::PARAM_STR);
    $stmt->bindValue(':remarksC', $remarksC, PDO::PARAM_STR);
    $status = $stmt->execute();
} else {
    //パリーグ
    $stmt = $pdo->prepare("INSERT INTO pacific_league(id, commentator, indate, source, first, second, third, fourth, fifth, sixth, remarks )VALUES(NULL, :commentatorP, :dateP, :sourceP, :firstP, :secondP, :thirdP, :fourthP, :fifthP, :sixthP, :remarksP )");
    $stmt->bindValue(':commentatorP', $commentatorP, PDO::PARAM_STR);
    $stmt->bindValue(':dateP', $dateP, PDO::PARAM_STR);
    $stmt->bindValue(':sourceP', $sourceP, PDO::PARAM_STR);
    $stmt->bindValue(':firstP', $firstP, PDO::PARAM_STR);
    $stmt->bindValue(':secondP', $secondP, PDO::PARAM_STR);
    $stmt->bindValue(':thirdP', $thirdP, PDO::PARAM_STR);
    $stmt->bindValue(':fourthP', $fourthP, PDO::PARAM_STR);
    $stmt->bindValue(':fifthP', $fifthP, PDO::PARAM_STR);
    $stmt->bindValue(':sixthP', $sixthP, PDO::PARAM_STR);
    $stmt->bindValue(':remarksP', $remarksP, PDO::PARAM_STR);
    $status = $stmt->execute();
}

//４．
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
  
}else{
  header("Location: index.php");
  exit;

}
?>

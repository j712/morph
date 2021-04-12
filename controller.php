<?php 
$recessive = ["Albino", "Lavender Albino","Clown,VPIAxanthic","Pied","DesertGhost"];
$co_dom = ["Pastel","YellowBelly","BlackPastel","OrangeDream","BlackHead","Enchi","Spark","Leopard","Mojave","Lesser","Special"];
$blue_eye = ["Mojave","Lesser","Special","Butter"];
$aka = ["Ivory" => "YellowBelly","EightBall" => "BlackPastel","EightBall" => "Cinnamon","Scaleless" => "ScalelessHead"];

require("func.php");

$response = [explode(",", $_GET['male']),explode(",", $_GET['female'])];
//--------------遺伝子情報の分解する箇所
//male
$males = separate($response[0],$recessive);
//female
$females = separate($response[1],$recessive);
//全件一致を行う
$morphArr = combine([$males,$females]);
//文字列に変換&文字列内でsort
$morphs = strEtc($morphArr,$aka);
//valueの値を割合に変換
$par = array_count_values($morphs[0]);
//モルフ名＋％表記の値
foreach ($par as $key => $value) $morphList[] = [$key,$value / count($morphs[0]) * 100];
require("output.php");
?>
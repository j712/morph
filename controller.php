<?php 
$recessive = ["Albino", "Lavender Albino","Clown,VPIAxanthic","Pied"];
$co_dom = ["Pastel","YellowBelly","BlackPastel","OrangeDream","BlackHead","Enchi","Spark","Leopard","Mojave","Lesser","Special"];
$blue_eye = ["Mojave","Lesser","Special","Butter"];
$aka = ["Ivory" => "YellowBelly","EightBall" => "BlackPastel","EightBall" => "Cinnamon","Scaleless" => "ScalelessHead"];


require("func.php");

$response = [explode(",", $_GET['male']),explode(",", $_GET['female'])];



//--------------遺伝子情報の分解する箇所
//male
foreach ($response[0] as $value) $male[] = disassembly($value, $recessive);
$males = (2 <= count($male)) ? combine($male) : combine(one($male));
//female
foreach ($response[1] as $value) $female[] = disassembly($value, $recessive);
$females = (2 <= count($female)) ? combine($female) : combine(one($female));
//全件一致を行う
$morphArr = combine([$males,$females]);

//---------------文字列に変換&文字列内でsort
$morphs = strEtc($morphArr,$aka);
//valueの値を割合に変換
$par = array_count_values($morphs[0]);

foreach ($par as $key => $value) $morphList[] = [$key,$value / count($morphs[0]) * 100];

require("output.php");


function one($sex){
	array_push($sex, ["",""]);
	return $sex;
}
?>
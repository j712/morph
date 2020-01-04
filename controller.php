<?php 
$recessive = ["Albino", "Lavender Albino"];
$co_dom = ["Pastel","YellowBelly","BlackPastel","OrangeDream","BlackHead","Enchi","Spark","Leopard","Mojave","Lesser","Special"];
$blue_eye = ["Mojave","Lesser","Special","Butter"];
$aka = ["Ivory" => "YellowBelly","EightBall" => "BlackPastel","EightBall" => "Cinnamon"];
// $response = 
// [
// 	["BlackPastel","het Albino"],
// 	["YellowBelly","het Albino"]
// ];

require("func.php");

$response = [explode(",", $_GET['male']),explode(",", $_GET['female'])];



//--------------遺伝子情報の分解する箇所
//male
foreach ($response[0] as $value) $male[] = disassembly($value, $recessive);
$males = (count($male) >= 2) ? combine($male) : $male;
//female
foreach ($response[1] as $value) $female[] = disassembly($value, $recessive);
$females = (count($female) >= 2) ? combine($female) : $female;
//全件一致を行う
$morphArr = combine([$males,$females]);
//vd($morphArr);

//---------------文字列に変換&文字列内でsort
$morphs = strEtc($morphArr,$aka);
//ソート
//array_multisort( array_map( "strlen", $morphs ), SORT_DESC, $morphs );
vd($morphs);
//valueの値を割合に変換
$par = array_count_values($morphs);

foreach ($par as $key => $value) $morphList[] = [$key,$value / count($morphs) * 100];
//vd($morphList,"morphList");

require("output.php");
?>
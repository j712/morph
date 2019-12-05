<?php 
$recessive = ["Albino"];
$co_dom = ["Pastel","YellowBelly"];
$dom = ["pin_stripe"];
$co_dom_aka = [["YellowBelly","Ivory"],["BlackPastel","EightBall"]];
$response = 
[
	["BlackPastel","het Albino"],
	["YellowBelly","het Albino"]
];
//--------------遺伝子情報の分解する箇所
//male
foreach ($response[0] as $value) $male[] = disassembly($value, $recessive);
if(count($male) >= 2) $males = combine($male);
//female
foreach ($response[1] as $value) $female[] = disassembly($value, $recessive);
if(count($female) >= 2) $females = combine($female);
//全件一致を行う
$morphArr = combine([$males,$females]);

//---------------文字列に変換&文字列内でsort
foreach ($morphArr as $values) {
	//文字列内のsort
	natsort($values);
	//個数別で出力
	$arr = array_count_values($values);
	//vd($arr);
	$str = "";
	//文字列連結を行う
	foreach ($arr as $key => $value) {
		if($value == 2 && $value != ""){
			if(!strpos($key, "het")) $key = str_replace('het ', '', $key);
		}
		
		if($value != "") $str .= $key . " ";
	}
	$morphs[] = trim($str);
}








array_multisort( array_map( "strlen", $morphs ), SORT_DESC, $morphs ) ;
vd($morphs);
function disassembly($str,$recessive){
	$superExplode = explode(" ", $str);
	if(in_array($str, $recessive)){
		return $result = ["het ". $str,"het ". $str];
	}else if(1 < count($superExplode) && $superExplode[0] == "Super"){
		return $result = [$superExplode[1],$superExplode[1]];
	}else{
		return $result = [$str, ""];
	}
}
function combine($elements, $result=[]) {
	//再帰している場合はfalseの方
    $a = empty($result) ? array_shift($elements) : $result;
    //初期化
    $result = []; 
	$b = array_shift($elements);
    foreach($a as $val1) {
        foreach ($b as $val2) $result[] = array_merge((array)$val1, (array)$val2);
    }
    //再帰の箇所
    if(count($elements) > 0) $result = combine($elements, $result);
    return $result;
}

//出力用
function vd($arr){
	echo "<pre>";
	var_export($arr);
	echo "</pre>";
}
?>
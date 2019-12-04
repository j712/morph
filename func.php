<?php 

$recessive = ["Albino","VPI_Axanthic"];
$co_dom_aka = [["YellowBelly","Ivory"],["BlackPastel","EightBall"]];

$response = 
[
	["BlackPastel","het Albino"],
	["Albino"],
];

//遺伝子情報の分解する箇所
for($i=0;$i<=1;$i++){
	//オスメスで利用するので初期化
	$sex = [];
	//遺伝子情報を分解する
	foreach ($response[$i] as $value) $sex[] = disassembly($value, $recessive);
	if(count($sex[$i]) >= 2){
		$sexs[] = combine($sex[$i]);
	}else{
		$sexs[] = $sex[$i];
	}
	
}
vd($sexs);


//出力
$morphArr = combine([$sexs[0],$sexs[1][0]]);

//文字列に変換&文字列内でsort
foreach ($morphArr as $values) {
	//文字列内のsort
	natsort($values);
	vd(array_count_values($values));
	$arr = array_count_values($values);
	$str = "";
	//文字列連結を行う
	foreach ($arr as $key => $value) {
		$key = $key;
		if($value == 2 && $value != ""){
			if(!strpos($key, "het")) $key = str_replace('het ', '', $key);
		}
		
		if($value != "") $str .= $key . " ";
	}
	$morphs[] = trim($str);
}
//出力順のやつ
array_multisort( array_map( "strlen", $morphs ), SORT_DESC, $morphs ) ;

vd($morphs);

//遺伝子情報を、計算するために分解（het,劣性等も含めて
function disassembly($str,$recessive){
	$superExplode = explode(" ", $str);
	if(in_array($str, $recessive)){
		echo "hetだよ";
		echo "het ". $str,"het ". $str;
		return $result = ["het ". $str,"het ". $str];
	}else if(1 < count($superExplode) && $superExplode[0] == "Super"){
		return $result = [$superExplode[1],$superExplode[1]];
	}else{
		return $result = [$str, ""];
	}
}

//全権一致の関数
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

function vd($arr){
	echo "<pre>";
	var_export($arr);
	echo "</pre><br>";
}

?>
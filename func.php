<?php
//ヘテロの分解・スーパー体の分解・ヘテロの分解
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

//全件回すやつ
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
function vd($arr,$str=""){
	echo $str;
	echo "<pre>";
	var_export($arr);
	echo "</pre>";
}

//文字列に変換&文字列内でsort
function strEtc($morphArr,$aka){
	foreach ($morphArr as $values) {
		//文字列内のsort
		natsort($values);
		//個数別で出力
		$arr = array_count_values($values);
		$str = "";
		//文字列連結を行う
		$count = 0;
		foreach ($arr as $key => $value) {
			
			//モルフがノーマル以外なら追加
			if($key != ""){
				$count = $count + $value;
				//同じモルフが２つある場合
				if($value == 2){
					//trueの場合hetを処理、falseの場合superを付与
					if(strstr($key, "het")) {
						$key = str_replace('het ', '', $key);
					}else{
						if(false != array_search($key,$aka)){
							$key = array_search($key,$aka);
						}else{
							$key = "Super ". $key;
						}
						
					}
				}
				$str .= $key . " ";
			}
			
		}
		$morphs[] = trim($str);
	}

	return $morphs;
}
?>
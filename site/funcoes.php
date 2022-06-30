<?php
	
		 function Encurta($texto, $tamanho){
		 $palavra = strlen($texto);
		 $nova_palavra = substr($texto, 0, $tamanho); 
		 if($palavra > $tamanho){
			 return ''.$nova_palavra.'...';
		 }else{
		return $texto;
		} 
	}
	function NormalizaURL($str){
    $str = strtolower(utf8_decode($str)); $i=1;
    $str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
    $str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
    while($i>0) $str = str_replace('--','-',$str,$i);
    if (substr($str, -1) == '-') $str = substr($str, 0, -1);
    return $str;
}
	
	?>

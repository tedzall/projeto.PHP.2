<?php 
	function getRota($url, $menu){
		$sliceURL = parse_url($url);
		$path = $sliceURL['path'];
		$pathLimpo = strtolower( '/'==substr($path,0,1)?substr($path,1):$path);
		$pathLimpo = empty($pathLimpo)?'home':$pathLimpo;
		return !in_array($pathLimpo,array_map('strtolower',$menu))?'pagina404':$pathLimpo;
	}
?>

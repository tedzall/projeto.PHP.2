<?php 
	function getRota($url, $menu){
		$sliceURL = parse_url($url);
		$path = $sliceURL['path'];
		$pathLimpo = strtolower( '/'==substr($path,0,1)?substr($path,1):$path);
		$pathLimpo = empty($pathLimpo)?'home':$pathLimpo;
		
		if(!in_array($pathLimpo,array_map('strtolower',$menu))){
			http_response_code(404);	
			$pathLimpo = 'pagina404';
		}

		return $pathLimpo;
	}
?>

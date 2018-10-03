<?php
function xmlJogos($array){
	$simplexml = simplexml_load_string('<?xml version="1.0"?><jogos/>');
	for ($i=0; $i<count($array); $i++){
		$jogo = $simplexml->addChild("jogo");
		foreach ($array[$i] as $key => $value){
			$jogo->addChild($key, $value);
		}
	}
	
	return $simplexml->asXML();
}

function xmlGeneros($array){
	$simplexml = simplexml_load_string('<?xml version="1.0"?><generos/>');
	for ($i=0; $i<count($array); $i++){
		$genero = $simplexml->addChild("genero");
		foreach ($array[$i] as $key => $value){
			$genero->addChild($key, $value);
		}
	}
	
	return $simplexml->asXML();
}

function xmlTipos($array){
	$simplexml = simplexml_load_string('<?xml version="1.0"?><tipos/>');
	for ($i=0; $i<count($array); $i++){
		$tipo = $simplexml->addChild("tipo");
		foreach ($array[$i] as $key => $value){
			$tipo->addChild($key, $value);
		}
	}
	return $simplexml->asXML();
}
?>
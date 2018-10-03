<?php
require 'xmlTransform.php';
#-----Jogos-----
#FUNÇÃO GET *
dispatch('/jogos', 'get_all_jogos_function');
    function get_all_jogos_function()
    {
		$db = option('db_conn');
		$jogos = array();
		$jogos = $db->query("SELECT * FROM jogos")->fetchAll(PDO::FETCH_OBJ);
		
		if (!isset($_GET['format']) || $_GET['format'] == "json"){
			header('Content-Type: application/json');
			echo json($jogos);
		} else if ( $_GET['format'] == "xml"){
			header('Content-Type: application/xml');
			echo xmlJogos($jogos);
		}else if ( $_GET['format'] == "html"){
			header('Content-Type: text/html');
			$xml = xmlJogos($jogos);
			$dom = new DOMDocument();
			$dom->loadXML($xml);
			
			$xsl = new DOMDocument();
			$xsl->load('tableJogos.xsl');
			
			$procs = new XSLTProcessor();
			$procs->importStylesheet($xsl);
			
			echo $procs->transformToXml($dom);
		} else {
			echo'Formato Invalido';
		}
    } 
	
#FUNÇÃO GET BY ID
dispatch('/jogos/id=*', 'get_jogos_by_id_function');
	function get_jogos_by_id_function()
	{
		$db = option('db_conn');
		$id = params(0); 
		$jogos = array();
		$jogos = $db->query("SELECT * FROM jogos WHERE (id = '$id')")->fetchAll(PDO::FETCH_ASSOC);
		
		
		if (!isset($_GET['format']) || $_GET['format'] == "json"){
			header('Content-Type: application/json');
			echo json($jogos);
		} else if ( $_GET['format'] == "xml"){
			header('Content-Type: application/xml');
			echo xmlJogos($jogos);
		} else if ( $_GET['format'] == "html"){
			header('Content-Type: text/html');
			$xml = xmlJogos($jogos);
			$dom = new DOMDocument();
			$dom->loadXML($xml);
			
			$xsl = new DOMDocument();
			$xsl->load('tableJogos.xsl');
			
			$procs = new XSLTProcessor();
			$procs->importStylesheet($xsl);
			
			echo $procs->transformToXml($dom);
		} else {
			echo'Formato Invalido';
		}
		
	}
	
#FUNÇÃO POST
dispatch_post('/jogos/nome=*/genero=*/desenvolvedor=*/editora=*/data=*/tipo=*', 'insert_jogos_function'); 
    function insert_jogos_function()
    {
		$db = option('db_conn');
		$nome = params(0);
		$genero = params (1);
		$desenvolvedor = params (2);
		$editora = params (3);
		$data = params (4);
		$tipo = params (5);
		
		if (!isset($_GET['format']) || $_GET['format'] == "json"){
			$jogos = $db->query("INSERT INTO jogos (nome, genero, desenvolvedor, editora, data, tipo) VALUES ('$nome', '$genero', '$desenvolvedor', '$editora', '$data', '$tipo')");
			$id = $db->lastInsertId();
			$jogos = $db->query("SELECT * FROM jogos WHERE (id = '$id')")->fetchAll(PDO::FETCH_OBJ);
			header('Content-Type: application/json');
			echo json($jogos);
		} else if ( $_GET['format'] == "xml"){
			$jogos = $db->query("INSERT INTO jogos (nome, genero, desenvolvedor, editora, data, tipo) VALUES ('$nome', '$genero', '$desenvolvedor', '$editora', '$data', '$tipo')");
			$id = $db->lastInsertId();
			$jogos = $db->query("SELECT * FROM jogos WHERE (id = '$id')")->fetchAll(PDO::FETCH_OBJ);
			header('Content-Type: application/xml');
			echo xmlJogos($jogos);
		} else {
			echo'Formato Invalido';
		}
		
    }
	
#FUNÇÃO PUT
dispatch_put('/jogos/id=*/nome=*/genero=*/desenvolvedor=*/editora=*/data=*/tipo=*', 'update_jogos_function'); 
    function update_jogos_function()
    {
		$db = option('db_conn');
		$id = params(0);
		$nome = params(1);
		$genero = params (2);
		$desenvolvedor = params (3);
		$editora = params (4);
		$data = params (5);
		$tipo = params (6);
		
		if (!isset($_GET['format']) || $_GET['format'] == "json"){
			$jogos = $db->query("UPDATE jogos SET nome = '$nome', genero = '$genero', desenvolvedor = '$desenvolvedor', editora = '$editora', data = '$data', tipo = '$tipo' WHERE id = '$id'");
			$jogos = $db->query("SELECT * FROM jogos WHERE (id = '$id')")->fetchAll(PDO::FETCH_OBJ); 
			header('Content-Type: application/json');
			echo json($jogos);
		} else if ( $_GET['format'] == "xml"){
						$jogos = $db->query("UPDATE jogos SET nome = '$nome', genero = '$genero', desenvolvedor = '$desenvolvedor', editora = '$editora', data = '$data', tipo = '$tipo' WHERE id = '$id'");
			$jogos = $db->query("SELECT * FROM jogos WHERE (id = '$id')")->fetchAll(PDO::FETCH_OBJ); 
			header('Content-Type: application/xml');
			echo xmlJogos($jogos);
		} else {
			echo'Formato Invalido';
		}
		
    }
	
#FUNÇÃO DELETE
dispatch_delete('/jogos/id=*', 'delete_jogos_by_id_function'); 
    function delete_jogos_by_id_function()
    {
		$db = option('db_conn');
		$id = params(0);
		try {
		$jogos = $db->query("DELETE FROM jogos WHERE (id = '$id')")->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

#FUNÇÃO GET BY GENERO
dispatch('/jogos/genero=*', 'get_jogos_by_genero_function');
	function get_jogos_by_genero_function()
	{
		$db = option('db_conn');
		$genero = params(0); 
		$jogos = array();
		$jogos = $db->query("SELECT * FROM jogos WHERE (genero = '$genero')")->fetchAll(PDO::FETCH_ASSOC);
		
		
		if (!isset($_GET['format']) || $_GET['format'] == "json"){
			header('Content-Type: application/json');
			echo json($jogos);
		} else if ( $_GET['format'] == "xml"){
			header('Content-Type: application/xml');
			echo xmlJogos($jogos);
		} else if ( $_GET['format'] == "html"){
			header('Content-Type: text/html');
			$xml = xmlJogos($jogos);
			$dom = new DOMDocument();
			$dom->loadXML($xml);
			
			$xsl = new DOMDocument();
			$xsl->load('tableJogos.xsl');
			
			$procs = new XSLTProcessor();
			$procs->importStylesheet($xsl);
			
			echo $procs->transformToXml($dom);
		} else {
			echo'Formato Invalido';
		}
	}

#FUNÇÃO GET BY TIPO
dispatch('/jogos/tipo=*', 'get_jogos_by_tipo_function');
	function get_jogos_by_tipo_function()
	{
		$db = option('db_conn');
		$tipo = params(0); 
		$jogos = array();
		$jogos = $db->query("SELECT * FROM jogos WHERE (tipo = '$tipo')")->fetchAll(PDO::FETCH_ASSOC);
		
		
		if (!isset($_GET['format']) || $_GET['format'] == "json"){
			header('Content-Type: application/json');
			echo json($jogos);
		} else if ( $_GET['format'] == "xml"){
			header('Content-Type: application/xml');
			echo xmlJogos($jogos);
		} else if ( $_GET['format'] == "html"){
			header('Content-Type: text/html');
			$xml = xmlJogos($jogos);
			$dom = new DOMDocument();
			$dom->loadXML($xml);
			
			$xsl = new DOMDocument();
			$xsl->load('tableJogos.xsl');
			
			$procs = new XSLTProcessor();
			$procs->importStylesheet($xsl);
			
			echo $procs->transformToXml($dom);
		} else {
			echo'Formato Invalido';
		}
	}

#-----Generos-----
#GET *
dispatch('/generos', 'get_all_generos_function');
    function get_all_generos_function()
    {
		$db = option('db_conn');
		$generos = array();
		$generos = $db->query("SELECT * FROM genero")->fetchAll(PDO::FETCH_OBJ);
		
		if (!isset($_GET['format']) || $_GET['format'] == "json"){
			header('Content-Type: application/json');
			echo json($generos);
		} else if ( $_GET['format'] == "xml"){
			header('Content-Type: application/xml');
			echo xmlGeneros($generos);
		} else if ( $_GET['format'] == "html"){
			header('Content-Type: text/html');
			$xml = xmlGeneros($generos);
			$dom = new DOMDocument();
			$dom->loadXML($xml);
			
			$xsl = new DOMDocument();
			$xsl->load('tableGeneros.xsl');
			
			$procs = new XSLTProcessor();
			$procs->importStylesheet($xsl);
			
			echo $procs->transformToXml($dom);
		}else {
			echo'Formato Invalido';
		}
    } 
	
#GET by ID
dispatch('/generos/id=*', 'get_generos_by_id_function');
	function get_generos_by_id_function()
	{
		$db = option('db_conn');
		$id = params(0); 
		$generos = array();
		$generos = $db->query("SELECT * FROM genero WHERE (id_genero = '$id')")->fetchAll(PDO::FETCH_ASSOC);
		
		
		if (!isset($_GET['format']) || $_GET['format'] == "json"){
			header('Content-Type: application/json');
			echo json($generos);
		} else if ( $_GET['format'] == "xml"){
			header('Content-Type: application/xml');
			echo xmlGeneros($generos);
		} else if ( $_GET['format'] == "html"){
			header('Content-Type: text/html');
			echo'html1';
		} else {
			echo'Formato Invalido';
		}
	}
	
#-----Tipos-----
#GET *
dispatch('/tipos', 'get_all_tipos_function');
    function get_all_tipos_function()
    {
		$db = option('db_conn');
		$tipos = array();
		$tipos = $db->query("SELECT * FROM tipo")->fetchAll(PDO::FETCH_OBJ);
		
		if (!isset($_GET['format']) || $_GET['format'] == "json"){
			header('Content-Type: application/json');
			echo json($tipos);
		} else if ( $_GET['format'] == "xml"){
			header('Content-Type: application/xml');
			echo xmlTipos($tipos);
		} else if ( $_GET['format'] == "html"){
			header('Content-Type: text/html');
			$xml = xmlTipos($tipos);
			$dom = new DOMDocument();
			$dom->loadXML($xml);
			
			$xsl = new DOMDocument();
			$xsl->load('tableTipos.xsl');
			
			$procs = new XSLTProcessor();
			$procs->importStylesheet($xsl);
			
			echo $procs->transformToXml($dom);
		}else {
			echo'Formato Invalido';
		}
    } 
	
#GET by ID
dispatch('/tipos/id=*', 'get_tipos_by_id_function');
	function get_tipos_by_id_function()
	{
		$db = option('db_conn');
		$id = params(0); 
		$tipos = array();
		$tipos = $db->query("SELECT * FROM tipo WHERE (id_tipo = '$id')")->fetchAll(PDO::FETCH_ASSOC);
		
		
		if (!isset($_GET['format']) || $_GET['format'] == "json"){
			header('Content-Type: application/json');
			echo json($tipos);
		} else if ( $_GET['format'] == "xml"){
			header('Content-Type: application/xml');
			echo xmlTipos($tipos);
		} else if ( $_GET['format'] == "html"){
			header('Content-Type: text/html');
			echo'html1';
		} else {
			echo'Formato Invalido';
		}
	}
?>
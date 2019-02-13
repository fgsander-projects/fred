<?php
	// For help on using hooks, please refer to https://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function item_init(&$options, $memberInfo, &$args){

		return TRUE;
	}

	function item_header($contentType, $memberInfo, &$args){
		$header='';

		switch($contentType){
			case 'tableview':
				$header='';
				break;

			case 'detailview':
				$header='';
				break;

			case 'tableview+detailview':
				$header='';
				break;

			case 'print-tableview':
				$header='';
				break;

			case 'print-detailview':
				$header='';
				break;

			case 'filters':
				$header='';
				break;
		}

		return $header;
	}

	function item_footer($contentType, $memberInfo, &$args){
		$footer='';

		switch($contentType){
			case 'tableview':
				$footer='';
				break;

			case 'detailview':
				$footer='';
				break;

			case 'tableview+detailview':
				$footer='';
				break;

			case 'print-tableview':
				$footer='';
				break;

			case 'print-detailview':
				$footer='';
				break;

			case 'filters':
				$footer='';
				break;
		}

		return $footer;
	}

	function item_before_insert(&$data, $memberInfo, &$args){
		// antes de insertar
<<<<<<< HEAD
		// recuperar el código
=======
>>>>>>> 8d0c70b3d7dbeb1c1e684a34bcc3bc834c3c2403
		if( !function_exists('getLastNumber')){
			include_once ('item_AJAX.php');
		}

		$codes =[
<<<<<<< HEAD
			"colec"		=> $data['colecao_codigo'],
			"group"		=> $data['grupo_codigo'],
			"serie"		=> $data['serie_codigo']
=======
			"colec"		=> sqlValue("select codigo_colecao from colecao where colecao.id = ".$data['colecao_codigo']),
			"group"		=> sqlValue("select codigo_grupo from grupo where grupo.id = ".$data['grupo_codigo']),
			"serie"		=> sqlValue("select codigo from serie where serie.id = ".$data['serie_codigo'])
>>>>>>> 8d0c70b3d7dbeb1c1e684a34bcc3bc834c3c2403
		];


		$res = getLastNumber($codes);
		$next = intval($res['numero_serie']) + 1;
		
		if ($data['numero_serie'] != $next){
			$data['numero_serie'] = $next;
			$next = substr("000".$next,-3);
			//hacer el código
			$data['identificacao'] = $codes['colec']."_".$codes['group']."_".$codes['serie']."_".$next;
		}
		return TRUE;
	}

	function item_after_insert($data, $memberInfo, &$args){
		
		return TRUE;
	}

	function item_before_update(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function item_after_update($data, $memberInfo, &$args){

		return TRUE;
	}

	function item_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function item_after_delete($selectedID, $memberInfo, &$args){

	}

	function item_dv($selectedID, $memberInfo, &$html, &$args){

	}

	function item_csv($query, $memberInfo, &$args){

		return $query;
	}
	function item_batch_actions(&$args){

		return array();
	}

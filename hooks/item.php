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
		// recuperar el código
		$itemData = getDataTable('item'," item.id = {$data['id']}");
		if( !function_exists('getLastNumber')){
			include_once ('item_AJAX.php');
		}
		$codes =[
			"colec"		=> $itemData['colecao_codigo'],
			"group"		=> $itemData['grupo_codigo'],
			"serie"		=> $itemData['serie_codigo'],
			"numSerie" 	=> ""
		];
		$res = getLastNumber($codes);
		$next = 1;
		if ($res['numero_serie']){
			$next = $res['numero_serie'] + 1;
		}
		sql("UPDATE item set item.'numero_serie = '$next' WHERE item.id = {$data['id']}",$e);
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

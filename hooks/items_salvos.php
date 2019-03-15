<?php
	// For help on using hooks, please refer to https://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function items_salvos_init(&$options, $memberInfo, &$args){

		return TRUE;
	}

	function items_salvos_header($contentType, $memberInfo, &$args){
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

	function items_salvos_footer($contentType, $memberInfo, &$args){
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

	function items_salvos_before_insert(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function items_salvos_after_insert($data, $memberInfo, &$args){

		return TRUE;
	}

	function items_salvos_before_update(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function items_salvos_after_update($data, $memberInfo, &$args){

		return TRUE;
	}

	function items_salvos_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function items_salvos_after_delete($selectedID, $memberInfo, &$args){

	}

	function items_salvos_dv($selectedID, $memberInfo, &$html, &$args){

	}

	function items_salvos_csv($query, $memberInfo, &$args){

		return $query;
	}
	function items_salvos_batch_actions(&$args){

		return array();
	}

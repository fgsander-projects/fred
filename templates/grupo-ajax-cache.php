<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'grupo';

		/* data for selected record, or defaults if none is selected */
		var data = {
			colecao: <?php echo json_encode(array('id' => $rdata['colecao'], 'value' => $rdata['colecao'], 'text' => $jdata['colecao'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for colecao */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'colecao' && d.id == data.colecao.id)
				return { results: [ data.colecao ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>


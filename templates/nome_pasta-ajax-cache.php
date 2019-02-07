<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'nome_pasta';

		/* data for selected record, or defaults if none is selected */
		var data = {
			numero_pasta: <?php echo json_encode(array('id' => $rdata['numero_pasta'], 'value' => $rdata['numero_pasta'], 'text' => $jdata['numero_pasta'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for numero_pasta */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'numero_pasta' && d.id == data.numero_pasta.id)
				return { results: [ data.numero_pasta ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>


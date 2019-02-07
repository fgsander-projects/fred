<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'item';

		/* data for selected record, or defaults if none is selected */
		var data = {
			idioma: <?php echo json_encode(array('id' => $rdata['idioma'], 'value' => $rdata['idioma'], 'text' => $jdata['idioma'])); ?>,
			local_publicacao_veiculo: <?php echo json_encode(array('id' => $rdata['local_publicacao_veiculo'], 'value' => $rdata['local_publicacao_veiculo'], 'text' => $jdata['local_publicacao_veiculo'])); ?>,
			tipo_publicacao: <?php echo json_encode(array('id' => $rdata['tipo_publicacao'], 'value' => $rdata['tipo_publicacao'], 'text' => $jdata['tipo_publicacao'])); ?>,
			colecao: <?php echo json_encode(array('id' => $rdata['colecao'], 'value' => $rdata['colecao'], 'text' => $jdata['colecao'])); ?>,
			colecao_codigo: <?php echo json_encode($jdata['colecao_codigo']); ?>,
			grupo: <?php echo json_encode(array('id' => $rdata['grupo'], 'value' => $rdata['grupo'], 'text' => $jdata['grupo'])); ?>,
			grupo_codigo: <?php echo json_encode($jdata['grupo_codigo']); ?>,
			serie: <?php echo json_encode(array('id' => $rdata['serie'], 'value' => $rdata['serie'], 'text' => $jdata['serie'])); ?>,
			serie_codigo: <?php echo json_encode($jdata['serie_codigo']); ?>,
			subserie: <?php echo json_encode(array('id' => $rdata['subserie'], 'value' => $rdata['subserie'], 'text' => $jdata['subserie'])); ?>,
			tipologia: <?php echo json_encode(array('id' => $rdata['tipologia'], 'value' => $rdata['tipologia'], 'text' => $jdata['tipologia'])); ?>,
			genero: <?php echo json_encode(array('id' => $rdata['genero'], 'value' => $rdata['genero'], 'text' => $jdata['genero'])); ?>,
			formato: <?php echo json_encode(array('id' => $rdata['formato'], 'value' => $rdata['formato'], 'text' => $jdata['formato'])); ?>,
			suporte: <?php echo json_encode(array('id' => $rdata['suporte'], 'value' => $rdata['suporte'], 'text' => $jdata['suporte'])); ?>,
			documentos_relacionados: <?php echo json_encode(array('id' => $rdata['documentos_relacionados'], 'value' => $rdata['documentos_relacionados'], 'text' => $jdata['documentos_relacionados'])); ?>,
			numero_caixa: <?php echo json_encode(array('id' => $rdata['numero_caixa'], 'value' => $rdata['numero_caixa'], 'text' => $jdata['numero_caixa'])); ?>,
			nome_caixa: <?php echo json_encode(array('id' => $rdata['nome_caixa'], 'value' => $rdata['nome_caixa'], 'text' => $jdata['nome_caixa'])); ?>,
			numero_pasta: <?php echo json_encode(array('id' => $rdata['numero_pasta'], 'value' => $rdata['numero_pasta'], 'text' => $jdata['numero_pasta'])); ?>,
			nome_pasta: <?php echo json_encode(array('id' => $rdata['nome_pasta'], 'value' => $rdata['nome_pasta'], 'text' => $jdata['nome_pasta'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for idioma */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'idioma' && d.id == data.idioma.id)
				return { results: [ data.idioma ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for local_publicacao_veiculo */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'local_publicacao_veiculo' && d.id == data.local_publicacao_veiculo.id)
				return { results: [ data.local_publicacao_veiculo ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for tipo_publicacao */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'tipo_publicacao' && d.id == data.tipo_publicacao.id)
				return { results: [ data.tipo_publicacao ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for colecao */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'colecao' && d.id == data.colecao.id)
				return { results: [ data.colecao ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for colecao autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'colecao' && d.id == data.colecao.id){
				$j('#colecao_codigo' + d[rnd]).html(data.colecao_codigo);
				return true;
			}

			return false;
		});

		/* saved value for grupo */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'grupo' && d.id == data.grupo.id)
				return { results: [ data.grupo ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for grupo autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'grupo' && d.id == data.grupo.id){
				$j('#grupo_codigo' + d[rnd]).html(data.grupo_codigo);
				return true;
			}

			return false;
		});

		/* saved value for serie */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'serie' && d.id == data.serie.id)
				return { results: [ data.serie ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for serie autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'serie' && d.id == data.serie.id){
				$j('#serie_codigo' + d[rnd]).html(data.serie_codigo);
				return true;
			}

			return false;
		});

		/* saved value for subserie */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'subserie' && d.id == data.subserie.id)
				return { results: [ data.subserie ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for tipologia */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'tipologia' && d.id == data.tipologia.id)
				return { results: [ data.tipologia ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for genero */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'genero' && d.id == data.genero.id)
				return { results: [ data.genero ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for formato */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'formato' && d.id == data.formato.id)
				return { results: [ data.formato ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for suporte */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'suporte' && d.id == data.suporte.id)
				return { results: [ data.suporte ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for documentos_relacionados */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'documentos_relacionados' && d.id == data.documentos_relacionados.id)
				return { results: [ data.documentos_relacionados ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for numero_caixa */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'numero_caixa' && d.id == data.numero_caixa.id)
				return { results: [ data.numero_caixa ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for nome_caixa */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'nome_caixa' && d.id == data.nome_caixa.id)
				return { results: [ data.nome_caixa ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for numero_pasta */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'numero_pasta' && d.id == data.numero_pasta.id)
				return { results: [ data.numero_pasta ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for nome_pasta */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'nome_pasta' && d.id == data.nome_pasta.id)
				return { results: [ data.nome_pasta ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>


<!-- ########################################################## -->
			<!-- genero -->
            <div class="row" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Gênero:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Gênero:</label></div>
		


		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_64" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="4" value="<?php echo htmlspecialchars($FilterValue[7]); ?>" >
			<input type="hidden" name="FilterAnd[7]" value="and">
			<input type="hidden" name="FilterField[7]" value="64">  
			<input type="hidden" id="lookupoperator_64" name="FilterOperator[7]" value="equal-to">
			<input type="hidden" id="filterfield_64" name="FilterValue[7]" value="<?php echo htmlspecialchars($FilterValue[7]); ?>" size="3">
		</div>

		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>
	<script>
		
		$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_64").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"genero", f:"genero" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_64").val(e.added.text);
				$j("#lookupoperator_64").val('like');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_64").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_64").val().length){
				
				//None case 
				if ($j("#filterfield_64").val() == '<None>'){
					$j("#filter_64").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_64").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_64").val(),  //search term
						p: 1,                                         //page number
						t:"genero",                //table name
						f:"genero"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_64").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});

	</script>
			
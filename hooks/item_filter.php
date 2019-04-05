<?php $advanced_search_mode = intval($_REQUEST['advanced_search_mode']); ?>

	<input type="hidden" name="advanced_search_mode" value="<?php echo $advanced_search_mode; ?>" id="advanced_search_mode">
	<script>
		$j(function(){
			$j('.btn.search_mode').appendTo('.page-header h1');
			$j('.btn.search_mode').click(function(){
				var mode = parseInt($j('#advanced_search_mode').val());
				$j('#advanced_search_mode').val(1 - mode);
				if(typeof(beforeApplyFilters) == 'function') beforeApplyFilters();
				return true;
			});
		})
	</script>

<?php if($advanced_search_mode){ ?>
	<button class="btn btn-lg btn-success pull-right search_mode" type="submit" name="Filter_x" value="1">Mudar para a busca Simples</button>
	<?php include(dirname(__FILE__) . '/../defaultFilters.php'); ?>
	
<?php }else{ ?>

	<button class="btn btn-lg btn-default pull-right search_mode" type="submit" name="Filter_x" value="1">Mudar para a busca Avançada</button>
			
			<!-- load bootstrap datetime-picker -->
			<link rel="stylesheet" href="resources/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
			<script type="text/javascript" src="resources/moment/moment.min.js"></script>
			<script type="text/javascript" src="resources/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
			
			
			<div class="page-header"><h1>
				<a href="item_view.php" style="text-decoration: none; color: inherit;">
					<img src="resources/table_icons/curriculum_vitae.png"> 					Busca de Itens</a>
			</h1></div>

				

	<div class="row vspacer-lg" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Grupo:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Grupo:</label></div>
		
		
		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_6" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="1" value="<?php echo htmlspecialchars($FilterValue[1]); ?>" >
			<input type="hidden" name="FilterAnd[1]" value="and">
			<input type="hidden" name="FilterField[1]" value="6">  
			<input type="hidden" id="lookupoperator_6" name="FilterOperator[1]" value="equal-to">
			<input type="hidden" id="filterfield_6" name="FilterValue[1]" value="<?php echo htmlspecialchars($FilterValue[1]); ?>" size="3">
		</div>
		
		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>

	<script>

		$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_6").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"item", f:"grupo" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_6").val(e.added.text);
				$j("#lookupoperator_6").val('equal-to');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_6").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_6").val().length){
				
				//None case 
				if ($j("#filterfield_6").val() == '<None>'){
					$j("#filter_6").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_6").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_6").val(),  //search term
						p: 1,                                         //page number
						t:"item",                //table name
						f:"grupo"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_6").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});
	</script>

		
			<!-- ########################################################## -->
					

	<div class="row vspacer-lg" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Série:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Série:</label></div>
		
		
		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_8" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="2" value="<?php echo htmlspecialchars($FilterValue[2]); ?>" >
			<input type="hidden" name="FilterAnd[2]" value="and">
			<input type="hidden" name="FilterField[2]" value="8">  
			<input type="hidden" id="lookupoperator_8" name="FilterOperator[2]" value="equal-to">
			<input type="hidden" id="filterfield_8" name="FilterValue[2]" value="<?php echo htmlspecialchars($FilterValue[2]); ?>" size="3">
		</div>
		
		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>

	<script>

		$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_8").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"item", f:"serie" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_8").val(e.added.text);
				$j("#lookupoperator_8").val('equal-to');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_8").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_8").val().length){
				
				//None case 
				if ($j("#filterfield_8").val() == '<None>'){
					$j("#filter_8").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_8").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_8").val(),  //search term
						p: 1,                                         //page number
						t:"item",                //table name
						f:"serie"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_8").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});
	</script>

		
			<!-- ########################################################## -->
					

	<div class="row vspacer-lg" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Subsérie:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Subsérie:</label></div>
		
		
		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_10" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="3" value="<?php echo htmlspecialchars($FilterValue[3]); ?>" >
			<input type="hidden" name="FilterAnd[3]" value="and">
			<input type="hidden" name="FilterField[3]" value="10">  
			<input type="hidden" id="lookupoperator_10" name="FilterOperator[3]" value="equal-to">
			<input type="hidden" id="filterfield_10" name="FilterValue[3]" value="<?php echo htmlspecialchars($FilterValue[3]); ?>" size="3">
		</div>
		
		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>

	<script>

		$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_10").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"item", f:"subserie" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_10").val(e.added.text);
				$j("#lookupoperator_10").val('equal-to');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_10").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_10").val().length){
				
				//None case 
				if ($j("#filterfield_10").val() == '<None>'){
					$j("#filter_10").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_10").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_10").val(),  //search term
						p: 1,                                         //page number
						t:"item",                //table name
						f:"subserie"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_10").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});
	</script>

		
			<!-- ########################################################## -->
					

	<div class="row vspacer-lg" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Tipologia / Espécie:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Tipologia / Espécie:</label></div>
		
		
		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_14" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="4" value="<?php echo htmlspecialchars($FilterValue[4]); ?>" >
			<input type="hidden" name="FilterAnd[4]" value="and">
			<input type="hidden" name="FilterField[4]" value="14">  
			<input type="hidden" id="lookupoperator_14" name="FilterOperator[4]" value="equal-to">
			<input type="hidden" id="filterfield_14" name="FilterValue[4]" value="<?php echo htmlspecialchars($FilterValue[4]); ?>" size="3">
		</div>
		
		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>

	<script>

		$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_14").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"item", f:"tipologia" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_14").val(e.added.text);
				$j("#lookupoperator_14").val('equal-to');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_14").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_14").val().length){
				
				//None case 
				if ($j("#filterfield_14").val() == '<None>'){
					$j("#filter_14").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_14").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_14").val(),  //search term
						p: 1,                                         //page number
						t:"item",                //table name
						f:"tipologia"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_14").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});
	</script>

		
			<!-- ########################################################## -->
			
	<div class="row vspacer-lg" style="border-bottom: dotted 2px #DDD;" >
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Data:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Data:</label></div>
		
		
		<div class="col-xs-3 col-md-1 vspacer-lg text-center">Between</div>
		
		<input type="hidden" name="FilterAnd[5]" value="and">
		<input type="hidden" name="FilterField[5]" value="15">   
		<input type="hidden" name="FilterOperator[5]" value="greater-than-or-equal-to">
		
		<div class="col-xs-9 col-md-3 col-lg-2 vspacer-md">
			<input type="text"  class="form-control" id="from-date_15"  name="FilterValue[5]" value="<?php echo htmlspecialchars($FilterValue[5]); ?>" size="10">
		</div>

				<div class="col-xs-3 col-md-1 text-center vspacer-lg"> and </div>
		
		<input type="hidden" name="FilterAnd[6]" value="and">
		<input type="hidden" name="FilterField[6]" value="15">  
		<input type="hidden" name="FilterOperator[6]" value="less-than-or-equal-to">
		
		<div class="col-xs-9 col-md-3 col-lg-2 vspacer-md">
			<input type="text" class="form-control" id="to-date_15" name="FilterValue[6]" value="<?php echo htmlspecialchars($FilterValue[6]); ?>" size="10">
		</div>
		
		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>

				
	<script>
		$j(function(){
			//date
			$j("#from-date_15 , #to-date_15 ").datetimepicker({
				format: 'DD/MM/YYYY'
			});

			$j("#from-date_15" ).on('dp.change' , function(e){
				date = moment(e.date).add(1, 'month');  
				$j("#to-date_15 ").val(date.format('DD/MM/YYYY')).data("DateTimePicker").minDate(e.date);
			});
		});
	</script>

		
			<!-- ########################################################## -->
			<!-- genero -->
            <div class="row" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Gênero:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Gênero:</label></div>
		


		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_25" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="7" value="<?php echo htmlspecialchars($FilterValue[7]); ?>" >
			<input type="hidden" name="FilterAnd[7]" value="and">
			<input type="hidden" name="FilterField[7]" value="25">  
			<input type="hidden" id="lookupoperator_25" name="FilterOperator[7]" value="like">
			<input type="hidden" id="filterfield_25" name="FilterValue[7]" value="<?php echo htmlspecialchars($FilterValue[7]); ?>" size="3">
		</div>

		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>
	<script>
		
		$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_25").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"genero", f:"genero" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_25").val(e.added.text);
				$j("#lookupoperator_25").val('like');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_25").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_25").val().length){
				
				//None case 
				if ($j("#filterfield_25").val() == '<None>'){
					$j("#filter_25").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_25").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_25").val(),  //search term
						p: 1,                                         //page number
						t:"genero",                //table name
						f:"genero"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_25").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});

	</script>
			
			<!-- ########################################################## -->
			
	<div class="row" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Forma:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Forma:</label></div>
		
		
		<input type="hidden" class="optionsData" name="FilterField[8]" value="26">
		<div class="col-xs-10 col-sm-11 col-md-8 col-lg-6">

			<input type="hidden" name="FilterAnd[8]" value="and">
			<input type="hidden" name="FilterOperator[8]" value="equal-to">
			<input type="hidden" name="FilterValue[8]" id="26_currValue" value="<?php echo htmlspecialchars($FilterValue[8]); ?>" size="3">

	
			<div class="radio">
				<label>
					 <input type="radio" name="FilterValue[8]" class="filter_26" value='Original'>Original				</label>
			</div>
	 
			<div class="radio">
				<label>
					 <input type="radio" name="FilterValue[8]" class="filter_26" value='Cópia'>Cópia				</label>
			</div>
	 
			<div class="radio">
				<label>
					 <input type="radio" name="FilterValue[8]" class="filter_26" value='Rascunho'>Rascunho				</label>
			</div>
	 		</div>

		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>
	<script>
		//for population
		var filterValue_26 = '<?php echo htmlspecialchars($FilterValue[ 8 ]); ?>';
		$j(function () {
			if (filterValue_26) {
				$j("input[class =filter_26][value ='" + filterValue_26 + "']").attr("checked", "checked");
			}
		})
	</script>
			
			<!-- ########################################################## -->
			
	<div class="row" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Formato:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Formato:</label></div>
		
		
		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_27" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="4" value="<?php echo htmlspecialchars($FilterValue[9]); ?>" >
			<input type="hidden" name="FilterAnd[9]" value="and">
			<input type="hidden" name="FilterField[9]" value="27">  
			<input type="hidden" id="lookupoperator_27" name="FilterOperator[9]" value="like">
			<input type="hidden" id="filterfield_27" name="FilterValue[9]" value="<?php echo htmlspecialchars($FilterValue[9]); ?>" size="3">
		</div>


		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>
	<script>
		$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_27").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"formato", f:"formato" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_27").val(e.added.text);
				$j("#lookupoperator_27").val('like');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_27").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_27").val().length){
				
				//None case 
				if ($j("#filterfield_27").val() == '<None>'){
					$j("#filter_27").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_27").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_27").val(),  //search term
						p: 1,                                         //page number
						t:"formato",                //table name
						f:"formato"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_27").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});

	</script>
			
			<!-- ########################################################## -->
			
	<div class="row" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Suporte:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Suporte:</label></div>
		


		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_29" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="4" value="<?php echo htmlspecialchars($FilterValue[10]); ?>" >
			<input type="hidden" name="FilterAnd[10]" value="and">
			<input type="hidden" name="FilterField[10]" value="29">  
			<input type="hidden" id="lookupoperator_29" name="FilterOperator[10]" value="like">
			<input type="hidden" id="filterfield_29" name="FilterValue[10]" value="<?php echo htmlspecialchars($FilterValue[10]); ?>" size="3">
		</div>

		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>
	<script>
			
			$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_29").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"suporte", f:"suporte" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_29").val(e.added.text);
				$j("#lookupoperator_29").val('like');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_29").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_29").val().length){
				
				//None case 
				if ($j("#filterfield_29").val() == '<None>'){
					$j("#filter_29").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_29").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_29").val(),  //search term
						p: 1,                                         //page number
						t:"suporte",                //table name
						f:"suporte"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_29").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});

	</script>
			
			<!-- ########################################################## -->
			
	<div class="row" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Escritura:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Escritura:</label></div>
		
		
		<input type="hidden" class="optionsData" name="FilterField[11]" value="28">
		<div class="col-xs-10 col-sm-11 col-md-8 col-lg-6">

			<input type="hidden" name="FilterAnd[11]" value="and">
			<input type="hidden" name="FilterOperator[11]" value="equal-to">
			<input type="hidden" name="FilterValue[11]" id="28_currValue" value="<?php echo htmlspecialchars($FilterValue[11]); ?>" size="3">

	
			<div class="radio">
				<label>
					 <input type="radio" name="FilterValue[11]" class="filter_28" value='Manuscrito'>Manuscrito				</label>
			</div>
	 
			<div class="radio">
				<label>
					 <input type="radio" name="FilterValue[11]" class="filter_28" value='Impresso'>Impresso				</label>
			</div>
	 
			<div class="radio">
				<label>
					 <input type="radio" name="FilterValue[11]" class="filter_28" value='Datilografado'>Datilografado				</label>
			</div>
	 		</div>

		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>
	<script>
		//for population
		var filterValue_28 = '<?php echo htmlspecialchars($FilterValue[ 11 ]); ?>';
		$j(function () {
			if (filterValue_28) {
				$j("input[class =filter_28][value ='" + filterValue_28 + "']").attr("checked", "checked");
			}
		})
	</script>
			
			<!-- ########################################################## -->
					

	<div class="row vspacer-lg" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Número da Caixa:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Número da Caixa:</label></div>
		
		
		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_34" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="12" value="<?php echo htmlspecialchars($FilterValue[12]); ?>" >
			<input type="hidden" name="FilterAnd[12]" value="and">
			<input type="hidden" name="FilterField[12]" value="34">  
			<input type="hidden" id="lookupoperator_34" name="FilterOperator[12]" value="equal-to">
			<input type="hidden" id="filterfield_34" name="FilterValue[12]" value="<?php echo htmlspecialchars($FilterValue[12]); ?>" size="3">
		</div>
		
		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>

	<script>

		$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_34").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"item", f:"numero_caixa" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_34").val(e.added.text);
				$j("#lookupoperator_34").val('equal-to');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_34").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_34").val().length){
				
				//None case 
				if ($j("#filterfield_34").val() == '<None>'){
					$j("#filter_34").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_34").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_34").val(),  //search term
						p: 1,                                         //page number
						t:"item",                //table name
						f:"numero_caixa"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_34").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});
	</script>

		
			<!-- ########################################################## -->
					

	<div class="row vspacer-lg" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Nome da Caixa:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Nome da Caixa:</label></div>
		
		
		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_35" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="13" value="<?php echo htmlspecialchars($FilterValue[13]); ?>" >
			<input type="hidden" name="FilterAnd[13]" value="and">
			<input type="hidden" name="FilterField[13]" value="35">  
			<input type="hidden" id="lookupoperator_35" name="FilterOperator[13]" value="equal-to">
			<input type="hidden" id="filterfield_35" name="FilterValue[13]" value="<?php echo htmlspecialchars($FilterValue[13]); ?>" size="3">
		</div>
		
		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>

	<script>

		$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_35").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"item", f:"nome_caixa" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_35").val(e.added.text);
				$j("#lookupoperator_35").val('equal-to');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_35").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_35").val().length){
				
				//None case 
				if ($j("#filterfield_35").val() == '<None>'){
					$j("#filter_35").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_35").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_35").val(),  //search term
						p: 1,                                         //page number
						t:"item",                //table name
						f:"nome_caixa"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_35").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});
	</script>

		
			<!-- ########################################################## -->
					

	<div class="row vspacer-lg" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Número da Pasta:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Número da Pasta:</label></div>
		
		
		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_36" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="14" value="<?php echo htmlspecialchars($FilterValue[14]); ?>" >
			<input type="hidden" name="FilterAnd[14]" value="and">
			<input type="hidden" name="FilterField[14]" value="36">  
			<input type="hidden" id="lookupoperator_36" name="FilterOperator[14]" value="equal-to">
			<input type="hidden" id="filterfield_36" name="FilterValue[14]" value="<?php echo htmlspecialchars($FilterValue[14]); ?>" size="3">
		</div>
		
		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>

	<script>

		$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_36").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"item", f:"numero_pasta" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_36").val(e.added.text);
				$j("#lookupoperator_36").val('equal-to');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_36").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_36").val().length){
				
				//None case 
				if ($j("#filterfield_36").val() == '<None>'){
					$j("#filter_36").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_36").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_36").val(),  //search term
						p: 1,                                         //page number
						t:"item",                //table name
						f:"numero_pasta"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_36").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});
	</script>

		
			<!-- ########################################################## -->
					

	<div class="row vspacer-lg" style="border-bottom: dotted 2px #DDD;">
		
		<div class="hidden-xs hidden-sm col-md-3 vspacer-lg text-right"><label for="">Nome da pasta:</label></div>
		<div class="hidden-md hidden-lg col-xs-12 vspacer-lg"><label for="">Nome da pasta:</label></div>
		
		
		<div class="col-md-8 col-lg-6 vspacer-md">
			<div id="filter_37" class="vspacer-lg"><span></span></div>

			<input type="hidden" class="populatedLookupData" name="15" value="<?php echo htmlspecialchars($FilterValue[15]); ?>" >
			<input type="hidden" name="FilterAnd[15]" value="and">
			<input type="hidden" name="FilterField[15]" value="37">  
			<input type="hidden" id="lookupoperator_37" name="FilterOperator[15]" value="equal-to">
			<input type="hidden" id="filterfield_37" name="FilterValue[15]" value="<?php echo htmlspecialchars($FilterValue[15]); ?>" size="3">
		</div>
		
		
		<div class="col-xs-3 col-xs-offset-9 col-md-offset-0 col-md-1">
			<button type="button" class="btn btn-default vspacer-md btn-block" title='Clear fields' onclick="clearFilters($j(this).parent());" ><span class="glyphicon glyphicon-trash text-danger"></button>
		</div>

			</div>

	<script>

		$j(function(){
			/* display a drop-down of categories that populates its content from ajax_combo.php */
			$j("#filter_37").select2({
				ajax: {
					url: "ajax_combo.php",
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p:page, t:"item", f:"nome_pasta" }; },
					results: function (resp, page) { return resp; }
				}
			}).on('change', function(e){
				$j("#filterfield_37").val(e.added.text);
				$j("#lookupoperator_37").val('equal-to');
				if (e.added.id=='{empty_value}'){
					$j("#lookupoperator_37").val('is-empty');
				}
			});


			/* preserve the applied category filter and show it when re-opening the filters page */
			if ($j("#filterfield_37").val().length){
				
				//None case 
				if ($j("#filterfield_37").val() == '<None>'){
					$j("#filter_37").select2( 'data' , {
						id: '{empty-value}',
						text: '<None>'
					});
					$j("#lookupoperator_37").val('is-empty');
					return;
				}
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: {
						s: $j("#filterfield_37").val(),  //search term
						p: 1,                                         //page number
						t:"item",                //table name
						f:"nome_pasta"               //field name
					}
				}).done(function(response){
					if (response.results.length){
						$j("#filter_37").select2( 'data' , {
							id: response.results[0].id,
							text: response.results[0].text
						});
					}
				});
			}

		});
	</script>

		
			<!-- ########################################################## -->
						<!-- filter actions -->
			<div class="row">
				<div class="col-md-3 col-md-offset-3 col-lg-offset-4 col-lg-2 vspacer-lg">
					<input type="hidden" name="apply_sorting" value="1">
					<button type="submit" id="applyFilters" onclick="beforeApplyFilters(event);return true;" class="btn btn-success btn-block btn-lg"><i class="glyphicon glyphicon-ok"></i> Apply filters</button>
				</div>
								<div class="col-md-3 col-lg-2 vspacer-lg">
					<button onclick="beforeCancelFilters();" type="submit" id="cancelFilters" class="btn btn-warning btn-block btn-lg"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
				</div>
			</div>

			<script>
				$j(function(){
					//stop event if it is already bound
					$j(".numeric").off("keydown").on("keydown", function (e) {
						// Allow: backspace, delete, tab, escape, enter and .
						if ($j.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
							// Allow: Ctrl+A, Command+A
							(e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
							// Allow: home, end, left, right, down, up
							(e.keyCode >= 35 && e.keyCode <= 40)) {
								// let it happen, don't do anything
								return;
						}
						// Ensure that it is a number and stop the keypress
						if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
							e.preventDefault();
						}
					});                
				});
				
				/* function to handle the action of the clear field button */
				function clearFilters(elm){
					var parentDiv = $j(elm).parent(".row ");
					//get all input nodes
					inputValueChildren = parentDiv.find("input[type!=radio][name^=FilterValue]");
					inputRadioClildren = parentDiv.find("input[type=radio][name^=FilterValue]");
					
					//default input nodes ( text, hidden )
					inputValueChildren.each(function( index ) {
						$j( this ).val('');
					});
					
					//radio buttons
					inputRadioClildren.each(function( index ) {
						$j( this ).removeAttr('checked');

						//checkbox case
						if ($j( this ).val()=='') $j(this).attr("checked", "checked").click();
					});
					
					//lookup and select dropdown
					parentDiv.find("div[id$=DropDown],div[id^=filter_]").select2("val", "");

					//for lookup
					parentDiv.find("input[id^=lookupoperator_]").val('equal-to');

				}
				
				function checkboxFilter(elm) {
					if (elm.value == "null") {
						$j("#" + elm.className).val("is-empty");
					} else {
						$j("#" + elm.className).val("equal-to");
					}
				}
				
				/* funtion to remove unsupplied fields */
				function beforeApplyFilters(event){
				
					//get all field submitted values
					$j(":input[type=text][name^=FilterValue],:input[type=hidden][name^=FilterValue],:input[type=radio][name^=FilterValue]:checked").each(function( index ) {
						  
						//if type=hidden  and options radio fields with the same name are checked, supply its value
						if ( $j( this ).attr('type')=='hidden' &&  $j(":input[type=radio][name='"+$j( this ).attr('name')+"']:checked").length >0 ){
							return;
						}
						  
						  //do not submit fields with empty values
						if ( !$j( this ).val()){
						  var fieldNum =  $j(this).attr('name').match(/(\d+)/)[0];
						  $j(":input[name='FilterField["+fieldNum+"]']").val('');
						 
						  };
					});

				}
				
				function beforeCancelFilters(){
					

					//other fields
					$j('form')[0].reset();

					//lookup case ( populate with initial data)
					$j(":input[class='populatedLookupData']").each(function(){
					  

						$j(":input[name='FilterValue["+$j(this).attr('name')+"]']").val($j(this).val());
						if ($j(this).val()== '<None>'){
							$j(this).parent(".row ").find('input[id^="lookupoperator"]').val('is-empty');
						}else{
							$j(this).parent(".row ").find('input[id^="lookupoperator"]').val('equal-to');
						}
							
					})

					//options case ( populate with initial data)
					$j(":input[class='populatedOptionsData']").each(function(){
					   
						$j(":input[name='FilterValue["+$j(this).attr('name')+"]']").val($j(this).val());
					})


					//checkbox, radio options case
					$j(":input[class='checkboxData'],:input[class='optionsData'] ").each(function(){
						var filterNum = $j(this).val();
						var populatedValue = eval("filterValue_"+filterNum);                  
						var parentDiv = $j(this).parent(".row ");

						//check old value
						parentDiv.find("input[type=radio][value='"+populatedValue+"']").attr('checked', 'checked').click();
					
					})

					//remove unsuplied fields
					beforeApplyFilters();

					return true;
				}
			</script>
			
			<style>
				.form-control{ width: 100% !important; }
				.select2-container, .select2-container.vspacer-lg{ max-width: unset !important; width: 100%; margin-top: 0 !important; }
			</style>


		

<?php } ?>
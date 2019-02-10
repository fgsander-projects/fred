<?php
// This script and data application were generated by AppGini 5.73
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/nome_caixa.php");
	include("$currDir/nome_caixa_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('nome_caixa');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "nome_caixa";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`nome_caixa`.`id`" => "id",
		"IF(    CHAR_LENGTH(`numero_caixa1`.`numero_caixa`), CONCAT_WS('',   `numero_caixa1`.`numero_caixa`), '') /* N&#250;mero da Caixa: */" => "numero_caixa",
		"`nome_caixa`.`nome_caixa`" => "nome_caixa"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`nome_caixa`.`id`',
		2 => '`numero_caixa1`.`numero_caixa`',
		3 => 3
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`nome_caixa`.`id`" => "id",
		"IF(    CHAR_LENGTH(`numero_caixa1`.`numero_caixa`), CONCAT_WS('',   `numero_caixa1`.`numero_caixa`), '') /* N&#250;mero da Caixa: */" => "numero_caixa",
		"`nome_caixa`.`nome_caixa`" => "nome_caixa"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`nome_caixa`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`numero_caixa1`.`numero_caixa`), CONCAT_WS('',   `numero_caixa1`.`numero_caixa`), '') /* N&#250;mero da Caixa: */" => "N&#250;mero da Caixa:",
		"`nome_caixa`.`nome_caixa`" => "Nome da Caixa:"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`nome_caixa`.`id`" => "id",
		"IF(    CHAR_LENGTH(`numero_caixa1`.`numero_caixa`), CONCAT_WS('',   `numero_caixa1`.`numero_caixa`), '') /* N&#250;mero da Caixa: */" => "numero_caixa",
		"`nome_caixa`.`nome_caixa`" => "nome_caixa"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'numero_caixa' => 'N&#250;mero da Caixa:');

	$x->QueryFrom = "`nome_caixa` LEFT JOIN `numero_caixa` as numero_caixa1 ON `numero_caixa1`.`id`=`nome_caixa`.`numero_caixa` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 15;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "nome_caixa_view.php";
	$x->RedirectAfterInsert = "nome_caixa_view.php?addNew_x=1";
	$x->TableTitle = "Nome da Caixa";
	$x->TableIcon = "resources/table_icons/box_front.png";
	$x->PrimaryKey = "`nome_caixa`.`id`";
	$x->DefaultSortField = '3';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth   = array(  150, 150);
	$x->ColCaption = array("N&#250;mero da Caixa:", "Nome da Caixa:");
	$x->ColFieldName = array('numero_caixa', 'nome_caixa');
	$x->ColNumber  = array(2, 3);

	// template paths below are based on the app main directory
	$x->Template = 'templates/nome_caixa_templateTV.html';
	$x->SelectedTemplate = 'templates/nome_caixa_templateTVS.html';
	$x->TemplateDV = 'templates/nome_caixa_templateDV.html';
	$x->TemplateDVP = 'templates/nome_caixa_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `nome_caixa`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='nome_caixa' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `nome_caixa`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='nome_caixa' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`nome_caixa`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: nome_caixa_init
	$render=TRUE;
	if(function_exists('nome_caixa_init')){
		$args=array();
		$render=nome_caixa_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: nome_caixa_header
	$headerCode='';
	if(function_exists('nome_caixa_header')){
		$args=array();
		$headerCode=nome_caixa_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: nome_caixa_footer
	$footerCode='';
	if(function_exists('nome_caixa_footer')){
		$args=array();
		$footerCode=nome_caixa_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>
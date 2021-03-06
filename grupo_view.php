<?php
// This script and data application were generated by AppGini 5.74
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/grupo.php");
	include("$currDir/grupo_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('grupo');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "grupo";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`grupo`.`id`" => "id",
		"IF(    CHAR_LENGTH(`colecao1`.`colecao`), CONCAT_WS('',   `colecao1`.`colecao`), '') /* Cole&#231;&#227;o: */" => "colecao",
		"`grupo`.`grupo`" => "grupo",
		"`grupo`.`codigo_grupo`" => "codigo_grupo"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`grupo`.`id`',
		2 => '`colecao1`.`colecao`',
		3 => 3,
		4 => 4
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`grupo`.`id`" => "id",
		"IF(    CHAR_LENGTH(`colecao1`.`colecao`), CONCAT_WS('',   `colecao1`.`colecao`), '') /* Cole&#231;&#227;o: */" => "colecao",
		"`grupo`.`grupo`" => "grupo",
		"`grupo`.`codigo_grupo`" => "codigo_grupo"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`grupo`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`colecao1`.`colecao`), CONCAT_WS('',   `colecao1`.`colecao`), '') /* Cole&#231;&#227;o: */" => "Cole&#231;&#227;o:",
		"`grupo`.`grupo`" => "Grupo:",
		"`grupo`.`codigo_grupo`" => "C&#243;digo do Grupo:"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`grupo`.`id`" => "id",
		"IF(    CHAR_LENGTH(`colecao1`.`colecao`), CONCAT_WS('',   `colecao1`.`colecao`), '') /* Cole&#231;&#227;o: */" => "colecao",
		"`grupo`.`grupo`" => "grupo",
		"`grupo`.`codigo_grupo`" => "codigo_grupo"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'colecao' => 'Cole&#231;&#227;o:');

	$x->QueryFrom = "`grupo` LEFT JOIN `colecao` as colecao1 ON `colecao1`.`id`=`grupo`.`colecao` ";
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
	$x->ScriptFileName = "grupo_view.php";
	$x->RedirectAfterInsert = "grupo_view.php?addNew_x=1";
	$x->TableTitle = "Grupo";
	$x->TableIcon = "resources/table_icons/document_copies.png";
	$x->PrimaryKey = "`grupo`.`id`";
	$x->DefaultSortField = '3';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth   = array(  150, 150, 150);
	$x->ColCaption = array("Cole&#231;&#227;o:", "Grupo:", "C&#243;digo do Grupo:");
	$x->ColFieldName = array('colecao', 'grupo', 'codigo_grupo');
	$x->ColNumber  = array(2, 3, 4);

	// template paths below are based on the app main directory
	$x->Template = 'templates/grupo_templateTV.html';
	$x->SelectedTemplate = 'templates/grupo_templateTVS.html';
	$x->TemplateDV = 'templates/grupo_templateDV.html';
	$x->TemplateDVP = 'templates/grupo_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `grupo`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='grupo' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `grupo`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='grupo' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`grupo`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: grupo_init
	$render=TRUE;
	if(function_exists('grupo_init')){
		$args=array();
		$render=grupo_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: grupo_header
	$headerCode='';
	if(function_exists('grupo_header')){
		$args=array();
		$headerCode=grupo_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: grupo_footer
	$footerCode='';
	if(function_exists('grupo_footer')){
		$args=array();
		$footerCode=grupo_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>
<?php
// This script and data application were generated by AppGini 5.74
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/serie.php");
	include("$currDir/serie_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('serie');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "serie";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`serie`.`id`" => "id",
		"IF(    CHAR_LENGTH(`grupo1`.`grupo`), CONCAT_WS('',   `grupo1`.`grupo`), '') /* Grupo: */" => "grupo",
		"`serie`.`serie`" => "serie",
		"`serie`.`codigo`" => "codigo"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`serie`.`id`',
		2 => '`grupo1`.`grupo`',
		3 => 3,
		4 => '`serie`.`codigo`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`serie`.`id`" => "id",
		"IF(    CHAR_LENGTH(`grupo1`.`grupo`), CONCAT_WS('',   `grupo1`.`grupo`), '') /* Grupo: */" => "grupo",
		"`serie`.`serie`" => "serie",
		"`serie`.`codigo`" => "codigo"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`serie`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`grupo1`.`grupo`), CONCAT_WS('',   `grupo1`.`grupo`), '') /* Grupo: */" => "Grupo:",
		"`serie`.`serie`" => "S&#233;rie:",
		"`serie`.`codigo`" => "C&#243;digo:"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`serie`.`id`" => "id",
		"IF(    CHAR_LENGTH(`grupo1`.`grupo`), CONCAT_WS('',   `grupo1`.`grupo`), '') /* Grupo: */" => "grupo",
		"`serie`.`serie`" => "serie",
		"`serie`.`codigo`" => "codigo"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'grupo' => 'Grupo:');

	$x->QueryFrom = "`serie` LEFT JOIN `grupo` as grupo1 ON `grupo1`.`id`=`serie`.`grupo` ";
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
	$x->ScriptFileName = "serie_view.php";
	$x->RedirectAfterInsert = "serie_view.php?addNew_x=1";
	$x->TableTitle = "S&#233;rie";
	$x->TableIcon = "resources/table_icons/document_copies.png";
	$x->PrimaryKey = "`serie`.`id`";
	$x->DefaultSortField = '3';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth   = array(  150, 150, 150);
	$x->ColCaption = array("Grupo:", "S&#233;rie:", "C&#243;digo:");
	$x->ColFieldName = array('grupo', 'serie', 'codigo');
	$x->ColNumber  = array(2, 3, 4);

	// template paths below are based on the app main directory
	$x->Template = 'templates/serie_templateTV.html';
	$x->SelectedTemplate = 'templates/serie_templateTVS.html';
	$x->TemplateDV = 'templates/serie_templateDV.html';
	$x->TemplateDVP = 'templates/serie_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `serie`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='serie' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `serie`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='serie' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`serie`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: serie_init
	$render=TRUE;
	if(function_exists('serie_init')){
		$args=array();
		$render=serie_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: serie_header
	$headerCode='';
	if(function_exists('serie_header')){
		$args=array();
		$headerCode=serie_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: serie_footer
	$footerCode='';
	if(function_exists('serie_footer')){
		$args=array();
		$footerCode=serie_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>